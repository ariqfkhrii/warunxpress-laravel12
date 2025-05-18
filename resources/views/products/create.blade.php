@extends('layouts.app')

@section('title', 'Products')

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
    <div class="container py-5" style="margin-top: 4rem !important;">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Produk</h5>
        <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">Tambah data</a>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="jenis">Jenis:</label>
                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="food">Food</option>
                        <option value="beverage">Beverage</option>
                        <option value="household">Household</option>
                        <option value="healthcare">Healthcare</option>
                        <option value="personalcare">Personal Care</option>
                    </select>
                    @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga_jual">Harga Jual:</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi:</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock') }}">
                    @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stock_alert_at">Peringatan Stok:</label>
                    <input type="text" class="form-control @error('stock_alert_at') is-invalid @enderror" id="stock_alert_at" name="stock_alert_at" value="{{ old('stock_alert_at') }}">
                    @error('stock_alert_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto">Foto Produk:</label>
                    <input type="file" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url">
                    @error('image_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
    </div>
@endsection
