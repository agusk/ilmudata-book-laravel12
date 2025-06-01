<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') | Blade Component</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <x-navbar />

    <div class="container mt-4">
        @yield('content')
    </div>

    <x-footer />
</body>
</html>
