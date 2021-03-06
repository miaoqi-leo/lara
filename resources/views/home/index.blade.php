<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>首页</title>
    <link rel="stylesheet" media="screen" href="{{asset('resources/views/home/css/style_mainpage.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('resources/views/home/css/jquery.jslides.css')}}"/>


    <script type="text/javascript" src="{{asset('resources/views/home/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/home/js/jquery.jslides.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/home/js/link.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/home/js/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
</head>


<body onload="time()">
<!-- data for weixin share -->


<input type="hidden" class="session_user" value=
@if( session('user'))
        "{{session('user')->user_name}}"
@else
    ""
@endif >
<div class="top">
    <div class="wrappersy">
        <div class="logo">
            <a href=" {{url('')}}"><img src="{{asset('resources/views/home/images/logo.jpg')}}"></a>
        </div>
        <div class="top_right">


            <!-- weather date ... -->
        @include('layouts.rig_top')

        <!-- nav bar -->
        @include('layouts.nav')

        <!-- seach bar -->
            @include('layouts.search')
        </div>
    </div>
</div>
<!-- 主横幅 -->
@include('layouts.widget.mpic')

<!-- 入驻信息 -->
@include('layouts.widget.join')


<!-- 小横幅 -->
@include('layouts.widget.spic')

<!-- 登陆 -->
@include('layouts.widget.ajax_login')

<!-- 主流媒体 -->
@include('layouts.widget.main_media')

<!-- 精品推荐 - 广告分类 -->
@include('layouts.widget.recm')

<!-- 广告位 - 自媒体 -->
<div class="guanggaowei">
    <a href="{{url('self_media')}}"><img src="{{asset('resources/views/home/images/guanggao.jpg')}}" alt=""/></a>
</div>

<!-- 精品推荐 - 设计分类 -->
@include('layouts.widget.recm1')



<!-- 公司展示 -->

@include('layouts.widget.companys')



<!-- 招商招标 -->
@include('layouts.widget.investment')




@include('layouts.footer')


</body>
</html>
