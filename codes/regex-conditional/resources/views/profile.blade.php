<!DOCTYPE html>
<html>
<head>
    <title>Profile Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Update Profile</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('profile.handle') }}">
    @csrf

    <div class="mb-3">
        <label>Username</label>
        <input name="username" class="form-control" value="{{ old('username') }}">
        @error('username') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Phone Number</label>
        <input name="phone" class="form-control" value="{{ old('phone') }}">
        @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Preferred Contact Method</label>
        <select name="contact_method" class="form-select" id="contactMethod">
            <option value="">-- Select --</option>
            <option value="email" {{ old('contact_method') == 'email' ? 'selected' : '' }}>Email</option>
            <option value="phone" {{ old('contact_method') == 'phone' ? 'selected' : '' }}>Phone</option>
        </select>
        @error('contact_method') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3" id="emailField" style="display: none;">
        <label>Email Address</label>
        <input name="email" class="form-control" value="{{ old('email') }}">
        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    const method = document.getElementById('contactMethod');
    const emailField = document.getElementById('emailField');

    function toggleEmailField() {
        emailField.style.display = method.value === 'email' ? 'block' : 'none';
    }

    method.addEventListener('change', toggleEmailField);
    toggleEmailField(); // call on load
</script>

</body>
</html>
