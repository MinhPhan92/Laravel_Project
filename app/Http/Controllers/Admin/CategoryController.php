<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * CRUD danh mục sản phẩm (/admin/categories).
 * Hỗ trợ danh mục cha–con (parent_id); xóa mềm bằng is_delete.
 */
class CategoryController extends Controller
{
    /** Danh sách danh mục có phân trang */
    public function index()
    {
        $categories = Category::where('is_delete', false)->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /** Form thêm danh mục (chọn danh mục cha nếu có) */
    public function create()
    {
        $categories = Category::where('is_delete', false)->get();
        return view('admin.categories.create', compact('categories'));
    }

    /** Lưu danh mục mới */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($request->only(['name', 'parent_id']));

        return redirect()->route('categories.index')->with('success', 'Thêm danh mục thành công.');
    }

    /** Form sửa: không cho chọn chính nó hoặc con làm cha */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $id)
            ->whereNotIn('id', $this->getAllChildrenIds($category))
            ->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        if ($request->parent_id == $id) {
            return back()->withErrors('Không thể chọn chính nó làm danh mục cha.');
        }

        if (in_array($request->parent_id, $this->getAllChildrenIds($category))) {
            return back()->withErrors('Không thể chọn danh mục con làm danh mục cha.');
        }

        $category->update($request->only(['name', 'parent_id']));

        return redirect()->route('categories.index')
            ->with('success', 'Cập nhật danh mục thành công.');
    }

    /** Resource route bắt buộc có show — redirect về index */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return redirect()->route('categories.index');
    }

    /** Xóa mềm: đánh dấu is_delete = true */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->is_delete = true;
        $category->save();

        return redirect()->route('categories.index')
            ->with('success', 'Xóa danh mục thành công.');
    }

    /**
     * Lấy đệ quy tất cả id danh mục con (dùng khi chọn parent để tránh vòng lặp).
     *
     * @param  \App\Models\Category  $category
     * @return array<int>
     */
    private function getAllChildrenIds($category)
    {
        $ids = [];

        foreach ($category->children as $child) {
            $ids[] = $child->id;
            $ids = array_merge($ids, $this->getAllChildrenIds($child));
        }

        return $ids;
    }
}
