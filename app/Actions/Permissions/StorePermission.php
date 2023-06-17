<?php
namespace App\Actions\Permissions;

use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;

class StorePermission
{
    use AsAction;

    public function handle(string $name): \Spatie\Permission\Models\Permission
    {
        return Permission::findOrCreate($name);
    }
}
