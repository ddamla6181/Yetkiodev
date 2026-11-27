<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Uygulaması')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border: none;
            border-radius: 12px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">LaravelÖdev</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Yazılar</a>
                    </li>
                @endauth
            </ul>

            <div class="d-flex align-items-center gap-3">
                @auth
                    <span class="text-light small">
                        Hoş geldin, <strong>{{ Auth::user()->name }}</strong>
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Çıkış</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Giriş</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Kayıt Ol</a>
                @endguest
            </div>
        </div>
    </div>
</nav>

<main class="container pb-5">
    @yield('content')
</main>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
