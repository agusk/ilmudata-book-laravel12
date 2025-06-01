<!DOCTYPE html>
<html>
<head>
    <title>Dependency Injection Demo</title>
</head>
<body>
    <h1>Laravel 12 DI Demo</h1>
    <ul>
        <li><strong>Interface Binding:</strong> {{ $interfaceMsg }}</li>
        <li><strong>Standard Binding (Transient):</strong> {{ $standardMsg }}</li>
        <li><strong>Singleton Binding:</strong> {{ $singletonMsg }}</li>
    </ul>

    <h2>Singleton Test</h2>
    <ul>
        <li>First: {{ $first }}</li>
        <li>Second: {{ $second }}</li>
    </ul>
</body>
</html>
