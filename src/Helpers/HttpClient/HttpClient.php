<?php

namespace yashveersingh\shellhubPHP\src\Helpers\HttpClient;

class HttpClient
{
    private HttpClientAbstract $httpClientAbstract;

    public function __construct(string $baseUrl, string $class = __NAMESPACE__ . '\Clients\DefaultClient')
    {
        $this->httpClientAbstract = new $class($baseUrl);
    }

    /**
     * @param string $path
     * @param array $data
     * @param string|null $authorization
     * @return array|null
     */
    function get(string $path, array $data, ?string $authorization = null): ?array
    {
        return $this->httpClientAbstract->get($path, $data, $authorization);
    }

    /**
     * @param string $path
     * @param array $data
     * @param string|null $authorization
     * @return array|null
     */
    function post(string $path, array $data, ?string $authorization = null): ?array
    {
        return $this->httpClientAbstract->post($path, $data, $authorization);
    }
}