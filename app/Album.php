<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {
    protected $fillable = [
        'album_cover',
        'artist',
        'album',
        'genre',
        'production_year',
        'record_label',
        'tracklist',
        'rating'
    ];
}
