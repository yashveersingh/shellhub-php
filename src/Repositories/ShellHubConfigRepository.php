<?php

namespace yashveersingh\shellhubPHP\src\Repositories;

use Illuminate\Database\Eloquent\Model;
use yashveersingh\shellhubPHP\src\Models\ShellHubConfig;

class ShellHubConfigRepository
{
    /**
     * @param string $name
     * @return ShellHubConfig|Model|null
     */
    function get(string $name): ShellHubConfig|Model|null
    {
        return ShellHubConfig::where('name', $name)->first();
    }

    /**
     * @param string $name
     * @param string $value
     * @return ShellHubConfig|Model
     */
    function save(string $name, string $value): ShellHubConfig|Model
    {
        return ShellHubConfig::updateOrCreate(
            [
                'name' => $name
            ],
            [
                'value' => $value
            ]
        );
    }
}