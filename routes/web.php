<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

use App\Http\Controllers\ProductController;


use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', function () {
    $products = Product::all();
    return view('home', ['products' => $products]);
});



route::resource('products', ProductController::class);