<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin/index',[WebsiteController::class, 'adminIndexPage'])->name('admin-index');


// Query Parameters
// /home?name=zain&email=abc%20%gmail.com
// /home/1/edit
// /home/2/edit
// /home/3/edit
