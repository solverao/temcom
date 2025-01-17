<x-temcom::box.info icon="fas-user" title="{{ __('Welcome') }}" description="{{ auth()->user()->name }}">
    <x:slot:aside>
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <x-temcom::button.secondary-icon href="{{ route('logout') }}" icon="fas-door-open" @click.prevent="$root.submit();">
                <span class="hidden md:block">{{ __('Log Out') }}</span>
            </x-temcom::button.secondary-icon>
        </form>
    </x:slot:aside>
</x-temcom::box.info>