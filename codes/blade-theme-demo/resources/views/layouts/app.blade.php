<!DOCTYPE html>
<html lang="en" data-bs-theme="{{ $theme }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Theme Demo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 4rem;
        }
    </style>
</head>
<body class="{{ $theme === 'dark' ? 'bg-dark text-light' : 'bg-light text-dark' }}">

<nav class="navbar navbar-expand-lg {{ $theme === 'dark' ? 'navbar-dark bg-dark' : 'navbar-light bg-light' }}">
    <div class="container">
        <a class="navbar-brand" href="#">ThemeApp</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="{{ route('switch-theme', 'light') }}" class="nav-link">Light</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('switch-theme', 'dark') }}" class="nav-link">Dark</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
