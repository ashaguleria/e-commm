<?php

namespace App\Http\Controllers;

use App\Models\abc;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->select('*')->where('status', '1')->orderBy('id', 'asc')->get();
        return view('home', ['products' => $products]);
    }
    public function order()
    {
        return view('User.order');
    }
// orders save
    public function store(Request $request)
    {
        // dd($request->all());
        $abc = new abc;
        $abc->name = $request->name;
        $abc->email = $request->email;
        $abc->phone = $request->phone;
        $abc->address = $request->address;

        $abc->save();
        return redirect('stripe')->with('status', 'save data');
    }

    //get category
    public function home1()
    {
        $category = Category::all();
        return view('home1', compact('category'));
    }
    public function view($name)
    {
        if (Category::where('name', $name)->exists()) {
            $category = Category::where('name', $name)->first();
            $product = Product::where('cat_id', $category->id)->get();
            return view('view-subcategory', compact('category', 'product'));
        } else {
            return view('home1');
        }
    }

}