<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'userid','key','value'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

}
