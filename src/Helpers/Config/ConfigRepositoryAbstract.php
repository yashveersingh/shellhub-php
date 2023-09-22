<?php

namespace yashveersingh\shellhubPHP\src\Helpers\Config;

use yashveersingh\shellhubPHP\src\Models\ShellHubConfig;
use yashveersingh\shellhubPHP\src\Repositories\ShellHubConfigRepository;

abstract class ConfigRepositoryAbstract
{
    private ShellHubConfigRepository $shellHubConfigRepository;

    public function __construct(ShellHubConfigRepository $shellHubConfigRepository)
    {
        $this->shellHubConfigRepository = new ShellHubConfigRepository();
    }

    /**
     * @return string
     */
    protected abstract function getName(): string;

    /**
     * @return string|null
     */
    function get(): string|null
    {
        return ($this->shellHubConfigRepository->get($this->getName()))?->value;
    }

    /**
     * @param string $value
     * @return ShellHubConfig
     */
    function save(string $value): ShellHubConfig
    {
        return $this->shellHubConfigRepository->save($this->getName(), $value);
    }
}