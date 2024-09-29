<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /* Admin */
    // Home Page
    public function adminHome()
    {
        return view('admin.index');
    }

    /* User */
    // Home Page
    public function home()
    {
        $products = Product::orderBy('created_at', 'DESC')->limit(3)->get();

        return view('home.index', compact('products'));
    }

    // Dashboard
    public function userDashboard()
    {
        $products = Product::orderBy('created_at', 'DESC')->limit(3)->get();

        return view('home.index', compact('products'));
    }

    // Product
    public function userProduct($id)
    {
        $product = Product::findOrFail($id);

        return view('home.product_detail', compact('product'));
    }
}
