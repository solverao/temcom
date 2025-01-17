@extends('temcom::master')

@inject('layoutHelper', 'Solverao\Temcom\Helpers\LayoutHelper')

@section('temcom_css')
    @stack('css')
    @yield('css')
@stop

@section('body')
    @if ($layoutHelper->isLayoutFixedSidebar())
        @include('temcom::partials.layout.fixed-sidebar')
    @endif

    @if ($layoutHelper->isLayoutTopNav())
        @include('temcom::partials.layout.top-navigation')
    @endif
@stop

@section('temcom_js')
    @stack('js')
    @yield('js')
@stop
