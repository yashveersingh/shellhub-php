<?php

namespace yashveersingh\shellhubPHP\Tests\Feature\Core;

use Illuminate\Foundation\Testing\RefreshDatabase;
use yashveersingh\shellhubPHP\src\Models\ShellHubDevice;
use yashveersingh\shellhubPHP\Tests\TestCase;

class ShellHubDeviceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_device_can_be_created_with_factory()
    {
        $shellHubDeviceRow = ShellHubDevice::factory()->create();
        $this->assertNotNull($shellHubDeviceRow);
    }
}