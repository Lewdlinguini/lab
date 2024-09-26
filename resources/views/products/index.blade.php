@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Listing</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-secondary mb-3">Create New Product</a>

    <form method="GET" action="{{ route('products.index') }}" class="mb-3 text-center">
        <div class="input-group justify-content-center">
            <input type="text" name="search" class="form-control" placeholder="🔍 Search" value="{{ request('search') }}" style="max-width: 200px;"> <!-- Set max width for ~10 words -->
            <button type="submit" class="btn btn-outline-secondary btn-sm">Search</button>
        </div>
    </form>

    <table class="table table-dark">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" style="width: 100px; height: 100px; object-fit: cover;"> <!-- Fixed image size with aspect ratio -->
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td class="align-middle" style="padding-top: 20px;">{{ $product->product_name }}</td>
                    <td class="align-middle" style="padding-top: 20px;">{{ $product->description }}</td>
                    <td class="align-middle" style="padding-top: 20px;">${{ number_format($product->price, 2) }}</td>
                    <td class="align-middle" style="padding-top: 20px;">{{ $product->stock }}</td>
                    <td class="align-middle" style="padding-top: 20px;">
                        <div class="d-flex gap-2">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
