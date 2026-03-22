<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Middleware demo: đọc tuổi từ session (route POST /age lưu trước đó).
 * Chỉ cho qua nếu tuổi >= 18 (dùng cho route /restrict).
 */
class CheckAge
{
    public function handle(Request $request, Closure $next)
    {
        $age = session('age');

        if ($age === null) {
            return "chưa nhập tuổi";
        }

        if (! is_numeric($age)) {
            return "tuổi không hợp lệ";
        }

        if ($age < 18) {
            return "không được truy cập";
        }

        return $next($request);
    }
}
