<x-temcom::breadcrumb>
    <x-slot:navigationItems>
        <button type="button"
            class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar"
            aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
            <span class="sr-only">Toggle Navigation</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="18" x="3" y="3" rx="2" />
                <path d="M15 3v18" />
                <path d="m8 9 3 3-3 3" />
            </svg>
        </button>
    </x-slot:navigationItems>

    <x-temcom::breadcrumb.item>Home</x-temcom::breadcrumb.item>
    <x-temcom::breadcrumb.last-item>Dashboard</x-temcom::breadcrumb.last-item>
    
</x-temcom::breadcrumb>