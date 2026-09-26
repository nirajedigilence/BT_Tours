<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeaders
{
    /**
     * Handle an incoming request and attach essential security headers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Mitigate clickjacking attacks by forbidding iframe rendering from outside origins
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // Prevent MIME-type sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Enforce HTTPS transmission (1 year duration with subdomains)
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');

        // Control referrer details passed to external sites
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Restrict sensitive or unused browser APIs
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=()');

        // Content Security Policy: Configured to protect against injection without breaking existing inline scripts and styles
        $csp = "default-src 'self' https: data: 'unsafe-inline' 'unsafe-eval'; " .
               "script-src 'self' https: data: 'unsafe-inline' 'unsafe-eval'; " .
               "style-src 'self' https: 'unsafe-inline'; " .
               "img-src 'self' https: data: blob:; " .
               "font-src 'self' https: data:; " .
               "connect-src 'self' https:; " .
               "frame-src 'self' https:; " .
               "object-src 'none'; " .
               "base-uri 'self';";
        $response->headers->set('Content-Security-Policy', $csp);

        // Legacy XSS filter protection for older browsers
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        return $response;
    }
}
