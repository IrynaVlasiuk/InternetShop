<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
        'name', 'price', 'category_id',
    ];

    public function languages()
    {
        return $this->belongsTo('App\Models\Language', 'language_id');
    }
}
