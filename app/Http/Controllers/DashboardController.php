<?php

namespace App\Http\Controllers;

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
    public function testarea(){
    //     $reservations = Reservations::where('status', 'pending')
    // ->where('reserve_date', '<', now()->toDateString())
    // ->orWhere(function ($query) {
    //     $query->whereDate('reserve_date', now()->toDateString())
    //           ->whereTime('reserve_time', '<', now()->toTimeString());
    // })->update(['status' => 'canceled']);



      return redirect('/');
    }

    public function report(Request $r){

        if ($r->start != null) {
            $fromDate = Carbon::parse($r->start);
            $toDate = Carbon::parse($r->end);

            $data = Reservations::sortable()->whereBetween('reserve_date', [$fromDate, $toDate])->paginate(10);


            return view('report', ['report' => $data]);
        }

        $data = Reservations::sortable()->paginate(10);

        return view('report', ['report' => $data]);
        // return view('report')->with('report', $data);
    }

    public function calendar(){
        $reservations = Reservations::orderBy('created_at', 'desc')->get();
        $field = Field::all();
        $formExtra = FormExtra::where('enabled', 1)->get();

        return view('calendar', compact('reservations', 'field', 'formExtra'));
    }

    public function edit(){
        $data = Form::first();
        $dataAdd = FormExtra::all();


        // dd($data);
        return view('editform', [
            'data' => $data,
            'dataAdd' => $dataAdd
        ]);
    }

    public function editUpdate(Request $r){
        $data = Form::first();

        $data->name = $r->name;
        $data->email = $r->email;
        $data->phone_number = $r->phone_number;
        $data->dob = $r->dob;

        $data->save();

        $dataAdd = FormExtra::all();

        foreach ($dataAdd as $da) {
            $da->enabled = $r->input($da->id);
            // $da->name = $r->input($da->id.'_in');
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
        $user = User::paginate(10);


        return view('usermanage', [
            'usermanage' => $user
        ]);
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



}
