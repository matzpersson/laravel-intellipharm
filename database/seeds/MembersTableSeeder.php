<?php

use Illuminate\Database\Seeder;
Use App\Member;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Member::truncate();

        $faker = \Faker\Factory::create();

                // -- Generate 100 users
        for ($i = 0; $i < 100; $i++) {

            $genders = ['Male', 'Female'];
            Member::create([
                'firstname' => $faker->firstName,
                'surname' => $faker->lastName,
                'email' => $faker->email,
                'joined_date' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = date_default_timezone_get() ),
                'gender' => $genders[$faker->numberBetween($min = 0, $max = 1) ]

            ]);
        }

    }	
}
