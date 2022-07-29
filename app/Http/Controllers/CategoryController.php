<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Alert;

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
        ]);

        Category::insert($validated);
        Alert::success('Congrats', 'You\'ve Add New Category!');
        return redirect('admin/category');
    }

    public function edit($id)
    {
        return view('admin.category.edit', [
            'active' => 'category',
            'title' => 'Edit Category',
            'data' => Category::where('id',$id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Category::where('id',$id)->first();

        if($data->category_name != $request->category_name){
            $validated = $request->validate([
                'category_name' => 'required|unique:categories,category_name',
            ]);
        }
        $update = [
            'category_name' => $request->category_name,
            'updated_at' => now(),
        ];
        Category::where('id', $id)->update($update);
        Alert::success('Congrats', 'You\'ve Update a Category!');
        return redirect('admin/category');
    }

    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        Alert::success('Congrats', 'You\'ve Deleted a Category!');
        return redirect('admin/category');
    }
}
