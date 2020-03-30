<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function articles(){
        return $this->belongsToMany('App\Models\article\Article', 'category_articles');
    }
}
