<?php

namespace App\Http\Controllers;

use App\Mail\ReservedMail;
use App\Models\ChatMessage;
use App\Models\Field;
use App\Models\Form;
use App\Models\FormExtra;
use App\Models\Reservations;
use App\Models\User;
use Carbon\Carbon;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule as ValidationRule;

class HomeController extends Controller
{
    public function getChat(){
        $userId = auth()->id();

        // $messages = ChatMessage::where('users_id', $userId)
        //                     ->orderBy('created_at')
        //                     ->get();

                            //TEMPORARY SHOW ALL
                            $messages = ChatMessage::orderBy('created_at')
                            ->get();

        return $messages;

    }

    public function chatcStore(Request $request){

        $user = auth()->user();
        $message = new ChatMessage([
            'users_id' => $user->id,
            'role' => 'customer',
            'message' => $request->input('message'),
        ]);
        $message->save();
        session(['openChat' => true]);
        return back();
    }

    public function getUserChat(Request $r){
    $id = $r->query('id');
    $user = User::findOrFail($id);
    // $messages = $user->messages()->orderBy('created_at')->get();
    // $messages = ChatMessage::where('users_id', $user->id)
    // ->orderBy('created_at')->get();
    $messages = ChatMessage::where('users_id', $id)
                             ->orderBy('created_at')
                             ->get();
    // dd($messages);
    return view('components.chat_messages', compact('messages'));

    }

    public function welcome(){
        $userId = auth()->id();

        // $messages = ChatMessage::where('users_id', $userId)
        //                     ->orderBy('created_at')
        //                     ->get();

                            //TEMPORARY SHOW ALL
                            $messages = ChatMessage::orderBy('created_at')
                            ->get();
        return view('welcome', compact('messages'));
    }
    public function aboutus(){
        return view('aboutus');
    }

    public function reserve(){
        $form = Form::first();
        $formextra = FormExtra::all();

        return view('reserve', compact('form', 'formextra'));

        // return view('reserve', [
        //     'data' => $data,
        //     'dataAdd' => $dataAdd
        // ]);
    }

    public function postReserve(Request $r){

        $data = new Reservations();
        $form = Form::first();

        if (Auth::check()) {
            $validation = Validator::make($r->all(), [
                'reserve_date' => ['date', 'after:yesterday'],
                'reserve_time' => [
                    'required',
                    'date_format:H:i',
                    'regex:/^(?:0[0-9]|1[0-9]|2[0-3]):(?:00|10|20|30|40|50)$/', // Interval of 10 minutes
                    function ($attribute, $value, $fail) use ($form, $r) {
                        $reserveDate = $r->reserve_date;
                        $reserveTime = $value;
                        $readDate = Carbon::parse($reserveDate)->format('d, M Y');


                        // Combine the reserve date and time into a single datetime object
                        $vreserveTime = Carbon::parse("$reserveTime");

                        // Check if the reserve time is within the store's opening and closing time
                        $openTime = Carbon::parse($form->open);
                        $closeTime = Carbon::parse($form->close);

                        if ($vreserveTime->lessThan($openTime) || $vreserveTime->greaterThan($closeTime)) {
                            $fail("$vreserveTime The reservation time must be between $openTime and $closeTime.");
                        }

                        // Check if the reservation time exceeds the limit
                        $reservationsCount = Reservations::where('reserve_date', $reserveDate)
                            ->where('reserve_time', $reserveTime)
                            ->where('status', '!=', 'canceled')
                            ->count();

                        if ($reservationsCount >= $form->limit) {
                            $fail("The reservation for $readDate at $reserveTime is fully booked.");
                        }
                    },

                ],
            ]);

            $validation->validate();



            $data->reserve_date = $r->reserve_date;
            $data->reserve_time = $r->reserve_time;
            $data->reserve_duration = 1;
            $data->status = 'pending';
            $data->invoice = '';

            $data->users_id = Auth::user()->id;

            $data->save();
        }
        else {
            $validation = Validator::make($r->all(), [
                'name' => ['min:4', 'required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed'],
                'phone_number' => ['digits_between:10,12'],
                'dob' => ['date', 'before:-14 years'],
                'reserve_date' => ['date', 'after:yesterday'],
                'reserve_time' => [
                    'required',
                    'date_format:H:i',
                    'regex:/^(?:0[0-9]|1[0-9]|2[0-3]):(?:00|10|20|30|40|50)$/', // Interval of 10 minutes
                    function ($attribute, $value, $fail) use ($form, $r) {
                        $reserveDate = $r->reserve_date;
                        $reserveTime = $value;
                        $readDate = Carbon::parse($reserveDate)->format('d, M Y');

                        // Combine the reserve date and time into a single datetime object
                        $vreserveTime = Carbon::parse("$reserveTime");

                        // Check if the reserve time is within the store's opening and closing time
                        $openTime = Carbon::parse($form->open);
                        $closeTime = Carbon::parse($form->close);

                        if ($vreserveTime->lessThan($openTime) || $vreserveTime->greaterThan($closeTime)) {
                            $fail("$vreserveTime The reservation time must be between $openTime and $closeTime.");
                        }

                        // Check if the reservation time exceeds the limit
                        $reservationsCount = Reservations::where('reserve_date', $reserveDate)
                            ->where('reserve_time', $reserveTime)
                            ->where('status', '!=', 'canceled')
                            ->count();

                        if ($reservationsCount >= $form->limit) {
                            $fail("The reservation for $readDate at $reserveTime is fully booked.");
                        }
                    },
                ],
            ]);

            $validation->validate();


            $user = new User();

            $user->name = $r->name;
            $user->email = $r->email;
            $user->password = Hash::make($r->password);
            $user->role = 'Customer';
            $user->phone_number = $r->phone_number;
            $user->dob = $r->dob;

            $user->save();
            Auth::login($user);

            $data->users_id = $user->id;

            $data->reserve_date = $r->reserve_date;
            $data->reserve_time = $r->reserve_time;
            $data->reserve_duration = 1;
            $data->status = 'pending';
            $data->invoice = '';

            $data->save();
        }

        $dataAdd = FormExtra::all();

        $temp = $data->id;

        foreach ($dataAdd as $da) {
            if ($da->enabled == 1) {

                $field = new Field();

                $field->reservations_id = $temp;
                $field->formextra_id = $da->id;
                $field->textbox = $r->input($da->id);

                // dd($r->input($da->id));

                $field->save();
            }

        }


        // Mail::to($data->email)->send(new ReservedMail($data));
        return redirect()->route('transaction')->with('email', Auth::user()->email);
    }


