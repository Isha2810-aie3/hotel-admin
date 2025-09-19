<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Show all rooms
    public function index()
    {
        $rooms = Room::all();   // fetch all rooms
        return view('rooms', compact('rooms')); // pass to view
    }

    // Store new room
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_type' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('rooms', 'public');
        }

        Room::create([
            'type' => $validated['room_type'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'capacity' => $validated['capacity'],
            'status' => $validated['status'],
            'image' => $validated['image'] ?? null,
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room added successfully!');
    }

    // ✅ Update only the status
    public function updateStatus(Request $request, Room $room)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $room->update([
            'status' => $request->status
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room status updated successfully!');
    }
}
