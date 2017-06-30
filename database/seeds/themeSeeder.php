<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class themeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('themes')->insert([
            'theme_title' => '3d',
            'theme_description' => 'alles over 3d ontwerpen',
            'user_id' => 1,
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);
    }
}
