<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{
    darkMode: localStorage.getItem('dark_mode') === null ?
        (window.matchMedia('(prefers-color-scheme: dark)').matches ? true : false) :
        localStorage.getItem('dark_mode') === 'true'
}" :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title_prefix', config('temcom.title_prefix', ''))
        @yield('title', config('temcom.title', 'Temcom'))
        @yield('title_postfix', config('temcom.title_postfix', ''))
    </title>

    <!-- Prevenir parpadeo cargando el estado inicial del tema -->
    <script>
        const darkMode = localStorage.getItem('dark_mode') === null ?
            (window.matchMedia('(prefers-color-scheme: dark)').matches ? true : false) :
            localStorage.getItem('dark_mode') === 'true';

        if (darkMode) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    @yield('temcom_css')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-neutral-50 dark:bg-neutral-900">

    @yield('body')

    @stack('modals')

    @livewireScripts

    @yield('temcom_js')
</body>

</html>
