<?php

namespace App\Actions\Settings;

use Illuminate\Database\Eloquent\Model;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreSetting
{
    use AsAction;

    public function handle(Model $enity)
    {
        $defaultSettings = config('defaultSettings.' . $enity->getTable());

        if (!count($defaultSettings)) {
            return false;
        }

        if ($enity->settings) {
            return false;
        }

        $enity->settings()->create([
            'settings' => $defaultSettings,
        ]);

        return true;
    }

    public function jsonResponse($data)
    {
        return $data;
    }

}
