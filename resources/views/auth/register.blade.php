@extends('website.layout')
@section('metaheader')
    <title>رسانه نوا - ثبت نام</title>
@endsection

@section('content')
    <div class="jeg_viewport">
        @include('website.header')
        <div class="clearfix"></div>
        <div class="register-box">

            <section class="k-central col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="container profile-container">

                    <div id="register" class=" col-md-6 col-sm-12 col-xs-12 col-lg-6">
                        <div class="register-back">
                            <h1><i class="fa fa-lock" aria-hidden="true"></i> ثبت نام</h1>
                            <form class="register-form" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                @csrf
                                <div class="field name-box">
                                    <input type="text" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید...">
                                </div>

                                <div class="field username-box">
                                    <input type="text" name="username" placeholder="شناسه کاربری خود را وارد کنید...">
                                </div>

                                <div class="field email-box">
                                    <input type="text" name="email" placeholder="name@email.com">
                                </div>

                                <div class="field password-box">
                                    <input type="password" name="password" placeholder="کلمه عبور خود را وارد کنید...">
                                </div>

                                <div class="field repassword-box">
                                    <input type="password" name="repassword" placeholder="مجددا کلمه عبور خود را وارد کنید...">
                                </div>

                                <div class="captcha">
                                    <div class="g-recaptcha col-md-8 col-xs-12 nopadding">
                                        <?php

                                        $attributes = [

                                            'data-theme' => 'light',

                                        ];

                                        ?>

                                        {!! Captcha::display($attributes) !!}

                                    </div>
                                    <input class="button pull-left col-md-4 col-xs-12" type="submit" value="ارسال">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <div class="clearfix"></div>
        @include('website.footer')
    </div>

@endsection


{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--<div class="row justify-content-center">--}}
{{--<div class="col-md-8">--}}
{{--<div class="card">--}}
{{--<div class="card-header">{{ __('Register') }}</div>--}}

{{--<div class="card-body">--}}
{{--<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">--}}
{{--@csrf--}}

{{--<div class="form-group row">--}}
{{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>--}}

{{--@if ($errors->has('name'))--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--<strong>{{ $errors->first('name') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>--}}

{{--@if ($errors->has('email'))--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--<strong>{{ $errors->first('email') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

{{--@if ($errors->has('password'))--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--<strong>{{ $errors->first('password') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row mb-0">--}}
{{--<div class="col-md-6 offset-md-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--{{ __('Register') }}--}}
{{--</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
