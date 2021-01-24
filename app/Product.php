<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];


    public function liga()
    {
        return $this->belongsTo(Liga::class);
    }
}
