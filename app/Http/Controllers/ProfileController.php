<?php

namespace App\Http\Controllers;

use App\Category;
use App\Ffmpeg;
use App\Post;
use App\PostMeta;
use App\User;
use App\UserMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('website.profile',compact('user'));
    }

    public function getsetting()
    {
        $user = Auth::user();
        return view('website.profilesetting',compact('user'));
    }

    public function setsetting(Request $request)
    {
        $file = $request->file('attachment');
        $user = Auth::user();
        if ($file){
            $save = $file->store('content/uploads/useruploads/'.date('Y').'/'.date('m').'/'.date('d'),'public');
            $profile = UserMeta::firstOrNew(
                array(
                    'user_id' => $user->id,
                    'key'   =>  'thumbnail'
                )
            );
            $profile->user_id = $user->id;
            $profile->key='thumbnail';
            $profile->value='/'.$save;
            $profile->save();
//            $image = \Image::make($file->getRealPath())->encode('jpg')
//                ->fit(450,450)
//                ->save('content/uploads/useruploads/'.date('Y').'/'.date('m').'/'.date('d').'/test.jpg',100);
        }
        $user->mobile = $request->mobile;
        $user->bio = $request->bio;

        if ($request->password == $request->repassword){
            $user->password = Hash::make($request->password);
        }

        if ($request->telegram){
            $telegram = UserMeta::firstOrNew(
                array(
                    'user_id' => $user->id,
                    'key'   =>  'telegram'
                )
            );
            $telegram->user_id = $user->id;
            $telegram->key='telegram';
            $telegram->value=$request->telegram;
            $telegram->save();
        }

        if ($request->facebook){
            $facebook = UserMeta::firstOrNew(
                array(
                    'user_id' => $user->id,
                    'key'   =>  'facebook'
                )
            );
            $facebook->user_id = $user->id;
            $facebook->key='facebook';
            $facebook->value=$request->facebook;
            $facebook->save();
        }

        if ($request->instagram){
            $instagram = UserMeta::firstOrNew(
                array(
                    'user_id' => $user->id,
                    'key'   =>  'instagram'
                )
            );
            $instagram->user_id = $user->id;
            $instagram->key='instagram';
            $instagram->value=$request->instagram;
            $instagram->save();
        }

        if ($request->twitter){
            $twitter = UserMeta::firstOrNew(
                array(
                    'user_id' => $user->id,
                    'key'   =>  'twitter'
                )
            );
            $twitter->user_id = $user->id;
            $twitter->key='twitter';
            $twitter->value=$request->twitter;
            $twitter->save();
        }

        $user->update();
        return back();
    }

    public function uploadvideo()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('website.uploadvideo',compact('user','categories'));
    }

    public function uploadvideopost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'attachment'    =>  'mimes:mp4'
        ]);

        $file = $request->file('attachment');
        $user = Auth::user();

        $post = Post::create([
           'user_id'    =>  $user->id,
           'title'  =>  $request->title,
           'content'  =>  $request->description,
           'post_type'  =>  'video',
        ]);

        if ($request->category){
            $categories = $request->category;
            if (is_array($categories)){
                foreach ($categories as $category){
                    $cat = Category::find($category);
                    $post->categories()->attach($cat);
                    unset($cat);
                }
            }else{
                $cat = Category::find($categories);
                $post->categories()->attach($cat);
                unset($cat);
            }
        }

        if ($file){
            $save = $file->store('content/uploads/useruploads/'.date('Y').'/'.date('m').'/'.date('d'),'public');
            $video = PostMeta::firstOrNew(
                array(
                    'post_id' => $post->id,
                    'key'   =>  'attachment'
                )
            );
            $video->post_id = $post->id;
            $video->key='attachment';
            $video->value='/'.$save;
            $video->save();

            $ffmpeg = Ffmpeg::create([
                'post_id'   =>  $post->id,
                'patch'     =>  '/'.$save
            ]);
        }
        return back();
    }

    public function myvideos()
    {
        $user = Auth::user();
        $posts = $user->posts()->orderby('created_at','desc')->get();
        return view('website.minevideos',compact('user','posts'));
    }
}
