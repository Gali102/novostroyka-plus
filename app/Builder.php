<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

class Builder extends Model
{
    use Sluggable;

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

    protected $fillable = [
        'title',
        'content',
        'date',
        'description',
        'adress',
        'phone',
        'email',
        'site',
        'workpn',
        'workvt',
        'worksr',
        'workch',
        'workpt',
        'worksb',
        'workvs',
        'vk',
        'inst',
        'fb',
        'tvit'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function citi()
    {
        return $this->belongsTo(Citi::class);
    }

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

    public static function add($fields)
    {
        $builders = new static;
        $builders->fill($fields);
        $builders->user_id = 1;
        $builders->save();

        return $builders;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if($this->image != null)
        {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function uploadImage($image)
    {
        if($image == null) { return; }

        $this->removeImage();
        $filename = str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if($this->image == null)
        {
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->image;

    }
    
    public function setCiti($id)
    {
        if($id == null) {return;}
        $this->citi_id = $id;
        $this->save();
    }

    public function setDraft()
    {
        $this->status = Builder::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = Builder::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if($value == null)
        {
            return $this->setDraft();
        }

        return $this->setPublic();
    }

    public function setFeatured()
    {
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        if($value == null)
        {
            return $this->setStandart();
        }
        
        return $this->setFeatured();
    }

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');

        return $date;
    }

    public function getCitiTitle()
    {
        return ($this->citi != null) 
                ?   $this->citi->title
                :   'Нет выбранного города';
    }

    public function getCitiID()
    {
        return $this->citi != null ? $this->citi->id : null;
    }

    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $builderID = $this->hasPrevious(); //ID
        return self::find($builderID);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $builderID = $this->hasNext();
        return self::find($builderID);
    }

    public function related()
    {
        return self::all()->except($this->id);
    }

    public function hasCiti()
    {
        return $this->citi != null ? true : false;
    }

    public static function getPopularBuilders()
    {
        return self::orderBy('views','desc')->take(3)->get();
    }

    public function getReviews()
    {
        return $this->review()->where('status', 1)->get();
    }
}
