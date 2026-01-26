<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    protected $guarded=[];
    public function cases()
    {
        return $this->hasMany(Cause::class);
    }
    public function casts(): array{
        return [
            'title' => 'array',
        ];
    }
}