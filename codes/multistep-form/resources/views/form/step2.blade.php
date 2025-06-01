<!DOCTYPE html>
<html>
<head>
    <title>Step 2 - Additional Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Step 2: Additional Info</h2>
<form method="POST" action="{{ route('form.step2') }}">
    @csrf

    <div class="mb-3">
        <label>Age</label>
        <input type="number" name="age" class="form-control" value="{{ old('age', session('form.age')) }}">
        @error('age') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Bio</label>
        <textarea name="bio" class="form-control">{{ old('bio', session('form.bio')) }}</textarea>
        @error('bio') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
