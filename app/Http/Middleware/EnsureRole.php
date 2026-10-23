<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRole
{
    /**
     * Handle an incoming request.
     * Restricts access to specified roles or full administrators.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('admin.login');
        }

        // Full administrator always has access across all modules
        if ($user->isAdmin() || in_array($user->role, $roles)) {
            return $next($request);
        }

        // Redirect unauthorized staff to their designated portal
        if ($user->role === 'sales') {
            return redirect()->route('admin.inquiries.index')
                ->with('warning', 'Access restricted: Your account permissions are dedicated to Client Inquiries & Quotes.');
        }

        if ($user->role === 'hr') {
            return redirect()->route('admin.careers.index')
                ->with('warning', 'Access restricted: Your account permissions are dedicated to Careers & Job Applications.');
        }

        return redirect()->route('admin.dashboard')
            ->with('warning', 'Access restricted to authorized personnel only.');
    }
}
