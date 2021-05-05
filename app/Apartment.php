<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

class Apartment extends Model
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
        'square',
        'floor',
        'floorhome',
        'price',
        'squareprice'
    ];

    public function citi()
    {
        return $this->belongsTo(Citi::class);
    }

    public function builder(){
        return $this->belongsTo(Builder::class);
    }

    public function maps(){
        return $this->hasMany(Map::class);
    }

    public function apartmentcategoty()
    {
        return $this->belongsTo(ApartmentCategoty::class);
    }

    public function apartmentsfinish()
    {
        return $this->belongsTo(ApartmentsFinish::class);
    }

    public function apartmentszhk()
    {
        return $this->belongsTo(ApartmentsZhk::class);
    }

    public function apartmentsocenka()
    {
        return $this->belongsTo(ApartmentsOcenka::class);
    }

    public function apartmentshometype()
    {
        return $this->belongsTo(ApartmentsHometype::class);
    }

    public function quarter()
    {
        return $this->belongsTo(Quarter::class);
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
        $apartments = new static;
        $apartments->fill($fields);
        $apartments->user_id = 1;
        $apartments->save();

        return $apartments;
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

    public function setBuilder($id)
    {
        if($id == null) {return;}
        $this->builder_id = $id;
        $this->save();
    }

    public function setApartmentCategoty($id)
    {
        if($id == null) {return;}
        $this->apartmentcategoty_id = $id;
        $this->save();
    }

    public function setApartmentsFinish($id)
    {
        if($id == null) {return;}
        $this->apartmentsfinish_id = $id;
        $this->save();
    }

    public function setApartmentsZhk($id)
    {
        if($id == null) {return;}
        $this->apartmentszhk_id = $id;
        $this->save();
    }

    public function setApartmentsOcenka($id)
    {
        if($id == null) {return;}
        $this->apartmentsocenka_id = $id;
        $this->save();
    }

    public function setApartmentsHometype($id)
    {
        if($id == null) {return;}
        $this->apartmentshometype_id = $id;
        $this->save();
    }

    public function setQuarter($id)
    {
        if($id == null) {return;}
        $this->quarter_id = $id;
        $this->save();
    }

    public function setDraft()
    {
        $this->status = Apartment::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = Apartment::IS_PUBLIC;
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

    public function getBuilderTitle()
    {
        return ($this->builder != null) 
                ?   $this->builder->title
                :   'Нет выбранного застройщика';
    }

    public function getApartmentZhkTitle()
    {
        return $this->apartmentszhk != null ? $this->apartmentszhk->title : 'Нет выбранного города';
    }

    public function getApartmentsHometypeTitle()
    {
        return $this->apartmentshometype != null ? $this->apartmentshometype->title : 'Нет выбранного типа квартиры';
    }

    public function getApartmentCategotyTitle()
    {
        return ($this->apartmentcategoty != null) 
                ?   $this->apartmentcategoty->title
                :   'Нет выбранного вида квартир';
    }

    public function getApartmentsFinishTitle()
    {
        return ($this->apartmentsfinish != null) 
                ?   $this->apartmentsfinish->title
                :   'Нет выбранной отделки';
    }

    public function getApartmentsOcenkaTitle()
    {
        return ($this->apartmentsocenkas != null) 
                ?   $this->apartmentsocenkas->title
                :   'Нет выбранной оценки';
    }

    public function getQuarterTitle()
    {
        return ($this->quarters != null) 
                ?   $this->quarters->title
                :   'Нет выбранного квартала';
    }

    public function getCitiID()
    {
        return $this->citi != null ? $this->citi->id : null;
    }

    public function getBuilderID()
    {
        return $this->builder != null ? $this->builder->id : null;
    }

    public function getApartmentCategotyID()
    {
        return $this->apartmentcategoty != null ? $this->apartmentcategoty->id : null;
    }

    public function getApartmentsFinishID()
    {
        return $this->apartmentsfinish != null ? $this->apartmentsfinish->id : null;
    }

    public function getApartmentsZhkID()
    {
        return $this->apartmentszhk != null ? $this->apartmentszhk->id : null;
    }

    public function getApartmentsOcenkaID()
    {
        return $this->apartmentsocenka != null ? $this->apartmentsocenka->id : null;
    }

    public function getApartmentsHometypeID()
    {
        return $this->apartmentshometype != null ? $this->apartmentshometype->id : null;
    }

    public function getQuarterID()
    {
        return $this->quarter != null ? $this->quarter->id : null;
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
        $apartmentID = $this->hasPrevious(); //ID
        return self::find($apartmentID);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $apartmentID = $this->hasNext();
        return self::find($apartmentID);
    }

    public function related()
    {
        return self::all()->except($this->id);
    }

    public function hasCiti()
    {
        return $this->citi != null ? true : false;
    }

    public function hasBuilder()
    {
        return $this->builder != null ? true : false;
    }

    public function hasApartmentCategoty()
    {
        return $this->apartmentcategoty != null ? true : false;
    }

    public function hasApartmentsFinish()
    {
        return $this->apartmentsfinish != null ? true : false;
    }

    public function hasApartmentsZhk()
    {
        return $this->apartmentszhk != null ? true : false;
    }

    public function hasApartmentsOcenka()
    {
        return $this->apartmentsocenka != null ? true : false;
    }

    public function hasApartmentsHometype()
    {
        return $this->apartmentshometype != null ? true : false;
    }

    public function hasQuarter()
    {
        return $this->quarter != null ? true : false;
    }

    public static function getPopularApartments()
    {
        return self::orderBy('views','desc')->take(3)->get();
    }

    public function getComments()
    {
        return $this->comments()->where('status', 1)->get();
    }
}
