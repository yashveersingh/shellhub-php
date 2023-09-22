<?php

namespace yashveersingh\shellhubPHP\src\Helpers\Core\Classes;

use yashveersingh\shellhubPHP\src\Facades\ShellHubConfig;
use yashveersingh\shellhubPHP\src\Facades\ShellHubRequest;
use yashveersingh\shellhubPHP\src\Helpers\Core\CoreAbstract;

class ValidateApiKey extends CoreAbstract
{
    /**
     * @return void
     */
    function init(): void
    {
    }

    /**
     * @return void
     */
    protected function request(): void
    {
        $request = ShellHubRequest::getUserInfo();
        $request->setAuthorization(ShellHubConfig::apiKey()->get());
        $this->responseData = $request->request();
    }

    /**
     * @return bool
     */
    protected function process(): bool
    {
        if (!is_null($this->responseData) && isset($this->responseData['id'])) {
            return true;
        }
        return false;
    }
}