<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'title',
        'sort_title',
        'author',
        'wartawan',
        'description',
        'sort_description',
        'headlines',
        'publish',
        'publish_at',
        'image',
        'thumbnail',
        'view'
    ];


    /**
     * @desc Join ke talbe berita categori
     */
    public function categories()
    {
        return $this->hasMany('App\Models\BeritaCategory');
    }

    /**
     * @desc Join ke talbe berita tags
     */
    public function tags()
    {
        return $this->hasMany('App\Models\BeritaTag');
    }
}
