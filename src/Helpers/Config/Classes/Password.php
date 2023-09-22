<?php

namespace yashveersingh\shellhubPHP\src\Helpers\Config\Classes;

use yashveersingh\shellhubPHP\src\Helpers\Config\ConfigEnvAbstract;

class Password extends ConfigEnvAbstract
{

    /**
     * @return string
     */
    protected function getName(): string
    {
        return 'password';
    }
}