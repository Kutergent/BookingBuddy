<?php

namespace App\Http\Controllers;

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
}
