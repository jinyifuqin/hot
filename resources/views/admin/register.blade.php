@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-align: center">用户注册</h3>
            </div>
        </div>
        <form enctype="multipart/form-data" class="form-horizontal" role="form" action="/admin/save" method="post">
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
                <label for="secname" class="col-sm-2 control-label">电子邮件：</label>
                <div class="col-sm-5">
                    <input type="email" name="email" class="form-control" id="secname" placeholder="请输入名字">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2"></div>
                <label for="thname" class="col-sm-2 control-label">密码：</label>
                <div class="col-sm-5">
                    <input type="password" name="psw" class="form-control" id="thname" placeholder="请输入名字">
                </div>
            </div>
            <div class="form-group">
                <label for="inputfile" class="col-sm-2 col-sm-offset-2 control-label">头像上传：</label>
                <input class="col-sm-offset-4" name="picname" type="file" id="inputfile">
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-2">
                    <button type="submit" class="btn-lg btn btn-primary">注册</button>
                </div>
            </div>
        </form>

    </div>

@stop
