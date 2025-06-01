@extends('layout')

@section('content')
<h2>Car List</h2>
<a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Add Car</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th><th>Brand</th><th>Model</th><th>Year</th><th>Actions</th>
    </tr>
    @foreach($cars as $car)
    <tr>
        <td>{{ $car->id }}</td>
        <td>{{ $car->brand }}</td>
        <td>{{ $car->model }}</td>
        <td>{{ $car->year }}</td>
        <td>
            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <a href="{{ route('cars.destroy', $car->id) }}" class="btn btn-danger btn-sm">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection