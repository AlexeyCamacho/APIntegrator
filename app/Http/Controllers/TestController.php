<?php

namespace App\Http\Controllers;

use App\Actions\Settings\StoreSetting;
use App\Models\Device;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
        $dev = Device::find(34);
        StoreSetting::run($dev);
        $dev = Device::find(38);
        StoreSetting::run($dev);

        return $dev->settings->settings(['online_time' => 10]);
    }
}
