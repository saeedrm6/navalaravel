@extends('website.layout')
@section('metaheader')
    <title>رسانه نوا - پروفایل</title>
    @endsection
@section('content')
    @include('website.header')
    <div class="clearfix"></div>
    <section class="k-central col-md-12 col-xs-12 col-sm-12 col-lg-12">
        <div class="container profile-container">

            <div class=" col-md-9 col-sm-8 col-xs-12 col-lg-9">
                <div class="profile-inner">
                    <div class="user-boxes user-coments col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="user-boxes-inner">
                            <div class="user-pro-icon comment-usr-icon">
                                <i class="fa fa-comments" aria-hidden="true"></i>
                            </div>
                            <p>شما برای <span>15 پست</span> کامنت گذاشته اید</p><br>
                            <p>
                                <a class="kbtn red" href="#">مشاهده همه</a>
                            </p>
                        </div>
                    </div>
                    <div class="user-boxes user-coments col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="user-boxes-inner">
                            <div class="user-pro-icon comment-usr-icon">
                                <i class="fa fa-headphones" aria-hidden="true"></i>
                            </div>
                            <p>شما <span>15 لیست پخش</span> آهنگ دارید</p><br>
                            <p>
                                <a class="kbtn red" href="#">مشاهده همه</a>
                            </p>
                        </div>
                    </div>
                    <div class="user-boxes user-coments col-md-4 col-sm-4 col-xs-12 col-lg-4">
                        <div class="user-boxes-inner">
                            <div class="user-pro-icon comment-usr-icon">
                                <i class="fa fa-music" aria-hidden="true"></i>
                            </div>
                            <p>شما به <span>15 آهنگ</span> رای داده اید</p><br>
                            <p>
                                <a class="kbtn red" href="#">مشاهده همه</a>
                            </p>
                        </div>
                    </div>

                    <div class="latest-activity col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="latest-activity-inner">

                            <div class="row nopadding k-title-row">
                                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                    <h2 class="k-title-text">فعالیت های اخیر</h2>
                                    <br>
                                    <br>
                                    <p>به زودی ... </p>
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