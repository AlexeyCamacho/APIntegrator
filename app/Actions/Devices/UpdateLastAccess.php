<?php

namespace App\Actions\Devices;

use Lorisleiva\Actions\Concerns\AsAction;

class UpdateLastAccess
{
    use AsAction;

    public function handle(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'state' => 'successfully',
        ]);
    }

    public function asController(): \Illuminate\Http\JsonResponse
    {
        return $this->handle();
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
