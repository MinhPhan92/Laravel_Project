<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('product')->group(function(){
    Route::get('/', function () {
        return view('product.index');
    });

    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    Route::get('/{id}', function($id = 123){
        return "Chi tiết sản phẩm: " . $id;
    });
});

Route::get('/sinhvien/{name?}/{mssv?}', function($name = "Luong Xuan Hieu", $mssv = '123456'){
    return "Sinh viên: " . $name . " - MSSV: " . $mssv;
});

Route::get('banco/{n}', function($n){
    return view('banco', ['n' => $n]);
});

Route::fallback(function(){
    return response()->view('error.404', [], 404);
});