<?php

namespace Solverao\Temcom\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use RuntimeException;
use Symfony\Component\Process\Process;

class InstallTemcomPackage extends Command
{
    protected $signature = 'temcom:install {--layout : Indicate that layouts should be installed.}
                                            {--only_layout : To install only specific resources: assets, config, translations, auth_views, auth_routes, main_views or components.}';

    protected $description = 'Install the temcom package';

    public function handle()
    {
        $this->info('Installing temcom package...');

        if ($this->option('only_layout')) {
            $this->publishingAppLayout(true);
            $this->publishingGuestLayout(true);
            return;
        }

        if ($this->option('layout')) {
            $this->publishingAppLayout(true);
            $this->publishingGuestLayout(true);
        }

        $this->publishingConfigurationFile();
        
        $this->installingJetstream();

        // $this->info('Ejecutando migraciones...');
        // $this->call('migrate');

        $this->info('Installing NPM Dependencies...');
        $this->call('temcom:config:preline');    // // exec('npm nstall preline');
        $this->runCommands(['npm install preline', 'npm run build']);

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

    function installingJetstream()
    {
        $this->info('Installing Jetstream with Livewire...');
        // Jetstream install
        $this->call('jetstream:install', [
            'stack' => 'livewire',
            '--dark' => true,
            '--pest' => true,
        ]);
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

    protected function runCommands($commands)
    {
        $process = Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);

        $process->run(function ($type, $line) {
            $this->info('    ' . $line);
        });
    }

    private function publishingAppLayout($forcePublish  = false)
    {
        $this->info('Publishing app layout...');

        $params = [
            '--tag' => "temcom:layout-app",
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    private function publishingGuestLayout($forcePublish = false)
    {
        $this->info('Publishing guest layout...');

        $params = [
            '--tag' => "temcom:layout-guest",
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}
