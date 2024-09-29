<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // Cart
    public function userAddCart($id)
    {
        $product_id = $id;
        $user_id = Auth::user()->id;

        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;
        $cart->save();

        flash()->success('Addded to Cart Successfully.');

        return redirect()->back();
    }
}
