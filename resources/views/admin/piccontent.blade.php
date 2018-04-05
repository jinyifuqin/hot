@extends('layout')
@section('content')
    <div class="container">
        @foreach($res as $value)
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-align: center">{{$value->title}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <img src="{{ URL::asset('APIyyh/safepic.php') }}">
                <img style="width: 100%;" class="img-thumbnail" src="/uploads/{{$value->pathname}}"/>
            </div>
            <div class="col-md-9 well well-lg" style="background-color: #dedef8;box-shadow:inset 1px -1px 1px #444, inset -1px 1px 1px #444;min-height: 23em;">
            {{$value->content}}
            </div>
        </div>
        @endforeach
        <div class="row">
            <a href="/admin/sendmail" class="col-md-1 col-lg-offset-2 btn-sm btn btn-primary">
                发送邮件
            </a>
            <a href="/admin/jobsendmail" class="col-md-1 col-lg-offset-2 btn-sm btn btn-primary">
                邮件任务
            </a>
        </div>
            {{--<div class="row">--}}
                {{--<div class="center-block" style="width:30%;">--}}
                    {{--<ul class="pagination">--}}
                        {{--<li><a href="#">&laquo;</a></li>--}}
                        {{--<li><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">4</a></li>--}}
                        {{--<li><a href="#">5</a></li>--}}
                        {{--<li><a href="#">&raquo;</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
    </div>

@stop