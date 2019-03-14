@extends('website.layout')

@section('metaheader')
    <title>رسانه نوا - آپلود ویدیو</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    @endsection

@section('content')
    @include('website.header')
    <div class="clearfix"></div>
    <section class="k-central col-md-12 col-xs-12 col-sm-12 col-lg-12">
        <div class="container profile-container">

            <div class=" col-md-9 col-sm-12 col-xs-12 col-lg-9">
                <div class="profile-inner">
                    <div class="latest-activity-inner">
                        <div class="row nopadding k-title-row">
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                <div class="upload-video-form">
                                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <h3><i class="fa fa-file-video-o" aria-hidden="true"></i> فرم آپلود ویدئو</h3>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" required id="name" placeholder="عنوان ویدئو" name="title">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <select class="js-example-basic-multiple" id="province" name="category[]" multiple="multiple>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <textarea class="form-control" rows="5" id="comment" name="description" placeholder="توضیحات ویدئو"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12 k-web ">
                                                <div class="col-md-9 col-sm-12 nopadding pull-right">
                                                    <label class="pull-right kbtn black upload-label-btn col-md-4 col-xs-12">
                                                        <input required type="file" class="form-control-file" id="videoInputFile" name="attachment" aria-describedby="fileHelp">
                                                    </label><br>
                                                    <small id="fileHelp" class="form-text text-muted col-md-12 nopadding">قالب مجاز برای ارسال، mp4 می باشد.</small>
                                                </div>
                                                <button type="submit" class="kbtn red col-md-3 col-xs-12 pull-left">ارسال</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="side col-md-3 col-sm-4 col-xs-12 col-lg-3">
                <div class="k-profile k-side-box col-md-12 col-sm-12 col-xs-12 col-lg-12 nopadding">
                    <div class="profile-img">
                        <img src="{{\Illuminate\Support\Facades\Auth::user()->getuserprofile(\Illuminate\Support\Facades\Auth::user())}}" class="img-responsive">
                    </div>
                    <div class="profile-desc">
                        <h2>{{$user->name}}</h2>
                    </div>
                    <div class="profile-action-btn">
                        <ul class="list-group nopadding">
                            <li class="list-group-item"><a href="{{route('profile.getsetting')}}">ویرایش پروفایل</a></li>
                            <li class="list-group-item"><a href="{{route('profile.uploadvideo')}}">ارسال ویدئو</a></li>
                            <li class="list-group-item"><a href="{{route('profile.myvideos')}}">ویدئو های من</a></li>
                            <li class="list-group-item"><a href="{{route('logout')}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">خروج</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </aside>



        </div>
    </section>
    <div class="clearfix"></div>
    @include('website.footer')
    @endsection

@section('metafooter')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: 'دسته بندی ویدئو',
                maximumSelectionLength: 20
            });
        });
    </script>
    <style>
        .select2-container{
            width: 100% !important;
        }
    </style>
    @endsection