@props(['head','body'])

<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="shadow divide-y divide-gray-200 dark:divide-gray-700">
                @isset($options)
                <div class="py-3 px-4">
                    {{ $options}}
                </div>
                @endisset
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                        <thead {{ $head->attributes->class('bg-gray-50 dark:bg-gray-700')}}>
                            {{ $head }}
                        </thead>

                        <tbody {{ $body->attributes->merge([
                            'class' => "divide-y divide-gray-200 dark:divide-gray-700"
                            ]) }}>
                            {{ $body }}
                        </tbody>
                    </table>
                </div>

                @isset($pagination)
                <div class="py-1 px-4">
                    {{ $pagination }}
                </div>
                @endisset
            </div>
        </div>
    </div>
</div>