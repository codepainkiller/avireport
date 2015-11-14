<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GalponTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 23) as $index)
        {
            \DB::table('galpons')->insert([
                'code'          => Str::random(16),
                'number_birds'  => rand(100, 150),
                'description'   => $faker->text(10),
                'granja_id'     => $index
            ]);
        }
    }
} 