@extends('layout')

@section('content')
<h2>Blog Posts</h2>
@foreach($blogs as $blog)
    <div class="card mb-4">
        <div class="card-body">
            <h4>{{ $blog->title }}</h4>
            <p>{{ $blog->content }}</p>
            <h6>Comments:</h6>
            <ul class="list-group">
                @foreach ($blog->comments as $comment)
                    <li class="list-group-item">
                        <strong>{{ $comment['author'] }}:</strong> {{ $comment['comment'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endforeach
@endsection