<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->guest(route('login'))->with('intended_url', $request->url());
        }

        if (auth()->user()?->name !== "Admin" &&
            auth()->user()?->name !== "Admin1" &&
            auth()->user()?->name !== "Admin2") {

            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
