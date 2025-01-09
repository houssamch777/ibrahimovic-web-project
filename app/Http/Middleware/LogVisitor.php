<?php

namespace App\Http\Middleware;

use App\Models\SiteVisitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // تحقق إذا كانت الزيارة جديدة بناءً على عنوان IP
        $ip = $request->ip();
        $userAgent = $request->userAgent();

        // تسجيل الزيارة
        SiteVisitor::create([
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'visited_at' => now(),
        ]);

        return $next($request);
    }
}
