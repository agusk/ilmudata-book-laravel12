@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="p-4 border rounded">
        <h1>Welcome to the Theme Demo!</h1>
        <p>Current Theme: <strong>{{ ucfirst($theme) }}</strong></p>
        <p>Use the navigation links to switch themes.</p>
    </div>
@endsection
