<?php

namespace yashveersingh\shellhubPHP\src\Requests;

use yashveersingh\shellhubPHP\src\Helpers\HttpClient\HttpClient;
use yashveersingh\shellhubPHP\src\Requests\Classes\GetUserInfo;
use yashveersingh\shellhubPHP\src\Requests\Exceptions\AuthorizationKeyNotSetException;

abstract class RequestAbstract
{
    private HttpClient $httpClient;
    protected array $data = [];
    private ?string $authorizationKey = null;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    abstract function getMethod(): string;

    abstract function getPath(): string;

    abstract function isAuthorized(): bool;

    /**
     * @param array $data
     * @return void
     */
    protected function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @param string|null $authorizationKey
     * @return void
     */
    function setAuthorization(?string $authorizationKey)
    {
        $this->authorizationKey = $authorizationKey;
    }

    /**
     * @return array|null
     * @throws AuthorizationKeyNotSetException
     */
    public function request(): ?array
    {
        if ($this->isAuthorized() && is_null($this->authorizationKey) && !($this instanceof GetUserInfo))
            throw new AuthorizationKeyNotSetException();
        return match ($this->getMethod()) {
            'get' => $this->httpClient->get($this->getPath(), $this->data, $this->authorizationKey),
            'post' => $this->httpClient->post($this->getPath(), $this->data, $this->authorizationKey),
            default => null,
        };
    }
}