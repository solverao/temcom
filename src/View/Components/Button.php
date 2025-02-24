<?php

namespace Solverao\Temcom\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Solverao\Temcom\Enums\ButtonStyle;
use Solverao\Temcom\Helpers\UtilsHelper;

class Button extends Component
{
    public function __construct(
        public ?string $label = null,
        public string $type = 'button',
        public string $theme = 'dark',
        public string $style = 'solid',
        public string $size = 'default',
        public string $rounded = 'lg',
        public ?string $icon = null
    ) {
        $this->label = UtilsHelper::applyHtmlEntityDecoder($label);
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $styleButton = match ($this->style) {
            'solid' => 'solid',
            'outline' => 'outline',
            'ghost' => 'ghost',
            default => 'solid'
        };

        return view("temcom::components.button.{$styleButton}");
    }
}
