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
    @if ($isUser)
        <!-- Search Bar -->
        <div class="row m-2" style="margin-top: 4rem !important;">
            <div class="container py-5">
                <div class="search-wrapper">
                    <div class="search-box">
                        <input type="text" class="search-input form-control" placeholder="Search anything...">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Dropdown -->
        <div class="d-flex justify-content-center mb-5">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCategoryButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </button>
                <div class="dropdown-menu text-center mx-auto" aria-labelledby="dropdownCategoryButton" style="min-width: auto;">
                    <a class="dropdown-item" href="#">Food</a>
                    <a class="dropdown-item" href="#">Beverage</a>
                    <a class="dropdown-item" href="#">Household</a>
                    <a class="dropdown-item" href="#">Healthcare</a>
                    <a class="dropdown-item" href="#">Personal Care</a>
                </div>
            </div>
        </div>

        <!-- Catalog Product -->
        <div class="row m-2">
            @foreach ($product as $p)
            <div class="col-md-4 mt-2 mb-2">
                <div class="card h-100">
                    <img src="{{ url('image') }}/{{ $p->image_url }}" class="card-img-top" alt="Product Image" width="400" height="300">
                    <div class="card-body">
                        <h5 class="card-title">{{ formatProductName($p->name, 65) }}</h5>
                        <p class="card-text">{{ formatProductDescription($p->description, 90) }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="h5 mb-0">{{ formatCurrency($p->price, 'IDR') }}</span>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="{{ route('products.show', $p->id) }}" class="btn btn-primary" type="button">View Detail</a>
                            <button class="btn btn-outline-secondary" type="button" id="addToCartBtn">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="container py-5" style="margin-top: 4rem !important;">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Produk</h5>
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">Tambah data</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50px">No</th>
                                <th width="150px">Nama</th>
                                <th width="120px">Jenis</th>
                                <th width="130px">Kode</th>
                                <th width="300px">Harga Jual</th>
                                <th width="400px">Foto</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->category }}</td>
                                <td>{{ $p->code }}</td>
                                <td>{{ formatCurrency($p->price, 'IDR') }}</td>
                                <td>
                                    <img src="{{ url('image') }}/{{ $p->image_url }}" alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                </td>
                                <td>
                                    <a href="{{ route('products.show', $p->id) }}" class="btn btn-sm btn-secondary">show</a>
                                    <a class="btn btn-sm btn-warning">edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$p->id}}">
                                        hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin akan menghapus data {{$p->name}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
