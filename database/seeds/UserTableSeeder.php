<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 20) as $index)
        {
            \DB::table('users')->insert([
                'name'  => $faker->firstName,
                'email'     => $faker->freeEmail,
                'password'  => \Hash::make('123456')
            ]);
        }

        // Martin Cruz
        \DB::table('users')->insert(array(
            'name'      => 'Martin Cruz',
            'email'     => 'slayer.dmx@gmail.com',
            'password'  => \Hash::make('123456')
        ));

        // Luchin Alberto
        \DB::table('users')->insert(array(
            'name'      => 'Luis Bardales',
            'email'     => 'bardalesguerraluismiguel@gmail.com',
            'password'  => \Hash::make('123456')
        ));

        // Bryan Alvarez
        \DB::table('users')->insert(array(
            'name'      => 'Bryan Alvarez',
            'email'     => 'fw.bryan@gmail.com',
            'password'  => \Hash::make('123456')
        ));
    }

} 