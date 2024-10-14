<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['brand_name' => 'Dell', 'slug' => 'dell'],
            ['brand_name' => 'HP', 'slug' => 'hp'],
            ['brand_name' => 'Lenovo', 'slug' => 'lenovo'],
            ['brand_name' => 'Apple', 'slug' => 'apple'],
            ['brand_name' => 'Acer', 'slug' => 'acer'],
            ['brand_name' => 'Asus', 'slug' => 'asus'],
            ['brand_name' => 'Microsoft', 'slug' => 'microsoft'],
            ['brand_name' => 'Razer', 'slug' => 'razer'],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'brand_name' => $brand['brand_name'],
                'slug' => $brand['slug'],
            ]);
        }
    }
}
