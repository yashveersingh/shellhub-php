<?php

namespace yashveersingh\shellhubPHP\src\Requests\Exceptions;

use Exception;

class AuthorizationKeyNotSetException extends Exception
{
    public function __construct(?string $message = null)
    {
        parent::__construct($message ?? 'Authorization Key Not Passed.');
    }
}