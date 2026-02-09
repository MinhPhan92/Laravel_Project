<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::where('is_delete', false)->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        $categories = Category::where('is_delete', false)->get();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Thêm danh mục thành công.');
    }

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

        if($request->parent_id == $id){
            return back()->withErrors('Không thể chọn chính nó làm danh mục cha.');
        }

        if(in_array($request->parent_id, $this->getAllChildrenIds($category))){
            return back()->withErrors('Không thể chọn danh mục con làm danh mục cha.');
        }

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Cập nhật danh mục thành công.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->is_delete = true;
        $category->save();

        return redirect()->route('categories.index')
            ->with('success', 'Xóa danh mục thành công.');
    }

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
