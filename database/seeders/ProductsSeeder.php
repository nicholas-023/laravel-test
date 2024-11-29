<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Daniel Storek',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit assumenda doloremque dolores quod dolor magni?',
                'stock' => 100,
                'price' => 3400000,
            ],
            [
                'name' => 'Thomas Serer',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit assumenda doloremque dolores quod dolor magni?',
                'stock' => 100,
                'price' => 2500000,
            ],
            [
                'name' => 'Luis Felipe Lins',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit assumenda doloremque dolores quod dolor magni?',
                'stock' => 100,
                'price' => 3975000,
            ],
            [
                'name' => 'Solesavy',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit assumenda doloremque dolores quod dolor magni?',
                'stock' => 100,
                'price' => 2400000,
            ],
            [
                'name' => 'Thibaut Burckel',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit assumenda doloremque dolores quod dolor magni?',
                'stock' => 100,
                'price' => 4300000,
            ],
            [
                'name' => 'Wengang Zhai',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit assumenda doloremque dolores quod dolor magni?',
                'stock' => 100,
                'price' => 1750000,
            ],
        ]);
    }
}
