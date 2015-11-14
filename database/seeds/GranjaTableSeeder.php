<?php

use Illuminate\Database\Seeder;

class GranjaTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 23) as $index)
        {
            \DB::table('granjas')->insert([
                'name'          => $faker->firstName,
                'address'       => $faker->streetAddress,
                'number_phone'  => $faker->phoneNumber,
                'owner_name'    => $faker->firstName,
                'user_id'       => $index
            ]);
        }
    }

} 