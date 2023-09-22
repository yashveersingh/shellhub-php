<?php

namespace yashveersingh\shellhubPHP\src\Facades;

use Illuminate\Support\Facades\Facade;

class ShellHubConfig extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ShellHubConfig';
    }
}