<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

/**
 * CRUD sản phẩm trong khu vực admin (/admin/products).
 * - Lọc theo tên, danh mục; phân trang.
 * - Upload ảnh lên disk public; xóa mềm bằng cột is_delete.
 */
class ProductController extends Controller
{
    /** Danh sách sản phẩm + form lọc (keyword, category_id) */
    public function index(\Illuminate\Http\Request $request)
    {
        $query = Product::where('is_delete', 0);

        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->with('category')->paginate(10);
        $categories = Category::where('is_delete', 0)->get();

        return view('admin.product.index', compact('products', 'categories'));
    }

    /** Form thêm sản phẩm (load danh sách danh mục) */
    public function create()
    {
        $categories = Category::where('is_delete', 0)->get();
        return view('admin.product.create', compact('categories'));
    }

    /** Lưu sản phẩm mới: validate qua StoreProductRequest, có thể upload ảnh */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        if (! array_key_exists('is_active', $validated)) {
            $validated['is_active'] = 1;
        }

        $validated['is_delete'] = 0;

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('products', $request->file('image'));
            $validated['image'] = $path;
        }

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product added successfully!');
    }

    /** Chi tiết một sản phẩm (chưa bị xóa mềm) */
    public function show($id)
    {
        $product = Product::where('is_delete', 0)->findOrFail($id);
        return view('admin.product.detail', compact('product'));
    }

    /** Form sửa sản phẩm */
    public function edit($id)
    {
        $product = Product::where('is_delete', 0)->findOrFail($id);
        $categories = Category::where('is_delete', 0)->get();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /** Cập nhật sản phẩm; nếu có ảnh mới thì xóa ảnh cũ trên disk */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::where('is_delete', 0)->findOrFail($id);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = Storage::disk('public')->put('products', $request->file('image'));
            $validated['image'] = $path;
        }

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product update successful!');
    }

    /** Xóa mềm: chỉ set is_delete = 1, không xóa bản ghi khỏi DB */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['is_delete' => 1]);

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }

    /** Demo view sinh viên (bài tập) */
    public function sinhvien(?string $name = null, ?string $mssv = null)
    {
        $name = $name ?? "Luong Xuan Hieu";
        $mssv = $mssv ?? "123456";
        return view('sinhvien', ['name' => $name, 'mssv' => $mssv]);
    }

    /** Demo bàn cờ n x n (bài tập), route /banco/{n} */
    public function banco(int $n = 8)
    {
        $n = max(1, min(20, $n));
        return view('banco', ['n' => $n]);
    }
}
