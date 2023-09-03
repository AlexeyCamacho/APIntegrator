<?php
namespace App\Actions\Statuses;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Device;

class  CreateActiveStatuses
{
    use AsAction;

    public function handle(Device $device, array $statuses): \Illuminate\Http\JsonResponse
    {
        $device->activeStatuses()->syncWithPivotValues($statuses, ['updated_at' => now()], false);

        return response()->json([
            'state' => 'successfully',
        ]);
    }

    public function rules(): array
    {
        return [
            'statuses' => ['required', 'array'],
            'statuses.*' => ['numeric']
        ];
    }

    public function asController(ActionRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->handle($request->user(), $request->only('statuses')['statuses']);
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
