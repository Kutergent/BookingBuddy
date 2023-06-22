<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\FormExtra;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        $reservation = Reservations::join('users', 'users.id', '=', 'reservations.users_id')->find($id);

        return response()->json($reservation, 200);
    }

    public function checkReservation(Request $request){
        $fieldReservationId = $request->query('fieldReservationId');

        $field = Field::all();
        $formExtra = FormExtra::where('enabled', 1)->get();
        $data =[];

        foreach ($formExtra as $fe){
            foreach ($field as $f){
                if ($fieldReservationId == $f->reservations_id && $fe->id == $f->formextra_id){
                    $data[] = [
                        'name' => $fe->name,
                        'textbox' => $f->textbox
                    ];
                }
            }
        }

            return response()->json(['data' => $data]);

    }

}
