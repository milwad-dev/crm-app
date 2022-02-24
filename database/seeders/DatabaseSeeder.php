<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Marketing\Models\Campaign;
use Modules\User\Models\User;

class DatabaseSeeder extends Seeder
{
    public static $seeders = [];

    public function run()
    {
        foreach (self::$seeders as $seeder) $this->call($seeder);
        User::factory(10)->create();
        Campaign::factory(10)->create();
    }
}
