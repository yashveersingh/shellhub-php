<?php

namespace yashveersingh\shellhubPHP\src\Requests\Classes;

use yashveersingh\shellhubPHP\src\Requests\RequestAbstract;

class GetUserInfo extends RequestAbstract
{

    /**
     * @return string
     */
    function getMethod(): string
    {
        return 'get';
    }

    /**
     * @return string
     */
    function getPath(): string
    {
        return 'api/auth/user';
    }

    /**
     * @return bool
     */
    function isAuthorized(): bool
    {
        return true;
    }
}