<?php

namespace yashveersingh\shellhubPHP\src\Helpers\Config;

abstract class ConfigEnvAbstract
{
    /**
     * @return string
     */
    protected abstract function getName(): string;

    private function getFromEnv(string $name): ?string
    {
        return config('shellhub.' . $name, null);
    }

    /**
     * @return string|null
     */
    function get(): string|null
    {
        return ($this->getFromEnv($this->getName()));
    }
}