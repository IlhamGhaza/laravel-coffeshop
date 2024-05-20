<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $categories = DB::table('categories')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->paginate(5);


        return view('pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category successfully created');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',

        ]);

        $category = Category::find($id);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,

        ]);
        return redirect()->route('category.index')->with('success', 'Data Berhasil Di Ubah');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Category::find($id);

        if (!$data) {
            return redirect()->route('category.index')->with('error', 'Data Tidak Ditemukan');
        }

        $data->delete();
        return redirect()->route('category.index')->with('success', 'Data Berhasil Di Hapus');
    }
}
