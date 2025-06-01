<!DOCTYPE html>
<html>
<head>
    <title>Summary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Form Submission Summary</h2>

@if($data)
    <ul class="list-group">
        <li class="list-group-item"><strong>Name:</strong> {{ $data['name'] }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $data['email'] }}</li>
        <li class="list-group-item"><strong>Age:</strong> {{ $data['age'] }}</li>
        <li class="list-group-item"><strong>Bio:</strong> {{ $data['bio'] }}</li>
    </ul>
@else
    <p>No data available.</p>
@endif

</body>
</html>
