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

  public function user() {
      return $this->belongsTo("App\User");
  }

  public function services() {
      return $this->belongsToMany("App\Service");
  }

  public function sponsors() {
      return $this->belongsToMany("App\Sponsor");
  }

}
