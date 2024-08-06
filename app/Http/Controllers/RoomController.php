<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'is_available' => 'sometimes|boolean',
        ]);

        Room::create($request->only(['number', 'type', 'price', 'is_available']));

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'number' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'is_available' => 'sometimes|boolean',
        ]);

        $room->update($request->only(['number', 'type', 'price', 'is_available']));

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
