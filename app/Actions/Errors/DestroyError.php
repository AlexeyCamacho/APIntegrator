<?php
namespace App\Actions\Errors;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Error;

class DestroyError
{
    use AsAction;

    public function handle(int $errorID): int
    {
        Error::destroy($errorID);
        return $errorID;
    }

    public function getControllerMiddleware(ActionRequest $request): array
    {
        $error = Error::find($request->route('id'));
        return ['permission:devices.control.' . $error->errortable->id];
    }

    public function asController(ActionRequest $request): int
    {
        return $this->handle(
            $request->route('id')
        );
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
