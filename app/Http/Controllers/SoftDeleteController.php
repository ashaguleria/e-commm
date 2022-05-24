<?php

namespace App\Http\Controllers;

use App\Models\softdelete;
use Illuminate\Http\Request;

class SoftDeleteController extends Controller
{
    public function index(Request $request)
    {
        $softdeletes = softdelete::get();
        if ($request->has('view_deleted')) {
            $softdeletes = softdelete::onlyTrashed()->get();
        }
        return view('SoftDelete.softdelete', compact('softdeletes'));
    }
    public function delete($id)
    {
        softdelete::find($id)->delete();
        return back()->with('success', 'Post deleted successfully');
    }
}