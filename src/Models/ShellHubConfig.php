<?php

namespace yashveersingh\shellhubPHP\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use yashveersingh\shellhubPHP\database\factories\ShellHubConfigFactory;

class ShellHubConfig extends Model
{
    use HasFactory;

    /**
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return ShellHubConfigFactory::new();
    }

    protected $table = 'shellhub_config';
    public $timestamps = false;
    protected $primaryKey = 'name';
    protected $fillable = [
        'name',
        'value'
    ];
    protected $casts = [
        'name' => 'string',
        'value' => 'string'
    ];
}