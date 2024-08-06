@extends('layout')

@section('content')
    <h1>User Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}! You are logged in as a user.</p>
    <a href="{{ route('rooms.index') }}" class="btn btn-primary">View Rooms</a>
@endsection
