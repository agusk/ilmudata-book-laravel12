@extends('layout')

@section('content')
<h2>Edit Car</h2>
<form method="POST" action="{{ route('cars.update', $car->id) }}">
    @csrf
    <div class="mb-3">
        <label>Brand</label>
        <input type="text" name="brand" value="{{ $car->brand }}" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Model</label>
        <input type="text" name="model" value="{{ $car->model }}" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Year</label>
        <input type="number" name="year" value="{{ $car->year }}" class="form-control" required />
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection