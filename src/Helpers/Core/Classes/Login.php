<?php

namespace yashveersingh\shellhubPHP\src\Helpers\Core\Classes;

use yashveersingh\shellhubPHP\src\Facades\ShellHubConfig;
use yashveersingh\shellhubPHP\src\Facades\ShellHubRequest;
use yashveersingh\shellhubPHP\src\Helpers\Core\CoreAbstract;

class Login extends CoreAbstract
{
    private string $userName, $password;

    /**
     * @return void
     */
    function init(): void
    {
        $this->userName = ShellHubConfig::userName()->get();
        $this->password = ShellHubConfig::password()->get();
    }

    /**
     * @return void
     */
    protected function request(): void
    {
        $request = ShellHubRequest::login();
        $request->setUserNamePassword($this->userName, $this->password);
        $this->responseData = $request->request();
    }

    /**
     * @return bool
     */
    protected function process(): bool
    {
        if (!is_null($this->responseData)) {
            ShellHubConfig::apiKey()->save($this->responseData['token']);
            return true;
        }
        return false;
    }
}