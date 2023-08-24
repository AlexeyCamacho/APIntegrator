<?php
namespace App\Actions\Errors;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Device;

class  DeleteActiveErrors
{
    use AsAction;

    public function handle(Device $device, array $errors): \Illuminate\Http\JsonResponse
    {
        $device->activeErrors()->detach($errors);

        return response()->json([
            'state' => 'successfully',
        ]);
    }

    public function rules(): array
    {
        return [
            'errors' => ['required', 'array'],
            'errors.*' => ['numeric']
        ];
    }

    public function asController(ActionRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->handle($request->user(), $request->only('errors')['errors']);
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
