<x-temcom::sidebar.sidebar-splitter>
    <x-slot:header>
        <a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80 dark:text-white"
            href="#" aria-label="Brand">Brand</a>

        <div class="lg:hidden -me-2">
            <!-- Close Button -->
            <button type="button"
                class="flex justify-center items-center gap-x-3 size-6 bg-white border border-gray-200 text-sm text-gray-600 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                data-hs-overlay="#hs-application-sidebar">

                @svg('fas-xmark','shrink-0 size-4')
                <span class="sr-only">Close</span>
            </button>
            <!-- End Close Button -->
        </div>
    </x-slot:header>

    @each('temcom::partials.sidebar.menu-item', $temcom->menu(), 'item')
    
</x-temcom::sidebar.sidebar-splitter>