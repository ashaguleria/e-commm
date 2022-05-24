<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function home()
    {

        $products = DB::table('products')
            ->select('*')
            ->where('status', '1')
            ->orderBy('id', 'asc')
            ->get();

        return view('home', ['products' => $products]);
    }

    public function order()
    {
        return view('User.order');
    }
    public function product($id)
    {
        $product = Product::find($id);
        return view('User.order', compact('product'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $abc = new abc;
        $abc->name = $request->name;
        $abc->email = $request->email;
        $abc->phone = $request->phone;
        $abc->address = $request->address;
        $abc->product_id = $request->product_id;

        $abc->save();
        return redirect('stripe')->with('status', 'save data');
    }
    public function jquery()
    {
        return view("jquery.create");
    }

}