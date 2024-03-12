<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     $organiserId = auth()->user()->users->id;
    //     $category = Category::where('organiser_id', $organiserId)->get();

    //     return view('admin.admin_dashboard', compact('category'));
    // }

    public function categories(){
        $categories = Category::orderBy('updated_at', 'desc')->get();

        return view('admin.categories', compact('categories'));
    }

    public function displayCategories(){
        $categories = Category::with('users')->get();

        return view('categories', compact('categories'));
    }

    // public function displayCategoriesForEvent(){
    //     $categories = Category::all();

    //     return view('events', compact('categories'));
    // }

    public function createCategories()
    {
        $admin = Auth::user()->id;

        return view('admin.createCategory', compact('admin'));
 
    }

    public function storeCategories(CategoryRequest $request)
    {
        $validated = $request->validated();
        Category::create($validated);

        return redirect()->route('admin.admin_dashboard');
    }

    public function updateCategories($id)
    {
        $categories = Category::where('id', $id)->get();

        return view('admin.updateCategory', compact('categories'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $validated = $request->validated();
        $updateCategory = Category::find($id);
        $updateCategory->update($validated);

        return redirect()->route('admin.admin_dashboard'); 
    }

    public function deleteCategory($id)
    {
        $categories = Category::where('id', $id);
        $categories->delete();
        return redirect()->back();
    }
}