    //Transaction DP
    public function transaction(){
        $data = Form::first();

        $tax = $data->tax_amt;
        $dp = $data->dp_amt;
        $total = $dp + ($tax/100 * $dp);

        return view('transaction', compact('total', 'dp', 'tax'));
    }
    public function postInvoice(){
        $data = Reservations::latest('id')->first();

        $generate_invoice = null;

        for ($i = 0; $i < 9; $i++) {
            $temp = strval(rand(0, 9));
            $generate_invoice .= $temp;
        }

        $data->invoice = 'RES'.$generate_invoice.'DP';
        $data->save();

        return redirect()->route('reserveComplete');
    }

    //Cancel reservation
    public function cancelReservation($id){
        $res = Reservations::find($id);

        $res->status = 'canceled';
        $res->save();

        return redirect('my-reservations');
    }

    //Reschedule reservation
    public function reschedule($id){
        $res = Reservations::find($id);
        $form = Form::first();
        $formextra = FormExtra::all();

        return view('reschedule', compact('res', 'form', 'formextra'));
    }
    public function rescheduleRes($id, Request $r){
        $res = Reservations::find($id);
        $form = Form::first();

        $validation = Validator::make($r->all(), [
            'reserve_date' => ['date', 'after:yesterday'],
            'reserve_time' => [
                'required',
                'date_format:H:i',
                'regex:/^(?:0[0-9]|1[0-9]|2[0-3]):(?:00|10|20|30|40|50)$/', // Interval of 10 minutes
                function ($attribute, $value, $fail) use ($form, $r) {
                    $reserveDate = $r->reserve_date;
                    $reserveTime = $value;
                    $readDate = Carbon::parse($reserveDate)->format('d, M Y');


                    // Combine the reserve date and time into a single datetime object
                    $vreserveTime = Carbon::parse("$reserveTime");

                    // Check if the reserve time is within the store's opening and closing time
                    $openTime = Carbon::parse($form->open);
                    $closeTime = Carbon::parse($form->close);

                    if ($vreserveTime->lessThan($openTime) || $vreserveTime->greaterThan($closeTime)) {
                        $fail("$vreserveTime The reservation time must be between $openTime and $closeTime.");
                    }

                    // Check if the reservation time exceeds the limit
                    $reservationsCount = Reservations::where('reserve_date', $reserveDate)
                        ->where('reserve_time', $reserveTime)
                        ->where('status', '!=', 'canceled')
                        ->count();

                    if ($reservationsCount >= $form->limit) {
                        $fail("The reservation for $readDate at $reserveTime is fully booked.");
                    }
                },

            ],
        ]);

        $validation->validate();

        $res->reserve_date = $r->reserve_date;
        $res->reserve_time = $r->reserve_time;
        $res->status = 'pending';
        $res->save();


        return redirect('my-reservations');
    }


    public function reserveComplete(){

        return view('reservecomplete');
    }

    public function getList(Request $r){
        $user = auth()->user();

        if ($r->start != null) {
            $fromDate = Carbon::parse($r->start);
            $toDate = Carbon::parse($r->end);

            $reservations = Reservations::where('users_id', $user->id)->sortable()->whereBetween('reserve_date', [$fromDate, $toDate])->paginate(10);

            return view ('myReservations', compact('reservations'));
        }

        $reservations = Reservations::where('users_id', $user->id)->sortable()->paginate(10);


        return view ('myReservations', compact('reservations'));
    }

}
