<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */

     public function index(Request $request)
     {
         $suppliers = DB::table('suppliers')
             ->when($request->input('name'), function ($query, $name) {
                 return $query->where('name', 'like', '%' . $name . '%');
             })
             ->paginate(5);
         return view('pages.supplier.index', compact('suppliers'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Supplier::create($data);
        return redirect()->route('supplier.index');
    }

    //show
    public function show(Supplier $supplier)
    {
        //
    }
    /**
     * edit the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('pages.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->all();
        $supplier->update($data);
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index');
    }
}
