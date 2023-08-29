<?php
namespace App\Actions\Permissions;

use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;

class DeletePermissionByDevice
{
    use AsAction;

    public function handle(int $deviceID): ?bool
    {
        foreach (Permission::where('name', 'like', 'devices.%.' . $deviceID)->get() as $permission) {
            $permission->delete();
        }
        return true;
    }
}
