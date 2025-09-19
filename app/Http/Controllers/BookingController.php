<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'room_total' => 'required|numeric',
            'service_details' => 'nullable|string',
            'service_total' => 'required|numeric',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,completed',
            'payment' => 'required|in:paid,unpaid',
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking added successfully!');
    }
}
