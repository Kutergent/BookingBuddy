<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyReservations;
use App\Charts\ReserveStatus;
use App\Models\ChatMessage;
use App\Models\Field;
use App\Models\Form;
use App\Models\FormExtra;
use App\Models\Reservations;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class DashboardController extends Controller
{
    public function reportgraph(Request $r){

        $targetYear = $r->query('year');

        $monthNames = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December',
        ];

        $reserveCount = Reservations::selectRaw('MONTH(reserve_date) as month, COUNT(*) as reservation_count')
        ->whereYear('reserve_date', $targetYear)
        ->groupBy(DB::raw('MONTH(reserve_date)'))
        ->orderBy(DB::raw('MONTH(reserve_date)'), 'asc')
        ->get();

        $monthlyCounts = array_fill(1, 12, 0);

        foreach ($reserveCount as $item) {
            $monthlyCounts[$item->month] = $item->reservation_count;
        }

        foreach ($monthlyCounts as $month => $count) {
            $rl[] = $monthNames[$month];
            $rc[] = $count;
        }

        $mr = new MonthlyReservations;
        $mr->labels($rl);
        $mr->displayLegend(false);
        $mr->title('Monthly Reservation Trendline', 20, '#202828ff', true, "Helvetica");
        $mr->dataset('Reservations', 'line', $rc)->lineTension(0.25)->backgroundColor('#5044e466');

        $statuscount = Reservations::select(DB::raw('COUNT(*) as count'))
        ->whereYear('reserve_date', $targetYear)
        ->groupBy('status')
        ->orderBy('status')
        ->get();



        $sc =  $statuscount->map(function ($item){
            return $item->count;
        });

        $rs = new ReserveStatus;
        $rs->labels(['Rejected','Pending', 'Confirmed']);
        $rs->title('Reservation Status Breakdown', 20, '#202828ff', true, "Helvetica");
        $rs->displayAxes(false,false);
        $rs->dataset('Status', 'doughnut', $sc)->backgroundColor(collect(['#ff3838','rgba(217, 119, 6)', '#7158e2']));




        $dayCount = Reservations::selectRaw('COUNT(*) as reservation_count')
        ->selectRaw('DAYOFWEEK(reserve_date) as day_of_week')
        ->whereYear('reserve_date', $targetYear)
        ->groupBy(DB::raw('DAYOFWEEK(reserve_date)'))
        ->orderBy(DB::raw('DAYOFWEEK(reserve_date)'))
        ->get();

        $dc = $dayCount->map(function ($item){
            return $item->reservation_count;
        });

        $dr = new MonthlyReservations;
        $dr->labels(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']);
        $dr->title('Reservations by Day', 20, '#202828ff', true, "Helvetica");
        $dr->displayLegend(false);
        $dr->dataset('Reservations', 'bar', $dc)->backgroundColor(collect([
            'rgba(255, 99, 132, 0.8)',
            'rgba(255, 159, 64, 0.8)',
            'rgba(255, 205, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(153, 102, 255, 0.8)',
            'rgba(201, 203, 207, 0.8)'
          ]));


        $confirmedStatus = 'confirmed';
        $otherStatuses = ['pending', 'canceled'];

        $confirmedCounts = Reservations::select(
                DB::raw('YEAR(reserve_date) as year'),
                DB::raw('MONTH(reserve_date) as month'),
                DB::raw('COUNT(*) as total_count')
            )
            ->whereIn('status', [$confirmedStatus])
            ->whereYear('reserve_date', $targetYear)
            ->groupBy(DB::raw('YEAR(reserve_date)'), DB::raw('MONTH(reserve_date)'))
            ->get();


        $confirmedMonthlyCounts = [];
        foreach ($confirmedCounts as $item) {
            $confirmedMonthlyCounts[$item->month] = $item->total_count;
        }

        $mont = [];
        $prc = [];
        foreach ($monthlyCounts as $month => $totalCount) {
            $confirmedCount = isset($confirmedMonthlyCounts[$month]) ? $confirmedMonthlyCounts[$month] : 0;
            $percentageConfirmed = ($totalCount > 0) ? ($confirmedCount / $totalCount) * 100 : 0;

            $mont[] = $monthNames[$month];
            $prc[] = $percentageConfirmed;
        }


        $cr = new MonthlyReservations;
        $cr->labels($mont);
        $cr->title('Conversion Rate Analysis', 20, '#202828ff', true, "Helvetica");
        $cr->displayLegend(false);
        $cr->dataset('Conversion Rate', 'line', $prc)->backgroundColor('rgba(99, 255, 132, 0.5)');


        $timeCount = Reservations::selectRaw('HOUR(reserve_time) as hour, COUNT(*) as reservation_count')
        ->whereYear('reserve_date', $targetYear)
        ->groupBy(DB::raw('HOUR(reserve_time)'))
        ->orderBy(DB::raw('HOUR(reserve_time)'), 'asc')
        ->get();

        $open = Carbon::createFromFormat('H:i:s', Form::first()->open);
        $close = Carbon::createFromFormat('H:i:s', Form::first()->close);

        $openHour = $open->hour;
        $closeHour = $close->hour;

        $allHours = range($openHour, $closeHour);
        $hourlyCounts = array_fill_keys($allHours, 0);

        foreach ($timeCount as $item) {
            $hour = $item->hour;
            $hourlyCounts[$hour] = $item->reservation_count;
        }

        foreach ($allHours as $hour) {
            $hourLabel = sprintf('%02d:00 %s', ($hour % 12 ?: 12), ($hour < 12 ? 'AM' : 'PM'));
            $hl[] = $hourLabel;
            $hc[] = $hourlyCounts[$hour];
        }

        $rf = new MonthlyReservations;
        $rf->labels($hl);
        $rf->title('Reservation Activity by Time', 20, '#202828ff', true, "Helvetica");
        $rf->displayLegend(false);
        $rf->dataset('Reservations', 'bar', $hc)->backgroundColor('rgba(255, 99, 132, 0.5)');


        return view('reportgraph', compact('mr', 'rs','dr', 'cr', 'hl', 'hc', 'rf'));

    }

    public function report(Request $r){

        $field = Field::select('fields.*', 'form_extras.enabled')->join('form_extras', 'form_extras.id', '=', 'fields.formextra_id')->where('form_extras.enabled', 1)->get();

        $formextra = FormExtra::where('enabled', 1)->get();

        if ($r->start != null) {
            $fromDate = Carbon::parse($r->start);
            $toDate = Carbon::parse($r->end);

            $report = Reservations::join('users', 'users.id', '=', 'reservations.users_id')->sortable()->whereBetween('reserve_date', [$fromDate, $toDate])->paginate(10);


            return view('report', compact('report','field','formextra'));
        }

        $report = Reservations::join('users', 'users.id', '=', 'reservations.users_id')->sortable()->paginate(10);

        return view('report', compact('report','field','formextra'));
    }

    public function calendar(){
        $reservations = Reservations::select('reservations.*', 'users.name', 'users.email', 'users.phone_number', 'users.dob')
        ->join('users', 'users.id', '=', 'reservations.users_id')->orderBy('reservations.created_at', 'desc')->get();

        $canceled = Reservations::select('reservations.*', 'users.name', 'users.email', 'users.phone_number', 'users.dob')
        ->join('users', 'users.id', '=', 'reservations.users_id')
        ->orderBy('reservations.reserve_date', 'desc')
        ->get();

        $upcoming = Reservations::select('reservations.*', 'users.name', 'users.email', 'users.phone_number', 'users.dob')
        ->join('users', 'users.id', '=', 'reservations.users_id')
        ->where('reservations.reserve_date', '>', now())
        ->orderBy('reservations.reserve_date')
        ->get();


        $field = Field::all();
        $formExtra = FormExtra::where('enabled', 1)->get();

        return view('calendar', compact('reservations', 'field', 'formExtra', 'canceled', 'upcoming'));
    }

    public function edit(){
        $form = Form::first();
        $formextra = FormExtra::all();


        // dd($data);
        return view('editform', compact('form', 'formextra'));
        // return view('editform', [
        //     'data' => $data,
        //     'dataAdd' => $dataAdd
        // ]);
    }

    public function editUpdate(Request $r){
        $data = Form::first();
        $validator = Validator::make($r->all(), [
            'open' => [
                'required',
                function ($attribute, $value, $fail) use ($r) {
                    $close = $r->input('close');
                    if ($close !== null && $value >= $close) {
                        $fail('The opening time must be earlier than the closing time.');
                    }
                },
            ],
            'close' => 'required',
        ]);

        $validator->validate();



        $data->limit = $r->limit;
        $data->range = $r->range;
        $data->phone_number = $r->phone_number;
        $data->dob = $r->dob;
        $data->interval = $r->interval;
        $data->open = $r->open;
        $data->close = $r->close;


        $data->save();

        $dataAdd = FormExtra::all();

        foreach ($dataAdd as $da) {
            $da->enabled = $r->input($da->id);
            $da->save();
        }


        return redirect('edit');

    }

    public function addField(Request $r){
        $data = Form::first();
        $dataAdd = new FormExtra();

        $dataAdd->forms_id = $data->id;
        $dataAdd->name = $r->fieldName;
        $dataAdd->enabled = false;

        $dataAdd->save();

        return redirect('edit');
    }

    public function deleteField($id){
        $dataAdd = FormExtra::find($id);

        $dataAdd->delete();

        return redirect('edit');
    }

    public function usermanage(){

        $usermanage = User::where('role', '!=', 'Customer')->paginate(10);


        return view('usermanage', compact('usermanage'));
    }

    public function addUser(Request $r){
        $validation = Validator::make($r->all() ,[
            'name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
            'role' => ['required','string']
        ]);

        $validation->validate();

        $user = new User();

        $user->name = $r->name;
        $user->email = $r->email;
        $user->password = Hash::make($r->password);
        $user->role = $r->role;

        $user->save();

        return redirect('usermanage');
    }

    public function deleteUser($id){
        $deleteUser = User::find($id);

        $deleteUser->delete();

        return redirect('usermanage');
    }

    public function getChat(){
        $userId = auth()->id();

        $messages = ChatMessage::orderBy('created_at')->get();


        $usersWithMessages = ChatMessage::distinct('users_id')->pluck('users_id');
        $user = User::whereIn('id', $usersWithMessages)->get();

        return view('chat', compact('messages', 'user'));

    }

    public function chatstore(Request $request){

        $message = new ChatMessage([
            'users_id' => $request->id,
            'role' => 'Admin',
            'message' => $request->input('message'),
        ]);
        $message->save();
        return redirect()->route('getChat');
    }




}
