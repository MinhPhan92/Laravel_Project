<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    public function handle(Request $request, Closure $next)
    {
        // ✅ LẤY TUỔI TỪ SESSION (KHÔNG HARDCODE)
        $age = session('age');

        if ($age === null) {
            return "chưa nhập tuổi";
        }

        if (!is_numeric($age)) {
            return "tuổi không hợp lệ";
        }

        if ($age < 18) {
            return "không được truy cập";
        }

        return $next($request);
    }
}
