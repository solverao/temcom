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
        $this->info('Installing temcom package...');

        $this->publishingConfigurationFile();

        $this->installingJetstream();

        // $this->info('Ejecutando migraciones...');
        // $this->call('migrate');

        $this->publishingAppLayout();

        $this->publishingGuestLayout();

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

    private function publishingAppLayout()
    {
        $this->info('Publishing app layout...');

        $this->call('vendor:publish', [
            '--tag' => 'temcom:layout:app',
            '--force' => true,
        ]);
    }

    private function publishingGuestLayout()
    {
        $this->info('Publishing guest layout...');

        $this->call('vendor:publish', [
            '--tag' => 'temcom:layout:guest',
            '--force' => true,
        ]);
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
