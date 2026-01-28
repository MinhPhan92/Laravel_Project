<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('hello');
// });

// Route::get('/product', function () {
//     return view('product.index');
// });

// Route::get('/product/add', function () {
//     return view('product.add');
// });

// Route::get('/product/{id}', function ($id) {
//     return view('product.detail', ['id' => $id]);
// });

Route::prefix('product')->group(function () {
    Route::controller(ProductController::class)->group(function(){
        Route::get('/', 'index')->middleware(CheckTimeAccess::class);
        Route::get('/add', [ProductController::class, 'create'])->name('add');
        Route::post('/store', [ProductController::class, 'store']);
        Route::get('/{id}', [ProductController::class, 'get']);
    });
});

Route::get('/login', function () {
    return view('login');
})->middleware(CheckTimeAccess::class)->name('login');

Route::post('/product/checkLogin', [ProductController::class, 'checkLogin']);

Route::get('/register', [ProductController::class, 'register'])->name('register');
Route::post('/register', [ProductController::class, 'checkRegister']);

// Route::get('/logout', [ProductController::class, 'logout']);

Route::get('/', function(){
    if(!session()->has('username')){
        return redirect()->route('login');
    }
    else{
        return redirect()->route('home');
    }
});

Route::resource('test', TestController::class);

Route::get('/signin', [AuthController::class, 'SignIn'])->name('signin');
Route::post('/signin', [AuthController::class, 'CheckSignIn'])->name('checksignin');

Route::fallback(function() {
    return view('error.404');
});
