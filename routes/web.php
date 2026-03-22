<?php

/**
 * Định nghĩa route web (trình duyệt).
 * - Route khách: đăng ký, đăng nhập, shop frontend.
 * - Route admin: prefix /admin, cần đăng nhập + middleware CheckTimeAccess.
 */

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Frontend\ProductController as FrontProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

// Trang chủ: đã login → vào CRUD sản phẩm admin; chưa login → form đăng nhập
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('products.index')
        : redirect()->route('login');
});

// Đăng ký tài khoản
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'checkRegister']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/checklogin', [AuthController::class, 'checklogin'])->name('checklogin');

// Demo session: lưu/đọc tuổi (bài tập)
Route::post('/age', function (\Illuminate\Http\Request $request) {
    session(['age' => $request->age]);
    return "đã lưu tuổi vào session";
});

Route::get('/age', function () {
    $age = session('age');
    if ($age) {
        return "tuổi của bạn là: " . $age;
    }
    return "chưa có tuổi trong session";
});

// Route demo: kiểm tra tuổi (>=18) qua middleware CheckAge
Route::get('/restrict', function () {
    return "bạn đã truy cập vào trang bị hạn chế";
})->middleware(App\Http\Middleware\CheckAge::class)->name('home');

Route::get('/sinhvien/{name?}/{mssv?}', function ($name = null, $mssv = null) {
    return 'Name: ' . $name . ', MSSV: ' . $mssv;
});

// Demo bàn cờ (bài tập)
Route::get('/banco/{n}', [AdminProductController::class, 'banco'])
    ->where('n', '[0-9]+')
    ->name('banco');

// Khu vực quản trị: URL bắt đầu bằng /admin, cần đăng nhập
Route::prefix('admin')
    ->middleware(['auth', CheckTimeAccess::class])
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('products', AdminProductController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('users', AdminUserController::class)
            ->names('admin.users')
            ->only(['index', 'edit', 'update', 'destroy']);
    });

// Shop frontend (khách): danh sách, chi tiết, tìm kiếm — không bắt buộc login
Route::get('/products', [FrontProductController::class, 'index'])->name('frontend.products.index');
Route::get('/products/{id}', [FrontProductController::class, 'show'])->name('frontend.products.show');
Route::get('/search', [FrontProductController::class, 'search'])->name('frontend.products.search');

// URL không khớp route nào → trang 404
Route::fallback(function () {
    return view('error.404');
});
