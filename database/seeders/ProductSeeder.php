<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder {
    public function run(): void {
        $products = [
            [
                'name' => 'Alienware Aurora R11',
                'brand' => 'Dell',
                'price' => 2499.99,
                'description' => 'High performance gaming PC with NVIDIA GeForce RTX 3080.'
            ],
            [
                'name' => 'HP Z8 G4 Workstation',
                'brand' => 'HP',
                'price' => 3499.99,
                'description' => 'Powerful workstation with dual Intel Xeon processors.'
            ],
            [
                'name' => 'Apple iMac 27-inch',
                'brand' => 'Apple',
                'price' => 1799.99,
                'description' => 'All-in-One PC with Retina 5K display and Intel Core i7.'
            ],
            [
                'name' => 'Intel NUC 10 Performance Kit',
                'brand' => 'Intel',
                'price' => 699.99,
                'description' => 'Compact mini PC with Intel Core i5 processor.'
            ],
            [
                'name' => 'Dell OptiPlex 7080',
                'brand' => 'Dell',
                'price' => 999.99,
                'description' => 'Reliable desktop PC for business use with Intel Core i5.'
            ],
            [
                'name' => 'MacBook Pro 16-inch',
                'brand' => 'Apple',
                'price' => 2399.99,
                'description' => 'High performance laptop with Apple M1 Pro chip.'
            ],
            [
                'name' => 'ASUS ROG Strix G15',
                'brand' => 'ASUS',
                'price' => 1499.99,
                'description' => 'Gaming laptop with AMD Ryzen 9 and NVIDIA GeForce RTX 3070.'
            ],
            [
                'name' => 'Lenovo ThinkPad X1 Carbon',
                'brand' => 'Lenovo',
                'price' => 1299.99,
                'description' => 'Ultra-light business laptop with Intel Core i7.'
            ],
            [
                'name' => 'Microsoft Surface Studio 2',
                'brand' => 'Microsoft',
                'price' => 3499.99,
                'description' => 'All-in-One PC with 28-inch PixelSense display and Intel Core i7.'
            ],
            [
                'name' => 'HP EliteDesk 800 G6',
                'brand' => 'HP',
                'price' => 1199.99,
                'description' => 'High performance desktop PC for enterprise use.'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}