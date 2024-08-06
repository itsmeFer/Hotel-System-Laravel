@extends('layout')

@section('content')
    <h1>Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}! You are logged in.</p>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Go to Admin Dashboard</a>
    @else
        <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Go to User Dashboard</a>
    @endif
@endsection
