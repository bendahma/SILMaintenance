<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'TEREX',
            'type_id' => 1,
        ]);
        DB::table('categories')->insert([
            'name' => 'CALMAR',
            'type_id' => 1,
        ]);
        DB::table('categories')->insert([
            'name' => 'LIBHER',
            'type_id' => 1,
        ]);
    }
}
