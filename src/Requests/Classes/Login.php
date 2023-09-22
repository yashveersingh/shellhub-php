<?php

namespace yashveersingh\shellhubPHP\src\Requests\Classes;

use yashveersingh\shellhubPHP\src\Requests\RequestAbstract;

class Login extends RequestAbstract
{

    /**
     * @return string
     */
    function getMethod(): string
    {
        return 'post';
    }

    /**
     * @return string
     */
    function getPath(): string
    {
        return 'api/login';
    }

    /**
     * @return bool
     */
    function isAuthorized(): bool
    {
        return false;
    }

    /**
     * @param string $userName
     * @param string $password
     * @return void
     */
    function setUserNamePassword(string $userName, string $password): void
    {
        $this->data = [
            'username' => $userName,
            'password' => $password
        ];
    }
}