<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeviceConstainsErrors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $errors = collect($request->only('errors')['errors']);
        $linkErrors = $request->user()->errors->pluck('id');

        $diffErrors = $errors->filter(function ($value, int $key) use ($linkErrors) {
            return $linkErrors->contains($value);
        });

        if ($diffErrors->count() == $errors->count()) {
            return $next($request);
        } else {
            abort(403, 'Access denied');
        }
    }
}
