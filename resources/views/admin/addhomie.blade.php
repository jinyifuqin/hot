
@extends('layout')
@section('content')
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="#">Welcome,{{$re->username}}</a></h1>
        <nav class="links">
            <ul>
                <li><a href="#">家人</a></li>
                <li><a href="#">朋友</a></li>
                <li><a href="#">心情</a></li>
                <li><a href="#">天气</a></li>
                <li><a href="#">笔记</a></li>
            </ul>
        </nav>
        <nav class="main">
            <ul>
                <li class="search">
                    <a class="fa-search" href="#search">Search</a>
                    <form id="search" method="get" action="#">
                        <input type="text" name="query" placeholder="Search" />
                    </form>
                </li>
                <li class="menu">
                    <a class="fa-bars" href="#menu">Menu</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Menu -->
    <section id="menu">

        <!-- Search -->
        <section>
            <form class="search" method="get" action="#">
                <input type="text" name="query" placeholder="Search" />
            </form>
        </section>

        <!-- Links -->
        <section>
            <ul class="links">
                <li>
                    <a href="/admin/addhomie">
                        <h3>家人日记</h3>
                        <p>Family diary</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h3>Dolor sit amet</h3>
                        <p>Sed vitae justo condimentum</p>
                    </a>
                </li>

            </ul>
        </section>

        <!-- Actions -->
        <section>
            <ul class="actions vertical">
                <li><a href="/admin/signout" class="button big fit">Log In</a></li>
            </ul>
        </section>

    </section>
    <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

    <!-- Main -->
    <div id="main">

        <!-- Post -->
        <form method="post" class="formact" enctype="multipart/form-data" action="/admin/savehomie">
            {{ csrf_field() }}
        <article class="post">
            <header>
                <div class="title">
                    <h2>请输入文章标题：</h2>
                    <h2><input type="text" name="title"></h2>
                </div>
                <div class="meta">
                    <time class="published" datetime="2015-11-01">November 1, 2015</time>
                    <a href="#" class="author"><span class="name">{{$re->username}}</span>
                        <img src="/uploads/{{$re->headpic}}" alt="" /></a>
                </div>
            </header>
            {{--请放入图片：<input type="file" name="picname">--}}

            <input type="hidden" class="textareainfo" name="content">
            <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
            <footer>
                <ul class="actions">
                    <li><a class="formsub button big">提交</a></li>
                </ul>
            </footer>
        </article>

        </form>





    </div>

    <!-- Sidebar -->
    <section id="sidebar">

        <!-- Intro -->
        <section id="intro">
            <a href="#" class="logo"><img src="/uploads/{{$re->headpic}}" alt="" /></a>
            <header>
                <h2>未来之星</h2>
                <p> 人生不要等待机会 要创造机会<a href="http://html5up.net">By 大胡子叔叔</a></p>
            </header>
        </section>

        <!-- Mini Posts -->
        <section>
            <div class="mini-posts">
                <article class="mini-post">
                    <header>
                        <h3><a href="#">Vitae sed condimentum</a></h3>
                        <time class="published" datetime="2015-10-20">October 20, 2015</time>
                        <a href="#" class="author"><img src="/images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="#" class="image"><img src="/images/pic04.jpg" alt="" /></a>
                </article>


            </div>
        </section>







    </section>

</div>

<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
    ue.ready(function() {
        //设置编辑器的内容
//        ue.setContent('hello');
        //获取html内容，返回: <p>hello</p>
        var html = ue.getContent();
        //获取纯文本内容，返回: hello
        var txt = ue.getContentTxt();

        $('.formsub').click(function(){
//            var content = getContent();
            $('.textareainfo').val(UE.getEditor('editor').getContent());
            console.log(UE.getEditor('editor').getContent());
//            console.log($('.formact').serialize());return;
            $('.formact').submit();
//            console.log(html);
        });

    });

    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
{{--<!-- Scripts -->--}}
{{--<script src="/assets/js/jquery.min.js"></script>--}}
{{--<script src="/assets/js/skel.min.js"></script>--}}
{{--<script src="/assets/js/util.js"></script>--}}
{{--<!--[if lte IE 8]><script src="/assets/js/ie/respond.min.js"></script><![endif]-->--}}
{{--<script src="/assets/js/main.js"></script>--}}

{{--</body>--}}
{{--</html>--}}
@stop