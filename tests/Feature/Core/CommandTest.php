<?php

namespace yashveersingh\shellhubPHP\Tests\Feature\Core;

use Illuminate\Support\Facades\Artisan;
use yashveersingh\shellhubPHP\Tests\TestCase;
use Illuminate\Support\Facades\File;

class CommandTest extends TestCase
{
    /**
     * @test
     */
    function the_install_command_copies_the_configuration(): void
    {
        // make sure we're starting from a clean state
        if (File::exists(config_path('shellhub.php'))) {
            unlink(config_path('shellhub.php'));
        }

        $this->assertFalse(File::exists(config_path('shellhub.php')));

        $command = $this->artisan('shellhub:install');
        $command->execute();

        $this->assertTrue(File::exists(config_path('shellhub.php')));
        unlink(config_path('shellhub.php'));
    }

    /**
     * @test
     */
    public function when_a_config_file_is_present_users_can_choose_to_not_overwrite_it()
    {
        File::put(config_path('shellhub.php'), 'test contents');
        $this->assertTrue(File::exists(config_path('shellhub.php')));

        $command = $this->artisan('shellhub:install');

        $command->expectsConfirmation(
            'Config file already exists. Do you want to overwrite it?',
            'no'
        );

        $command->execute();

        $command->expectsOutput('Existing configuration was not overwritten');

        $this->assertEquals('test contents', file_get_contents(config_path('shellhub.php')));

        unlink(config_path('shellhub.php'));
    }

    /**
     * @test
     */
    public function when_a_config_file_is_present_users_can_choose_to_do_overwrite_it()
    {
        File::put(config_path('shellhub.php'), 'test contents');
        $this->assertTrue(File::exists(config_path('shellhub.php')));

        $command = $this->artisan('shellhub:install');

        $command->expectsConfirmation(
            'Config file already exists. Do you want to overwrite it?',
            'yes'
        );

        $command->execute();

        $command->expectsOutput('Overwriting configuration file...');

        $this->assertEquals(
            file_get_contents(__DIR__ . '/../../../config/config.php'),
            file_get_contents(config_path('shellhub.php'))
        );

        unlink(config_path('shellhub.php'));
    }
}