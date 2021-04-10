<?php

use Illuminate\Database\Seeder;
use App\Sponsor;
use Faker\Generator as Faker;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            $newSponsor = new Sponsor();
            $newSponsor->price = $faker->randomFloat(2 ,1 ,9);
            $newSponsor->time = $faker->numberBetween(0, 150);
            $newSponsor->save();
        }
    }
}
