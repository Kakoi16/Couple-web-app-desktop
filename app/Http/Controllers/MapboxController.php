<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapboxController extends Controller
{
    public function getToken()
    {
        return response()->json([
            'token' => env('MAPBOX_ACCESS_TOKEN')
        ]);
    }
}