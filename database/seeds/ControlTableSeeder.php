<?php

use Illuminate\Database\Seeder;

class ControlTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker\Factory::create();

        $date = new DateTime('2015-01-01');

        $jsonControl = new \stdClass();
        $jsonControl->week = 3;
        $jsonControl->last_update = $date->format('Y-m-d');
        $jsonControl->control = [];

        foreach(range(1, 10) as $index) {

            $date->add(new DateInterval('P7D'));

            // Control semanal
            $control = new \stdClass();
            $control->week = $jsonControl->week + 1;
            $control->average_weight = 0.184 + (0.15 * ($index-1));
            $control->state = "Bien";
            $control->observation = "No hay observaciones";
            $control->date = $date->format('Y-m-d');

            array_push($jsonControl->control, $control);
            $jsonControl->week++;
            $jsonControl->json_control = json_encode($control);
        }

        foreach(range(1, 23) as $index)
        {
            \DB::table('controls')->insert([
                'json_control'  => json_encode($jsonControl),
                'description'   => $faker->text(20),
                'type'          => 'ponedoras',
                'galpon_id'     => $index
            ]);
        }

    }
} 