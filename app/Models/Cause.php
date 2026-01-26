<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    //

    protected $guarded=[];
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
    public function donations(){
        return $this->hasMany(Payment::class);
    }

     public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
     public function gallery(){
        return $this->morphMany(Image::class, 'imageable')
        ->where('type','gallery');
    }
    public function casts(): array{
        return [
            'title' => 'array',
            'content' => 'array',

        ];

    }
    public function getTitleTransAttribute(){
        return $this->title[app()->getLocale()];
    }

}
