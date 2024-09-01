<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function create()
    {
        return view('admin.products_create');
    }
    function store(Request $request)
    {
        // dd($request->image);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('admin-index');
        // dd('store method called');
    }

    function destroy($id)
    {
        // dd($id);
        $product = Product::findOrFail($id);
        // dd($product);
        $product->delete();

        return redirect()->route('admin-index');
    }
    function editForm($id)
    {
        // dd($id);
        $product = Product::findOrFail($id);
        return view('admin.products_edit', [
            'product' => $product
        ]);
    }
}
