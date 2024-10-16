<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder {
    public function run(): void {
        $types = [
            ['name' => 'Gaming PC', 'description' => 'A high-performance computer designed for gaming.'],
            ['name' => 'Workstation', 'description' => 'A powerful computer designed for professional work.'],
            ['name' => 'All-in-One', 'description' => 'A computer where all components are housed in the same case as the monitor.'],
            ['name' => 'Mini PC', 'description' => 'A small, compact computer.'],
            ['name' => 'Desktop', 'description' => 'A personal computer designed for regular use at a single location.'],
            ['name' => 'Laptop', 'description' => 'A portable computer that can be used in various locations.']
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}