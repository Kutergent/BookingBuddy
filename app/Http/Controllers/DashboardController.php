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


        $field = Field::all();
        $formExtra = FormExtra::where('enabled', 1)->get();

        return view('calendar', compact('reservations', 'field', 'formExtra'));
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

        $data->name = '1';
        $data->range = $r->range;
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



}
