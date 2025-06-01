<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') | Partial Views</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('partials.navbar')

    <div class="container mt-4">
        @include('partials.alert', ['message' => $alertMessage ?? null])

        @yield('content')
    </div>

    @include('partials.footer')

</body>
</html>
