<?php
namespace App\Actions\Devices;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Device;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use App\Actions\Permissions\StorePermission;

class SetDeviceAdmin
{
    use AsAction;

    public function handle(User $user, Device $device): void
    {
        $permission = StorePermission::run('devices.*.' . $device->id);
        $user->givePermissionTo($permission->name);
    }
}
