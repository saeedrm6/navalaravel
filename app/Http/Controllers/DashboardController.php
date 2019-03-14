<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Ffmpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Gate::allows('isadmin',Auth::user())){
            return view('dashboard.index');
        }
        return [];
    }

    public function videos()
    {
        if(Gate::allows('isadmin',Auth::user())){
            $posts = Post::where('post_type','video')->orderby('created_at','desc')->paginate(15);
            return view('dashboard.videos',compact('posts'));
        }
        return [];
    }

    public function videoedit(Post $post)
    {
        $tags = $post->tags;
        return view('dashboard.editvideo',compact('post','tags'));
    }

    public function videoupdate(Post $post,Request $request){
        if(Gate::allows('isadmin',Auth::user())){
            $analistags = array();
            $alltages = $request->taglistsss;
            if ($alltages){
                foreach ($alltages as $taga){
                    $tag = Tag::where('name',$taga)->first();
                    if ($tag){
                        $analistags[]=$tag->id;
                    }else{
                        $tag=Tag::create([
                            'name'  =>  $taga
                        ]);
                        $analistags[]=$tag->id;
                    }
                }
            }
            $post->tags()->sync($analistags);
            $post->categories()->sync($request->categories);
            $post->update([
                    'title' =>  $request->title,
                    'content' =>  $request->contentt,
                    'excerpt' =>  $request->excerpt,
                    'seo' =>  $request->seo,
                    'status' =>  $request->status,
            ]);
            if ($request->status == 'publish') {
                $convertcheck = $post->metas()->where('key','convert')->first();
                if (!$convertcheck) {
                    $file = $post->metas()->where('key','VideoFile')->first();
                    if ($file) {
                        $ffmpeg = Ffmpeg::create([
                            'post_id'   =>  $post->id,
                            'patch'     =>  $file->value,
                            'size'      =>  '240:-2',
                            'audio'     =>  '96k',
                            'bitrate'   =>  '410K',
                            'format'    =>  'mp4',
                        ]);
                    }
                }
            }
            if ($request->statusattachment==true) {
                $save = $file->store('content/uploads/postuploads/'.date('Y').'/'.date('m').'/'.date('d'),'public');
                $m=new PostMeta();
                $m->key = 'thumbnail';
                $m->value = '/'.$save;
                $post->metas()->save($m);
            }
        }
        return back();
    }
}
