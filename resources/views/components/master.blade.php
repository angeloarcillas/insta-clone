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

    <!-- Styles -->
    <link href="{{ asset('css/tailwind.css') }}"
        rel="stylesheet">
</head>

<body>
    <div id="app">
        <header class="h-20 p-6 pb-4 shadow">
            <div class="flex justify-between items-center">

                <div class="flex items-center">
                    <h1
                        class="mr-4 text-2xl font-semibold uppercase">
                        Insta-Clone
                    </h1>

                    <nav class="text-sm text-gray-700">
                        <a href="#">Home</a>
                    </nav>
                </div>

                <div class="text-sm text-gray-700">
                    <a
                        href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                    <a
                        href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>

                    @auth
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        >{{ __('Logout') }}
                    </a>

                    <form id="logout-form"
                        action="{{ route('logout') }}"
                        method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                    @endauth
                </div>
            </div>
        </header>
        <main class="h-screen py-12 px-8">
            <div class="p-4 container mx-auto rounded shadow">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>