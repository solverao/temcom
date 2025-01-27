@inject('sidebarItemHelper', 'Solverao\Temcom\Helpers\SidebarItemHelper')

@if ($sidebarItemHelper->isSubmenu($item) and $sidebarItemHelper->checkPermission($item))

<div x-data="{ open: false }">
    <x-responsive-nav-link @click="open = !open" :active="$sidebarItemHelper->isActive($item)">
        <div class="inline-flex items-center">
            {{ $sidebarItemHelper->getText($item) }}
            @svg('fas-angle-down','hs-dropdown-open:-rotate-180 sm:hs-dropdown-open:rotate-0 duration-300 ms-1 shrink-0
            size-4')
        </div>
    </x-responsive-nav-link>
    <div x-show="open" x-on:click.away="open = false">
        @each('temcom::partials.navigation-menu.responsive-nav-link-item', $item['submenu'], 'item')
    </div>
</div>
@elseif($sidebarItemHelper->isLink($item) and $sidebarItemHelper->checkPermission($item))
<x-responsive-nav-link href="{{ $sidebarItemHelper->getRoute($item) }}" :active="$sidebarItemHelper->isActive($item)">
    {{ $sidebarItemHelper->getText($item) }}
</x-responsive-nav-link>
@endif
