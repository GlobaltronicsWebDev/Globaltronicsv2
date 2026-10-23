<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminRole
{
    /**
     * Handle an incoming request.
     * Restricts access to full administrators only.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // If user is not full Admin, redirect to their authorized dashboard
        if (!$user->isAdmin()) {
            if ($user->role === 'sales') {
                return redirect()->route('admin.inquiries.index')
                    ->with('warning', 'Access restricted: Your account permissions are dedicated to Client Inquiries & Quotes.');
            }

            return redirect()->route('admin.careers.index')
                ->with('warning', 'Access restricted: Your account permissions are dedicated to Careers & Job Applications.');
        }

        return $next($request);
    }
}
