<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;

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
        $products = Product::all();

        return view('web.shop', [
            'products' => $products
        ]);
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
        // Database
        $products = Product::all();
        return view('admin.index', [
            'products' => $products
        ]);
    }
    public function adminMasterPage()
    {
        return view('admin.adminmaster');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        // Session Based Cart
        $cart = session()->get('cart');

        // Cart  Structure
        // $cart = [
        //     '18' => [ 'name' => 'abc', 'price' => 339,'sku'=> 'k33kd', 'description'=> 'lorem ipsum', 'image' => '3939339.jpg', quantity=> 1],
        //     '20' => [ 'name' => 'abc', 'price' => 339,'sku'=> 'k33kd', 'description'=> 'lorem ipsum', 'image' => '3939339.jpg', quantity=> 2],
        // ]

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "sku" => $product->sku,
                "price" => $product->price,
                "description" => $product->description,
                "image" => $product->image,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }

    function cartProducts()
    {
        $cart = session()->get('cart');
        dd($cart);
    }

    function removeFromCart($id)
    {
        // dd($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        // session()->flash('success', "Product removed successfully");
        return redirect()->back();
    }

    function placeorder(Request $request)
    {
        $cart = session()->get('cart');
        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['quantity'] * $details['price'];
        }

        // Order -> Firstname, Lastname, Address, Mobile, Email, Notes, Total
        // Create a new order
        $order = new Order();
        // Add data relevant to the request
        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->address = $request->address;
        $order->contact = $request->contact;
        $order->email = $request->email;
        $order->notes = $request->notes;
        $order->total = $total;
        $order->save();

        // Clear cart after placing order
        session()->forget('cart');
        // return redirect()->route('web-home')->with('success', 'order placed successfully');
        return redirect()->back()->with('success', 'order placed successfully');

    }


    function orders()
    {
        $orders = Order::all();
        return view('admin.orders', [
            'orders' => $orders
        ]);
    }

    function orderdelivered($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back();
    }

    function apiresponse()
    {
        $orders = Order::all();
        // return response()->json([
        //     'name' => "laravel api",
        //     'status' => true,
        // ], 200);
        return response()->json($orders, 200);
    }
}
