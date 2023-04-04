<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class coordinacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coordinacion')->insert([
            'nombre' =>  'Victoria',
        ]);

        DB::table('coordinacion')->insert([
            'nombre' =>  'Mante',
        ]);

        DB::table('coordinacion')->insert([
            'nombre' =>  'Matamoros',
        ]);

        DB::table('coordinacion')->insert([
            'nombre' =>  'Nuevo Laredo',
        ]);

        DB::table('coordinacion')->insert([
            'nombre' =>  'Reynosa',
        ]);

        DB::table('coordinacion')->insert([
            'nombre' =>  'Madero',
        ]);
    }
}
