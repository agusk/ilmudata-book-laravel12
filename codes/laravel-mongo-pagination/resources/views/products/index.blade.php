@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Paginated Products</h1>

<table class="min-w-full bg-white border border-gray-300">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">Name</th>
            <th class="py-2 px-4 border-b">Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr class="text-center">
            <td class="py-2 px-4 border-b">{{ $product->name }}</td>
            <td class="py-2 px-4 border-b">${{ $product->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $products->links() }}
</div>
@endsection