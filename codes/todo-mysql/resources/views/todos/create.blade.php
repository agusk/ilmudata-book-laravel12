@extends('layouts.app')

@section('title', 'Create New Task')

@section('content')
    <h2>Create New Task</h2>

    <form action="{{ route('todos.store') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="task" class="form-label">Task Name</label>
            <input type="text" name="task" id="task" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Task</button>
        <a href="{{ route('todos.index') }}" class="btn btn-secondary">Back to List</a>
    </form>

@endsection