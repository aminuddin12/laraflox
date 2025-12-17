<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Startup\SystemCheck;

class EnsureSystemInstalled
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('install*') || $request->is('livewire/*')) {
            return $next($request);
        }

        if (!SystemCheck::isInstalled()) {
            return redirect()->route('install');
        }

        if (SystemCheck::isMaintenanceMode()) {
            // Jika Anda memiliki route khusus maintenance, redirect ke sana
            // return redirect()->route('maintenance');
            abort(503, 'System is under maintenance.');
        }

        return $next($request);
    }
}
