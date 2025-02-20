<?php

namespace Solverao\Temcom\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Solverao\Temcom\Traits\HasCommand;

class InstallTemcomPackage extends Command
{
    use HasCommand;

    protected $signature = 'temcom:install {--layout : Indicate that layouts should be installed.}';

    protected $description = 'Install the temcom package';

    public function handle()
    {
        $this->info('Installing temcom package...');

        $this->publishingConfigurationFile();

        $this->npmPackages();

        $this->tailwindConfiguration();

        $this->configComponents();

        $this->configLayouts();

        $this->copySingleDirectoires();

        $this->call('temcom:config:preline');

        $this->runCommands(['npm install', 'npm run build']);

        $this->info('Installed temcom package');
    }

    private function publishingConfigurationFile()
    {
        $this->info('Publishing configuration...');

        // File config
        if (! File::exists(config_path('temcom.php'))) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Solverao\Temcom\TemcomServiceProvider",
            '--tag' => "temcom:config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->callSilent('vendor:publish', $params);
    }

    private function npmPackages()
    {
        $this->updateNodePackages(function ($packages) {
            return [
                '@tailwindcss/forms' => '^0.5.7',
                '@tailwindcss/typography' => '^0.5.10',
                'autoprefixer' => '^10.4.16',
                'postcss' => '^8.4.32',
                'tailwindcss' => '^3.4.0',
            ] + $packages;
        });
    }

    private function tailwindConfiguration()
    {
        copy(__DIR__ . '/../../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__ . '/../../stubs/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__ . '/../../stubs/vite.config.js', base_path('vite.config.js'));
    }

    private function copySingleDirectoires()
    {
        // copy(__DIR__ . '/../../stubs/resources/views/dashboard.blade.php', resource_path('views/dashboard.blade.php'));
        // copy(__DIR__ . '/../../stubs/resources/views/navigation-menu.blade.php', resource_path('views/navigation-menu.blade.php'));
        // copy(__DIR__ . '/../../stubs/resources/views/terms.blade.php', resource_path('views/terms.blade.php'));
        // copy(__DIR__ . '/../../stubs/resources/views/policy.blade.php', resource_path('views/policy.blade.php'));
    }

    private function configComponents()
    {
        (new Filesystem)->ensureDirectoryExists(app_path('View/Components'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/resources/views/components', resource_path('views/components'));
    }

    private function configLayouts()
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));

        // View Components...
        copy(__DIR__ . '/../../stubs/app/View/Components/AppLayout.php', app_path('View/Components/AppLayout.php'));
        copy(__DIR__ . '/../../stubs/app/View/Components/GuestLayout.php', app_path('View/Components/GuestLayout.php'));
        copy(__DIR__ . '/../../stubs/app/View/Components/FixedSidebarLayout.php', app_path('View/Components/FixedSidebarLayout.php'));

        // Layouts...
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/resources/views/layouts', resource_path('views/layouts'));
    }

    private static function updateNodePackages(callable $callback, $dev = true)
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }
}
