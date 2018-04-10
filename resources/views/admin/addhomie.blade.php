
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
        <form method="post" enctype="multipart/form-data" action="/admin/savehomie">
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
            请放入图片：<input type="file" name="picname">
            <p>
                <textarea name="content" class=" form-control" style="
                margin-top:2em;margin-bottom:2em;width:100%" rows="10"></textarea>
            </p>
            <footer>
                <ul class="actions">
                    <li><button class="button big">提交</button></li>
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
                        <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="#" class="image"><img src="images/pic04.jpg" alt="" /></a>
                </article>


            </div>
        </section>







    </section>

</div>

{{--<!-- Scripts -->--}}
{{--<script src="/assets/js/jquery.min.js"></script>--}}
{{--<script src="/assets/js/skel.min.js"></script>--}}
{{--<script src="/assets/js/util.js"></script>--}}
{{--<!--[if lte IE 8]><script src="/assets/js/ie/respond.min.js"></script><![endif]-->--}}
{{--<script src="/assets/js/main.js"></script>--}}

{{--</body>--}}
{{--</html>--}}
@stop