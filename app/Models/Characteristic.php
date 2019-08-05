<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $fillable = [
        'name',
    ];

    public function category()
    {
        return $this->belongsToMany('App\Models\Category','category_characteristic', 'characteristic_id')->withPivot( 'value');
    }
}
