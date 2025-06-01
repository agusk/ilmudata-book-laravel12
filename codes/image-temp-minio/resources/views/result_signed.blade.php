@extends('layouts.app')

@section('content')
<h2>Uploaded Image via Signed URL</h2>

<div class="card">
    <img src="{{ $image_url }}" class="card-img-top" alt="{{ $file_name }}" style="width: 200px;">
    <div class="card-body">
        <h5 class="card-title">{{ $file_name }}</h5>
        <p class="card-text">{{ $description }}</p>
        <a href="{{ route('signed.form') }}" class="btn btn-secondary">Upload Another</a>
    </div>
</div>
@endsection
