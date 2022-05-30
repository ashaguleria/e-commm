<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
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
    public function adminHome(Request $request)
    {
        $search = $request['search'];
        if ($search != "") {
            $product = Product::where('name', 'LIKE', "%" . $search . "%")->get();
        } else {
            $product = Product::all();
        }
        // $product = Product::paginate(10);
        $data = compact('product', 'search');
        return view('adminHome')->with($data);
    }

    // public function adminHome(Request $request)
    // {
    //     $search = $request->input('search');

    //     $product = Product::($search)->paginate(5);
    //     return view('adminHome')->with('product', $product);
    // }

    public function main()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('main', compact('cartItems'));
    }

}