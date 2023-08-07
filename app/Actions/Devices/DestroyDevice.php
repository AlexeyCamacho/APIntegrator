<?php
namespace App\Actions\Devices;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class DestroyDevice
{
    use AsAction;

    public function handle(User $user, int $deviceID): ?bool
    {
        $device = $user->devices()->find($deviceID);

        foreach (Permission::where('name', 'like', 'devices.%.' . $deviceID)->get() as $permission) {
            $permission->delete();
        }

        return $device->delete();
    }

    public function getControllerMiddleware(ActionRequest $request): array
    {
        return ['permission:devices.destroy.' . $request->route('id')];
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle(
            $request->user(),
            $request->route('id')
        );
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
