<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->truncate();

        DB::table('products')->insert([
            [
                'name' => 'Laptop Pro 14 inch',
                'description' => 'Laptop canggih untuk profesional.',
                'price' => 15000000,
                'category' => 'Elektronik',
                'image_url' => 'https://via.placeholder.com/400x300.png/0088cc?text=Laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smartphone Flagship X',
                'description' => 'Smartphone dengan kamera terbaik.',
                'price' => 8500000,
                'category' => 'Elektronik',
                'image_url' => 'https://via.placeholder.com/400x300.png/00cc44?text=Smartphone',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kemeja Flanel Kotak',
                'description' => 'Kemeja flanel lengan panjang yang cocok untuk gaya kasual.',
                'price' => 250000,
                'category' => 'Pakaian',
                'image_url' => 'https://via.placeholder.com/400x300.png/cc0022?text=Kemeja',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}