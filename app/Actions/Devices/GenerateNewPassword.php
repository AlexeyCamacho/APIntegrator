<?php
namespace App\Actions\Devices;

use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Device;
use Spatie\Permission\Models\Permission;

class GenerateNewPassword
{
    use AsAction;

    public function handle(int $deviceID): bool|string
    {
        $device = Device::find($deviceID);

        if ($device) {
            $password = Str::password();
            $device->password = $password;
            $device->save();

            return $password;
        }

        return false;
    }

    public function getControllerMiddleware(ActionRequest $request): array
    {
        return ['permission:devices.generatePassword.' . $request->route('id')];
    }

    public function asController(ActionRequest $request): bool|string
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
