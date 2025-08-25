<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function maps()
    {
        return view('pages.maps');
    }

    public function camera()
    {
        return view('pages.camera');
    }

    public function position()
    {
        return view('pages.position');
    }
}