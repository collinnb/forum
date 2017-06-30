<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('topics')->insert([
            'topic_title' => '3d',
            'topic_text' => 'alles over 3d ontwerpen',
            'theme_id' => 1,
            'user_id' => 1,
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('topics')->insert([
            'topic_title' => 'dit werkt',
            'topic_text' => 'het werkt',
            'theme_id' => 1,
            'user_id' => 1,
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('topics')->insert([
            'topic_title' => 'help',
            'topic_text' => 'het werkt goed af',
            'theme_id' => 1,
            'user_id' => 2,
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);
    }
}
