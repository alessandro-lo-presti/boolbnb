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
        for ($i = 0; $i < 3; $i++) {
            $newSponsor = new Sponsor();

            switch ($i) {
              case 0:
                $newSponsor->price = 2.99;
                $newSponsor->time = 24;
                break;
              case 1:
                $newSponsor->price = 5.99;
                $newSponsor->time = 72;
                break;
              default:
                $newSponsor->price = 9.99;
                $newSponsor->time = 144;
                break;
            }

            $newSponsor->save();
        }
    }
}
