<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/home', function () {
//     return view('home');
// });

// Web Routes
Route::get("/webmaster", [WebsiteController::class, 'webmaster'])->name('web-master');
Route::get("/web/index", [WebsiteController::class, 'index'])->name('web-index');
Route::get("/home", [WebsiteController::class, 'homePage'])->name('web-home');
Route::get("/cart", [WebsiteController::class, 'cartPage'])->name('web-cart');
Route::get("/shop", [WebsiteController::class, 'shopPage'])->name('web-shop');
Route::get("/shopdetail", [WebsiteController::class, 'shopdetailPage'])->name('web-shop-detail');
Route::get("/checkout", [WebsiteController::class, 'checkoutPage'])->name('web-checkout');

// Route::put("/home/{id}", [WebsiteController::class, 'homePage'])->name('web-home');
// GET, PUT, POST, DELETE

// admin Routes

Route::get('/admin/index', [WebsiteController::class, 'adminIndexPage'])->name('admin-index');
Route::get('/admin/master', [WebsiteController::class, 'adminMasterPage'])->name('admin-master');
Route::get('admin/orders', [WebsiteController::class, 'orders'])->name('admin-orders');
Route::get('admin/orders/completed/{id}', [WebsiteController::class, 'orderdelivered'])->name('admin-orders-completed');

Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin-products-create');
Route::post('admin/prouduct/store', [ProductController::class, 'store'])->name('admin-products-store');
Route::get('admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin-products-destroy');
Route::get('admin/product/edit/{id}', [ProductController::class, 'editForm'])->name('admin-products-edit');
Route::post('admin/product/update/{id}', [ProductController::class, 'update'])->name('admin-products-update');

Route::get('/web/addtocart/{id}', [WebsiteController::class, 'addToCart'])->name('web-add-to-cart');
Route::get('/web/cartdisplay', [WebsiteController::class, 'cartProducts'])->name('web-cart-display');
Route::get('/web/removefromcart/{id}', [WebsiteController::class, 'removeFromCart'])->name('web-remove-from-cart');

Route::post('/web/placeorder', [WebsiteController::class, 'placeorder'])->name('web-place-order');
// Query Parameters
// /home?name=zain&email=abc%20%gmail.com
// /home/1/edit
// /home/2/edit
// /home/3/edit

// API
Route::get('/api', [WebsiteController::class, 'apiresponse'])->name('api-route');
