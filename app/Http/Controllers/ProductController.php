<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        if ($request->image != "") {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext; // Unique image name;

            // save image to products directory
            $image->move(public_path('/uploads/products'), $imageName);

            // save image in the database
            $product->image = $imageName;
            $product->save();
        }


        return redirect()->route('admin-index');
        // dd('store method called');
    }

    function destroy($id)
    {
        // dd($id);
        $product = Product::findOrFail($id);
        // dd($product);

        if ($product->image != "") {
            // delete associated image file
            File::delete(public_path('/uploads/products/' . $product->image));
        }
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


    function update($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {
            // delete old image
            File::delete(public_path('uploads/products/' . $product->image));
            // Create new image file name
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // unique Image Name

            //save image to the public directory
            $image->move(public_path('uploads/products/'), $imageName);
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('admin-index');
    }
}
