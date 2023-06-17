<?php
namespace App\Actions\Permissions;

use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;

class DeletePermission
{
    use AsAction;

    public function handle(string $name): ?bool
    {
        return Permission::findByName($name)->delete();
    }
}
