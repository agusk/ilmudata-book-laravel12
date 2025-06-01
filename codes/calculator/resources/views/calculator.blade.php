<!DOCTYPE html>
<html>
<head>
    <title>Laravel Calculator</title>
</head>
<body>
    <h1>Simple Calculator</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('calculator.calculate') }}">
        @csrf
        <input type="number" name="number1" value="{{ old('number1', $number1 ?? '') }}" placeholder="First Number" required>
        <select name="operator" required>
            <option value="add" {{ ($operator ?? '') == 'add' ? 'selected' : '' }}>+</option>
            <option value="sub" {{ ($operator ?? '') == 'sub' ? 'selected' : '' }}>-</option>
            <option value="mul" {{ ($operator ?? '') == 'mul' ? 'selected' : '' }}>*</option>
            <option value="div" {{ ($operator ?? '') == 'div' ? 'selected' : '' }}>/</option>
        </select>
        <input type="number" name="number2" value="{{ old('number2', $number2 ?? '') }}" placeholder="Second Number" required>
        <button type="submit">Calculate</button>
    </form>

    @isset($result)
        <h3>Result: {{ $result }}</h3>
    @endisset
</body>
</html>
