<!DOCTYPE html>
<html>
<head>
    <title>Book Repository</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Book List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th><th>Author</th><th>Year</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>