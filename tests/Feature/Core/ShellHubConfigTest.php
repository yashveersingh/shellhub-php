<?php

namespace yashveersingh\shellhubPHP\Tests\Feature\Core;

use Illuminate\Foundation\Testing\RefreshDatabase;
use yashveersingh\shellhubPHP\Tests\TestCase;

class ShellHubConfigTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_device_can_be_created_with_factory()
    {
        $shellHubConfigRow = \yashveersingh\shellhubPHP\src\Models\ShellHubConfig::factory()->create();
        $this->assertNotNull($shellHubConfigRow);
    }

    /**
     * @test
     */
    public function api_key_can_be_set_via_facade()
    {
        $apiKey = \yashveersingh\shellhubPHP\src\Facades\ShellHubConfig::ApiKey();
        $text = 'test';
        $model = $apiKey->save($text);
        $this->assertEquals($text, $model?->value);
    }

    /**
     * @test
     */
    public function api_key_can_be_get_via_facade()
    {
        $apiKey = \yashveersingh\shellhubPHP\src\Facades\ShellHubConfig::ApiKey();
        $text = 'test';
        $apiKey->save($text);
        $this->assertEquals($text, $apiKey->get());
    }
}