<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Trang shop cho khách: chỉ hiển thị sản phẩm đang bán (is_active) và chưa xóa mềm.
 * Có tìm kiếm theo tên và “đã xem gần đây” lưu trong session.
 */
class ProductController extends Controller
{
    /** Danh sách sản phẩm + phân trang */
    public function index()
    {
        $products = Product::where('is_delete', 0)
            ->where('is_active', 1)
            ->with('category')
            ->paginate(10);

        return view('frontend.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Chi tiết sản phẩm.
     * Lưu id vào session recently_viewed (tối đa 5), load thêm danh sách đã xem.
     */
    public function show(int $id)
    {
        $product = Product::where('is_delete', 0)
            ->where('is_active', 1)
            ->with('category')
            ->findOrFail($id);

        $recentlyViewed = session('recently_viewed', []);
        $recentlyViewed = array_values(array_unique(array_merge([$product->id], $recentlyViewed)));
        $recentlyViewed = array_slice($recentlyViewed, 0, 5);

        session(['recently_viewed' => $recentlyViewed]);

        $recentlyViewedProducts = Product::where('is_delete', 0)
            ->where('is_active', 1)
            ->with('category')
            ->whereIn('id', $recentlyViewed)
            ->where('id', '!=', $product->id)
            ->get();

        return view('frontend.products.detail', [
            'product' => $product,
            'recentlyViewedProducts' => $recentlyViewedProducts,
        ]);
    }

    /** Tìm kiếm theo tên (LIKE), giữ keyword trên URL khi phân trang */
    public function search(Request $request)
    {
        $keyword = $request->get('keyword', '');

        $query = Product::where('is_delete', 0)
            ->where('is_active', 1)
            ->with('category');

        if ($keyword !== '') {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $products = $query->paginate(10)->appends(['keyword' => $keyword]);

        return view('frontend.products.index', [
            'products' => $products,
            'keyword' => $keyword,
        ]);
    }
}
