<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    @vite('resources/js/app.js')
</head>
<body>
    <!-- Search Bar -->
    <div class="row m-2">
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
                <a class="dropdown-item" href="#">Household</a></a>
                <a class="dropdown-item" href="#">Healthcare</a>
                <a class="dropdown-item" href="#">Personal Care</a>
            </div>
        </div>
    </div>

    <!-- Catalog Product -->
    <div class="row m-2">
         @foreach ( $product as $p)
        <div class="col-md-4 mt-2 mb-2">
            <div class="card h-100">
                <img src="https://fakeimg.pl/400x300/"
                    class="card-img-top"
                    alt="Product Image"
                    width="400"
                    height="300">
                <div class="card-body">
                    <h5 class="card-title">{{ formatProductName($p->name, 65) }}</h5>
                    <p class="card-text">{{ formatProductDescription($p->description, 90) }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="h5 mb-0">{{ formatCurrency($p->price, 'IDR') }}</span>
                        </div>
                        <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#productModal">Quick View</button>
                                <button class="btn btn-outline-secondary" type="button" id="addToCartBtn">Add to Cart</button>
                        </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>
