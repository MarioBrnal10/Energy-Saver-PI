<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class modelos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modelos')->insert([
            // Samsung
            ['Nombre' => 'RT38K5930S8', 'id_marca' => 1],
            ['Nombre' => 'RT50K6351BS', 'id_marca' => 1],
            ['Nombre' => 'RT28K3082S8', 'id_marca' => 1],
            ['Nombre' => 'WW80J5555FX', 'id_marca' => 1],
            ['Nombre' => 'WW90K6410QW', 'id_marca' => 1],
            ['Nombre' => 'DV90M5200QW', 'id_marca' => 1],
            ['Nombre' => 'DW80R9950US', 'id_marca' => 1],
            ['Nombre' => 'NV75N5641RS', 'id_marca' => 1],
            ['Nombre' => 'MC35J8055CK', 'id_marca' => 1],
            ['Nombre' => 'MG23K3513AK', 'id_marca' => 1],

            // LG
            ['Nombre' => 'GL-T292RBCY', 'id_marca' => 2],
            ['Nombre' => 'GL-D302RPJL', 'id_marca' => 2],
            ['Nombre' => 'FHM1408BDL', 'id_marca' => 2],
            ['Nombre' => 'FH4U2TDHP4N', 'id_marca' => 2],
            ['Nombre' => 'RC90V9AV2Q', 'id_marca' => 2],
            ['Nombre' => 'DFB325HS', 'id_marca' => 2],
            ['Nombre' => 'HBJ558YB0Z', 'id_marca' => 2],
            ['Nombre' => 'MC8087PRR', 'id_marca' => 2],
            ['Nombre' => 'MJ2886BFUM', 'id_marca' => 2],
            ['Nombre' => 'GN-B202SQBB', 'id_marca' => 2],

            // Whirlpool
            ['Nombre' => 'WRX735SDHZ', 'id_marca' => 3],
            ['Nombre' => 'WFW6620HC', 'id_marca' => 3],
            ['Nombre' => 'WDT970SAHZ', 'id_marca' => 3],
            ['Nombre' => 'WOS72EC0HS', 'id_marca' => 3],
            ['Nombre' => 'WED6620HC', 'id_marca' => 3],
            ['Nombre' => 'WRF555SDFZ', 'id_marca' => 3],
            ['Nombre' => 'WED6620HS', 'id_marca' => 3],
            ['Nombre' => 'WMH32519HZ', 'id_marca' => 3],
            ['Nombre' => 'WRS325SDHZ', 'id_marca' => 3],
            ['Nombre' => 'WDT750SAHZ', 'id_marca' => 3],

            // Bosch
            ['Nombre' => 'KGN39VL35', 'id_marca' => 4],
            ['Nombre' => 'WAN28281ES', 'id_marca' => 4],
            ['Nombre' => 'SMS46MI08E', 'id_marca' => 4],
            ['Nombre' => 'HBG675BB1', 'id_marca' => 4],
            ['Nombre' => 'WTW87640ES', 'id_marca' => 4],
            ['Nombre' => 'KGV36VW31', 'id_marca' => 4],
            ['Nombre' => 'HBN301E2', 'id_marca' => 4],
            ['Nombre' => 'SMS88TI36E', 'id_marca' => 4],
            ['Nombre' => 'KGN36AI32', 'id_marca' => 4],
            ['Nombre' => 'SMV46MX03E', 'id_marca' => 4],

            // Miele
            ['Nombre' => 'KFN 28132', 'id_marca' => 5],
            ['Nombre' => 'WDB 030', 'id_marca' => 5],
            ['Nombre' => 'G 7100 SC', 'id_marca' => 5],
            ['Nombre' => 'H 2265-1 B', 'id_marca' => 5],
            ['Nombre' => 'TWF 500 WP', 'id_marca' => 5],
            ['Nombre' => 'H 2760 BP', 'id_marca' => 5],
            ['Nombre' => 'H 2860 BP', 'id_marca' => 5],
            ['Nombre' => 'KM 7464 FR', 'id_marca' => 5],
            ['Nombre' => 'WED1350FW', 'id_marca' => 5],
            ['Nombre' => 'TDB220WP', 'id_marca' => 5],
        ]);
    }
}
