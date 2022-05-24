<?php

namespace App\Http\Controllers;

use App\Models\abc;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('Admin.product', compact('product'));
    }
    public function create()
    {
        return view('Admin.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'product_image' => 'required',
            'category' => 'required',
        ]);

        // dd($request->all());
        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        if ($request->hasfile('product_image')) {
            $file = $request->file('product_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/products/', $filename);
            $product->product_image = $filename;
        }

        $product->save();
        return redirect('admin/home')->with('status', 'save data');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('Admin.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
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
    public function destroy($id)
    {
        $product = Product::find($id);
        $destination = 'uploads/products/' . $product->product_image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $product->delete();
        return redirect()->back()->with('status', 'delete data');
    }
    public function user()
    {
        $user = User::all();
        return view('Admin.user', compact('user'));
    }
    public function order()
    {
        $abc = abc::all();
        return view('Admin.adminorder', compact('abc'));
    }
    public function changeStatus(Request $request)
    {
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

}