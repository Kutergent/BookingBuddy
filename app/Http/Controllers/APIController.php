<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function confirmStatus($id){

        $reservation = Reservations::find($id);
        $reservation->status = 'confirmed';
        $reservation->save();

        return response()->json(['message' => 'Reservation confirmed'], 200);
    }

    public function cancelStatus($id){

        $reservation = Reservations::find($id);
        $reservation->status = 'canceled';
        $reservation->save();

        return response()->json(['message' => 'Reservation canceled'], 200);
    }

    public function getReserveData($id){

        $reservation = Reservations::find($id);

        return response()->json($reservation, 200);
    }
}
