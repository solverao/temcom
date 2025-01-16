<x-temcom::box.info icon="fas-user" title="{{ __('Welcome') }}" description="{{ auth()->user()->name }}">
    <x:slot:aside>
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <x-secondary-button href="{{ route('logout') }}" icon="fas-door-open" @click.prevent="$root.submit();">
                <span class="hidden md:block">{{ __('Log Out') }}</span>
            </x-secondary-button>
        </form>
    </x:slot:aside>
</x-temcom::box.info>