<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only apply caching to GET requests
        if ($request->isMethod('GET') && !$request->is('admin/*')) {
            // Static assets (images, fonts, etc.) - 1 year cache
            if ($request->is(['images/*', 'fonts/*', 'build/*', '*.css', '*.js', '*.jpg', '*.jpeg', '*.png', '*.gif', '*.svg', '*.webp', '*.woff', '*.woff2', '*.ttf', '*.eot'])) {
                $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
                $response->headers->set('Expires', now()->addYear()->toRfc7231String());
            }
            // HTML pages - 1 hour cache (adjust based on content update frequency)
            elseif ($request->is(['/', '/about', '/contact', '/services', '/portfolio', '/locations', '/blog'])) {
                $response->headers->set('Cache-Control', 'public, max-age=3600, must-revalidate');
                $response->headers->set('ETag', md5($response->getContent()));
            }
            // Dynamic pages (blog posts, service pages) - 15 minutes cache
            elseif ($request->is(['blog/*', 'services/*'])) {
                $response->headers->set('Cache-Control', 'public, max-age=900, must-revalidate');
                $response->headers->set('ETag', md5($response->getContent()));
            }
            // Default: 5 minutes cache
            else {
                $response->headers->set('Cache-Control', 'public, max-age=300, must-revalidate');
            }

            // Security headers
            $response->headers->set('X-Content-Type-Options', 'nosniff');
            $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
            $response->headers->set('X-XSS-Protection', '1; mode=block');
            $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        }

        return $response;
    }
}

