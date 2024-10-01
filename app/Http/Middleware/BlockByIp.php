<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockByIp
{
    /* sample
        get from db or
        get from file
    */
    protected $blocked = ['127.0.0.0'];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (in_array($request->getClientIp(), $this->blocked)) {
            abort(403);
        }

        return $next($request);
    }
}
