<?php

namespace Solverao\Temcom;

class Temcom
{
    public function menu()
    {
        return config('temcom.menu', []);
    }
}
