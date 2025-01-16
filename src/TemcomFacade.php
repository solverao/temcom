<?php

namespace Solverao\Temcom;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Solverao\Temcom\Skeleton\SkeletonClass
 */
class TemcomFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'temcom';
    }
}
