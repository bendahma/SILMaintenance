<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'ENGIN',
        ]);
        DB::table('types')->insert([
            'name' => 'CAMION',
        ]);
        DB::table('types')->insert([
            'name' => 'VÉHICULE LÉGER',
        ]);
    }
}
