@extends('temcom::master')

@inject('layoutHelper', 'Solverao\Temcom\Helpers\LayoutHelper')

@section('temcom_css')
@stack('css')
@yield('css')
@stop

@section('body')

@if ($layoutHelper->isLayoutFixedSidebar())

<x-banner />

@include('temcom::partials.sidebar.header')
@include('temcom::partials.sidebar.breadcrumb')
@include('temcom::partials.sidebar.sidebar')

<div class="w-full lg:ps-64">
    <main>
        @stack('content')
        @yield('content')
    </main>
</div>
@endif

@if($layoutHelper->isLayoutTopNav())

<x-banner />

<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
    @endif

    <!-- Page Content -->
    <main>
        @stack('content')
        @yield('content')
    </main>
</div>
@endif
@stop

@section('temcom_js')
@stack('js')
@yield('js')
@stop