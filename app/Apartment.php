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
      return $this->belongsToMany("App\Sponsor")
      ->withPivot('end');
  }

  public function messages() {
      return $this->hasMany("App\Message");
  }

  public function images() {
      return $this->hasMany("App\Image");
  }

}
