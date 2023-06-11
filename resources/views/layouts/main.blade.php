<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        {{ $head ?? "" }}
    </head>
    <body class="font-sans antialiased">
        <!-- ローディング -->
        <div id="loading" class="loading-box">
            <div class="loader">
                <div class="l-inner one"></div>
                <div class="l-inner two"></div>
                <div class="l-inner three"></div>
            </div>
        </div>
        <div class="min-h-screen">
                <header class="header bg-white shadow">
                    <div class="header-inner b-flex">
                        <div class="header-logo">
                            <a href="/"><img src="{{ asset("images/header-logo.png") }}" /></a>
                        </div>
                        @guest
                        <div class="header-btn">
                            <a href="/login">log in</a>
                            <a href="/register">sign up</a>
                        </div>
                        @endguest
                        @auth
                        <div class="logout-btn">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <button type="submit">logout</button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </header>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <footer class="footer">
                <h3>&copy;Team Development</h3>
            </footer>
        </div>
    </body>
    <script src="{{ asset("js/common.js") }}"></script>
</html>
