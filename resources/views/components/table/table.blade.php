<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="min-w-full inline-block align-middle">
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                @isset($options)
                <div class="py-3 px-4">
                    {{ $options}}
                </div>
                @endisset
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        {{ $slot }}
                    </table>
                </div>

                @isset($pagination)
                <div class="py-3 px-4">
                    {{ $pagination }}
                </div>
                @endisset
            </div>
        </div>
    </div>
</div>