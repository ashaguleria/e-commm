<?php

namespace App\Http\Controllers;

use App\Models\abc;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public $search;

    public function create()
    {
        $category = Category::all();
        return view('Admin.create', compact('category'));
    }

    //--------------- Save products Data ---------------//
    public function store(Request $request)
    {
        $request->validate([
            'cat_id' => 'required',
            'name' => 'required',
            'orignalprice' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'product_image' => 'required',
        ]);
        // dd($request->all());
        $product = new Product;
        $product->cat_id = $request->input('cat_id');
        $product->name = $request->input('name');
        $product->orignalprice = $request->input('orignalprice');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        if ($request->hasfile('product_image')) {
            $file = $request->file('product_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/products/', $filename);
            $product->product_image = $filename;
        }
        // dd($product);
        $product->save();
        return redirect('admin/home')->with('status', 'save data');
    }

    //------------ Get Product data by Id-------------//
    public function edit($id)
    {
        $product = Product::find($id);
        return view('Admin.edit', compact('product'));
    }
    //--------------- Uplate product data--------------//
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'orignalprice' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->orignalprice = $request->input('orignalprice');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        if ($request->hasfile('product_image')) {
            $destination = 'uploads/products/' . $product->product_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('product_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/products/', $filename);
            $product->product_image = $filename;
        }
        $product->update();
        return redirect('admin/home')->with('status', 'update data');
    }
    //----------------Delete Product Data-----------//
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back()->with('success', 'Post deleted successfully');
    }
    //------------------Get login user ------------//
    public function user()
    {
        $user = DB::table('users')
            ->select('*')
            ->where('is_admin', 'user')
            ->orderBy('id', 'asc')
            ->get();
        return view('Admin.user', compact('user'));
    }

    //--------------------Oredres-------//
    public function order()
    {
        $abc = abc::all();
        return view('Admin.adminorder', compact('abc'));
    }
    //--------------Change Status---------------//
    public function changeStatus(Request $request)
    {
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->save();
        return response()->json(['success' => 'Status change successfully.']);
    }

    //--------------view Detail-----------//
    public function view($id)
    {

        $product = Product::find($id);
        // dd($product);
        return view('Admin.view-product', compact('product'));
    }

}