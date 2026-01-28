<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $age = session('age');

        if(!is_numeric($age)){
            return "tuổi không hợp lệ";
        }

        if($age < 18){
            return "không được truy cập";
        }
        return $next($request);
    }
}
