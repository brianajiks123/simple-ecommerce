<?php

namespace App\Http\Controllers;

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
        return view('home.index');
    }
}
