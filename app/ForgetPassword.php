<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForgetPassword extends Model
{
	protected $fillable = ['mobile','code'];
}
