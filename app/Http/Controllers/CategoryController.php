<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::ALL();
        return view('category', ['categories' => $categories]);
    }

    public function add()
    {
        return view('category-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);
        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'category add successfully');
    }

    public function edit($slug)
    {
        $category = category::where('slug', $slug)->first();
        return view('category-edit', ['category' => $category]);
    }

    public function update(request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = category::where('slug', $slug)->first();
        $category->slug = null;
        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'category updated successfully');
    }

    public function delete($slug)
    {
        $category = category::where('slug', $slug)->first();
        return view('category-delete', ['category' => $category]);
    }

    public function destroy($slug)
    {
        $category = category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'category deleted successfully');
    }
}
