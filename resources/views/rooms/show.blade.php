@extends('layout')

@section('content')
    <h1 class="mb-4">Room Details</h1>
    <p><strong>Number:</strong> {{ $room->number }}</p>
    <p><strong>Type:</strong> {{ $room->type }}</p>
    <p><strong>Price:</strong> {{ $room->price }}</p>
    <p><strong>Availability:</strong> {{ $room->is_available ? 'Available' : 'Not Available' }}</p>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('rooms.edit', $room) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
    @endif
    <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Back</a>
@endsection
