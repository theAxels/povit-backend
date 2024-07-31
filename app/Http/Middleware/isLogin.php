<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $response = $next($request);

            // Add cache-control headers to prevent caching (back setelah logout)
            return $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                            ->header('Pragma', 'no-cache')
                            ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
        }

        return redirect()->route('login_page')->withErrors('You must be logged in to access this page');
    }
}
