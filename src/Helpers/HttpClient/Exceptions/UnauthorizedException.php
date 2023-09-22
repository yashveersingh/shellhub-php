<?php

namespace yashveersingh\shellhubPHP\src\Helpers\HttpClient\Exceptions;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use RuntimeException;

class UnauthorizedException extends RuntimeException
{
    public function __construct(?string $message = null)
    {
        parent::__construct($message ?? 'Request is unauthorized.');
    }
}