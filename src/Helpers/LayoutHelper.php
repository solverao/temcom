<?php

namespace Solverao\Temcom\Helpers;

class LayoutHelper
{
    public static function isLayoutFixedSidebar()
    {
        return config('temcom.layout','') == 'fixed_sidebar';
    }

    public static function isLayoutTopNav()
    {
        return config('temcom.layout', '') == 'top_navigation';
    }
}
