<?php

namespace Solverao\Temcom\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallTemcomPackage extends Command
{
    protected $signature = 'temcom:install';

    protected $description = 'Install the temcom package';

    public function handle()
    {
        $this->info('Installing temcomPackage...');

        $this->info('Publishing configuration...');

        // File config
        if (! $this->configExists('temcom.php')) {
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

        $this->info('Instalando Jetstream con Livewire y configuración personalizada...');
        // Jetstream install
        $this->call('jetstream:install', [
            'stack' => 'livewire',
            '--dark' => true,
            '--pest' => true,
        ]);

        // Instalar dependencias de NPM
        $this->info('Instalando dependencias de NPM...');
        exec('npm install preline');

        $this->call('vendor:publish', [
            '--tag' => 'tailwind-config',
            '--force' => true,
        ]);

        // $this->info('Ejecutando migraciones...');
        // $this->call('migrate');

        $this->call('vendor:publish', [
            '--tag' => 'js',
            '--force' => true,
        ]);

        $this->info('Installed temcomPackage');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
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
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}
