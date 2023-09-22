<?php

namespace Core;

use Illuminate\Foundation\Testing\RefreshDatabase;
use yashveersingh\shellhubPHP\src\Models\ShellHubConfig;
use yashveersingh\shellhubPHP\src\Repositories\ShellHubConfigRepository;
use yashveersingh\shellhubPHP\Tests\TestCase;

class ShellHubConfigRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private ShellHubConfigRepository $shellHubConfigRepository;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->shellHubConfigRepository = new ShellHubConfigRepository();
    }

    /**
     * @test
     */
    public function data_can_be_save()
    {
        $ar = [
            'name' => 'test_name',
            'value' => 'test_value'
        ];
        $this->shellHubConfigRepository->save($ar['name'], $ar['value']);
        $model = ShellHubConfig::where('name', $ar['name'])->first();
        $this->assertNotNull($model);
        $this->assertEquals($ar['value'], $model?->value);
    }

    /**
     * @test
     */
    public function data_can_be_get()
    {
        $ar = [
            'name' => 'test_name',
            'value' => 'test_value'
        ];
        ShellHubConfig::create($ar);
        $model = $this->shellHubConfigRepository->get($ar['name']);
        $this->assertNotNull($model);
        $this->assertEquals($ar['value'], $model?->value);
    }
}