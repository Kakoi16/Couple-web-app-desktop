<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MapboxController extends Controller
{
    public function getToken()
    {
        return response()->json([
            'token' => env('MAPBOX_ACCESS_TOKEN')
        ]);
    }

    public function getUsersLocation()
    {
        $users = User::select('id', 'name', 'email', 'latitude', 'longitude')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get();

        return response()->json($users);
    }

public function updateLocation(Request $request)
{
    $request->validate([
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
    ]);

    $user = auth()->user();
    if ($user) {
        $user->update([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
    }

    return response()->json(['status' => 'ok']);
}

}
