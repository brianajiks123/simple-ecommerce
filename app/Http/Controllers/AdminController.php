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
        return view('admin.category');
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
}
