<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Models\Product;

class ProductController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return [
            CheckTimeAccess::class,
        ];
    }
    //
    public function index(){
        //
        $product = Product::all();
        $title = '';
        return view('admin.product.index', ['products'=>$product, 'title'=>$title]);
    }

    public function create(){
        return view("admin.product.add");
    }

    public function get(string $id = "123"){
        return view("admin.product.detail", ['id' => $id]);
    }

    public function store(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $product->save();

        return redirect('/product');
    }

    public function sinhvien(?string $name = null, ?string $mssv = null){
        // Set default values if parameters are not provided
        $name = $name ?? "Luong Xuan Hieu";
        $mssv = $mssv ?? "123456";
        
        return view('sinhvien', [
            'name' => $name,
            'mssv' => $mssv
        ]);
    }

    public function banco(int $n = 8){
        // Ensure n is between 1 and 20 for reasonable display
        $n = max(1, min(20, $n));
        return view('banco', ['n' => $n]);
    }

    public function edit(string $id){
        $product = Product::find($id);
        return view('product.edit', ['product' => $product]);
    }

    public function update(Request $request, string $id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $product->save();

        return redirect('/product');
    }

    public function destroy(string $id){
        $product = Product::find($id);
        $product->delete();

        return redirect('/product');
    }
}
