@extends('logintmp')
@section('content')


<!--SIGN UP-->
<h1>一诺Home</h1>
<div class="login-form">
    <div class="close"> </div>
    <div class="head-info">
        <label class="lbl-1"> </label>
        <label class="lbl-2"> </label>
        <label class="lbl-3"> </label>
    </div>
    <div class="clear"> </div>
    <div class="avtar">
        <img src="/images/avtar.png" />
    </div>
    <form method="post" action="/admin/login">
        <input type="text" id="username" class="text" name="username" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '用户名';}" >
        <div class="key">
            <input type="password" name="psw" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
        </div>

    <div class="signin">
        <input type="submit" value="Login" >
    </div>
    </form>
</div>
<div class="copy-rights">
    <p>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="ģ��֮��">ģ��֮��</a> - Collect from <a href="http://www.cssmoban.com/" title="��ҳģ��" target="_blank">��ҳģ��</a></p>
</div>

<script>
    $(function(){
        $('.close').click(function(){
            window.location.assign("/admin/register");
        });

        $('.signin').click(function(e){
            e.preventDefault();
            var val = $('#username').val();
            if(val == 'Username'){
                return false;
            }else{
               $('form').submit();
            }
//            console.log(val);
        });
    });
</script>
@stop