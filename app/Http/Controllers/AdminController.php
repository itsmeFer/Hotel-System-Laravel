<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function bookings()
    {
        // Logika untuk menampilkan semua pemesanan
    }

    public function createRoom()
    {
        return view('admin.createRoom');
    }

    public function storeRoom(Request $request)
    {
        $request->validate([
            'number' => 'required|unique:rooms',
            'type' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('room_images', 'public');
        }

        Room::create([
            'number' => $request->number,
            'type' => $request->type,
            'price' => $request->price,
            'is_available' => true,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully.');
    }

    public function indexRooms()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function showRoom($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.show', compact('room'));
    }

    public function editRoom($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('room'));
    }

    public function destroyRoom($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully.');
    }
}
