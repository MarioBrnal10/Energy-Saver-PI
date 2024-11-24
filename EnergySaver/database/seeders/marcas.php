<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class marcas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marcas')->insert([
            ['Nombre' => 'Samsung'],
            ['Nombre' => 'LG'],
            ['Nombre' => 'Whirlpool'],
            ['Nombre' => 'Bosch'],
            ['Nombre' => 'Miele'],
        ]);
    }
}
