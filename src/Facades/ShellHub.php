<?php

namespace yashveersingh\shellhubPHP\src\Facades;

use Illuminate\Support\Facades\Facade;

class ShellHub extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ShellHub';
    }
}