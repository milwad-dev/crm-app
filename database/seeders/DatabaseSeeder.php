<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Marketing\Models\Campaign;
use Modules\User\Models\User;

class DatabaseSeeder extends Seeder
{
    public static $seeders = [];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Campaign::factory(10)->create();
    }
}
