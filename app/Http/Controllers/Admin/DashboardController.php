<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

/**
 * Trang tổng quan admin (/admin): thống kê nhanh số lượng.
 */
class DashboardController extends Controller
{
    /** Đếm sản phẩm, danh mục, user để hiển thị trên dashboard */
    public function index()
    {
        $totalProducts = Product::where('is_delete', 0)->count();
        $activeProducts = Product::where('is_delete', 0)->where('is_active', 1)->count();
        $totalCategories = Category::where('is_delete', 0)->count();
        $totalUsers = User::count();

        return view('admin.dashboard', compact(
            'totalProducts',
            'activeProducts',
            'totalCategories',
            'totalUsers',
        ));
    }
}
