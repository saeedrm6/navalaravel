<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = [
        'user_id', 'post_id', 'body', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function post()
    {
        return $this->belongsTo('App\Post','post_id');
    }

}
