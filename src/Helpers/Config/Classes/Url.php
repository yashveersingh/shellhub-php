<?php

namespace yashveersingh\shellhubPHP\src\Helpers\Config\Classes;

use yashveersingh\shellhubPHP\src\Helpers\Config\ConfigEnvAbstract;

class Url extends ConfigEnvAbstract
{

    /**
     * @return string
     */
    protected function getName(): string
    {
        return 'url';
    }
}