@extends('layout')

@section('content')
<h2>Product List</h2>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>Name</th><th>Price</th><th>Stock</th><th>Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>${{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
        <td>
            <a href="{{ route('products.edit', $product->_id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('products.destroy', $product->_id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection