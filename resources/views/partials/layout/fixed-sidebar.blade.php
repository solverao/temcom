<div class="w-full lg:ps-64">
    <x-banner />
</div>

@include('temcom::partials.sidebar.header')
@include('temcom::partials.sidebar.breadcrumb')
@include('temcom::partials.sidebar.sidebar')

<div class="w-full lg:ps-64">

    @if (isset($header))
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
    @endif

    <main>
        @stack('content')
        @yield('content')
    </main>
</div>