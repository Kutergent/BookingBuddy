<?php

namespace App\Http\Controllers;

use App\Mail\ReservedMail;
use App\Models\Field;
use App\Models\Form;
use App\Models\FormExtra;
use App\Models\Reservations;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
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
        $data = Form::first();
        $dataAdd = FormExtra::all();

        return view('reserve', [
            'data' => $data,
            'dataAdd' => $dataAdd
        ]);
    }

    public function postReserve(Request $r){

        $validation = Validator::make($r->all(), [
            'name' => ['min:4'],
            'email' => ['email'],
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

        $data = new Reservations();


        $data->name = $r->name;
        $data->email = $r->email;
        $data->phone_number = $r->phone_number;
        $data->dob = $r->dob;
        $data->reserve_date = $r->reserve_date;
        $data->reserve_time = $r->reserve_time;
        $data->reserve_duration = $r->reserve_duration;
        $data->status = 'pending';

        $data->save();

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
        return redirect()->route('reserveComplete')->with('email', $data->email);
    }

    public function reserveComplete(Request $r){
        $email = $r->session()->get('email');

        return view('reserveComplete' , compact('email'));
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
