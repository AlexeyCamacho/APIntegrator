<?php
namespace App\Actions\Errors;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Device;

class GetErrors
{
    use AsAction;

    public function handle(int $device_id)
    {
        $device = Device::find($device_id);
        return $device->errors;
    }

    public function getControllerMiddleware(ActionRequest $request): array
    {
        return ['permission:devices.control.' . $request->route('device_id')];
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle(
            $request->route('device_id')
        );
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
