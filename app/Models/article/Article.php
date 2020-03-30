<?php

namespace App\Models\article;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'title',
        'content'
    ];

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'category_articles');
    }
}
