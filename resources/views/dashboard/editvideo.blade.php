@extends('dashboard.layout')

@section('metaheader')
    <title>رسانه نوا - ویرایش ویدیو</title>
    <link rel="stylesheet" href="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.css" type="text/css"/>
    <!-- <script src="fluidplayer.min.js"></script> -->
    <script src="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.js"></script>
   
    @endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" dir="rtl">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ویرایش ویدیو </h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <form method="post" id="postcontainer" action="{{route('dashboard.video.update',[$post])}}" class="form-group" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="col-md-3">
                        <div class="panel-group">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse1"><i class="fa fa-file"></i> دسته بندی ها</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse">
                                    <div class="panel-body">
                                        <div id="category-all" class="tabs-panel">
                                            {{--@foreach($categories as $category)--}}
                                                {{--<input type="checkbox" name="categories[]"--}}
                                                       {{--@foreach($postcat as $pcat)--}}
                                                       {{--@if($category->id == $pcat->id)--}}
                                                       {{--checked--}}
                                                       {{--@endif--}}
                                                       {{--@endforeach--}}

                                                       {{--value="{{$category->id}}" />{{$category->name}}<br />--}}
                                            {{--@endforeach--}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse2"><i class="fa fa-gamepad"></i> ویژه بازی ها</a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse">
                                    <div class="panel-body">
                                        <div id="games-all" class="tabs-panel">
                                            {{--@foreach($games as $game)--}}
                                                {{--<input type="checkbox" name="games[]"--}}
                                                       {{--@foreach($postgame as $pgame)--}}
                                                       {{--@if($game->id == $pgame->id)--}}
                                                       {{--checked--}}
                                                       {{--@endif--}}
                                                       {{--@endforeach--}}

                                                       {{--value="{{$game->id}}" />{{$game->name}}<br />--}}
                                            {{--@endforeach--}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse3"><i class="fa fa-tag"></i> برچسب ها</a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse">
                                    <div class="panel-body">
                                        <div class="tagsdiv" id="post_tag">
                                            <div class="jaxtag">

                                                <div class="ajaxtag hide-if-no-js">
                                                    <label class="screen-reader-text" for="new-tag-post_tag">افزودن برچسب</label>
                                                    <p>
                                                        <input data-wp-taxonomy="post_tag" id="new-tag-post_tag"  class="newtag form-input-tip ui-autocomplete-input" size="16" autocomplete="off" aria-describedby="new-tag-post_tag-desc" value="" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="ui-id-1" type="text">
                                                        <a class="btn btn-default" onclick="addnewtag()">افزودن</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <select id="taglists" multiple class="form-control" name="taglistsss[]">
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->name}}" selected onclick="this.remove()">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                            <p>جهت حذف هر تگ ، بر روی تگ مورد نظر کلیک کنید</p>
                                            <script>
                                                function addnewtag() {
                                                    var ntag = document.getElementById("new-tag-post_tag").value;
                                                    var select = document.getElementById("taglists");
                                                    var option = document.createElement('option');
                                                    option.text = ntag;
                                                    option.value = ntag;
                                                    option.onclick=function (ev) {
                                                        this.remove();
                                                    };
                                                    select.add(option);
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse4"><i class="fa fa-eye"></i> بازدید ها</a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse">
                                    <div class="panel-body" id="">
                                        <h4>{{$post->views}}</h4>
                                    </div>
                                </div>
                            </div>

                            <br><br>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse5"><i class="fa fa-rate"></i> امتیاز کاربران</a>
                                    </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse">
                                    <div class="panel-body" id="">
                                        <h4>{{$post->rate}}</h4>
                                    </div>
                                </div>
                            </div>

                            <br><br>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse6"><i class="fa fa-picture-o"></i> تصویر شاخص</a>
                                    </h4>
                                </div>
                                <div id="collapse6" class="panel-collapse">
                                    <div class="panel-body" id="thumbnailpanel">
                                        <img id="thumbnail" src="{{@$post->thumbnail($post)}}" alt="" class="img-responsive">
                                        @if($post->thumbnail($post))
                                            <div class="clearfix"></div>
                                            <br>
                                            <a onclick="remove_thumbnail()" id="thumbnailremvoe" class="btn btn-danger">حذف تصویر شاخص</a>
                                            <br>
                                            <div class="clearfix"></div>
                                        @else
                                            <input type="file" name="attachment" multiple>
                                        @endif


                                        <script>
                                            function remove_thumbnail() {
                                                document.getElementById('thumbnail').remove();
                                                document.getElementById('thumbnailremvoe').remove();
                                                document.getElementById('thumbnailpanel').innerHTML='<input type="file" name="attachment" multiple><input type="text" name="statusattachment" value="true" hidden>';
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-6">
                            <select name="status" id="status" class="">
                                <option value="publish" @if($post->status == 'publish') selected @endif>عمومی</option>
                                <option value="inherit" @if($post->status == 'inherit') selected @endif>در انتظار بررسی</option>
                                <option value="reject" @if($post->status == 'reject') selected @endif>رد شده</option>
                            </select>
                            <a class="btn btn-primary" onclick="letspublish()">بروزرسانی</a>
                            {{--<input type="submit" class="btn btn-primary" value="انتشار">--}}
                        </div>
                        <div class="col-md-6">
                            <div class="form-inline">
                                <div class="form-group col-md-12">
                                    <div class="col-md-10">
                                        <input type="text" style="width: 100%;"  name="title" value="{{$post->title}}" id="title" class="form-control col-md-12">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="title" style="padding: 10px;">عنوان</label>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <label for="excerpt">چکیده مطلب</label>
                        <textarea name="excerpt" id="excerpt"  cols="30" rows="6" class="form-control"></textarea>
                        <br>
                        <textarea id="mytextarea" name="contentt" dir="rtl" class="text-right"></textarea>
                        <br>
                        <label for="excerpt">ویدیو</label>
                        <div class="col-md-12">
                            <video id="video-id">
                                <source src="{{$post->metas()->where('key','VideoFile')->first()->value}}" type="video/mp4"/>
                            </video>
                        </div>
                    </div>
                </form>

            </div>
        </div>


    </div>	<!--/.main-->
    <script>
        function letspublish(){
            $.each($("#taglists>option"), function(){
                $(this).attr("selected","selected");
            });
            document.getElementById('postcontainer').submit();
        }
    </script>
<script>
    // fluidPlayer("video-id");
    fluidPlayer(
   'video-id',
    {
        vastOptions: {
            
            skipButtonCaption:          'رد شدن از آگهی در [seconds] ثانیه',
            skipButtonClickCaption:     'از آگهی رد شوید <span class="skip_button_icon"></span>',
            adText:                     null,
            adTextPosition:             'top left',
            adCTAText:                  'Visit now!',
            adCTATextPosition:          'bottom right',
            vastTimeout:                5000,
            maxAllowedVastTagRedirects: 1,

            vastAdvanced: {
                vastLoadedCallback:       (function() {}),
                noVastVideoCallback:      (function() {}),
                vastVideoSkippedCallback: (function() {}),
                vastVideoEndedCallback:   (function() {})
            }
        },
        layoutControls: {
            primaryColor: "#bb2024",
            fillToContainer: true,
            htmlOnPauseBlock: {
                html: '<b>متوقف شد</b>', // Default null
                height: 50, // Default null
                width: 100 // Default null
            }
        }
    }
);
</script>

    @endsection