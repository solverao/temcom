<x-temcom::sidebar.sidebar>
    <x-slot:header>
        
        <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
            href="{{ route(config('temcom.dashboard_route')) }}">
            <x-application-logo class="w-36 h-auto"></x-application-logo>
        </a>

        <div class="lg:hidden -me-2">
            <!-- Close Button -->
            <button type="button"
                class="flex justify-center items-center gap-x-3 size-6 bg-white border border-gray-200 text-sm text-gray-600 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:bg-gray-700 dark:hover:text-gray-200 dark:focus:text-gray-200"
                data-hs-overlay="#hs-application-sidebar">

                @svg('fas-xmark','shrink-0 size-4')
                <span class="sr-only">Close</span>
            </button>
            <!-- End Close Button -->
        </div>
    </x-slot:header>

    @each('temcom::partials.sidebar.menu-item', $temcom->menu('sidebar'), 'item')

</x-temcom::sidebar.sidebar>