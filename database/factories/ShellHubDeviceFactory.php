<?php

namespace yashveersingh\shellhubPHP\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use yashveersingh\shellhubPHP\src\Enum\ShellHubDeviceStatusEnum;
use yashveersingh\shellhubPHP\src\Models\ShellHubDevice;

class ShellHubDeviceFactory extends Factory
{
    protected $model = ShellHubDevice::class;
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'uid' => $this->faker->uuid(),
            'name' => $this->faker->randomNumber(6) . '-' . $this->faker->firstName,
            'mac' => $this->faker->macAddress(),
            'info' => [
                "id" => "raspbian",
                "pretty_name" => "Raspbian GNU/Linux 10 (buster)",
                "version" => "v0.11.1",
                "arch" => "arm",
                "platform" => "docker"
            ],
            'tenant_id' => $this->faker->uuid(),
            'last_seen' => $this->faker->dateTime(),
            'is_online' => $this->faker->boolean(80),
            'namespace' => 'shellhub',
            'status' => $this->faker->randomElement(ShellHubDeviceStatusEnum::cases()),
            'created_at' => $this->faker->dateTime()
        ];
    }
}