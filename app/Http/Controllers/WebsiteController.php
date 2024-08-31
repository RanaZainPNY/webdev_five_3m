<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //

    public function index()
    {
        return view('web.index');
    }
    public function homePage()
    {
        // Hard coded data
        // $products = [
        //     ["id" => 1, 'title' => "jeans pair", 'description' => "lorem ei s;ads a asdkfjd a"],
        //     ["id" => 2, 'title' => "kurta shalwar", 'description' => "Hello World 23"],
        //     ["id" => 3, 'title' => "abc", 'description' => "main afsdkf afsna ksd"]
        // ];

        // model ====> database
        $products = Product::all();
        $fruits = ["orange", "mango", "apple"];
        // dd($array);
        // return 233;

        return view('home', [
            'fruit_data' => $fruits,
            'products' => $products
        ]);
    }

    public function cartPage()
    {
        return view('web.cart');
    }
    public function webmaster()
    {
        return view('web.webmaster');
    }

    public function shopPage()
    {
        return view('web.shop');
    }
    public function checkoutPage()
    {
        return view('web.checkout');
    }
    public function shopdetailPage()
    {
        return view('web.shopdetail');
    }

    public function adminIndexPage()
    {
        return view('admin.index');
    }
}
