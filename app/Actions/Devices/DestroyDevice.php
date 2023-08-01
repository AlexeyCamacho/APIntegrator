<?php
namespace App\Actions\Devices;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\User;

class DestroyDevice
{
    use AsAction;

    public function handle(User $user): \Illuminate\Database\Eloquent\Collection
    {
        return $user->devices()->get();
    }

    public function getControllerMiddleware(): array
    {
        return ['permission:devices.view'];
    }

    public function asController(ActionRequest $request): \Illuminate\Database\Eloquent\Collection
    {
        return $this->handle(
            $request->user()
        );
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
