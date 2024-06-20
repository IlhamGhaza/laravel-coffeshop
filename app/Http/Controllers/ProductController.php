<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::paginate(5);
        return view('pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/products', $filename);

        $product = new \App\Models\Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = (int) $request->price;
        $product->stock = (int) $request->stock;
        $product->category_id = $request->category_id;
        $product->image = $filename;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product successfully created');
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
    public function edit(string $id)
    {
        $product = Product::findOrfail($id);
        $categories = Category::all();
        return view('pages.product.edit', compact('categories', 'product'));
    }

    /**@cannot ('update', Model::class)

    @endcannot
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // 'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id', // Pastikan kategori yang dipilih ada di tabel categories
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah menjadi nullable karena tidak selalu diubah
        ]);

        // Cari produk berdasarkan ID
        $product = \App\Models\Product::findOrFail($id);

        // Simpan gambar baru jika ada yang diunggah
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/products', $filename);
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::delete('public/products/' . $product->image);
            }
            $product->image = $filename;
        }

        // Perbarui data produk
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = (int) $request->price;
        // $product->stock = (int) $request->stock;
        $product->category_id = $request->category_id;

        // Simpan perubahan
        $product->save();

        // Redirect ke halaman index produk dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Product successfully updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = Product::findOrFail($id);
        $user->delete();
        return redirect()->route('product.index');
    }

    public function get()
    {
        $products = Product::all();
        $products->load('category');
        return response()->json(['status'=>200, 'data' => $products], 200);
    }
}
