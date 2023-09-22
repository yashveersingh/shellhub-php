<?php

namespace yashveersingh\shellhubPHP\src\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use yashveersingh\shellhubPHP\src\Enum\ShellHubDeviceStatusEnum;
use yashveersingh\shellhubPHP\src\Models\ShellHubDevice;

class ShellHubDeviceRepository
{
    /**
     * @return Collection
     */
    function gets(): Collection
    {
        $rows = ShellHubDevice::query();
        return $rows->get();
    }

    /**
     * @param string $uid
     * @return ShellHubDevice|null
     */
    function get(string $uid): ?ShellHubDevice
    {
        return ShellHubDevice::where('uid', $uid)->first();
    }

    /**
     * @param string $uid
     * @param string $name
     * @param string $mac
     * @param array $info
     * @param string $tenantId
     * @param Carbon|null $lastSeen
     * @param bool $isOnline
     * @param string $namespace
     * @param ShellHubDeviceStatusEnum $shellHubDeviceStatusEnum
     * @param Carbon $createdAt
     * @return ShellHubDevice
     */
    function createOrUpdate(
        string                   $uid,
        string                   $name,
        string                   $mac,
        array                    $info,
        string                   $tenantId,
        ?Carbon                  $lastSeen,
        bool                     $isOnline,
        string                   $namespace,
        ShellHubDeviceStatusEnum $shellHubDeviceStatusEnum,
        Carbon                   $createdAt
    ): ShellHubDevice
    {
        return ShellHubDevice::updateOrCreate([
            'uid' => $uid
        ], [
            'name' => $name,
            'mac' => $mac,
            'info' => $info,
            'tenant_id' => $tenantId,
            'last_seen' => $lastSeen,
            'is_online' => $isOnline,
            'namespace' => $namespace,
            'status' => $shellHubDeviceStatusEnum,
            'created_at' => $createdAt
        ]);
    }

    /**
     * @param string|ShellHubDevice $uid
     * @param Carbon|null $lastSeen
     * @param bool $isOnline
     * @return void
     */
    function updateOnlineStatus(string|ShellHubDevice $uid, ?Carbon $lastSeen, bool $isOnline): void
    {
        if ($uid instanceof ShellHubDevice) {
            $uid->last_seen = $lastSeen;
            $uid->is_online = $isOnline;
            $uid->save();
        } else
            ShellHubDevice::where('uid', $uid)
                ->update([
                    'last_seen' => $lastSeen,
                    'is_online' => $isOnline
                ]);
    }
}