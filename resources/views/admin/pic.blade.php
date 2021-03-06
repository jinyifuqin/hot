
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
                <li><a href="/admin/signout" class="button big fit">退出</a></li>
            </ul>
        </section>

    </section>
    <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

    <!-- Main -->
    <div id="main">

        <!-- Post -->
        {{--@if(isset($hdata))--}}
        @forelse($hdata as $hv)
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="#">{{$hv->title}}</a></h2>
                    {{--<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>--}}
                </div>
                <div class="meta">
                    <time class="published" datetime="2015-11-01">{{$hv->updated_at}}</time>
                    <a href="#" class="author"><span class="name">Jane Doe</span><img src="/images/avatar.jpg" alt="" /></a>
                </div>
            </header>
            <a href="#" class="image featured"><img style="width: 20em;" src="/uploads/{{$hv->pathname}}" alt="" /></a>
            {!!htmlspecialchars_decode($hv->content)!!}
            <footer>
                <ul class="actions">
                    <li><a href="#" class="button big">Continue Reading</a></li>
                </ul>
                <ul class="stats">
                    <li><a href="#">General</a></li>
                    <li><a href="#" class="icon fa-heart">28</a></li>
                    <li><a href="#" class="icon fa-comment">128</a></li>
                </ul>
            </footer>
        </article>
        @empty
        @endforelse


        <!-- Pagination -->
        <ul class="actions pagination">
            <li><a href="" class="disabled button big previous">Previous Page</a></li>
            <li><a href="#" class="button big next">Next Page</a></li>
        </ul>

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
                @foreach($data as $value)
                <!-- Mini Post -->
                <article class="mini-post">
                    <header>
                        <h3><a href="#">{{$value->title}}</a></h3>
                        <time class="published" datetime="2015-10-20">{{$value->updated_at}}</time>
                        <a href="#" class="author"><img src="/images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="/admin/piccontent/{{$value->id}}" class="image"><img width="400" height="200" src="/uploads/{{$value->pathname}}" alt="" /></a>
                </article>
                @endforeach


            </div>
        </section>

        <!-- Posts List -->
        <section>
            <ul class="posts">
                <li>
                    <article>
                        <header>
                            <h3><a href="#">Lorem ipsum fermentum ut nisl vitae</a></h3>
                            <time class="published" datetime="2015-10-20">October 20, 2015</time>
                        </header>
                        <a href="#" class="image"><img src="/images/pic08.jpg" alt="" /></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h3><a href="#">Convallis maximus nisl mattis nunc id lorem</a></h3>
                            <time class="published" datetime="2015-10-15">October 15, 2015</time>
                        </header>
                        <a href="#" class="image"><img src="/images/pic09.jpg" alt="" /></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h3><a href="#">Euismod amet placerat vivamus porttitor</a></h3>
                            <time class="published" datetime="2015-10-10">October 10, 2015</time>
                        </header>
                        <a href="#" class="image"><img src="/images/pic10.jpg" alt="" /></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h3><a href="#">Magna enim accumsan tortor cursus ultricies</a></h3>
                            <time class="published" datetime="2015-10-08">October 8, 2015</time>
                        </header>
                        <a href="#" class="image"><img src="/images/pic11.jpg" alt="" /></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h3><a href="#">Congue ullam corper lorem ipsum dolor</a></h3>
                            <time class="published" datetime="2015-10-06">October 7, 2015</time>
                        </header>
                        <a href="#" class="image"><img src="/images/pic12.jpg" alt="" /></a>
                    </article>
                </li>
            </ul>
        </section>

        <!-- About -->
        <section class="blurb">
            <h2>About</h2>
            <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
            <ul class="actions">
                <li><a href="#" class="button">Learn More</a></li>
            </ul>
        </section>

        <!-- Footer -->
        <section id="footer">
            <ul class="icons">
                <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
                <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <p class="copyright">&copy; Untitled. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>.</p>
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