@extends('website.layout')

@section('metaheader')
    <title>رسانه نوا - تنظیمات پروفایل</title>
    @endsection

@section('content')
    @include('website.header')
    <div class="clearfix"></div>
    <section class="k-central col-md-12 col-xs-12 col-sm-12 col-lg-12">
        <div class="container profile-container">
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                @csrf
            <div class=" col-md-8 col-sm-12 col-xs-12 col-lg-8 profile-edit-form">
                <div class="profile-inner">
                        <h3 class="mt-0"><i class="fa fa-address-card-o" aria-hidden="true"></i> مشخصات عمومی</h3>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="name" placeholder="نام و نام خانوادگی" name="name" value="{{$user->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="email" class="form-control" id="email" placeholder="ایمیل شما" name="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="tel" placeholder="همراه شما" name="mobile" value="{{$user->mobile}}">
                            </div>
                        </div>

                        <h3 class="k-web"><i class="fa fa-address-card-o" aria-hidden="true"></i> شبکه های اجتماعی</h3>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="telegram" placeholder="آدرس تلگرام شما" name="telegram" value="{{@\Illuminate\Support\Facades\Auth::user()->metas()->where('key','telegram')->first()->value}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="instagram" placeholder="آدرس اینستاگرام شما" name="instagram" value="{{@\Illuminate\Support\Facades\Auth::user()->metas()->where('key','instagram')->first()->value}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="whatsapp" placeholder="ادرس فیسبوک شما" name="facebook" value="{{@\Illuminate\Support\Facades\Auth::user()->metas()->where('key','facebook')->first()->value}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="skype" placeholder="آدرس توییتر شما" name="twitter" value="{{@\Illuminate\Support\Facades\Auth::user()->metas()->where('key','twitter')->first()->value}}">
                            </div>
                        </div>
                        <h3 class="k-web"><i class="fa fa-address-card-o" aria-hidden="true"></i> بیوگرافی</h3>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="form-control" rows="5" id="comment" placeholder="بیوگرافی" name="bio">{{$user->bio}}</textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <h3 class="k-web"><i class="fa fa-address-card-o" aria-hidden="true"></i> تغییر رمز عبور</h3>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="name" placeholder="رمز عبور جدید" name="password" value="" dir="ltr">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="name" placeholder="تکرار رمز عبور جدید" name="repassword" value="" dir="ltr">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="kbtn red col-md-3 pull-left">ویرایش</button>
                            </div>
                        </div>

                </div>
            </div>
            <aside class="side col-md-4 col-sm-12 col-xs-12 col-lg-4">
                <div class="k-profile k-side-box col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group row col-md-12">
                        <div class="form-group mb30" style="background:url({{@\Illuminate\Support\Facades\Auth::user()->getuserprofile(\Illuminate\Support\Facades\Auth::user())}});background-size: cover;    background-position: center center;">
                            <div class="add-photo">
                                <label class="icon-picture gray">
                                    <input type="file" name="attachment" id="picture">
                                </label>
                            </div>
                        </div>
                        <div class="profilr-edit-caption">
                            <p class="text-center">تنظیمات پروفایل : {{$user->name}} </p>
                        </div>
                        <div class="profile-action-btn">
                            <ul class="list-group nopadding">
                                <li class="list-group-item"><a href="{{route('profile.index')}}"> پروفایل</a></li>
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
                </div>
            </aside>
            </form>

        </div>
    </section>
    <div class="clearfix"></div>
    @include('website.footer')
    @endsection