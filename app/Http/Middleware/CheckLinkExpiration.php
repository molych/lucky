<?php

namespace App\Http\Middleware;

use App\Models\Link;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLinkExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User $user */
        $user = $request->user();
        $route = $request->route('link');

        $link = $user?->link;

        if (!$link || $link?->link !== $route) {
            return response('Page not found', 404);
        }

        if ($link?->expired_at < now()) {
            return response('The link has expired.', 403);
        }

        $request->merge(['user' => $user]);

        return $next($request);
    }
}
