<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Image;
use App\Apartment;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for($i = 0; $i <5; $i++) {
          $newImage = new Image();
          $newImage->path = $faker->imageUrl(640, 480, 'animals', true);

          $apartments = Apartment::all()->toArray();
          $newImage->apartment_id = $apartments[rand(0, Count($apartments)-1)]["id"];

          $newImage->save();
      }
    }
}
