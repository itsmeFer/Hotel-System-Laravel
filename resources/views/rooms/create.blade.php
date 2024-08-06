@extends('layout')

@section('content')
    @if(auth()->user()->role === 'admin')
        <h1 class="mb-4">Add Room</h1>
        <form action="{{ route('rooms.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Number</label>
                <input type="text" name="number" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="is_available" class="form-check-input" value="1">
                <label class="form-check-label">Available</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    @else
        <p>You do not have permission to access this page.</p>
    @endif
@endsection
