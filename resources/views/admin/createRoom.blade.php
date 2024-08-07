@extends('layout')

@section('content')
    <h1>Add New Room</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.rooms.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="number">Room Number</label>
            <input type="text" class="form-control" id="number" name="number" value="{{ old('number') }}" required>
        </div>
        <div class="form-group">
            <label for="type">Room Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="">Select Type</option>
                <option value="Standard Room">Standard Room</option>
                <option value="Superior Room">Superior Room</option>
                <option value="Deluxe Room">Deluxe Room</option>
                <option value="Suite Room">Suite Room</option>
                <option value="Presidential Room">Presidential Room</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
        </div>
        <div class="form-group">
            <label for="image">Room Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Add Room</button>
    </form>
@endsection
