<?php
/**
 * Created by PhpStorm.
 * User: Saeed
 * Date: 12/6/2018
 * Time: 12:34 PM
 */

function get_server_patch(){
    return getcwd();
}
function send_direct_sms($mobile,$message){
    $APIKey = "2b5072f1ba7b49c4616e72f1";
    $SecretKey = "9092301202!@#";
    $LineNumber = "30004747472192";

    // your mobile numbers
    $MobileNumbers = array($mobile);

    // your text messages
    $Messages = array($message);

    // sending date
    @$SendDateTime = date("Y-m-d")."T".date("H:i:s");

    @$SmsIR_SendMessage = new SmsIR_SendMessage($APIKey,$SecretKey,$LineNumber);
    @$SendMessage = $SmsIR_SendMessage->SendMessage($MobileNumbers,$Messages,$SendDateTime);
    return [];
}

function ffmpeg_duration($output){
    $shell = 'ffprobe -i '.get_server_patch().$output.' -show_entries format=duration -sexagesimal -v quiet -of csv="p=0"';
    $durat = shell_exec($shell);
    $durat = strstr($durat, '.', true);
    return $durat;
}

function ffmpeg_image($input){
    $shell = 'ffmpeg -ss 0:00:20 -i ' . get_server_patch().$input . ' -t 1 -s 1280*720 -f image2 ' . get_server_patch().$input.'-thumbnail.jpg';
    shell_exec($shell);
    return $input.'-thumbnail.jpg';
}

function ffmpeg_video($input,$size, $audio_size = '128k', $video_bitrate = '1000k' , $format = 'mp4') {
   $shell = 'ffmpeg -i ' . get_server_patch().'/public'.$input . ' -f '.$format.' -framerate 24 -codec:v libx264 -profile:v high -preset slower -b:v '.$video_bitrate.' -vf scale=' . $size . ' -threads 6 -c:a aac -b:a ' . $audio_size . ' -strict experimental ' .  get_server_patch().'/public'.$input.'-mobile.mp4';
   // echo $shell;
    shell_exec($shell);
    return $input.'-mobile.mp4';
}

function send_fast_sms($mobile,$message){
    date_default_timezone_set("Asia/Tehran");

    // your sms.ir panel configuration
    $APIKey = env('SMS_APIKey');
    $SecretKey = env('SMS_SecretKey');

    $APIURL = "https://ws.sms.ir/";

    // message data
    $data = array(
        "ParameterArray" => array(
            array(
                "Parameter" => "VerificationCode",
                "ParameterValue" => $message
            )
        ),
        "Mobile" => $mobile,
        "TemplateId" => "6920"
    );

    $SmsIR_UltraFastSend = new SmsIR_UltraFastSend($APIKey, $SecretKey, $APIURL);
    $UltraFastSend = $SmsIR_UltraFastSend->ultraFastSend($data);
    return [];
}
