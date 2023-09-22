<?php

namespace yashveersingh\shellhubPHP\src\Requests\Classes;

use yashveersingh\shellhubPHP\src\Requests\RequestAbstract;

class GetDevices extends RequestAbstract
{

    /**
     * @return string
     */
    function getMethod(): string
    {
        return 'get';
    }

    /**
     * @return string
     */
    function getPath(): string
    {
        return 'api/devices';
    }

    /**
     * @return bool
     */
    function isAuthorized(): bool
    {
        return true;
    }

    /**
     * @param int $page
     * @param int $perPage
     * @param string $status
     * @param string $sortBy
     * @param string $orderBy
     * @return void
     */
    public function filter(int $page, int $perPage, string $status = 'accepted', string $sortBy = 'name', string $orderBy = 'asc')
    {
        $this->data = [
            'sort_by' => $sortBy,
            'order_by' => $orderBy,
            'page' => $page,
            'per_page' => $perPage,
            'status' => $status
        ];
    }
}