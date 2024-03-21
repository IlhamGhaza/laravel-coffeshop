<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(){

        $discounts= Discount::all();

        return response()->json([
            'status'=> 'success',
            'data'=>$discounts
        ],200);
    }

    public function store(Request $request){
          //validate request
          $request->validate([
            'name' => 'required',
            'description' => 'required',
            'value' => 'required',
        ]);
        $discount = Discount::create($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $discount
        ], 201);
    }

    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'value' => 'required',
        ]);

        $discount = Discount::findOrFail($id);
        $discount->update($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $discount
        ], 200);
    }

    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Discount deleted successfully'
        ], 200);
    }
}
