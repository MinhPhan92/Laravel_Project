<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/add', [ProductController::class, 'create'])->name('add');
    Route::post('/store', [ProductController::class, 'store']);
    Route::get('/{id}', [ProductController::class, 'get']);
});

Route::get('/login', [ProductController::class, 'login'])->name('login');
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

Route::fallback(function() {
    return view('error.404');
});
