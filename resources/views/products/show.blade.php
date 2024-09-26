@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4">{{ $product->product_name }}</h1>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Back to Product List</a>

        <div class="product-details">
            @if ($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="Product Image" class="img-fluid mb-3" style="max-width: 150px; border-radius: 4px;">
            @else
                <span>No Image Available</span>
            @endif

        </div>
    </div>
@endsection
