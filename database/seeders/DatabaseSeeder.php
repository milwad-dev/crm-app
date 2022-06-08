<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Comment\Models\Comment;
use Modules\Marketing\Models\Campaign;
use Modules\Marketing\Models\Survey;
use Modules\User\Models\User;

class DatabaseSeeder extends Seeder
{
    public static $seeders = [];

    public function run()
    {
        foreach (self::$seeders as $seeder) $this->call($seeder);
        User::factory(10)->create();
        Campaign::factory(10)->create();
        Comment::factory(10)->create();
//        Survey::factory(10)->create();
    }
}
