<?php
namespace App\Actions\Errors;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Device;

class  CreateActiveErrors
{
    use AsAction;

    public function handle(Device $device, array $errors): \Illuminate\Http\JsonResponse
    {
        $device->activeErrors()->syncWithPivotValues($errors, ['updated_at' => now()], false);

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
        return $this->handle($device = $request->user(), $request->only('errors')['errors']);
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
