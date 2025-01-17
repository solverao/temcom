<?php

namespace Solverao\Temcom\Console;

use Illuminate\Console\Command;

class ConfigurePreline extends Command
{
    protected $signature = 'temcom:config:preline';

    protected $description = 'Configure the preline package';

    public function handle()
    {
        $this->info('configuration preline...');

        // Modificar app.js
        $appJsPath = resource_path('js/app.js');
        if (file_exists($appJsPath)) {
            $content = file_get_contents($appJsPath);
            $importStatement = "import \"preline\";";
            if (!str_contains($content, $importStatement)) {
                file_put_contents($appJsPath, $importStatement . PHP_EOL . $content);
                $this->info("Added preline to app.js");
            }
        }

        // Modificar tailwind.config.js
        $tailwindConfigPath = base_path('tailwind.config.js');
        if (file_exists($tailwindConfigPath)) {
            $content = file_get_contents($tailwindConfigPath);
            $newConfig = "\"node_modules/preline/dist/*.js\"";
            $newPlugin = "require(\"preline/plugin\")";
            if (!str_contains($content, $newConfig)) {
                $content = preg_replace(
                    "/content:\s*\[([^\]]+)\]/",
                    "content: [\${1}, $newConfig]",
                    $content
                );

                $content = preg_replace(
                    "/plugins:\s*\[([^\]]+)\]/",
                    "plugins: [\${1}, $newPlugin]",
                    $content
                );

                file_put_contents($tailwindConfigPath, $content);
                $this->info("Added preline to tailwind.config.js");
            }
        }

        $this->info("Complete preline configuration");
    }
}
