<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanonicalDomainMiddleware
{
    /**
     * Handle incoming request and enforce canonical non-www domain with 301 redirect.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = strtolower($request->getHost());

        // Redirect www.* to non-www canonical domain (301 Permanent Redirect)
        if (str_starts_with($host, 'www.')) {
            $targetHost = substr($host, 4);
            $targetUrl = 'https://' . $targetHost . $request->getRequestUri();
            
            return redirect()->to($targetUrl, 301, [
                'Cache-Control' => 'no-cache, private',
            ]);
        }

        $response = $next($request);

        // Optimize HTTP caching headers for public guest landing pages (TTFB & SEO Speed)
        if (
            $request->isMethod('GET') &&
            !$request->user() &&
            $response->getStatusCode() === 200 &&
            ($request->is('/') || $request->is('fugas-de-gas', 'gasfiter-sec', 'gas-trazador', 'fugas-de-agua', 'fugas-piscinas', 'sello-rojo-sec', 'deteccion-fugas-sin-romper', 'reparacion-calefont-sec', 'certificados-sec-gas', 'prodoral', 'nosotros', 'contacto'))
        ) {
            $response->headers->set('Cache-Control', 'public, max-age=3600, stale-while-revalidate=600');
            $response->headers->remove('Pragma');
            $response->headers->remove('Expires');
        }

        return $response;
    }
}
