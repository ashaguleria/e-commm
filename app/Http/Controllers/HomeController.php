<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

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
        $products = DB::table('products')
            ->select('*')
            ->where('status', '1')
            ->orderBy('id', 'asc')
            ->get();

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