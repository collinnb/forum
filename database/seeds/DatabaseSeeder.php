<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeerder::class);
        $this->call(themeSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(ReplySeeder::class);
    }
}
