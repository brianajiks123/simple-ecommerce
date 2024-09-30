<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /* Admin */
    // Home Page
    public function adminHome()
    {
        $user_count = User::where('usertype', 'user')->get()->count();
        $product_count = Product::all()->count();
        $order_count = Order::all()->count();
        $delivered_count = Order::where('status', 'Delivered')->get()->count();

        return view('admin.index', compact('user_count', 'product_count', 'order_count', 'delivered_count'));
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

    public function userCart()
    {
        $user_product_count = 0;

        if (Auth::id()) {
            $user_id = Auth::user()->id;
            $user_product_count = Cart::where('user_id', $user_id)->count();
            $user_carts = Cart::where('user_id', $user_id)->get();
        }

        return view('home.user_cart', compact('user_product_count', 'user_carts'));
    }

    // Delete Product Cart
    public function userDeleteProductCart($productId)
    {
        // Get User Cart
        $user_id = Auth::user()->id;
        $user_cart = Cart::where('user_id', $user_id)->where('product_id', $productId)->first();

        // Get Product Associate with User
        if ($user_cart) {
            $user_cart->delete();

            flash()->success('Product Deleted Successfully.');
        } else {
            flash()->error('Product Deleted Successfully!');
        }

        return redirect()->back();
    }

    // Order
    public function userOrder()
    {
        $user_product_count = 0;

        if (Auth::id()) {
            $user_id = Auth::user()->id;
            $user_product_count = Cart::where('user_id', $user_id)->count();
            $user_orders = Order::orderBy('created_at', 'DESC')->where('user_id', $user_id)->paginate(3);
        }

        return view('home.order', compact('user_product_count', 'user_orders'));
    }

    // Order Product
    public function userOrderProduct(Request $request)
    {
        // Get User Information
        $user_id = Auth::user()->id;
        $name = $request->receiver_name;
        $address = $request->receiver_address;
        $phone = $request->receiver_phone;

        // Get User Cart
        $user_carts = Cart::where('user_id', $user_id)->get();

        // Store Product Ordering
        foreach ($user_carts as $user_cart) {
            $order = new Order;
            $order->name = $name;
            $order->receiver_address = $address;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $user_cart->product_id;
            $order->save();
        }

        // Remove User Cart
        $user_carts_remove = Cart::where('user_id', $user_id)->get();

        foreach ($user_carts_remove as $user_cart_remove) {
            $user_cart_data = Cart::findOrFail($user_cart_remove->id);
            $user_cart_data->delete();
        }

        flash()->success('Order Product Successfully.');

        return redirect()->back();
    }
}
