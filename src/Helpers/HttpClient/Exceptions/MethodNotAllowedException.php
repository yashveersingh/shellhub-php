<?php

namespace yashveersingh\shellhubPHP\src\Helpers\HttpClient\Exceptions;

use RuntimeException;

class MethodNotAllowedException extends RuntimeException
{
    public function __construct(?string $message = null)
    {
        parent::__construct($message ?? 'Invalid Request. Method not allowed');
    }
}