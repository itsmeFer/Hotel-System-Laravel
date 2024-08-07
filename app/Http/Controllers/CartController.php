<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()->bookings()->with('room')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Booking $booking)
    {
        // Pastikan bahwa booking yang ditambahkan adalah milik pengguna yang sedang login
        if ($booking->user_id !== Auth::id()) {
            return redirect()->route('cart.index')->with('error', 'You cannot add this booking to your cart.');
        }

        // Tambahkan booking ke cart
        Cart::create([
            'user_id' => Auth::id(),
            'booking_id' => $booking->id,
        ]);

        return redirect()->route('cart.index')->with('success', 'Booking added to cart.');
    }

    public function cancel(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            return redirect()->route('cart.index')->with('error', 'You cannot cancel this booking.');
        }

        // Ubah status kamar menjadi available
        $room = $booking->room;
        $room->is_available = true;
        $room->save();

        // Hapus booking
        $booking->delete();

        return redirect()->route('cart.index')->with('success', 'Booking cancelled and room is now available.');
    }
}
