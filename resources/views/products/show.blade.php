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
                    <img src="{{ url('image') }}/{{ $product->image_url }}" alt="Product" class="img-fluid rounded mb-3 product-image" id="mainImage">
                </div>

                <!-- Product Details -->
                <div class="col-md-6">
                    @if ($isUser)
                        <h2 class="mb-3">{{ $product->name }}</h2>
                    @endif
                    @if ($isUser)
                        <p class="text-muted mb-4">Stok: {{ $product->stock }} </p>
                    @else
                        <div class="mb-3">
                            <span class="h4 me-2">Nama Produk: {{ $product->name }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="h4 me-2">Stok: {{ $product->stock }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="h4 me-2">Batas Peringatan Stok: {{ $product->stock_alert_at }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="h4 me-2">Kategori: {{ $product->category }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="h4 me-2">Deskripsi: {{ $product->description }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="h4 me-2">Harga: {{ formatCurrency($product->price, 'IDR') }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="h4 me-2">Waktu Dibuat: {{ $product->created_at }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="h4 me-2">Terakhir Diubah: {{ $product->updated_at }}</span>
                        </div>
                    @endif
                    @if ($isUser)
                        <div class="mb-3">
                            <span class="h4 me-2">{{ formatCurrency($product->price, 'IDR') }}</span>
                        </div>
                        <p class="mb-4">{{ $product->description }}</p>
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
