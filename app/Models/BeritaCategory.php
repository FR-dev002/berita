<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeritaCategory extends Model
{

    protected $fillable= [
        'berita_id',
        'category_id'
    ];

    public function berita()
    {
        return $this->belongsTo('App\Models\Berita');
    }
}
