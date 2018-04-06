@extends('layout')
@section('content')
    <div class="container" style="padding-top: 2em;">
        <div class="row">
            <div class="col-md-1">
                <a>Welcome,{{$usermsg['screen_name']}}</a>
                <img width="50" class="img-thumbnail" src="{{$usermsg['profile_image_url']}}"/>
            </div>
        </div>
        <div class="row">
            @foreach($ms['statuses'] as $info)
                <div style="padding:10px;margin:5px;border:1px solid #ccc">
                    {{$info['text']}}
                </div>
            @endforeach
        </div>
    </div>
@stop