<?php
//app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Type;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewAll() {
        $products = Product::with('types')->get();

        return view('home', compact('products'));
    }

    public function add(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'price'=> $request->input('price'),
            'description' => $request->input('description'),
        ]);

        $types = Type::where('name', $request->input('type'))->get();
        $product->types()->attach($types);

        return redirect(url('/'))->with('success', 'Product created successfully');
    }
    
    public function edit(Request $request) {
        $product = Product::findOrFail($request->input('id'));

        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $product->update([
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);

        $types = Type::where('name', $request->input('type'))->get();
        $product->types()->sync($types);

        return redirect(url('/'))->with('success', 'Product updated successfully');
    }

    
    public function delete(Request $request) {
        $product = Product::findOrFail($request->input('id'));

        $product->types()->detach();
        $product->delete();

        return redirect(url('/'))->with('success', 'Product deleted successfully');
    }
}
