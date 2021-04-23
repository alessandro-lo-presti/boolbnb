<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Apartment;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i <6; $i++) {
            $newService = new Service();

            switch ($i) {
              case 0:
                $newService->name = 'WiFi';
                break;
              case 1:
                $newService->name = 'Piscina';
                break;
              case 2:
                $newService->name = 'Posto Auto';
                break;
              case 3:
                $newService->name = 'Portineria';
                break;
              case 4:
                $newService->name = 'Sauna';
                break;
              default:
                $newService->name = 'Vista Mare';
                break;
            }

            $newService->save();
        }
    }
}
