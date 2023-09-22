<?php

namespace yashveersingh\shellhubPHP\src\Helpers\Core\Classes;

use Carbon\Carbon;
use Illuminate\Support\Str;
use yashveersingh\shellhubPHP\src\Enum\ShellHubDeviceStatusEnum;
use yashveersingh\shellhubPHP\src\Facades\ShellHubConfig;
use yashveersingh\shellhubPHP\src\Facades\ShellHubRequest;
use yashveersingh\shellhubPHP\src\Helpers\Core\CoreAbstract;
use yashveersingh\shellhubPHP\src\Repositories\ShellHubDeviceRepository;

class FetchDevices extends CoreAbstract
{
    private ShellHubDeviceRepository $shellHubDeviceRepository;

    /**
     * @return void
     */
    function init(): void
    {
        $this->shellHubDeviceRepository = new ShellHubDeviceRepository();
    }

    /**
     * @return void
     */
    protected function request(): void
    {
        $request = ShellHubRequest::getDevices();
        $request->setAuthorization(ShellHubConfig::apiKey()->get());
        $request->filter(1, 500);
        $this->responseData = $request->request();
    }

    /**
     * @return bool
     */
    protected function process(): bool
    {
        if (is_array($this->responseData)) {
            foreach ($this->responseData as $responseData) {
                $this->shellHubDeviceRepository->createOrUpdate(
                    $responseData['uid'],
                    $responseData['name'],
                    $responseData['identity']['mac'],
                    $responseData['info'],
                    $responseData['tenant_id'],
                    $responseData['last_seen'] ? Carbon::parse($responseData['last_seen'], 'UTC') : null,
                    $responseData['online'],
                    $responseData['namespace'],
                    constant(ShellHubDeviceStatusEnum::class . "::" . Str::upper($responseData['status'])),
                    Carbon::parse($responseData['created_at'], 'UTC')
                );
            }
            return true;
        }
        return false;
    }
}