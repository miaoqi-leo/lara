<div class="rig_top">
  <!-- <h1>test</h1> -->
    <div class="city">
      欢迎你　


      @if(session('user'))
      <a href="{{url('member')}}" target="_blank"> {{session('user')->user_name}}</a>
      @else
      <a href="{{url('member')}}">　登录</a>
      @endif

       {{--<span><a href="http://bq.com/api/city.php" style="color:#fff;">[ 切换城市：全国]</a></span>--}}
    </div>

    <div class="welocome">欢迎光临无穷大网络平台!</div>
    <div style="display:inline-block;padding-left:10px;"><a style="color:#fff;" href="{{url('about')}}">关于我们</a></div>
    <div style="display:inline-block;padding-left:10px;"><a style="color:#fff;" href="#">联系我们</a></div>
    <div class="data">
        {{--<span id="info1">今天是：2016年9月11日</span>--}}
        <script language="javascript" type="text/javascript">
            //js获取日期
            function time()
            {
              var now= new Date();
              var year=now.getFullYear();
              var month=now.getMonth();
              var date=now.getDate();
            //写入相应id
             document.getElementById("info1").innerHTML="今天是："+year+"年"+(month+1)+"月"+date+"日";
            }
        </script>
        <!-- <iframe width="450" scrolling="no" height="18" frameborder="0" allowtransparency="true" src="{{asset('resources/views/home/js/index.html')}}"></iframe> -->
    </div>
</div>
