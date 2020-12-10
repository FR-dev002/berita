<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeritaTag extends Model
{   

    protected $fillable= [
        'berita_id',
        'tag_id'
    ];


    public function berita()
    {
        return $this->belongsTo('App\Models\Berita');
    }
}
