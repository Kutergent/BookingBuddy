<?php

namespace App\Http\Controllers;

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
        return view('reserve');
    }
}
