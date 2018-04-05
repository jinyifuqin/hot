@extends('layout')
@section('content')
    <style>
        body{
            background-image: url("{{ URL::asset('Bjphoto.jpg') }}");
            background-repeat:no-repeat ;
            background-size:100% 100%;
            background-attachment: fixed;"
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-align: center">用户登录</h3>
            </div>
        </div>
        <form  class="form-horizontal" role="form" action="/admin/login" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-sm-2"></div>
                <label for="firstname" class="col-sm-2 control-label">用户名：</label>
                <div class="col-sm-5">
                    <input type="text" name="username" class="form-control" id="firstname" placeholder="请输入名字">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2"></div>
                <label for="firstname" class="col-sm-2 control-label">密码：</label>
                <div class="col-sm-5">
                    <input type="password" name="psw" class="form-control"  placeholder="请输入密码">
                </div>
            </div>
            {{--<input value="登录" type="submit">--}}
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-2">
                    <button type="submit" class="btn-lg btn btn-primary">登录</button>
                </div>
                <div class=" col-sm-2">
                        <a href="/admin/register" class="btn-lg btn btn-primary">
                            用户注册
                        </a>

                </div>
            </div>
        </form>

    </div>

@stop
