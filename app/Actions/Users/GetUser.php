<?php

namespace App\Actions\Users;

use App\Models\User;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetUser
{
    use AsAction;

    public function handle(int $userID): \Illuminate\Database\Eloquent\Builder|array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
    {
        return User::with('permissions')->find($userID);
    }

    public function asController(ActionRequest $request): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Builder|array
    {
        return $this->handle(
            $request->user()->id,
        );
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
