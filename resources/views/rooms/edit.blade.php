@extends('layout')

@section('content')
    <h1>Edit Room</h1>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="number">Number</label>
            <input type="text" name="number" class="form-control" value="{{ $room->number }}" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control" required>
                @foreach(\App\Models\Room::getRoomTypes() as $key => $value)
                    <option value="{{ $key }}" {{ $room->type == $key ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" value="{{ $room->price }}" required>
        </div>
        <div class="form-group">
            <label for="is_available">Available</label>
            <input type="checkbox" name="is_available" value="1" {{ $room->is_available ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-primary">Update Room</button>
    </form>
@endsection
