@extends('layout')
@section('content')
    <div class="container" style="padding-top: 2em;">
        <h3 class="text-center">添加日志</h3>
        <form enctype="multipart/form-data" class="form-horizontal" role="form" action="/admin/picsave" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-sm-2"></div>
                <label for="firstname" class="col-sm-2 control-label">标题：</label>
                <div class="col-sm-5">
                    <input type="text" name="title" class="form-control" id="firstname" placeholder="请输入标题">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 sr-only" for="inputfile">文件输入</label>
                <input class="col-sm-offset-4" name="picname" type="file" id="inputfile">
                <div class="form-group">
                    <textarea name="content" class="col-sm-offset-4 form-control" style="margin-top:2em;margin-bottom:2em;width:50%" rows="10"></textarea>
                    <button type="submit" class="col-sm-offset-4 btn-lg btn btn-primary">保存</button>
                </div>
            </div>
        </form>

        {{--<form action="/admin/picsave" method="post" enctype="multipart/form-data" >--}}
        {{--{{ csrf_field() }}--}}
        {{--标题：<input type="text" name="title"/><br/>--}}
        {{--图片：<input type="file" name="picname"/><br/>--}}
        {{--内容：<textarea name="content"></textarea>--}}
        {{--<input value="上传" type="submit">--}}
        {{--</form>--}}
    </div>

@stop
