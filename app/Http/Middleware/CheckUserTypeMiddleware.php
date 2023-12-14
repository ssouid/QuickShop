<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\HttpFoundation\Response;

class CheckUserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$types): Response
    {
        if(in_array(auth()->user()->user_type,$types))
        {
            return $next($request);
        }
        else{
            abort(response::HTTP_UNAUTHORIZED, __('UNAUTHORIZED!')) ;
        }
    }
}
