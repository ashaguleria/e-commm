<?php

namespace App\Http\Controllers;

use App\Models\tableone;
use App\Models\tablethree;
use App\Models\tabletwo;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function index()
    {
        $tableone = tableone::all();
        $tabletwo = tabletwo::all();

        return view('relationships.first', compact('tableone', 'tabletwo'));
    }
    public function create(Request $request)
    {
        $tableone = new tableone;
        $tableone->name = $request->input('name');
        $tableone->email = $request->input('email');
        $tableone->save();
        return redirect('first')->with('status', 'save data');

    }
    // public function second()
    // {
    //     $tableone = tableone::all();

    //     return view('relationships.second', compact('tableone'));
    // }
    public function store(Request $request)
    {
        $tabletwo = new tabletwo;
        $tabletwo->address = $request->input('address');
        $tabletwo->table_id = $request->input('table_id');
        $tabletwo->save();
        return redirect('first')->with('status', 'save data');

    }

    public function save(Request $request)
    {
        $tablethree = new tablethree;
        $tablethree->tableone_id = $request->input('tableone_id');
        $tablethree->tabletwo_id = $request->input('tabletwo_id');
        $tablethree->save();
        return redirect('first')->with('status', 'save data');

    }
}