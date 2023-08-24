<?php
namespace App\Actions\Errors;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Device;

class  DeleteAllActiveErrors
{
    use AsAction;

    public function handle(Device $device): \Illuminate\Http\JsonResponse
    {
        $device->activeErrors()->detach();

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
