<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    protected $fillable = [
        'name',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','category_modification');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product','product_modification', 'modification_id')->withPivot( 'value');
    }

}
