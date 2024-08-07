@extends('layout')

@section('content')
    <h1>All Bookings</h1>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('admin.bookings') }}" class="form-inline mb-3">
        <div class="form-group mx-sm-3 mb-2">
            <label for="booking_id" class="sr-only">Booking ID</label>
            <input type="text" class="form-control" id="booking_id" name="booking_id" placeholder="Enter Booking ID" value="{{ request('booking_id') }}">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="start_date" class="sr-only">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date') }}">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="end_date" class="sr-only">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date') }}">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>

    @if($bookings->isEmpty())
        <p>No bookings found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>User</th>
                    <th>Room Number</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->room->number }}</td>
                        <td>{{ $booking->check_in }}</td>
                        <td>{{ $booking->check_out }}</td>
                        <td>
                            <a href="{{ route('bookings.show', $booking) }}" class="btn btn-info btn-sm">Show More</a>
                            <form action="{{ route('bookings.cancel', $booking) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Tombol ke halaman Rooms -->
    <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary mt-3">Back to Rooms</a>
@endsection
