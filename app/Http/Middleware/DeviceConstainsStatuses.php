<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeviceConstainsStatuses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $statuses = collect($request->only('statuses')['statuses']);
        $linkStatuses = $request->user()->statuses->pluck('id');

        $diffStatuses = $statuses->filter(function ($value, int $key) use ($linkStatuses) {
            return $linkStatuses->contains($value);
        });

        if ($diffStatuses->count() == $statuses->count()) {
            return $next($request);
        } else {
            abort(403, 'Access denied');
        }
    }
}
