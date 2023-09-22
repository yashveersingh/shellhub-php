<?php

namespace yashveersingh\shellhubPHP\src\Helpers\HttpClient\Clients;

use yashveersingh\shellhubPHP\src\Helpers\HttpClient\HttpClientAbstract;
use Illuminate\Support\Facades\Http;

class DefaultClient extends HttpClientAbstract
{

    /**
     * @return void
     */
    function initialization(): void
    {
        //
    }

    /**
     * @param string $path
     * @param array $data
     * @param string|null $authorization
     * @return array|null
     */
    function get(string $path, array $data = [], ?string $authorization = null): ?array
    {
        $response = Http::baseUrl($this->url);
        if ($authorization)
            $response->withToken($authorization);
        $response = $response->get($path, $data);
        if ($response->unauthorized())
            $this->throwUnauthorized();
        if ($response->status() === 405)
            $this->throwMethodNotAllowed();
        if ($response->ok())
            return $response->json();
        return null;
    }

    /**
     * @param string $path
     * @param array $data
     * @param string|null $authorization
     * @return array|null
     */
    function post(string $path, array $data = [], ?string $authorization = null): ?array
    {
        $response = Http::baseUrl($this->url);
        if ($authorization)
            $response->withToken($authorization);
        $response = $response->post($path, $data);
        if ($response->unauthorized())
            $this->throwUnauthorized();
        if ($response->status() === 405)
            $this->throwMethodNotAllowed();
        if ($response->ok())
            return $response->json();
        return null;
    }
}