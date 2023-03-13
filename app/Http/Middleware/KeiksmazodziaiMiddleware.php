<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KeiksmazodziaiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response= $next($request);

        $content=$response->getContent();
        $content=str_replace( '[[tel]]', '+370645485454', $content);
        $content=str_replace( 'žirkė', 'ž***ė', $content);
        $response->setContent($content);
        return $response;
    }
}
