<?php

namespace App\Http\Controllers;

use App\Mail\ReservedMail;
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
    public function welcome(){
        return view('welcome');
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

        if (Auth::check()) {
            $validation = Validator::make($r->all(), [
                'reserve_date' => ['date', 'after:yesterday'],
                'reserve_time' => ['required', 'date_format:H:i', 'regex:/^(?:0[0-9]|1[0-9]|2[0-3]):[03]0$/',
                            ValidationRule::unique('reservations')->where(function ($query) use ($r) {
                                return $query->where('reserve_date', $r->reserve_date)
                                             ->where('reserve_time', $r->reserve_time);
                            })],
                'reserve_duration' => ['numeric', 'max:8']
            ]);

            $validation->validate();

            $data->reserve_date = $r->reserve_date;
            $data->reserve_time = $r->reserve_time;
            $data->reserve_duration = $r->reserve_duration;
            $data->status = 'pending';

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
                'reserve_time' => ['required', 'date_format:H:i', 'regex:/^(?:0[0-9]|1[0-9]|2[0-3]):[03]0$/',
                            ValidationRule::unique('reservations')->where(function ($query) use ($r) {
                                return $query->where('reserve_date', $r->reserve_date)
                                             ->where('reserve_time', $r->reserve_time);
                            })],
                'reserve_duration' => ['numeric', 'max:8']
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
            $data->reserve_duration = $r->reserve_duration;
            $data->status = 'pending';

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
        return redirect()->route('reserveComplete')->with('email', Auth::user()->email);
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
