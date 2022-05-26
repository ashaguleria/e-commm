<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }
    public function adminHome()
    {
        $product = Product::all();
        return view('adminHome', compact('product'));
    }
    public function main()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('main', compact('cartItems'));
    }

}