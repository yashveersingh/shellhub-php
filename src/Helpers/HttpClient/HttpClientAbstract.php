<?php

namespace yashveersingh\shellhubPHP\src\Helpers\HttpClient;

use yashveersingh\shellhubPHP\src\Helpers\HttpClient\Exceptions\MethodNotAllowedException;
use yashveersingh\shellhubPHP\src\Helpers\HttpClient\Exceptions\UnauthorizedException;

abstract class HttpClientAbstract
{
    protected string $url;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
        $this->initialization();
    }

    /**
     * @return void
     */
    abstract function initialization(): void;

    /**
     * @param string $path
     * @param array $data
     * @param string|null $authorization
     * @return array|null
     */
    abstract function get(string $path, array $data = [], ?string $authorization = null): ?array;

    /**
     * @param string $path
     * @param array $data
     * @param string|null $authorization
     * @return array|null
     */
    abstract function post(string $path, array $data = [], ?string $authorization = null): ?array;

    /**
     * @return void
     */
    protected function throwUnauthorized(): void
    {
        throw new UnauthorizedException();
    }

    /**
     * @return void
     */
    protected function throwMethodNotAllowed(): void
    {
        throw new MethodNotAllowedException();
    }
}