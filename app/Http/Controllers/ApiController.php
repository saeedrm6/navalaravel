<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\PostMeta;
use App\TemporaryUser;
use App\User;
use App\UserMeta;
use App\Ffmpeg;
use App\Rate;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use phpseclib\Crypt\Hash;

class ApiController extends Controller
{
    public function init_signup(Request $request)
    {
        $response = array('response' => '', 'success'=>false);
        $validator = Validator::make($request->all(), [
            'mobile'   =>  'required|min:10',
            'password' => 'required|string|min:6',
        ],[
            'mobile.required'   =>  'Mobile is required',
            'mobile.min'   =>  'mobile numbers not correct',
            'password.required'   =>  'password is required',
            'password.min'   =>  'password must be start with in 6 charecter',
        ]);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        }else{
            $checkuserexist = User::where('mobile','like','%'.$request->mobile)->first();
            if (!$checkuserexist){
                $code = rand(1000,9999);
                if (strlen($request->mobile)==10){
                    $mobile = '0'.$request->mobile;
                }else{
                    $mobile = $request->mobile;
                }
                if (TemporaryUser::where('mobile','like','%'.$request->mobile)->first()){
                    $temporary = TemporaryUser::where('mobile','like','%'.$request->mobile)->first();
                    $temporary-> password = $request->password;
                    $temporary-> mobilecode = $code;
                    $temporary->update();
                }else{
                    $temporary = TemporaryUser::create([
                        'mobile'   =>  $mobile,
                        'password'   =>  $request->password,
                        'mobilecode'   =>  $code,
                    ]);
                }
                send_direct_sms($request->mobile,'کد فعال سازی شما : '.$code);
                return json_encode(
                    array(
                        'status'    =>  'send_mobile_code',
                        'mobile'    =>  $mobile,
                        'code'      =>  $code
                    )
                );
            }else{
                return json_encode(
                    array(
                        'status'    =>  'user_is_duplicated',
                    )
                );
            }
            return json_encode(array(
                'status'    =>  'error_in_functions'
            ));
        }
        return $response;
    }

    public function final_signup(Request $request)
    {
        if (isset($request->mobile) AND isset($request->password) AND isset($request->code)) {
            $temporary = TemporaryUser::where('mobile', 'like', '%' . $request->mobile)->orderby('id', 'desc')->first();
            if ($temporary) {
                if ($temporary->mobilecode == $request->code) {
                    $checkuserexist = User::where('mobile', 'like', '%' . $request->mobile)->where('mobileverify','verify')->first();
                    if (!$checkuserexist) {
                        if (strlen($request->mobile)==10){
                            $mobile = '0'.$request->mobile;
                        }else{
                            $mobile = $request->mobile;
                        }
                        $user = User::create([
                            'username' => 'user' . rand(1, 1000000),
                            'email' => str_random(5) . '@' . 'nava.ir',
                            'mobile' => $mobile,
                            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
                            'token' => str_random(25),
                            'mobileverify' => 'verify'
                        ]);
                        if ($user){

                            $varmobilecode = new UserMeta();
                            $varmobilecode->user_id = $user->id;
                            $varmobilecode->key = 'mobilecode';
                            $varmobilecode->value = (int)$request->code;
                            $varmobilecode->save();

                            $varmobilecodedate = new UserMeta();
                            $varmobilecodedate->user_id = $user->id;
                            $varmobilecodedate->key = 'mobilecodedate';
                            $varmobilecodedate->value = $temporary->mobilecodedate;
                            $varmobilecodedate->save();

                            $varmobileregister = new UserMeta();
                            $varmobileregister->user_id = $user->id;
                            $varmobileregister->key = 'mobileregister';
                            $varmobileregister->value = 'true';
                            $varmobileregister->save();
                            return json_encode(
                                array(
                                    'status'    =>  'register_successful',
                                )
                            );
                        }
                    }else{
                        return json_encode(
                            array(
                                'status'    =>  'user_is_duplicated',
                            )
                        );
                    }
                }else{
                    return json_encode(array(
                        'status'    =>  'codes_are_not_equals'
                    ));
                }
            }
        }
        return json_encode(array(
            'status'    =>  'error_in_send_fields'
        ));
    }

    public function login(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|min:10',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        if (strlen($request->mobile)==10){
            $mobile = '0'.$request->mobile;
        }else{
            $mobile = $request->mobile;
        }
        $credentials = array('mobile'=>$mobile,'password'=>$request->password);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function detailofuser(Request $request,User $user)
    {
//        return $request->user();
        return response()->json([$user]);
    }

    public function showpost(Post $post)
    {
        if ($post->status == 'publish'){
            $thumbnail = @$post->metas()->where('key','thumbnail')->first()->value;
            $mp4 = $post->metas()->where('key','VideoFile')->get();
            $files = array();
            if ($mp4) {
                if (count($mp4)>1) {
                    foreach ($mp4 as $result) {
                        $files[]=env('APP_URL').$result->value;
                    }
                }else{
                    $mp4 = $post->metas()->where('key','VideoFile')->first();
                    $files[]=env('APP_URL').$mp4->value;
                }
                
            }
            $duration = @$post->metas()->where('key','VideoDuration')->first()->value;
            $post->views=$post->views+1;
            $post->update();
            return response()->json([
                'id'    =>  $post->id,
                'title' =>  $post->title,
                'content'   =>  $post->content,
                'excerpt'   =>  $post->excerpt,
                'comment_status'   =>  $post->comment_status,
                'post_type'   =>  $post->post_type,
                'thumbnail' =>  env('APP_URL').@$thumbnail,
                'MP4'    =>  $files,
                'duration'    =>  $duration,
                'views' =>  $post->views,
                'rate'  =>  $post->rate,
            ]);
        }else{
            return response()->json(array(
                'status'    =>  'error'
            ));
        }
    }

    public function uploadvideo(Request $request)
    {
        $response = array('response' => '', 'success'=>false);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
//            'attachment'    =>  'mimes:mp4'
        ],[
            'title.required'    =>  'title is required',
            'attachment.required'    =>  'video is required',
            'attachment.mimes'    =>  'video must be mp4 format',
        ]);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        }else{
            $file = $request->file('attachment');
            $user = request()->user();
            $post = Post::create([
                'user_id'    =>  $user->id,
                'title'  =>  $request->title,
                'content'  =>  $request->description,
                'post_type'  =>  'video',
            ]);
            if ($post){
                $save = $file->store('content/uploads/useruploads/'.date('Y').'/'.date('m').'/'.date('d'),'public');
                $postmeta = PostMeta::create([
                    'post_id'   =>  $post->id,
                    'key'   =>  'VideoFile',
                    'value'   =>  '/'.$save
                ]);

                // dd(ffmpeg_video('/'.$save,'240:-2', '96k', '410K' ));
                // $ffmpeg = Ffmpeg::create([
                //     'post_id'   =>  $post->id,
                //     'patch'     =>  '/'.$save,
                //     'size'      =>  '240:-2',
                //     'audio'     =>  '96k',
                //     'bitrate'   =>  '410K',
                //     'format'    =>  'mp4',
                // ]);

                $postmeta2 = PostMeta::create([
                    'post_id'   =>  $post->id,
                    'key'   =>  'VideoDuration',
                    'value'   =>  ffmpeg_duration($postmeta->value)
                ]);

                $postmeta3 = PostMeta::create([
                    'post_id'   =>  $post->id,
                    'key'   =>  'thumbnail',
                    'value'   =>  ffmpeg_image($postmeta->value)
                ]);

                return response()->json([
                    'status'    =>  'success'
                ]);
            }
            return response()->json([
                'status'    =>  'error'
            ]);
        }
        return $response;
    }

    public function getposts(Request $request)
    {
        if (isset($_GET['pg'])){
            $limit = $_GET['pg']*10;
            if ($_GET['pg'] == 1){
                $offset = 0;
            }else{
                $offset = 10*$_GET['pg'];
            }

        }else{
            $limit = 10;
            $offset = 0;
        }
        $posts = Post::where('status','publish')->orderby('created_at','desc')->take($limit)->offset($offset)->get();
        $response = array();
        foreach ($posts as $post){
            $thumbnail = @$post->metas()->where('key','thumbnail')->first()->value;
            $response[] = array(
                'title' =>  $post->title,
                'content'   =>  $post->content,
                'excerpt'   =>  $post->excerpt,
                'comment_status'   =>  $post->comment_status,
                'post_type'   =>  $post->post_type,
                'thumbnail' =>  env('APP_URL').@$thumbnail,
            );
        }
        return response()->json($response);
    }

    public function sendcomment(Request $request)
    {
        $user = $request->user();

        $response = array('response' => '', 'success'=>false);
        $validator = Validator::make($request->all(), [
            'post_id'   =>  'required',
            'body' => 'required|string|min:6',
        ],[
            'post_id.required'   =>  'The post ID is required',
            'body.min'   =>  'The comment must be start with 6 charecter',
            'body.required'   =>  'the comment is required',
        ]);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        }else{
            $post = Post::find($request->post_id);
            if ($post){
                $comment = Comment::create([
                    'user_id'   =>  $user->id,
                    'post_id'   =>  $post->id,
                    'body'      =>  $request->body
                ]);
                if ($comment){
                    return response()->json(
                        array(
                            'status'    =>  'successful'
                        )
                    );
                }else{
                    return response()->json(
                        array(
                            'status'    =>  'error'
                        )
                    );
                }
            }else{
                return response()->json(
                    array(
                        'status'    =>  'post_not_find'
                    )
                );
            }
        }
        return $response;
    }

    public function getallcomments(Post $post){
        $comments = $post->comments()->where('status','publish')->orderby('created_at','asc')->get();
        $export = array();
        if ($comments) {
            foreach ($comments as $comment) {
                $export[]=array(
                    'user_id'   => $comment->user_id, 
                    'avatar'    =>  env('APP_URL').User::find($comment->user_id)->getuserprofile(User::find($comment->user_id)),
                    'post_id'   => $comment->post_id, 
                    'body'   => $comment->body, 
                    'created_at'    =>  $comment->created_at
                );
            }
        }
        return response()->json($export);
    }

    public function sendrate(Request $request){
        $user = $request->user();

        $response = array('response' => '', 'success'=>false);
        $validator = Validator::make($request->all(), [
            'post_id'   =>  'required',
            'rate' => 'required|integer|min:0|max:4',
        ],[
            'post_id.required'   =>  'The post ID is required',
            'rate.required'   =>  'The Rate is required',
            'rate.integer'   =>  'the Rate must be intger',
            'rate.min'      =>  'The minimum of Rate is 0',
            'rate.max'      =>  'The maximum of Rate is 4',
        ]);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        }else{
            $post=Post::find($request->post_id);
            if ($post) {
                $ratecheck = Rate::where('user_id',$user->id)->where('post_id',$request->post_id)->first();
                if (!$ratecheck) {
                    Rate::create([
                        'user_id'   =>  $user->id,
                        'post_id'   =>  $request->post_id,
                        'rate'      =>  $request->rate*25,
                    ]);
                }else{
                    $ratecheck->rate = $request->rate*25;
                    $ratecheck->update();
                }
                $rates_count = $post->rates()->count();
                $final_rate = 0;
                $total_rate = 0;
                $rates = $post->rates;
                if ($rates) {
                    foreach ($rates as $ratecheck) {
                        $total_rate += $ratecheck->rate;
                    }
                }

                if ($total_rate == 0 AND $rates_count == 0) {
                    $final_rate = 0;
                }elseif ($total_rate == 0 AND $rates_count != 0) {
                    $final_rate = 0;
                }else{
                    $final_rate = $total_rate / $rates_count;
                }
                $post->rate = $final_rate;
                $post->update();
                return response()->json(array(
                    'status'    =>  'success'
                ));
            }
            return response()->json(array(
                    'status'    =>  'post_not_find'
            ));
        }
        return $response;
    }
}
