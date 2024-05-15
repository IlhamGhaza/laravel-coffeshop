<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //index api
    public function index()
    {
        //get all products
        $products = Product::all();
        //load category
        $products->load('category');
        // $products = Product::paginate(10);
        return response()->json([
            'status' => 'success',
            'data' => $products
        ], 200);
    }
    //store product
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->is_favorite = $request->is_favorite;
        $product->save();
        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Product Created',
                'data' => $product
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product Failed to Save',
            ], 409);
        }
    }


    //show product api
    public function show(string $id)
    {
        $product = Product::find($id);
        $product->load('category');
        return response()->json([
            'status' => 'success',
            'data' => $product
        ], 200);
    }

    //update product api
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->is_favorite = $request->is_favorite;
        $product->save();
        return response()->json([
            'status' => 'success',
            'data' => $product
        ], 200);
    }

    //delete product api
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json([
            'status' => 'success',
            'data' => $product
        ], 200);
    }



}
