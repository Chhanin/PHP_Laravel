<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f6f7fb; }
        .app-navbar { background: #111827; }
        .app-navbar .navbar-brand, .app-navbar .nav-link { color: #fff !important; }
        .app-footer { color: #6b7280; }
    </style>
</head>
<body>
    {{-- <header class="mb-4">
        <nav class="navbar navbar-expand-lg app-navbar">
            <div class="container">
                <a class="navbar-brand fw-semibold" href="{{ url('/') }}">My App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('directors.index') }}">Directors</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header> --}}

    <main>
        @yield('content')
    </main>

    {{-- <footer class="py-4 mt-5">
        <div class="container app-footer small">
            <div class="d-flex flex-wrap justify-content-between gap-2">
                <span>&copy; {{ date('Y') }} My App. All rights reserved.</span>
                <span>Built with Laravel</span>
            </div>
        </div>
    </footer> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>