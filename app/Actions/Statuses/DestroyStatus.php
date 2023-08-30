<?php
namespace App\Actions\Statuses;

use App\Models\Status;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;

class DestroyStatus
{
    use AsAction;

    public function handle(int $errorID): int
    {
        Status::destroy($errorID);
        return $errorID;
    }

    public function getControllerMiddleware(ActionRequest $request): array
    {
        $status = Status::find($request->route('id'));
        return ['permission:devices.control.' . $status->statustable->id];
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
