<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Category;
use Alert;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->keyword;
        if($search){
            $data = Category::where('category_name', 'LIKE', "%{$search}%")
                            ->paginate(10);
        } else {
            $data = Category::paginate(10);
        }
        return view('admin.category.index', [
            'active' => 'category',
            'title' => 'Category',
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('admin.category.add', [
            'active' => 'category',
            'title' => 'Add Category',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'category_picture' => 'required|image|file|max:1024',
        ]);
        $upload = $request->file('category_picture')->store('img/category');
        $slug = Str::slug($request->category_name, '-');

        $validated = [
            'category_name' => $request->category_name,
            'category_picture' => $upload,
            'category_slug' => $slug,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Category::insert($validated);
        Alert::success('Congrats', 'You\'ve Add New Category!');
        return redirect('admin/category');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'active' => 'category',
            'title' => 'Edit Category',
            'data' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        if($category->category_name != $request->category_name){
            $validated = $request->validate([
                'category_name' => 'required|unique:categories,category_name',
                'category_picture' => 'image|file|max:1024',
            ]);
        } else {
            $validated = $request->validate([
                'category_name' => 'required',
                'category_picture' => 'image|file|max:1024',
            ]);
        }

        $slug = Str::slug($request->category_name, '-');

        if($request->category_picture){
            Storage::delete($category->category_picture);
            $upload = $request->file('category_picture')->store('img/category');
        } else {
            $upload = $category->category_picture;
        }

        $update = [
            'category_name' => $request->category_name,
            'category_slug' => $slug,
            'category_picture' => $upload,
            'updated_at' => now(),
        ];
        Category::where('id', $category->id)->update($update);
        Alert::success('Congrats', 'You\'ve Update a Category!');
        return redirect('admin/category');
    }

    public function destroy(Category $category)
    {
        Storage::delete($category->category_picture);
        Category::where('id', $category->id)->delete();
        Alert::success('Congrats', 'You\'ve Deleted a Category!');
        return redirect('admin/category');
    }
}
