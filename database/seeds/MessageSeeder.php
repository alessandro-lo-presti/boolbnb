<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\Apartment;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for($i = 0; $i <5; $i++) {
        $newMessage = new Message();
        $newMessage->email = $faker->safeEmail();
        $newMessage->body = $faker->paragraph(3);
        $newMessage->date = $faker->dateTime();
        $apartments = Apartment::all()->toArray();
        $newMessage->apartment_id = $apartments[rand(0, Count($apartments)-1)]["id"];
        $newMessage->save();
      }
    }
}
