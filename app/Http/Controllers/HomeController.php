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
        $user_product_count = 0;

        if (Auth::id()) {
            $user_id = Auth::user()->id;
            $user_product_count = Cart::where('user_id', $user_id)->count();
        }

        return view('home.index', compact('products', 'user_product_count'));
    }

    // Dashboard
    public function userDashboard()
    {
        $products = Product::orderBy('created_at', 'DESC')->limit(3)->get();
        $user_product_count = 0;

        if (Auth::id()) {
            $user_id = Auth::user()->id;
            $user_product_count = Cart::where('user_id', $user_id)->count();
        }

        return view('home.index', compact('products', 'user_product_count'));
    }

    // Product
    public function userProduct($id)
    {
        $product = Product::findOrFail($id);
        $user_product_count = 0;

        if (Auth::id()) {
            $user_id = Auth::user()->id;
            $user_product_count = Cart::where('user_id', $user_id)->count();
        }

        return view('home.product_detail', compact('product', 'user_product_count'));
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
