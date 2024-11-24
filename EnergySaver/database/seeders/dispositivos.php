<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dispositivos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('electrodomesticos')->insert([
            // Samsung
            ['Potencia' => 150, 'id_tipo' => 1, 'id_marca' => 1, 'id_modelo' => 1],
            ['Potencia' => 170, 'id_tipo' => 1, 'id_marca' => 1, 'id_modelo' => 2],
            ['Potencia' => 160, 'id_tipo' => 2, 'id_marca' => 1, 'id_modelo' => 3],
            ['Potencia' => 2000, 'id_tipo' => 2, 'id_marca' => 1, 'id_modelo' => 4],
            ['Potencia' => 2100, 'id_tipo' => 5, 'id_marca' => 1, 'id_modelo' => 5],
            ['Potencia' => 1200, 'id_tipo' => 3, 'id_marca' => 1, 'id_modelo' => 6],
            ['Potencia' => 2500, 'id_tipo' => 4, 'id_marca' => 1, 'id_modelo' => 7],
            ['Potencia' => 1800, 'id_tipo' => 2, 'id_marca' => 1, 'id_modelo' => 8],
            ['Potencia' => 3000, 'id_tipo' => 5, 'id_marca' => 1, 'id_modelo' => 9],
            ['Potencia' => 3200, 'id_tipo' => 5, 'id_marca' => 1, 'id_modelo' => 10],

            // LG
            ['Potencia' => 140, 'id_tipo' => 1, 'id_marca' => 2, 'id_modelo' => 11],
            ['Potencia' => 130, 'id_tipo' => 1, 'id_marca' => 2, 'id_modelo' => 12],
            ['Potencia' => 2000, 'id_tipo' => 2, 'id_marca' => 2, 'id_modelo' => 13],
            ['Potencia' => 1800, 'id_tipo' => 2, 'id_marca' => 2, 'id_modelo' => 14],
            ['Potencia' => 1400, 'id_tipo' => 3, 'id_marca' => 2, 'id_modelo' => 15],
            ['Potencia' => 2500, 'id_tipo' => 4, 'id_marca' => 2, 'id_modelo' => 16],
            ['Potencia' => 1900, 'id_tipo' => 5, 'id_marca' => 2, 'id_modelo' => 17],
            ['Potencia' => 3500, 'id_tipo' => 5, 'id_marca' => 2, 'id_modelo' => 18],
            ['Potencia' => 3400, 'id_tipo' => 5, 'id_marca' => 2, 'id_modelo' => 19],
            ['Potencia' => 3300, 'id_tipo' => 5, 'id_marca' => 2, 'id_modelo' => 20],

            // Whirlpool
            ['Potencia' => 150, 'id_tipo' => 1, 'id_marca' => 3, 'id_modelo' => 21],
            ['Potencia' => 180, 'id_tipo' => 1, 'id_marca' => 3, 'id_modelo' => 22],
            ['Potencia' => 2100, 'id_tipo' => 2, 'id_marca' => 3, 'id_modelo' => 23],
            ['Potencia' => 2300, 'id_tipo' => 2, 'id_marca' => 3, 'id_modelo' => 24],
            ['Potencia' => 1600, 'id_tipo' => 3, 'id_marca' => 3, 'id_modelo' => 25],
            ['Potencia' => 2700, 'id_tipo' => 4, 'id_marca' => 3, 'id_modelo' => 26],
            ['Potencia' => 3100, 'id_tipo' => 5, 'id_marca' => 3, 'id_modelo' => 27],
            ['Potencia' => 3200, 'id_tipo' => 5, 'id_marca' => 3, 'id_modelo' => 28],
            ['Potencia' => 3300, 'id_tipo' => 5, 'id_marca' => 3, 'id_modelo' => 29],
            ['Potencia' => 3400, 'id_tipo' => 5, 'id_marca' => 3, 'id_modelo' => 30],

            // Bosch
            ['Potencia' => 110, 'id_tipo' => 1, 'id_marca' => 4, 'id_modelo' => 31],
            ['Potencia' => 130, 'id_tipo' => 1, 'id_marca' => 4, 'id_modelo' => 32],
            ['Potencia' => 1900, 'id_tipo' => 2, 'id_marca' => 4, 'id_modelo' => 33],
            ['Potencia' => 2000, 'id_tipo' => 2, 'id_marca' => 4, 'id_modelo' => 34],
            ['Potencia' => 1350, 'id_tipo' => 3, 'id_marca' => 4, 'id_modelo' => 35],
            ['Potencia' => 2600, 'id_tipo' => 4, 'id_marca' => 4, 'id_modelo' => 36],
            ['Potencia' => 2700, 'id_tipo' => 5, 'id_marca' => 4, 'id_modelo' => 37],
            ['Potencia' => 2800, 'id_tipo' => 5, 'id_marca' => 4, 'id_modelo' => 38],
            ['Potencia' => 2900, 'id_tipo' => 5, 'id_marca' => 4, 'id_modelo' => 39],
            ['Potencia' => 3000, 'id_tipo' => 5, 'id_marca' => 4, 'id_modelo' => 40],

            // Miele
            ['Potencia' => 140, 'id_tipo' => 1, 'id_marca' => 5, 'id_modelo' => 41],
            ['Potencia' => 150, 'id_tipo' => 1, 'id_marca' => 5, 'id_modelo' => 42],
            ['Potencia' => 1800, 'id_tipo' => 2, 'id_marca' => 5, 'id_modelo' => 43],
            ['Potencia' => 2000, 'id_tipo' => 2, 'id_marca' => 5, 'id_modelo' => 44],
            ['Potencia' => 1500, 'id_tipo' => 3, 'id_marca' => 5, 'id_modelo' => 45],
            ['Potencia' => 2800, 'id_tipo' => 4, 'id_marca' => 5, 'id_modelo' => 46],
            ['Potencia' => 2900, 'id_tipo' => 5, 'id_marca' => 5, 'id_modelo' => 47],
            ['Potencia' => 3000, 'id_tipo' => 5, 'id_marca' => 5, 'id_modelo' => 48],
            ['Potencia' => 3100, 'id_tipo' => 5, 'id_marca' => 5, 'id_modelo' => 49],
            ['Potencia' => 3200, 'id_tipo' => 5, 'id_marca' => 5, 'id_modelo' => 50],
        ]);
    }
}
