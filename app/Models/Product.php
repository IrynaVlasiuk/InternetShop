<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'category_id',
    ];

    protected $primaryKey = 'article';

    public $incrementing = false;

    public function modifications()
    {
        return $this->belongsToMany('App\Models\Modification', 'product_modification', 'product_article')->withPivot( 'value');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
