<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom CSS -->
    <style>
        /* Gaya untuk Navbar */
        .navbar-custom {
            background-color: rgba(255, 255, 255, 0.9); /* Latar belakang putih dengan transparansi */
            border-bottom: 1px solid #ddd; /* Garis bawah */
        }

        .navbar-custom .navbar-brand {
            color: #ff5a5f; /* Warna logo */
            font-weight: bold; /* Teks tebal */
            font-size: 1.5rem; /* Ukuran teks lebih besar */
        }

        .navbar-custom .nav-link {
            color: #333; /* Warna teks link */
            font-weight: bold; /* Teks tebal */
        }

        .navbar-custom .nav-link:hover {
            color: #ff5a5f; /* Warna teks link saat dihover */
        }

        .navbar-custom .btn-primary {
            background-color: #ff5a5f; /* Warna tombol */
            border-color: #ff5a5f; /* Warna border tombol */
            font-weight: bold; /* Teks tebal */
        }

        .navbar-custom .btn-primary:hover {
            background-color: #e04a50; /* Warna tombol saat dihover */
            border-color: #e04a50; /* Warna border tombol saat dihover */
        }

        /* Padding untuk konten utama agar tidak tertutup navbar */
        body {
            padding-top: 70px; /* Sesuaikan dengan tinggi navbar */
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar Custom dengan Fixed Position -->
        <nav class="navbar navbar-expand-md navbar-custom fixed-top shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    GoTravia <!-- Ganti dengan nama aplikasi Anda -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
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
                                        {{ __('Logout') }}
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

        <!-- Konten Utama -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>