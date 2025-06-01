@extends('layouts.app')

@section('content')
<h2>Upload Image</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('upload.handle') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">File Name</label>
        <input type="text" name="file_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Choose Image</label>
        <input type="file" name="image" class="form-control" required>
    </div>
    <button class="btn btn-primary">Upload</button>
</form>
@endsection
