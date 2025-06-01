@extends('layout')

@section('content')
<h2>Add New Product</h2>
<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input name="price" type="number" step="0.01" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Stock</label>
        <input name="stock" type="number" class="form-control" required>
    </div>
    <button class="btn btn-success">Save</button>
</form>
@endsection