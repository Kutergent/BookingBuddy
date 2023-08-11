<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\FormExtra;
use App\Models\Reservations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class APIController extends Controller
{
    public function confirmStatus(Request $request)
    {
        $id = $request->query('id');

        $reservation = Reservations::find($id);
        $reservation->status = 'confirmed';
        $reservation->save();

        return response()->json(['message' => 'Reservation confirmed'], 200);
    }

    public function getUserData(Request $request){
        $id = $request->query('id');
        $user = User::find($id);

        return response()->json([
            'name' => $user->name,
        ]);
    }

    public function cancelStatus(Request $request)
    {
        $id = $request->query('id');

        $reservation = Reservations::find($id);
        $reservation->status = 'canceled';
        $reservation->save();

        return response()->json(['message' => 'Reservation canceled'], 200);
    }

    public function getReserveData(Request $request)
    {
        $id = $request->query('id');

        $reservation = Reservations::select('reservations.*', 'users.name', 'users.email', 'users.phone_number', 'users.dob')
            ->join('users', 'users.id', '=', 'reservations.users_id')
            ->where('reservations.id', $id)
            ->first();

        return response()->json($reservation, 200);
    }

    public function checkReservation(Request $request)
    {
        $fieldReservationId = $request->query('fieldReservationId');

        $field = Field::all();
        $formExtra = FormExtra::where('enabled', 1)->get();
        $data = [];

        foreach ($formExtra as $fe) {
            foreach ($field as $f) {
                if ($fieldReservationId == $f->reservations_id && $fe->id == $f->formextra_id) {
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
