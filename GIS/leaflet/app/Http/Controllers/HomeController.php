<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function esri()
    {
        return view('esri');
    }

    public function google()
    {
        return view('google');
    }
}
