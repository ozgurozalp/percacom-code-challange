<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERP @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<header class="container mt-2">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger rounded px-4">
        <a class="navbar-brand" href="{{ route('product.index') }}">
            <img width="150" src="{{ asset('white_logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('product.index')) active @endif"  @if (request()->routeIs('home')) aria-current="page" @endif  href="{{ route('product.index') }}">Ürün Listesi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('logs')) active @endif"  @if (request()->routeIs('logs')) aria-current="page" @endif  href="{{ route('logs') }}">Log Kayıtları</a>
                </li>
            </ul>
        </div>
    </nav>

</header>

<main class="container mt-2">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
