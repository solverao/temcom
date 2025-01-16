<?php

namespace Solverao\Temcom\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use RuntimeException;
use Symfony\Component\Process\Process;
class InstallTemcomPackage extends Command
{
    protected $signature = 'temcom:install';

    protected $description = 'Install the temcom package';

    public function handle()
    {
        $this->info('Installing temcomPackage...');

        $this->publishingConfigurationFile();
        $this->installingJetstream();

        $this->call('vendor:publish', [
            '--tag' => 'temcom:tailwind-config',
            '--force' => true,
        ]);

        // $this->info('Ejecutando migraciones...');
        // $this->call('migrate');

        $this->call('vendor:publish', [
            '--tag' => 'temcom:js',
            '--force' => true,
        ]);


        $this->call('vendor:publish', [
            '--tag' => 'temcom:layout:app',
            '--force' => true,
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'temcom:layout:guest',
            '--force' => true,
        ]);

        // // Instalar dependencias de NPM
        $this->info('Instalando dependencias de NPM...');     // // exec('npm nstall preline');
        $this->runCommands(['npm install preline', 'npm run build']);

        $this->info('Installed temcomPackage');
    }

    private function publishingConfigurationFile()
    {
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
    }

    function installingJetstream()
    {
        $this->info('Instalando Jetstream con Livewire y configuración personalizada...');
        // Jetstream install
        $this->call('jetstream:install', [
            'stack' => 'livewire',
            '--dark' => true,
            '--pest' => true,
        ]);
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
            '--tag' => "temcom:config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    protected function runCommands($commands)
    {
        $process = Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);

        $process->run(function ($type, $line) {
            $this->info('    ' . $line);
        });
    }
}
