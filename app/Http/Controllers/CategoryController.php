<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{

    //-------------- get data from database ------------//
    public function index()
    {
        $category = Category::get();
        return view('Admin.Categoryproduct', compact('category'));
    }
    //------------------Status Check------------------------//
    public function Status(Request $request)
    {
        DB::table('categories')->where('id', $request->id)->update(['status' => $request->status]);

        // $category = Category::find($request->id);
        // $category->status = $request->status;
        // $category->save();
        return response()->json(['success' => 'Status change successfully.']);
    }
    //------------------- Save Data -------------------//
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        // dd($request->all());
        $category = new Category;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/products/', $filename);
            $category->image = $filename;
        }
        $category->save();
        return redirect('categoryproduct')->with('status', 'save data');
    }

    //------------------- Update data ----------------//
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        // dd($request->all());
        $category = Category::findOrFail($request->id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        // echo "<pre>";
        // print_r($category);
        // die;
        if ($request->hasfile('image')) {
            $destination = 'uploads/products/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/products/', $filename);
            $category->image = $filename;
        }
        $category->update();
        return redirect('categoryproduct')->with('status', 'update data');
    }
    //-----------Delete---------//
    public function destroy($id)
    {
        Category::find($id)->delete();
        return back()->with('success', 'Post deleted successfully');

    }
}