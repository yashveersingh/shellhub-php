<?php

namespace yashveersingh\shellhubPHP\src\Requests;

use yashveersingh\shellhubPHP\src\Helpers\HttpClient\HttpClient;
use yashveersingh\shellhubPHP\src\Requests\Classes\GetDevices;
use yashveersingh\shellhubPHP\src\Requests\Classes\GetUserInfo;
use yashveersingh\shellhubPHP\src\Requests\Classes\Login;

class Request
{
    private HttpClient $httpClient;

    public function __construct(string $url)
    {
        $this->httpClient = new HttpClient($url);
    }

    /**
     * @param string $class
     * @return RequestAbstract
     */
    private function getClass(string $class): RequestAbstract
    {
        return new $class($this->httpClient);
    }

    /**
     * @return RequestAbstract
     */
    function login(): RequestAbstract
    {
        return $this->getClass(Login::class);
    }

    /**
     * @return RequestAbstract
     */
    function getUserInfo():RequestAbstract
    {
        return $this->getClass(GetUserInfo::class);
    }

    /**
     * @return RequestAbstract
     */
    function getDevices(): RequestAbstract
    {
        return $this->getClass(GetDevices::class);
    }

}