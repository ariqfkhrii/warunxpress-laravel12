<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    @vite('resources/scss/app.scss')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
    {{-- Navbar dinamis --}}
    @yield('navbar')

    {{-- Konten utama --}}
    <div class="mb-3">
        @yield('content')
    </div>
</body>
</html>
