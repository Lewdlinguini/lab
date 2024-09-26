@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4">Edit Product</h1>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Back to Product List</a>

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name:</label>
                <input type="text" id="product_name" name="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}">
                @error('product_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" id="price" name="price" step="0.01" class="form-control" value="{{ old('price', $product->price) }}">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}">
                @error('stock')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" id="image" name="image" class="form-control">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            @if ($product->image)
                <div class="image-preview mb-3">
                    <img src="{{ Storage::url($product->image) }}" alt="Product Image" class="img-fluid" style="max-width: 150px; border-radius: 4px;">
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
