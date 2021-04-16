<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $fillable = [
      "path"
  ];

  public function apartments() {
      return $this->belongsToMany("App\Apartment");
  }

}
