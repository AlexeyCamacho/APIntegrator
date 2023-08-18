<?php
namespace App\Actions\Devices;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Device;
use Spatie\Permission\Models\Permission;

class GenerateNewPassword
{
    use AsAction;

    public function handle(int $deviceID): ?bool
    {
        $device = Device::find($deviceID);

        return $device->delete();
    }

    public function getControllerMiddleware(ActionRequest $request): array
    {
        return ['permission:devices.generatePassword.' . $request->route('id')];
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle(
            $request->route('id')
        );
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
