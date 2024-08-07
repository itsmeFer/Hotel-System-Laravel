@extends('layout')

@section('content')
    <h1>Add Room</h1>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="number">Number</label>
            <input type="text" name="number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control" required>
                @foreach(\App\Models\Room::getRoomTypes() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="is_available">Available</label>
            <input type="checkbox" name="is_available" value="1" checked>
        </div>
        <button type="submit" class="btn btn-primary">Add Room</button>
    </form>
@endsection
