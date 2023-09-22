<?php

namespace yashveersingh\shellhubPHP\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use yashveersingh\shellhubPHP\database\factories\ShellHubDeviceFactory;
use yashveersingh\shellhubPHP\src\Enum\ShellHubDeviceStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShellHubDevice extends Model
{
    use HasFactory;

    /**
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return ShellHubDeviceFactory::new();
    }

    protected $table = 'shellhub_devices';
    public $timestamps = false;
    protected $primaryKey = 'uid';
    protected $fillable = [
        'uid',
        'name',
        'mac',
        'info',
        'tenant_id',
        'last_seen',
        'is_online',
        'namespace',
        'status',
        'created_at'
    ];
    protected $casts = [
        'uid' => 'string',
        'name' => 'string',
        'mac' => 'string',
        'info' => 'array',
        'tenant_id' => 'string',
        'last_seen' => 'datetime',
        'is_online' => 'boolean',
        'namespace' => 'string',
        'status' => ShellHubDeviceStatusEnum::class,
        'created_at' => 'datetime'
    ];
}