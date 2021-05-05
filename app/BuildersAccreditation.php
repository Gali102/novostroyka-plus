<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BuildersAccreditation extends Model
{
    use Sluggable;

    protected $fillable = ['title'];

    public function builders(){
        return $this->hasMany(Builders::class);
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
