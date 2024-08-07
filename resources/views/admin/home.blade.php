@extends('layout')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <!-- Tambahkan konten dashboard admin di sini -->
@endsection
