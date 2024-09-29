<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    /* Category */
    // Show Category View
    public function adminViewCategory()
    {
        $categories = Category::select('id', 'name')->paginate(3);

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

    // Edit Category View
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
        $category = Category::findOrFail($id);
        $category->delete();

        flash()->success('Category Deleted Successfully.');

        return redirect()->back();
    }

    /* Product */
    // Add Product View
    public function adminAddProduct()
    {
        $categories = Category::select('id', 'name')->get();

        return view('admin.product', compact('categories'));
    }

    // Store Product
    public function adminStoreProduct(Request $request)
    {
        $img = $request->image;
        $img_name = '';

        if ($img) {
            $img_name = time().'.'.$img->getClientOriginalExtension();
            $img->move('products', $img_name);
        }

        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->category = $request->category;
        $product->image = $img_name;
        $product->save();

        flash()->success('Product Addded Successfully.');

        return redirect()->back();
    }

    // Show Product View
    public function adminShowProduct()
    {
        $products = Product::select('id', 'title', 'description', 'price', 'quantity', 'image', 'category')->paginate(3);

        return view('admin.show_product', compact('products'));
    }

    // Edit Product View
    public function adminEditProduct($id)
    {
        $categories = Category::select('id', 'name')->get();
        $product = Product::select('id', 'title', 'description', 'price', 'quantity', 'image', 'category')->findOrFail($id);

        return view('admin.edit_product', compact('product', 'categories'));
    }

    // Update Product
    public function adminUpdateProduct($id, Request $request)
    {
        // Get Old Image Product
        $product = Product::findOrFail($id);
        $img_path = public_path('products/'. $product->image);

        // Initialize New Image Name
        $img_new_name = '';

        // Check New Image is provided
        if ($request->hasFile('image')) {
            // Remove Old Image Product
            if (file_exists($img_path)) {
                unlink($img_path);
            }

            // Get New Image Product
            $img_new = $request->file('image');
            $img_new_name = time() . '.' . $img_new->getClientOriginalExtension();
            $img_new->move('products', $img_new_name);

            // Set the new image name to the product
            $product->image = $img_new_name;
        }

        // Update other product fields
        $product->title = $request->title;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;

        // Save the product
        $product->save();

        flash()->success('Product Updated Successfully.');

        return redirect('/admin/view-product');
    }

    // Delete Product
    public function adminDeleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $img_path = public_path('products/'. $product->image);

        if (file_exists($img_path)) {
            unlink($img_path);
        }

        $product->delete();

        flash()->success('Product Deleted Successfully.');

        return redirect()->back();
    }
}
