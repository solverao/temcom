<header
    class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 lg:ps-[260px] dark:bg-gray-800 dark:border-gray-700">
    <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
        <div class="me-5 lg:me-0 lg:hidden">
            <!-- Logo -->
            {{ $logo }}
            <!-- End Logo -->
        </div>

        <div class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3">

            <div class="hidden md:block">
                {{ $itemsLeft }}
            </div>

            <div class="flex flex-row items-center justify-end gap-1">
                {{ $itemsRight }}
            </div>
        </div>
    </nav>
</header>