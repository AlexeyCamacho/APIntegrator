<?php
namespace App\Actions\Devices;

use App\Models\Device;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;

class UpdateDevice
{
    use AsAction;

    public function handle(int $deviceID, array $data)
    {
        $device = Device::find($deviceID);

        if ($device) {
            $device->name = $data['name'];
            $device->description = $data['description'];
            $device->save();
        }

        return $device;

    }

    public function getControllerMiddleware(ActionRequest $request): array
    {
        return ['permission:devices.update.' . $request->route('id')];
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'description' => ['nullable', 'min:3'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle(
            $request->route('id'),
            $request->only('name', 'description')
        );
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
