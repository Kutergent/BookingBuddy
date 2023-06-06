<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Reservations;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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

        return view('reserve', ['data' => $data]);
    }

    public function postReserve(Request $r){

        $validation = Validator::make($r->all(), [
            'name' => ['min:4'],
            'email' => ['email'],
            'phone_number' => ['digits_between:10,12'],
            'dob' => ['date', 'before:-14 years'],
            'reserve_date' => ['date', 'after:yesterday'],
            'reserve_duration' => ['numeric', 'max:8']
        ]);

        $validation->validate();

        $data = new Reservations();

        $data->name = $r->name;
        $data->email = $r->email;
        $data->phone_number = $r->phone_number;
        $data->dob = $r->dob;
        $data->reserve_date = $r->reserve_date;
        $data->reserve_duration = $r->reserve_duration;

        $data->save();

        return redirect('welcome');
    }
}
