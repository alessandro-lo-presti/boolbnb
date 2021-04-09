<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
  protected $fillable = [
    "title",
    "n_rooms",
    "n_beds",
    "n_bathrooms",
    "mqs",
    "address",
    "city",
    "longitude",
    "latitude",
    "image",
    "visibility",
    "visualization"
  ];


}
