<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Ffmpeg;
use App\PostMeta;

class FFMPEG_check extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ffmpeg:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check FFMPEG Que LIST';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ffmpegs = Ffmpeg::where('status','waiting')->take(5)->get();
        foreach ($ffmpegs as $ffmpeg) {
            $ffmpeg->status = 'converting';
            $ffmpeg->update();
            $convert = ffmpeg_video(@$ffmpeg->patch,@$ffmpeg->size, @$ffmpeg->audio, @$ffmpeg->bitrate );
            PostMeta::create([
                'post_id'   =>  $ffmpeg->post_id,
                'key'       =>  'VideoFile',
                'value'     =>  $convert
            ]);
            $ffmpeg->status = 'end';
            $ffmpeg->update();
            PostMeta::create([
                'post_id'   =>  $ffmpeg->post_id,
                'key'       =>  'convert',
                'value'     =>  'true'
            ]);
            $ffmpeg->delete();
        }
    }
}
