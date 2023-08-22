<?php
namespace App\Actions\Errors;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Device;

class StoreError
{
    use AsAction;

    public function handle(int $device_id, array $data)
    {
        $device = Device::find($device_id);

        return $device->errors()->create([
            'name' => $data['name'],
            'priority' => $data['priority'],
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
            'priority' => ['required', 'integer'],
            'color' => ['required'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle(
            $request->route('device_id'),
            $request->only('name', 'priority', 'color')
        );
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
