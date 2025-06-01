<!DOCTYPE html>
<html>
<head>
    <title>AJAX Form with Validation</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>AJAX Form Submission</h2>

<div id="success-message" class="alert alert-success d-none"></div>

<form id="ajaxForm">
    <div class="mb-3">
        <label>Username</label>
        <input name="username" id="username" class="form-control">
        <div class="text-danger" id="username-error"></div>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="email" id="email" class="form-control">
        <div class="text-danger" id="email-error"></div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
document.getElementById('ajaxForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Clear previous errors
    document.getElementById('username-error').textContent = '';
    document.getElementById('email-error').textContent = '';
    document.getElementById('success-message').classList.add('d-none');

    const formData = {
        username: document.getElementById('username').value,
        email: document.getElementById('email').value,
    };

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const response = await fetch('{{ route("ajax.submit") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
        },
        body: JSON.stringify(formData),
    });

    if (response.status === 422) {
        const data = await response.json();
        const errors = data.errors;

        if (errors.username) {
            document.getElementById('username-error').textContent = errors.username[0];
        }
        if (errors.email) {
            document.getElementById('email-error').textContent = errors.email[0];
        }
    } else if (response.ok) {
        const data = await response.json();
        document.getElementById('success-message').textContent = data.message;
        document.getElementById('success-message').classList.remove('d-none');
        document.getElementById('ajaxForm').reset();
    }
});
</script>

</body>
</html>
