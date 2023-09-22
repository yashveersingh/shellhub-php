<?php

namespace yashveersingh\shellhubPHP\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use yashveersingh\shellhubPHP\src\Models\ShellHubConfig;

class ShellHubConfigFactory extends Factory
{
    protected $model = ShellHubConfig::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'value' => $this->faker->paragraph()
        ];
    }
}