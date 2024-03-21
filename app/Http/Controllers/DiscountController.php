<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;

class DiscountController extends Controller
{
    // index
    public function index()
    {
        $discounts = Discount::all();
        return view('pages.discounts.index', compact('discounts'));
    }
    //create
    public function create()
    {
        return view('pages.discounts.create');
    }
	//store
	public function store(Request $request)
	{
		$discount = new Discount();
		$discount->name = $request->name;
		$discount->description = $request->description;
		$discount->type = $request->type;
		$discount->value = $request->value;
		$discount->status = $request->status;
		$discount->expired_date = $request->expired_date;
		$discount->save();
        return redirect()->route('discounts.index')->with('success', 'Discount created successfully');
    }

    // edit
    public function edit($id)
    {
        $discount = Discount::find($id);
        return view('pages.discounts.edit', compact('discount'));
    }

    // update
    public function update(Request $request, $id)
    {
        $discount = Discount::find($id);
        $discount->name = $request->name;
        $discount->description = $request->description;
        $discount->type = $request->type;
        $discount->value = $request->value;
        $discount->status = $request->status;
        $discount->expired_date = $request->expired_date;
        $discount->save();
        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully');
    }

    // destroy
    public function destroy($id)
    {
        $discount = Discount::find($id);
        $discount->delete();
        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully');
    }
}
