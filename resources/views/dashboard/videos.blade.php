@extends('dashboard.layout')

@section('metaheader')
    <title>رسانه نوا - ویدیو ها</title>
    @endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" dir="rtl">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ویدیو ها</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>عنوان</td>
                            <td>ناشر</td>
                            <td>توضیحات</td>
                            <td>آخرین وضعیت</td>
                            <td>بازدید</td>
                            <td>امتیاز</td>
                            <td>زمان ارسال</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td><a href="{{route('dashboard.video.edit',[$post->id])}}">{{$post->title}}</a></td>
                                <td>{{@$post->user->name .' / ' . @$post->user->mobile .' / '. @$post->user->email}}</td>
                                <td>{{substr($post->content,0,150)}}&nbsp;...</td>
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
                                <td>{{$post->views}}</td>
                                <td>{{$post->rate}}</td>
                                <td>{{$post->created_at->diffforHumans()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>


    </div>	<!--/.main-->
    @endsection