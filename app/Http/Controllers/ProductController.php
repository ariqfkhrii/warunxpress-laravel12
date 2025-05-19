<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::inRandomOrder()->get();

        return view('products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'category' => 'in:food,beverage,household,healthcare,personalcare',
                'price' => 'required|numeric',
                'description' => 'required|string',
                'stock' => 'required|numeric',
                'stock_alert_at' => 'required|numeric',
                'image_url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5120',
            ],
            [
                'name.required' => 'Nama harus diisi.',
                'name.max' => 'Nama produk maksimal 255 karakter.',
                'category.in' => 'Kategori produk harus salah satu dari: food, beverage, household, healthcare, dan personal care',
                'price.required' => 'Harga barang harus diisi.',
                'stock.required' => 'Stok produk harus diisi.',
                'stock_alert_at' => 'Peringatan ketika stok telah mencapai batasan tertentu,',
                'image_url.max' => 'Foto maksimal 2MB',
                'image_url.mimes' => 'File ekstensi hanya bisa jpg, png, jpeg, gif, svg',
                'image_url.image' => 'File harus berbentuk image'
            ]
        );

        if (!empty($request->image_url)) {
            $fileName = 'photo-' . uniqid() . '.' . $request->image_url->extension();
            $request->image_url->move(public_path('image'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }

        DB::table('products')->insert([
            'name' => $request->name,
            'category' => $request->category,
            'code' => uniqid(),
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'stock_alert_at' => $request->stock_alert_at,
            'image_url' => $fileName,
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'category' => 'in:food,beverage,household,healthcare,personalcare',
                'price' => 'required|numeric',
                'description' => 'required|string',
                'stock' => 'required|numeric',
                'stock_alert_at' => 'required|numeric',
                'image_url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5120',
            ],
            [
                'name.required' => 'Nama harus diisi.',
                'name.max' => 'Nama produk maksimal 255 karakter.',
                'category.in' => 'Kategori produk harus salah satu dari: food, beverage, household, healthcare, dan personal care',
                'price.required' => 'Harga barang harus diisi.',
                'stock.required' => 'Stok produk harus diisi.',
                'stock_alert_at' => 'Peringatan ketika stok telah mencapai batasan tertentu,',
                'image_url.max' => 'Foto maksimal 2MB',
                'image_url.mimes' => 'File ekstensi hanya bisa jpg, png, jpeg, gif, svg',
                'image_url.image' => 'File harus berbentuk image'
            ]
        );

        $oldImage = DB::table('products')
            ->select('image_url')
            ->where('id', $product->id)
            ->first();

        if (!empty($request->image_url)) {
            $fileName = 'photo-' . uniqid() . '.' . $request->image_url->extension();
            $request->image_url->move(public_path('image'), $fileName);
        } else {
            $fileName = $oldImage->imageUrl;
        }

        DB::table('products')->where('id', $product->id)->update([
            'name' => $request->name,
            'category' => $request->category,
            'code' => uniqid(),
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'stock_alert_at' => $request->stock_alert_at,
            'image_url' => $fileName,
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Data berhasil dihapus');
    }
}
