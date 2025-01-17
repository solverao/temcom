@inject('sidebarItemHelper', 'Solverao\Temcom\Helpers\DropdownItemHelper')

@if($sidebarItemHelper->isLink($item))
    <x-dropdown-link href="{{ $sidebarItemHelper->getRoute($item) }}">
        {{ __($item['text']) }}
    </x-dropdown-link>
@endif