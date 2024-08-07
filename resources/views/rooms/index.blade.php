@extends('layout')

@section('content')
    <h1>Available Rooms</h1>

    @if($rooms->isEmpty())
        <p>No rooms available.</p>
    @else
        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if($room->image)
                            <img src="{{ asset('storage/' . $room->image) }}" class="card-img-top" alt="Room Image">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="No Image Available">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Room {{ $room->number }}</h5>
                            <p class="card-text">Type: {{ $room->type }}</p>
                            <p class="card-text">Price: ${{ $room->price }}</p>
                            <p class="card-text">Status: {{ $room->is_available ? 'Available' : 'Booked' }}</p>
                            <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
