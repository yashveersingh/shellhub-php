<?php

namespace yashveersingh\shellhubPHP\src\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use yashveersingh\shellhubPHP\console\PublishResourcesCommand;
use Illuminate\Console\Scheduling\Schedule;
use yashveersingh\shellhubPHP\console\RefreshApiKeyCommand;
use yashveersingh\shellhubPHP\console\SyncDeviceStatusCommand;
use yashveersingh\shellhubPHP\src\Facades\ShellHubConfig;

class ShellHubServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->registerResources();
    }

    /**
     * @return void
     */
    function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->scheduleCommands();
        }
        $this->registerResources2();
    }

    /**
     * @return void
     */
    protected function registerResources(): void
    {
        $this->registerFacades();
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
            $this->commands([
                PublishResourcesCommand::class,
                SyncDeviceStatusCommand::class,
                RefreshApiKeyCommand::class
            ]);
            $this->publishes([
                __DIR__ . '/../../config/config.php' => config_path('shellhub.php'),
            ], 'config');
        }
    }

    /**
     * @return void
     */
    protected function registerResources2(): void
    {
        $this->app->bind('ShellHubRequest', function ($app) {
            return new \yashveersingh\shellhubPHP\src\Requests\Request(ShellHubConfig::url()->get());
        });
    }

    /**
     * @return void
     */
    protected function registerFacades(): void
    {
        $this->app->bind('ShellHub', function ($app) {
            return new \yashveersingh\shellhubPHP\src\ShellHub();
        });
        $this->app->bind('ShellHubConfig', function ($app) {
            return new \yashveersingh\shellhubPHP\src\Helpers\Config\Config();
        });
    }

    /**
     * @return void
     */
    protected function scheduleCommands(): void
    {
        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            $schedule->command('shellhub:refresh_api_key')->everyMinute();
            $schedule->command('shellhub:sync')->everyMinute();
        });
    }
}