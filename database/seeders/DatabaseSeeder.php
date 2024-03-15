<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $faker = Factory::create('id_ID');
        for($i = 0; $i < 10;$i++){
            DB::table('students')->insert([
                'name' => $faker ->name,
                'email' => $faker ->email,
                'dob' => $faker ->date('Y-m-d', now()),
                'id_teacher'=>rand(1,10)
            ]);
        }
    }
}
