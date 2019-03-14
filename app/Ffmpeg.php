<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ffmpeg extends Model
{
    protected $fillable = ['post_id','patch','status','format','bitrate','audio','size'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
