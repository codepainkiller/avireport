<?php

use Illuminate\Database\Seeder;


class UserProfileTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 23) as $index)
        {
            \DB::table('user_profiles')->insert([
                'job'           => 'Veterinario',
                'address'       => $faker->streetAddress,
                'home_number'   => rand(40, 60)."-".rand(10, 99)."-".rand(10, 99),
                'mobile_number' => rand(95, 98).rand(0, 10000000),
                'website'       => $faker->domainName,
                'user_id'       => $index
            ]);
        }
    }


} 