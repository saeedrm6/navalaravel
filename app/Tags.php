<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

}
