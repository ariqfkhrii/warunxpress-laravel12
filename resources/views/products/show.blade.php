@extends('layouts.app')

@section('title', 'Detail Product')

@php
    $isUser = false;
@endphp

@section('navbar')
    @if ($isUser)
        @include('partials.user-navbar')
    @else
        @include('partials.stocker-navbar')
    @endif
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="container">
            <div class="row">
                <!-- Product Images -->
                <div class="col-md-6 mb-4">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080" alt="Product" class="img-fluid rounded mb-3 product-image" id="mainImage">
                </div>

                <!-- Product Details -->
                <div class="col-md-6">
                    <h2 class="mb-3">{{ $product->name }}</h2>
                    <p class="text-muted mb-4">Stock: {{ $product->stock }} </p>
                    <div class="mb-3">
                        <span class="h4 me-2">{{ formatCurrency($product->price, 'IDR') }}</span>
                    </div>

                    <p class="mb-4">{{ $product->description }}</p>
                    @if ($isUser)
                        <div class="mb-4">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" value="1" min="1" style="width: 80px;">
                        </div>
                        <button class="btn btn-primary btn-lg mb-3 me-2">
                                <i class="bi bi-cart-plus"></i> Add to Cart
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
