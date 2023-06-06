<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function report(){
        return view('report');
    }

    public function calendar(){
        return view('calendar');
    }

    public function edit(){
        $data = DB::table('forms')->first();


        // dd($data);
        return view('editform', ['data' => $data]);
    }

    public function editUpdate(Request $r){
        $data = Form::first();

        $data->name = $r->name;
        $data->email = $r->email;
        $data->phone_number = $r->phone_number;
        $data->dob = $r->dob;

        $data->save();

        return redirect('edit');

    }
}
