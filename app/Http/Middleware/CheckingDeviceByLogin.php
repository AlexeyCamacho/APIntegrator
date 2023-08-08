<?php

namespace App\Http\Middleware;

use App\Models\Device;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckingDeviceByLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->input('login')) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'Error',
                'errors' => 'Login is not in the request',
            ], 422);
        }

        if(!Device::where('login', $request->input('login'))->first()) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'Error',
                'errors' => 'Device not found',
            ], 422);
        }

        return $next($request);
    }
}
