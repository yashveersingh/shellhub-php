<?php

namespace yashveersingh\shellhubPHP\console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PublishResourcesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shellhub:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install ShellHub package';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->info('Installing ShellHub Package...');
        $this->info('Publishing configuration...');
        if (!$this->configExists('shellhub.php')) {
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
        $this->call('migrate');
        $this->info('Installed ShellHub Package');
        return $this::SUCCESS;
    }

    /**
     * @param string $fileName
     * @return bool
     */
    private function configExists(string $fileName): bool
    {
        return File::exists(config_path($fileName));
    }

    /**
     * @return bool
     */
    private function shouldOverwriteConfig(): bool
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    /**
     * @param bool $forcePublish
     * @return void
     */
    private function publishConfiguration(bool $forcePublish = false): void
    {
        $params = [
            '--provider' => "yashveersingh\shellhubPHP\src\ServiceProviders\ShellHubServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}