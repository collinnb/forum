<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeerder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->insert([
            'username' => 'Collin',
            'email' => 'cowplant.simmer@gmail.com',
            'avatar' => 'placeholder.png',
            'bio' => $faker->paragraph(),
            'gender' => 'male',
            'birthday' => $faker->dateTime,
            'password' => bcrypt('welkom'),
            'role_id' => 2,
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('users')->insert([
            'username' => 'Cow',
            'email' => 'sncnic.n.b@gmail.com',
            'avatar' => 'placeholder.png',
            'bio' => $faker->paragraph(),
            'gender' => 'male',
            'birthday' => $faker->dateTime,
            'password' => bcrypt('welkom'),
            'role_id' => 1,
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);
    }
}
