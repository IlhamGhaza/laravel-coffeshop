<?php

namespace App\Http\Controllers;

use App\Models\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $inventories = DB::table('inventories')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->paginate(5);
        return view('pages.inventory.index', compact('inventories'));
    }

    //create
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.inventory.create');

    }

   //store
    public function store(Request $request)
    {
        $data = $request->all();
        Inventory::create($data);
        return redirect()->route('inventory.index');
    }


    //display
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        return view('pages.inventory.edit', compact('inventory'));
    }

    //update
    public function update(Request $request, Inventory $inventory)
    {
        $data = $request->all();
        $inventory->update($data);
        return redirect()->route('inventory.index');
    }

    //destroy
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory.index');
    }
}
