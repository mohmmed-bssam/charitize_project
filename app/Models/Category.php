<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Trans;

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
