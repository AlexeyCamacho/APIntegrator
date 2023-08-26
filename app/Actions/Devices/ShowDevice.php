<?php

namespace App\Actions\Devices;

use App\Models\User;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowDevice
{
    use AsAction;

    public function handle(User $user, int $deviceID): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|null
    {
        return $user->devices()->with('activeErrors')->find($deviceID);
    }

    public function authorize(ActionRequest $request): bool
    {
        return $request->user()->devices()->where('id', $request->route('id'))->count();
    }

    public function asController(ActionRequest $request): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|null
    {
        return $this->handle(
            $request->user(),
            $request->route('id')
        );
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
