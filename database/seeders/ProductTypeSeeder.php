<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Type;

class ProductTypeSeeder extends Seeder {
    public function run(): void {
        $productTypes = [
            ['product_name' => 'Alienware Aurora R11', 'type_name' => 'Gaming PC'],
            ['product_name' => 'HP Z8 G4 Workstation', 'type_name' => 'Workstation'],
            ['product_name' => 'Apple iMac 27-inch', 'type_name' => 'All-in-One'],
            ['product_name' => 'Intel NUC 10 Performance Kit', 'type_name' => 'Mini PC'],
            ['product_name' => 'Dell OptiPlex 7080', 'type_name' => 'Desktop'],
            ['product_name' => 'MacBook Pro 16-inch', 'type_name' => 'Laptop'],
            ['product_name' => 'ASUS ROG Strix G15', 'type_name' => 'Gaming PC'],
            ['product_name' => 'Lenovo ThinkPad X1 Carbon', 'type_name' => 'Laptop'],
            ['product_name' => 'Microsoft Surface Studio 2', 'type_name' => 'All-in-One'],
            ['product_name' => 'HP EliteDesk 800 G6', 'type_name' => 'Desktop'],
        ];

        foreach ($productTypes as $productType) {
            $product = Product::where('name', $productType['product_name'])->first();
            $type = Type::where('name', $productType['type_name'])->first();

            if ($product && $type) {
                $product->types()->attach($type->id);
            }
        }
    }
}