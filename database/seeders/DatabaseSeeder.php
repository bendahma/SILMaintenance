<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Machine;
use App\Models\Service;
use App\Models\Personnel;
use App\Models\Mark;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            TypeSeeder::class,
            CategorySeeder::class,
        ]);

        User::factory(25)->create();
        Machine::factory(25)->create();
        Service::factory(5)->create();
        Personnel::factory(50)->create();
    }
}
