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

Route::get("/web", [WebsiteController::class, 'index'])->name('web-index');


Route::get("/home", [WebsiteController::class, 'homePage'])->name('web-home');
// Route::put("/home/{id}", [WebsiteController::class, 'homePage'])->name('web-home');
// GET, PUT, POST, DELETE


// Query Parameters
// /home?name=zain&email=abc%20%gmail.com
// /home/1/edit
// /home/2/edit
// /home/3/edit
