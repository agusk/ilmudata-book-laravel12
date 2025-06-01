@extends('layouts.app')

@section('content')
<h2>Uploaded Image (Private Access)</h2>

<div class="card">
    <img src="{{ route('private.image', basename($file_path)) }}" class="card-img-top" alt="{{ $file_name }}" style="width: 200px;">
    <div class="card-body">
        <h5 class="card-title">{{ $file_name }}</h5>
        <p class="card-text">{{ $description }}</p>
        <a href="{{ route('private.form') }}" class="btn btn-secondary">Upload Another</a>
    </div>
</div>
@endsection
