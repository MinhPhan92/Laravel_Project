<?php

use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

/**
 * Cấu hình ứng dụng Laravel (Laravel 11+).
 * Đăng ký file route web/console; có thể bật thêm API ở đây nếu cần.
 */
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Ví dụ: áp dụng CheckTimeAccess cho mọi request (đang tắt)
        //$middleware->append(CheckTimeAccess::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
