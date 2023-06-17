<?php
namespace App\Actions\Devices;

use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use Illuminate\Support\Str;
use App\Models\Device;
use App\Models\User;

class GetDevices
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
