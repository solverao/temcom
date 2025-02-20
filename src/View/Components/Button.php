<?php

namespace Solverao\Temcom\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Solverao\Temcom\Enums\ButtonStyle;
use Solverao\Temcom\Helpers\UtilsHelper;

class Button extends Component
{
    public string $classes;

    public function __construct(
        public ?string $label = null,
        public string $type = 'button',
        public string $theme = 'primary',
        public string $style = 'solid',
        public string $size = 'default',
        public string $rounded = 'lg',
        public ?string $icon = null
    ) {
        $this->label = UtilsHelper::applyHtmlEntityDecoder($label);

        $this->classes = ButtonStyle::tryFrom($this->style)->classes($this->theme); // Asignar el color
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view("temcom::components.button.button");
    }
}
