<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/js/app.js')
</head>
<body>
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
                    <h5 class="card-title">{{ $p->name }}</h5>
                    <p class="card-text">High-quality wireless headphones with noise cancellation technology.</p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="h5 mb-0">{{ $p->price }}</span>
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
