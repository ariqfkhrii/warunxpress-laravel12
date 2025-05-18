<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
        <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="container d-flex justify-content-center">
            <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-center mx-auto">
                    <li class="nav-item">
                    <a class="nav-link mx-2" href="{{ route('products.index') }}">Products</a>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </nav>
</body>
</html>