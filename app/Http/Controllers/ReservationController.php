<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function makeReservation(Request $request) {
        dd($request->all());
    }
}
