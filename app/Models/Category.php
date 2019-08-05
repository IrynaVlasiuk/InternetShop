<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->$this->hasMany('App\Models\Product');
    }

    public function characteristics()
    {
        return $this->belongsToMany('App\Models\Characteristic','category_characteristic', 'category_id')->withPivot( 'value');
    }
}
