@extends('layout')

@section('content')
    <h1>Your Cart</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Room Number</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->booking_id }}</td>
                        <td>{{ $item->room->number }}</td>
                        <td>{{ $item->check_in }}</td>
                        <td>{{ $item->check_out }}</td>
                        <td>
                            <a href="{{ route('bookings.show', $item) }}" class="btn btn-info btn-sm">Show More</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a href="{{ route('rooms.index') }}" class="btn btn-primary mt-3">Back to Rooms</a>
@endsection
