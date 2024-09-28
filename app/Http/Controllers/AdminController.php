<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Flasher\Prime\FlasherInterface;

class AdminController extends Controller
{
    /* Category */
    // View Category
    public function adminViewCategory()
    {
        $categories = Category::select('id', 'name')->get();

        return view('admin.category', compact('categories'));
    }

    // Add Category
    public function adminAddCategory(Request $request)
    {
        $category = new Category;
        $category->name = $request->category;
        $category->save();

        flash()->success('Category Addded Successfully.');

        return redirect()->back();
    }

    // Edit Category
    public function adminEditCategory($id)
    {
        $category = Category::select('id', 'name')->findOrFail($id);

        return view('admin.edit_category', compact('category'));
    }

    // Update Category
    public function adminUpdateCategory($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->category_name;
        $category->save();

        flash()->success('Category Updated Successfully.');

        return redirect('/admin/view-category');
    }

    // Delete Category
    public function adminDeleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        flash()->success('Category Deleted Successfully.');

        return redirect()->back();
    }
}
