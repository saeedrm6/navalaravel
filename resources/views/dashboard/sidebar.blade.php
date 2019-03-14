<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="{{\Illuminate\Support\Facades\Auth::user()->getuserprofile(\Illuminate\Support\Facades\Auth::user())}}" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>

    <ul class="nav menu">
        <li class="{{ \Request::path() == 'dashboard' ? 'active' : '' }}"><a href="{{route('dashboard.index')}}"><em class="fa fa-dashboard">&nbsp;</em> داشبورد</a></li>
        <li class="{{ \Request::path() == 'dashboard/videos' ? 'active' : '' }}"><a href="{{route('dashboard.videos')}}"><em class="fa fa-file-video-o">&nbsp;</em> ویدیو ها</a></li>
        <li><a href="widgets.html"><em class="fa fa-file">&nbsp;</em> پست ها</a></li>
        <li><a href="elements.html"><em class="fa fa-sliders">&nbsp;</em> دسته بندی ها</a></li>
        <li><a href="charts.html"><em class="fa fa-user">&nbsp;</em> کابران</a></li>
        {{--<li class="parent "><a data-toggle="collapse" href="#sub-item-1">--}}
                {{--<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>--}}
            {{--</a>--}}
            {{--<ul class="children collapse" id="sub-item-1">--}}
                {{--<li><a class="" href="#">--}}
                        {{--<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1--}}
                    {{--</a></li>--}}
                {{--<li><a class="" href="#">--}}
                        {{--<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2--}}
                    {{--</a></li>--}}
                {{--<li><a class="" href="#">--}}
                        {{--<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3--}}
                    {{--</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        <li><a href="{{route('logout')}}"><em class="fa fa-sign-out" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">&nbsp;</em> خروج</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</div><!--/.sidebar-->