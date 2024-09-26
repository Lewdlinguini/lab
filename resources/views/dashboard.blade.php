@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Button to go to User Management -->
                    <div class="mt-4">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">User Management</a>
                    </div>

                    <!-- Button to go to Products -->
                    <div class="mt-2">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
