@extends('layout')

@section('content')
    @if(auth()->user()->role === 'admin')
        <h1 class="mb-4">Edit Room</h1>
        <form action="{{ route('rooms.update', $room) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Number</label>
                <input type="text" name="number" class="form-control" value="{{ $room->number }}" required>
            </div>
            <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" class="form-control" value="{{ $room->type }}" required>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="{{ $room->price }}" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="is_available" class="form-check-input" value="1" {{ $room->is_available ? 'checked' : '' }}>
                <label class="form-check-label">Available</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    @else
        <p>You do not have permission to access this page.</p>
    @endif
@endsection
