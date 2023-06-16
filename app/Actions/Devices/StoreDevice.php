<?php
namespace App\Actions\Devices;

use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use Illuminate\Support\Str;
use App\Models\Device;
use App\Models\User;

class StoreDevice
{
    use AsAction;

    public function handle(User $user, array $data): array
    {
        $password = Str::password();

        $device = $user->devices()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'login' => Str::ulid(),
            'password' => Hash::make($password),
        ]);

        return [
            'password' => $password,
            'device' => $device,
        ];
    }

    public function getControllerMiddleware(): array
    {
        return ['permission:devices.create'];
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'description' => ['nullable', 'min:3'],
        ];
    }

    public function asController(ActionRequest $request): array
    {
        return $this->handle(
            $request->user(),
            $request->only('name', 'description')
        );
    }

    public function jsonResponse($data)
    {
        return $data;
    }
}
