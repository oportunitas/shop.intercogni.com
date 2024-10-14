<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            BrandSeeder::class
        ]);

        // Product::factory(10)->create();

        Product::factory(5)->recycle([
            Category::all(),
            Brand::all()
        ])->create();

        Product::create([
            'product_name' => 'Product 1',
            'brand_id' => 1,
            'category_id' => 1,
            'price' => 100,
            'stock_quantity' => 10,
            'slug' => 'product-1',
            'description' => 'Product 1 description',
        ]);
    }
}
