<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ApartmentsHometype extends Model
{
    use Sluggable;

    protected $fillable = ['title'];

    public function apartments(){
        return $this->hasMany(Apartments::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
