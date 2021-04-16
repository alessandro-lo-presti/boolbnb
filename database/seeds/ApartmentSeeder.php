<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\User;
use Faker\Generator as Faker;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i <10; $i++) {
          $newApartment = new Apartment();
          $newApartment->title = $faker->sentence(3);
          $newApartment->n_rooms = $faker->randomDigit();
          $newApartment->n_beds = $faker->randomDigit();
          $newApartment->n_bathrooms = $faker->randomDigit();
          $newApartment->mqs = $faker->randomNumber(4, false);
          $newApartment->address = $faker->address();
          $newApartment->city = $faker->city();
          $newApartment->longitude = $faker->longitude($min=-180, $max=180);
          $newApartment->latitude = $faker->latitude($min=-90, $max=90);
          // $newApartment->image = $faker->imageUrl(640, 480, 'animals', true);
          $newApartment->visibility = $faker->boolean();
          $newApartment->visualization = 0;
          $users = User::all()->toArray();
          $newApartment->user_id = $users[rand(0, Count($users)-1)]["id"];
          $newApartment->save();
        }
    }
}
