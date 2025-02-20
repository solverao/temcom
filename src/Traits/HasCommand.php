<?php

namespace Solverao\Temcom\Traits;

use RuntimeException;
use Symfony\Component\Process\Process;

trait HasCommand
{
    protected function runCommands($commands)
    {
        $process = Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);

        $process->run(function ($type, $line) {
            $this->info('    ' . $line);
        });
    }
}
