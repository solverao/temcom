@php( $dashboard_route = config('temcom.dashboard_route', '/') )

<a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80 dark:text-white"
    href="{{ route($dashboard_route) }}" aria-label="Brand">
    {{ config('temcom.logo') }}
</a>