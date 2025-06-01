@extends('layouts.app')

@section('title', 'Todo Details')

@section('content')
    <h2>Task Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $todo->task }}</h5>
            <p class="card-text">
                <strong>Status:</strong> {{ $todo->completed ? 'Completed' : 'Pending' }}
            </p>
            <p><strong>Created at:</strong> {{ $todo->created_at->format('d M Y, H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('todos.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning mt-3">Edit Task</a>
@endsection
