<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Form;
use App\Models\Reservations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function report(Request $r){

        if ($r->start != null) {
            $fromDate = Carbon::parse($r->start);
            $toDate = Carbon::parse($r->end);

            $data = Reservations::whereBetween('reserve_date', [$fromDate, $toDate])->paginate(5);


            return view('report', ['report' => $data]);
        }

        $data = Reservations::paginate(5);

        return view('report', ['report' => $data]);
    }

    public function calendar(){
        return view('calendar');
    }

    public function edit(){
        $data = Form::first();


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
