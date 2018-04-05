@extends('layout')
@section('content')
    <div class="container">
        <div id="applyFor" style="font-size: 20px;font-weight: bold;text-align: center; width: 500px; margin: 100px auto;">
            {{$message}},将在<span class="loginTime" style="color: red">{{$jumpTime}}</span>秒后跳转至<a href="{{$url}}" style="color: red">首页</a>页面
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar"
                 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                 style="width: 100%;">
                <span class="sr-only">100% 完成（成功）</span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function(){
            var url = "{{$url}}";
            var num = parseInt($('.loginTime').text());
            var loginTime = num;
            var time = setInterval(function(){
                loginTime = loginTime-1;
                $('.loginTime').text(loginTime);
                $('.progress-bar').css('width',parseFloat(loginTime)*100/parseFloat(num)+'%');
                if(loginTime==0){
                    clearInterval(time);
                    window.location.href=url;
                }
            },1000);
        })
    </script>
@stop
