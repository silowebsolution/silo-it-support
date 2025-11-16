<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        $guard = Filament::auth();
        $roles = explode('|', $roles);
        if (!$guard->check() || !$guard->user()->hasAnyRole($roles)) {

            auth()->logout();

            return redirect()->back()
                ->withErrors(['data.email' => __('You do not have permission to access this page.')]);
        }

        return $next($request);
    }
}
