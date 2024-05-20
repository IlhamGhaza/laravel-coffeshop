<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ReservationController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'customer_name' => 'required|string',
                'customer_phone' => 'required|string',
                'reservation_date' => 'required',
                'reservation_time' => 'required',
                'notes' => 'nullable|string',
                'table_number' => 'nullable|string',
                'status' => 'required|string',
            ]);

            $reservation = new Reservation();
            $reservation->customer_name = $request->customer_name;
            $reservation->customer_phone = $request->customer_phone;
            $reservation->reservation_code = $this->generateReservaitonCode();
            $reservation->reservation_date = $request->reservation_date;
            $reservation->reservation_time = $request->reservation_time;
            $reservation->status = $request->status;
            $reservation->notes = $request->notes;
            $reservation->table_number = $request->table_number;

            $reservation->save();


            return response(['message' => 'success', 'data' => $reservation], 200);
        } catch (\Exception $e) {

            return response(['message' => $e->getMessage()], 500);
        }
    }

    function generateReservaitonCode()
    {
        // Generate random string of 6 characters
        $randomString = Str::random(6);

        // Combine with current timestamp to ensure uniqueness
        // $timestamp = now()->format('YmdHis');

        return 'RSV-' . $randomString;
    }

    public function get()
    {
        $reservations = Reservation::all();
        return response()->json(['status' => 200, 'data' => $reservations], 200);
    }


    public function updateReservation(Request $request)
    {

        $request->validate([

            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
            'notes' => 'nullable|string',
            'table_number' => 'nullable|string',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',

        ]);

        $reservation = Reservation::where('id', $request->id)->first();


        if (!$reservation) {
            return response()->json(['status' => 'error', 'message' => 'Reservation not found'], 404);
        }

        $reservations = Reservation::where('id', $request->id)->update($request->all());

        return response()->json(['status' => 200, 'data' => $reservations], 200);
    }
}
