<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('dark_mode') === null
? (window.matchMedia('(prefers-color-scheme: dark)').matches ? true : false)
: localStorage.getItem('dark_mode') === 'true' }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script>
        const darkMode = localStorage.getItem('dark_mode') === null
            ? (window.matchMedia('(prefers-color-scheme: dark)').matches ? true : false)
            : localStorage.getItem('dark_mode') === 'true';
    
            if (darkMode) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="relative">

    <div class="absolute top-4 right-4 px-4 py-2">
        <x-temcom::theme-toggle />
    </div>

    <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>