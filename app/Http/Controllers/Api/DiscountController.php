<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{


    public function index()
    {
        $discounts = Discount::all();
        return response(['message' => 'success', 'data' => $discounts], 200);
    }

    // store
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'type' => 'required',
            'value' => 'required',
            'status' => 'nullable|in:active,inactive',
            'expired_date' => 'nullable'
        ]);

        $discounts = Discount::create($request->all());

        return response()->json(['status' => 'success', 'data' => $discounts], 200);
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'type' => 'required',
            'value' => 'required',
            'status' => 'nullable|in:active,inactive',
            'expired_date' => 'nullable'
        ]);

        $discounts = Discount::where('id', $request->id)->first();

        if (!$discounts) {
            return response()->json(['status' => 'error', 'message' => 'Discount not found'], 404);
        }

        $discounts = Discount::where('id', $request->id)->update($request->all());

        return response()->json(['status' => 'success', 'data' => $discounts], 200);
    }
}
