@extends('layout')

@section('content')
    <h1>Room Details</h1>

    <div class="card">
        <div class="card-header">
            Room {{ $room->number }}
        </div>
        <div class="card-body">
            <p><strong>Type:</strong> {{ $room->type }}</p>
            <p><strong>Price:</strong> ${{ $room->price }}</p>
            <p><strong>Status:</strong> {{ $room->is_available ? 'Available' : 'Booked' }}</p>
            @if($room->image)
                <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" width="300">
            @else
                <p>No Image</p>
            @endif
        </div>
    </div>

    <a href="{{ route('admin.rooms.index') }}" class="btn btn-primary mt-3">Back to Rooms</a>
@endsection
