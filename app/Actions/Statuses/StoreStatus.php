<?php
namespace App\Actions\Statuses;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Device;

class StoreStatus
{
    use AsAction;

    public function handle(int $device_id, array $data)
    {
        $device = Device::find($device_id);

        return $device->statuses()->create([
            'name' => $data['name'],
            'color' => $data['color'],
        ]);
    }

    public function getControllerMiddleware(ActionRequest $request): array
    {
        return ['permission:devices.control.' . $request->route('device_id')];
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'color' => ['required'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle(
            $request->route('device_id'),
            $request->only('name', 'color')
        );
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
