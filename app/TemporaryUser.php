<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryUser extends Model
{
    public $timestamps = false;
    protected $fillable = ['mobile','password','mobilecode','mobilecodedate'];
}
