<!doctype html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token"
        content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer>
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch"
        href="//fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/tailwind.css') }}"
        rel="stylesheet">
</head>

<body>
    <div id="app">
        <header>
            <a href="{{ route('login') }}">
                {{ __('Login') }}
            </a>
            <a href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form"
                action="{{ route('logout') }}"
                method="POST"
                style="display: none;">
                @csrf
            </form>
        </header>
        <main class="py-12 px-8 bg-red-400">
            <div
                class="container mx-auto h-screen">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>