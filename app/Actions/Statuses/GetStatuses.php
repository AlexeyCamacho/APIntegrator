<?php
namespace App\Actions\Statuses;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Device;

class GetStatuses
{
    use AsAction;

    public function handle(int $device_id)
    {
        $device = Device::find($device_id);
        return $device->statuses;
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
