<x-temcom::header>
    <x-slot:logo>
        <a href="{{ route(config('temcom.dashboard_route')) }}">
            <x-application-mark class="block h-9 w-auto" />
        </a>
    </x-slot:logo>

    <x-slot:itemsLeft>
        {{-- -- --}}
    </x-slot:itemsLeft>

    <x-slot:itemsRight>
        
        <x:temcom::theme-toggle></x:temcom::theme-toggle>

        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <x-dropdown align="right" width="60">
            <x-slot name="trigger">
                <span class="inline-flex rounded-md">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                        {{ Auth::user()->currentTeam->name }}

                        <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>
                    </button>
                </span>
            </x-slot>

            <x-slot name="content">
                <div class="w-60">
                    <!-- Team Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                        {{ __('Team Settings') }}
                    </x-dropdown-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                    <x-dropdown-link href="{{ route('teams.create') }}">
                        {{ __('Create New Team') }}
                    </x-dropdown-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                    <x-switchable-team :team="$team" />
                    @endforeach
                    @endif
                </div>
            </x-slot>
        </x-dropdown>
        @endif

        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <button
                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                    <x-temcom::avatar src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"></x-temcom::avatar>
                </button>
                @else
                <button type="button"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                    {{ Auth::user()->name }}
                
                    @svg('fas-angle-down','ms-2 -me-0.5 size-4')
                </button>
                @endif
            </x-slot>

            <x-slot name="content">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Account') }}
                </div>

                @each('temcom::partials.sidebar.account-dropdown-item', $temcom->menu('account_dropdown'), 'item')

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                    {{ __('API Tokens') }}
                </x-dropdown-link>
                @endif

                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>

    </x-slot:itemsRight>
</x-temcom::header>