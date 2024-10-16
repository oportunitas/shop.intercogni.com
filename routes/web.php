<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

// Route::get('/', function () {
//     $products = Product::all();
//     return view('home', ['products' => $products]);
// });

Route::get('/', [ProductController::class, 'viewAll']);
Route::post('/products/add', [ProductController::class, 'add'])->name('products.add');
Route::post('/products/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::delete('/products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
