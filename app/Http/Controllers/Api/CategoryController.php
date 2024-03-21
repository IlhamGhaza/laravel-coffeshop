<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // index api
    public function index()
    {
        // get all categories
        $categories = Category::all();
        return response()->json([
            'status' => 'success',
            'data' => $categories
        ], 200);
    }
    //create category api
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $request->image;
        $category->save();
        return response()->json([
            'status' => 'success',
            'data' => $category
        ], 200);
    }
    //store category api
    public function show($id)
    {
        $category = Category::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $category
        ], 200);
    }
    //edit category api
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $category
        ], 200);
    }
    //update category api
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $request->image;
        $category->save();
        return response()->json([
            'status' => 'success',
            'data' => $category
        ], 200);
    }
    //destroy category api
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'status' => 'success',
            'data' => $category
        ], 200);
    }

}
