<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {

        $request->header('Acess-Control-Allow-Origin:','*');
        $request->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS");
        $request->header('Acess-Control-Allow-Headers: Content-type, X-Auth-Token, Authorization');

        return $next($request);
    }
}
