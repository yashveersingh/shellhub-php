<?php

namespace yashveersingh\shellhubPHP\console;

use Illuminate\Console\Command;
use yashveersingh\shellhubPHP\src\Helpers\Core\Classes\FetchDevices;
use yashveersingh\shellhubPHP\src\Helpers\Core\Classes\Login;
use yashveersingh\shellhubPHP\src\Helpers\Core\Classes\ValidateApiKey;

class RefreshApiKeyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shellhub:refresh_api_key';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh Api Key';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $success = 'Refresh api key successful';
        $validateApiKeyOb = new ValidateApiKey();
        $loginOb = new Login();
        if ($validateApiKeyOb->execute()) {
            $this->info($success);
            return $this::SUCCESS;
        } else
            if ($loginOb->execute()) {
                $this->info($success);
                return $this::SUCCESS;
            }
        $this->error('Refresh api key failed');
        return $this::FAILURE;
    }
}