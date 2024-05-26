<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
     {
         $discounts = DB::table('discounts')
             ->when($request->input('name'), function ($query, $name) {
                 return $query->where('name', 'like', '%' . $name . '%');
             })
             ->paginate(5);
         return view('pages.discount.index', compact('discounts'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Discount::create($data);
        return redirect()->route('discount.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        return view('pages.discount.edit', compact('discount'));
    }

    //update
    public function update(Request $request, Discount $discount)
    {
        $data = $request->all();
        $discount->update($data);
        return redirect()->route('discount.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('discount.index');
    }
}
