<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body class="bg-gray-100 dark:bg-black h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @auth
                    <x-nav-link href="{{ route('gestionar_usuario_c') }}" :active="request()->routeIs('gestionar_usuario_c')">
                        {{ __('Gestionar Usuario') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('gestionar_modulo_c') }}" :active="request()->routeIs('gestionar_modulo_c')">
                        {{ __('Gestionar Módulo') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('gestionar_aula_c') }}" :active="request()->routeIs('gestionar_aula_c')">
                        {{ __('Gestionar Aula') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('reservas') }}" :active="request()->routeIs('reservas')">
                        {{ __('Gestionar Reserva') }}
                    </x-nav-link>
                    @endauth
                    <button class="bg-white dark:bg-red-500" id="switchTheme">tema</button>
                </div>

                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline">
                           {{ __('Logout') }}
                        </a>
                    @endguest
                </nav>
            </div>
        </header>
        {{$slot}}
    </div>
    @livewireScripts
</body>
<script>
    document.getElementById('switchTheme').addEventListener('click', function() {
        let htmlClasses = document.querySelector('html').classList;
        if(localStorage.theme == 'dark') {
            htmlClasses.remove('dark');
            localStorage.removeItem('theme')
        } else {
            htmlClasses.add('dark');
            localStorage.theme = 'dark';
        }
    });
</script>
<script>
    if (localStorage.theme === 'dark' || (!'theme' in localStorage && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.querySelector('html').classList.add('dark')
    } else if (localStorage.theme === 'dark') {
        document.querySelector('html').classList.add('dark')
    }
</script>
</html>
