<?php
namespace yashveersingh\shellhubPHP\src\Helpers\Config\Classes;

use yashveersingh\shellhubPHP\src\Helpers\Config\ConfigRepositoryAbstract;

class ApiKey extends ConfigRepositoryAbstract
{
    /**
     * @return string
     */
    protected function getName(): string
    {
        return 'api_key';
    }
}