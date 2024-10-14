<?php
//app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;
use App\Models\Product;
 // Assuming you have a Category model
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    
    // Display a listing of the products
    public function store(Request $request)
    {
   

    // Validate the incoming request
    $request->validate([
        'pro_name' => 'required|string|max:255',
        'brand_id' => 'required|exists:brands,id', // Ensure this ID exists in the brands table
        'category_id' => 'required|exists:categories,id', // Ensure this ID exists in the categories table
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
    ]);

    // Create a new product
    $product = Product::create([
        'brand_id' => $request->input('brand_id'),
        'category_id' => $request->input('category_id'),
        'price' => $request->input('price'),
        'stock_quantity' => 10,
        'slug' => Str::slug($request->input('pro_name')),
        'description' => $request->input('description'),
        'product_name' => $request->input('pro_name'),
        'product_name' => $request->input('pro_name'),

    ]);

    //  dd($product::all());

    // Redirect or return a response
    return redirect('/')->with('success', 'Product added successfully.');    }
}
