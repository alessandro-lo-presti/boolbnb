<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'time',
        'price'
    ];

    public function apartments() {
        return $this->belongsToMany("App\Apartment")
        ->withPivot('end');
    }

}
