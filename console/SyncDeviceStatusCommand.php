<?php

namespace yashveersingh\shellhubPHP\console;

use Illuminate\Console\Command;
use yashveersingh\shellhubPHP\src\Helpers\Core\Classes\FetchDevices;

class SyncDeviceStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shellhub:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync device status';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $fetchDevicesOb = new FetchDevices();
        if ($fetchDevicesOb->execute()) {
            $this->info('Fetch device successful');
            return $this::SUCCESS;
        }
        $this->error('Unable to fetch device');
        return $this::FAILURE;
    }
}