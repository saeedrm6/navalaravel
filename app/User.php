<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email','status','mobile','role','password','mobileverify','emailverify','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function findForPassport($username) {
        return $this->where('mobile', $username)->first();
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function metas()
    {
        return $this->hasMany('App\UserMeta');
    }

    public function getuserprofile()
    {
        if ($this->metas()->where('key','thumbnail')->first()){
            return env('APP_URL').@$this->metas()->where('key','thumbnail')->first()->value;
        }
        return env('APP_URL').'/img/profile/avatar.png';
    }

    public function setuserprofile(User $user,$src)
    {
        if (!$this->getuserprofile($user)){
            $meta = new UserMeta();
            $meta->key = 'thumbnail';
            $meta->value = $src;
            $user->metas()->save($meta);
            return true;
        }
        return false;
    }

    public function rates()
    {
        return $this->hasMany('App\Rate');
    }

    public function social_medias(){
        $social = [];
        if ($this->metas()->where('key','telegram')->first()){
            $social[] = ['telegram' => @$this->metas()->where('key','telegram')->first()->value];
        }
        if ($this->metas()->where('key','instagram')->first()){
            $social[] = ['instagram' => @$this->metas()->where('key','instagram')->first()->value];
        }
        if ($this->metas()->where('key','twitter')->first()){
            $social[] = ['twitter' => @$this->metas()->where('key','twitter')->first()->value];
        }
        if ($this->metas()->where('key','facebook')->first()){
            $social[] = ['facebook' => @$this->metas()->where('key','facebook')->first()->value];
        }
        return $social;
    }
}
