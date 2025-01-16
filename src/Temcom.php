<?php

namespace Solverao\Temcom;

class Temcom
{
    public function menu(string $key): array
    {
        return config("temcom.menu.$key", []);
    }
}
