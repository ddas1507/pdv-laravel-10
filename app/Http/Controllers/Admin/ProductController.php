<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $products = $product->all();
        //dd($products);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProduct $storeUpdateProduct, Request $request, Product $product)
    {
        $data = $request->validated();
        $data['status'] = isset($data['status']) ? 1 : 0;

        $product = $product::create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string|int $product)
    {
        //Product::find($product);
        //Product::where('id', $product)->first();
        //Product::where('id', '==', $product)->first();

        if(!$product = Product::find($product)){
            return redirect()->route('products.index');
        }

        return view('admin.products.show', compact('product'));


        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string|int $product)
    {
        //Product::find($product);
        //Product::where('id', $product)->first();
        //Product::where('id', '==', $product)->first();
        if(!$product = Product::where('id', $product)->first()){
            return redirect()->route('products.index');
        }
        return view('admin.products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(StoreUpdateProduct $storeUpdateProduct, Request $request, string|int $product)
    {
        if(!$product = Product::find($product)){
            return redirect()->route('products.index');
        }
        $product->update($request->validated());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $product)
    {
        if(!$product = Product::find($product)){
            return redirect()->route('products.index');
        }
        $product->delete();
        return redirect()->route('products.index');
    }
}
