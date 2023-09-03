<?php
namespace App\Actions\Statuses;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Device;

class  DeleteAllActiveStatuses
{
    use AsAction;

    public function handle(Device $device): \Illuminate\Http\JsonResponse
    {
        $device->activeStatuses()->detach();

        return response()->json([
            'state' => 'successfully',
        ]);
    }

    public function asController(ActionRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->handle($request->user());
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
