<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::create([
            'name' => 'El Admin',
            'username' => 'admin',
            'email' => 'VJqQa@example.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_admin' => true
        ]);

    }
}
