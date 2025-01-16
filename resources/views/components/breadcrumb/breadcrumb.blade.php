<div
    class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 lg:px-8 sm:hidden dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center py-2">
        <!-- Navigation Toggle -->
        {{ $navigationItems ?? '' }}
        <!-- End Navigation Toggle -->

        <!-- Breadcrumb -->
        <ol class="ms-3 flex items-center whitespace-nowrap">
            {{ $slot }}
        </ol>
        <!-- End Breadcrumb -->
    </div>
</div>