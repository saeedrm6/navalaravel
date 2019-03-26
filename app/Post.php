<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','title','content','excerpt','seo','status','comment_status','post_type','views','rate'];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function metas()
    {
        return $this->hasMany('App\PostMeta');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function rates()
    {
        return $this->hasMany('App\Rate');
    }

    public function ffmpeg()
    {
        return $this->hasOne('App\Ffmpeg');
    }

    public function thumbnail(){
        return $this->metas()->where('key','thumbnail')->first() ? $this->metas()->where('key','thumbnail')->first()->value : false;
    }

    public function setview($id){
        $check = Post::find($id);
        if ($check) {
            $check->views = $check->views+1;
            $check->update();
        }
        return [];
    }

    public function getview($id){
        $check = Post::find($id);
        if ($check) {
            return $check->views;
        }
        return [];
    }

    public function getrate($id){
        $check = Post::find($id);
        if ($check) {
            return $check->rate;
        }
        return [];
    }

}
