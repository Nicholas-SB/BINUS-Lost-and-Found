<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" height="60">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class='nav-item'>
                                <a class="nav-link" href="{{ route('officer.dashboard') }}">{{ __('officer.dashboard') }}</a>
                            </li>
                            <li class='nav-item'>
                                <a class="nav-link" href="{{ route('officer.items.create') }}">{{ __('officer.post_item') }}</a>
                            </li>
                        @endauth

                        @guest
                            <a class="nav-link"  href="{{ route('guide') }}">{{ __('site.guide') }}</a>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item d-flex align-items-center me-2">
                            <a class="nav-link {{ app()->getLocale() === 'en' ? 'fw-bold' : ' ' }}"
                            href="{{ route('lang.switch', 'en') }}">EN</a>
                            <span class="text-muted">|</span>
                            <a class="nav-link {{ app()->getLocale() === 'id' ? 'fw-bold' : ' ' }}"
                            href="{{ route('lang.switch', 'id') }}">ID</a>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('site.login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('officer.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="text-light py-4 mt-5" style="background-color: #1f1f2e;">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <h5 class="fw-bold mb-1">BINUS UNIVERSITY</h5>
                        <p class="mb-0">BINUS HIGHER EDUCATION</p>
                    </div>

                    <div class="col-md-4">
                        <h6 class="fw-bold">{{ __('site.location') }}</h6>
                        <p class="d-flex mb-0">
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            <span>Jl. K. H. Syahdan No. 9, Kemanggisan, Palmerah<br>Jakarta 11480 Indonesia</span>
                        </p>
                    </div>

                    <div class="col-md-4">
                        <h6 class="fw-bold">{{ __('site.contact_us') }}</h6>
                        <p class="d-flex mb-1">
                            <i class="bi bi-telephone-fill me-2"></i>
                            <span>0804 169 69 69 · 62852 08 696969 (WhatsApp)</span>
                        </p>
                        <p class="d-flex mb-0">
                            <i class="bi bi-envelope me-2"></i>
                            <span>infobinus@binus.edu</span>
                        </p>
                    </div>
                </div>

                <hr class="border-secondary my-3">
                <p class="small mb-0 text-center">&copy; {{ date('Y') }} BINUS Lost & Found</p>
            </div>
        </footer>
    </div>
</body>
</html>
