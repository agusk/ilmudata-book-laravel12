@extends('layout')

@section('content')
<h2>Edit Product</h2>
<form method="POST" action="{{ route('products.update', $product->_id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input name="name" value="{{ $product->name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input name="price" type="number" step="0.01" value="{{ $product->price }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Stock</label>
        <input name="stock" type="number" value="{{ $product->stock }}" class="form-control" required>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection