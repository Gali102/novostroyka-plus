<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    public function apartment(){
       return $this->belongsTo(Apartment::class);
    }
    public function cities(){
        return $this->belongsTo(Citi::class);
    }
}
