@extends('layout')

@section('content')
    <h1 class="mb-4">Rooms</h1>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Add Room</a>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Number</th>
                <th>Type</th>
                <th>Price</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->number }}</td>
                    <td>{{ $room->type }}</td>
                    <td>{{ $room->price }}</td>
                    <td>{{ $room->is_available ? 'Available' : 'Booked' }}</td>
                    <td>
                        <a href="{{ route('rooms.show', $room) }}" class="btn btn-info btn-sm">View</a>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('rooms.edit', $room) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @elseif($room->is_available)
                            <form action="{{ route('rooms.book', $room) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Book</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
