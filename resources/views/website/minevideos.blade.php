@extends('website.layout')

@section('metaheader')
    <title>رسانه نوا - ویدیو های من</title>
    @endsection

@section('content')
    @include('website.header')
    <div class="clearfix"></div>
    <section class="k-central col-md-12 col-xs-12 col-sm-12 col-lg-12">
        <div class="container profile-container">

                <div class=" col-md-8 col-sm-12 col-xs-12 col-lg-8 profile-edit-form">
                    <div class="profile-inner">
                        <h3 class="mt-0"><i class="fa fa-address-card-o" aria-hidden="true"></i> ویدیو های من</h3>
                        <div class="clearfix"></div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>عنوان</td>
                                    <td>تاریخ ارسال</td>
                                    <td>آخرین وضعیت</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td>
                                            @switch($post->status)
                                                @case("inherit")
                                                    <p class="btn btn-warning">در دست بررسی</p>
                                                @break
                                                @case("publish")
                                                    <p class="btn btn-success">منتشر شده</p>
                                                @break
                                                @case("reject")
                                                    <p class="btn btn-danger">رد شده</p>
                                                @break
                                                @endswitch
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <div class="clearfix"></div>
                        <br>


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