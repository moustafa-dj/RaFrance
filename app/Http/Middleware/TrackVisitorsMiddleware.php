<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class TrackVisitorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $visitorIp = $request->ip();
        $visitorAgent = $request->userAgent();
        
        // Update visitor data in the database
        DB::table('visitors')->updateOrInsert(
            ['ip_address' => $visitorIp],
            ['user_agent' => $visitorAgent, 'last_activity' => now()]
        );

        return $next($request);
    }
}
