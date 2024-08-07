<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class BookingController extends Controller
{
    public function create(Room $room)
    {
        return view('bookings.create', compact('room'));
    }

    public function store(Request $request, Room $room)
    {
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Update room availability
        $room->is_available = false;
        $room->save();

        return redirect()->route('bookings.show', $booking)->with('success', 'Your booking has been successfully made. Please show the details to the receptionist.');
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function cancel(Booking $booking)
    {
        $room = $booking->room;
        $room->is_available = true;
        $room->save();

        $booking->delete();

        return redirect()->route('rooms.index')->with('success', 'Booking cancelled and room is now available.');
    }

    public function qrCode(Booking $booking)
    {
        $qrCode = new QrCode($booking->booking_id);
        $qrCode->setSize(300);
        $qrCode->setMargin(10);

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        header('Content-Type: image/png');
        echo $result->getString();
        exit;
    }
}
