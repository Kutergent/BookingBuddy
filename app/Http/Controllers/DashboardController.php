<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function report(){
        return view('report');
    }

    public function calendar(){
        return view('calendar');
    }

    public function edit(){
        return view('editform');
    }
}
