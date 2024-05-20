<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $reservations = Reservation::paginate(5);
        return view('pages.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('pages.reservation.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        Log::info('Request data:', $request->all());

        // Validate the incoming request data
        $validatedData = $request->validate([
            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
            'notes' => 'nullable|string',
            'table_number' => 'nullable|string',
            'reservation_date' => 'required',
            'reservation_time' => 'required',
        ]);

        // Generate a reservation code
        $reservationCode = $this->generateReservaitonCode();

        // Create a new Reservation instance with the validated data
        $reservation = new Reservation($validatedData);
        $reservation->reservation_code = $reservationCode;

        // Save the reservation to the database
        $reservation->save();

        // Redirect to the reservation index page with a success message
        return redirect()->route('reservation.index')->with('success', 'Reservation successfully created');
    } catch (\Exception $e) {
        Log::error('Error storing reservation: ' . $e->getMessage());
        return response()->json(['message' => 'Failed to store reservation'], 500);
    }
    }


    function generateReservaitonCode()
    {
        // Generate random string of 6 characters
        $randomString = Str::random(6);

        // Combine with current timestamp to ensure uniqueness
        $timestamp = now()->format('Ymd');

        return 'RSV-' . $timestamp . '-' . $randomString;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {


        $reservation = Reservation::findOrfail($id);



        return view('pages.reservation.edit', compact('reservation'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

      $request->validate([
            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
            'notes' => 'nullable|string',
            'table_number' => 'nullable|string',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
        ]);

        $reservation = Reservation::findOrfail($id);

        $reservation->customer_name = $request->customer_name;
        $reservation->customer_phone = $request->customer_phone;
        $reservation->notes = $request->notes;
        $reservation->table_number = $request->table_number;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->reservation_time = $request->reservation_time;

        $reservation->save();

        return redirect()->route('reservation.index')->with('success', 'Reservation successfully updated');




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = Reservation::findOrFail($id);
        $user->delete();
        return redirect()->route('reservation.index');
    }
}
