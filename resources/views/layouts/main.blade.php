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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
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
                        <div class="header-list">
                            <ul>
                                <li><a href="/"></a></li>
                            </ul>
                        </div>
                    </div>
                </header>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    <script src="{{ asset("js/common.js") }}"></script>
</html>
