<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\User;
use App\Models\Brand;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productName = fake()->words(1, true);
    
        return [
            'product_name' => $productName,
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 1000),
            'stock_quantity' => fake()->numberBetween(1, 100),
            'slug' => Str::slug($productName),
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),
        ];

        //https://i.ibb.co.com/S5bHHhH/shoespng-parspng-com.png
        // <a href="https://ibb.co.com/mJF9V7t"><img src="https://i.ibb.co.com/JnFvwP2/Samba-OG-Shoes-Kids-White-IE1334-01-standard.webp" alt="Samba-OG-Shoes-Kids-White-IE1334-01-standard" border="0"></a>
    }
    
}
