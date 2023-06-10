<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Form;
use App\Models\FormExtra;
use App\Models\Reservations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function testarea(){
        $arr = array();
        $data = FormExtra::all();

        foreach ($data as $d) {
            array_push($arr, $d->name);
        };

        dd($arr);

      return;
    }

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
        $reservations = Reservations::all();

        return view('calendar', compact('reservations'));
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
            $da->name = $r->input($da->id.'_in');
            $da->save();
        }


        return redirect('edit');

    }

    public function addField(){
        $data = Form::first();
        $dataAdd = new FormExtra();

        $dataAdd->forms_id = $data->id;
        $dataAdd->name = 'Enter name here';
        $dataAdd->textbox = 'placeholder';
        $dataAdd->enabled = false;

        $dataAdd->save();

        return redirect('edit');
    }

    public function deleteField($id){
        $dataAdd = FormExtra::find($id);

        $dataAdd->delete();

        return redirect('edit');
    }

}
