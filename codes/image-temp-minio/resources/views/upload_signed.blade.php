@extends('layouts.app')

@section('content')
<h2>Upload Image to MinIO (Signed URL)</h2>

<div id="alert" class="alert d-none"></div>

<form id="uploadForm">
    @csrf
    <div class="mb-3">
        <label class="form-label">File Name</label>
        <input type="text" name="file_name" id="file_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Choose Image (PNG only)</label>
        <input type="file" id="image" accept="image/png" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>

<script>
    const form = document.getElementById('uploadForm');
    const alertBox = document.getElementById('alert');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const file = document.getElementById('image').files[0];
        const file_name = document.getElementById('file_name').value;
        const description = document.getElementById('description').value;

        const response = await fetch('{{ route('signed.upload.url') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ file_name, description })
        });

        const data = await response.json();

        if (data.upload_url) {
            const uploadResp = await fetch(data.upload_url, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'image/png'
                },
                body: file
            });

            if (uploadResp.ok) {
                window.location.href = "{{ route('signed.result') }}";
            } else {
                alertBox.textContent = "Upload failed.";
                alertBox.className = "alert alert-danger";
            }
        }
    });
</script>
@endsection
