<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat_elektronik = DB::table('categories')->insertGetId([
            'name' => 'Elektronik',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $cat_pakaian = DB::table('categories')->insertGetId([
            'name' => 'Pakaian',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $cat_makanan = DB::table('categories')->insertGetId([
            'name' => 'Makanan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
        [
            'category_id' => $cat_elektronik,
            'name' => 'Laptop',
            'description' => 'Laptop Gaming',
            'price' => 1000000,
            'stock' => 10,
            'image' => 'https://via.placeholder.com/300',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'category_id' => $cat_pakaian,
            'name' => 'Pakaian',
            'description' => 'Pakaian',
            'price' => 1000000,
            'stock' => 10,
            'image' => 'https://via.placeholder.com/300',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'category_id' => $cat_makanan,
            'name' => 'Makanan',
            'description' => 'Makanan',
            'price' => 1000000,
            'stock' => 10,
            'image' => 'https://via.placeholder.com/300',
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);
    }
}
