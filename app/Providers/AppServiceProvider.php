<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

/**
 * Đăng ký dịch vụ toàn cục; boot() chạy mỗi request.
 */
class AppServiceProvider extends ServiceProvider
{
    /** Đăng ký binding vào container (hiện chưa dùng) */
    public function register(): void
    {
        //
    }

    /**
     * Cấu hình sau khi app khởi động:
     * - Phân trang dùng style Bootstrap (khớp AdminLTE).
     * - View composer: tự inject $categories vào layout (menu không cần query lại từng controller).
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        View::composer(['layout.admin', 'partial.sidebar', 'layout.frontend'], function ($view) {
            $categories = Category::where('is_delete', false)->get();
            $view->with('categories', $categories);
        });
    }
}
