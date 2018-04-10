<!DOCTYPE html>
<html>
<head>
    <title>诺诺Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    {{--引入内容模板--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1" />--}}
    <!--[if lte IE 8]><script src="/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="/assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="/assets/css/ie8.css" /><![endif]-->
</head>
<body>
@yield('header')
@yield('content')
        <!-- Scripts -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/skel.min.js"></script>
<script src="/assets/js/util.js"></script>
<!--[if lte IE 8]><script src="/assets/js/ie/respond.min.js"></script><![endif]-->
<script src="/assets/js/main.js"></script>
</body>
</html>
