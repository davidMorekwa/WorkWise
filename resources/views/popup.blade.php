@extends('layouts.app2')

@section('content')
    <div style="justify-content:center;">
        <p>{{ $message }}</p>
        <a class="navbar-title" href="{{ url('/') }}">
            Home
        </a>
    </div>
@endsection
