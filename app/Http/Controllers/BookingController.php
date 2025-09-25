<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
class BookingController extends Controller
{
    // Show the booking form
    public function create()
    {
        return view('bookings.create');
    }

    public function service()
    {
        // Example: return a view
        return view('bookings.service');
    }

    // Store booking in DB
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'arrival' => 'required|date',
            'departure' => 'required|date',
            'adults' => 'required|integer',
            'kids' => 'nullable|integer',
            'payment' => 'required|string',
            'total_amount' => 'required|numeric',
        ]);

        // Save to database
        $booking = \App\Models\Booking::create($request->all());

        // Redirect to payment page with total
        return redirect()->route('payment.page', ['total' => $booking->total_amount]);
    }

    // Show payment page
    public function payment(Request $request)
    {
        // Get total from query string
        $total = $request->query('total', 0);

        return view('payment', compact('total'));
    }

    public function showAll()
    {
        // Get all bookings from database
        $bookings = Booking::all();

        // Pass data to the view
        return view('bookings', compact('bookings'));
    }
}
