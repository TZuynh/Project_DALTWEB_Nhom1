<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // CategoryController.php

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $categories = Category::with('parent')
                ->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($request->search) . '%'])
                ->paginate(5);
        } else {
            $categories = Category::with('parent')->paginate(5);
        }

        $allCategories = Category::all();
        return view('admin.categories.index', compact('categories', 'allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_categories_id' => 'nullable|exists:categories,id',
        ], [
            'name.required' => 'Tên danh mục không được bỏ trống.',
            'name.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
        ]);

        try {
            Category::create([
                'name' => $validated['name'],
                'parent_categories_id' => $validated['parent_categories_id'],
            ]);
            return redirect()->route('admin.categories.index')->with('success', 'Tạo mới danh mục thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo mới danh mục.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $allCategories = Category::all();

        return view('admin.categories.edit', compact('category', 'allCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_categories_id' => 'nullable|exists:categories,id',
        ], [
            'name.required' => 'Tên danh mục không được bỏ trống.',
            'name.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
        ]);

        $category = Category::findOrFail($id);

        try {
            $category->update([
                'name' => $validated['name'],
                'parent_categories_id' => $validated['parent_categories_id'],
            ]);
            return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được cập nhật');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật danh mục.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::with('children')->findOrFail($id);

        try {
            $category->children()->delete();
            $category->delete();
            return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa danh mục.');
        }
    }
}
