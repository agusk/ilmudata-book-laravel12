<!DOCTYPE html>
<html>
<head>
    <title>Product Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2>Product Summary</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Name (mutated to uppercase):</strong> {{ $name }}</li>
        <li class="list-group-item"><strong>Formatted Price (accessor):</strong> {{ $formattedPrice }}</li>
    </ul>
    <a href="{{ route('product.create') }}" class="btn btn-link mt-3">Submit Another Product</a>
</body>
</html>
