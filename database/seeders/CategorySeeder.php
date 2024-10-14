<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Gaming PC', 'color' => 'blue'],
            ['name' => 'Workstation', 'color' => 'red'],
            ['name' => 'All-in-One', 'color' => 'green'],
            ['name' => 'Mini PC', 'color' => 'purple'],
            ['name' => 'Desktop', 'color' => 'orange'],
            ['name' => 'Laptop', 'color' => 'yellow'],
        ];        

        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'color' => $category['color'], 
            ]);
        }
    }
}
