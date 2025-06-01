@extends('layout')

@section('content')
<h2>Add Car</h2>
<form method="POST" action="{{ route('cars.store') }}">
    @csrf
    <div class="mb-3">
        <label>Brand</label>
        <input type="text" name="brand" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Model</label>
        <input type="text" name="model" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Year</label>
        <input type="number" name="year" class="form-control" required />
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection