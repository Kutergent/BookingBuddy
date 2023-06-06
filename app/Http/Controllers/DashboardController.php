<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function report(){
        $data = Reservations::paginate(5);

        return view('report', ['report' => $data]);
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
