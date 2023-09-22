<?php

namespace yashveersingh\shellhubPHP\src\Helpers\Config;

use ReflectionClass;
use ReflectionException;
use yashveersingh\shellhubPHP\src\Helpers\Config\Classes\ApiKey;
use yashveersingh\shellhubPHP\src\Helpers\Config\Classes\Password;
use yashveersingh\shellhubPHP\src\Helpers\Config\Classes\Url;
use yashveersingh\shellhubPHP\src\Helpers\Config\Classes\Username;
use yashveersingh\shellhubPHP\src\Repositories\ShellHubConfigRepository;

class Config
{
    private ShellHubConfigRepository $shellHubConfigRepository;

    public function __construct()
    {
        $this->shellHubConfigRepository = new ShellHubConfigRepository();
    }

    /**
     * @param string $class
     * @return ConfigRepositoryAbstract|ConfigEnvAbstract|null
     */
    private function getClass(string $class): ConfigRepositoryAbstract|ConfigEnvAbstract|null
    {
        try {
            $reflection = new ReflectionClass($class);
            if ($reflection->isSubclassOf(ConfigRepositoryAbstract::class))
                return new $class($this->shellHubConfigRepository);
            if ($reflection->isSubclassOf(ConfigEnvAbstract::class))
                return new $class();
        } catch (ReflectionException $e) {
        }
        return null;
    }

    /**
     * @return ConfigRepositoryAbstract
     * @throws
     */
    function apiKey(): ConfigRepositoryAbstract
    {
        return $this->getClass(ApiKey::class);
    }

    /**
     * @return ConfigEnvAbstract
     */
    function url(): ConfigEnvAbstract
    {
        return $this->getClass(Url::class);
    }

    /**
     * @return ConfigEnvAbstract
     */
    function userName(): ConfigEnvAbstract
    {
        return $this->getClass(Username::class);
    }

    /**
     * @return ConfigEnvAbstract
     */
    function password(): ConfigEnvAbstract
    {
        return $this->getClass(Password::class);
    }
}