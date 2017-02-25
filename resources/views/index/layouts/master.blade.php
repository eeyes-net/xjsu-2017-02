<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>校会网站</title>

    <!-- meta使用viewport以确保页面可自由缩放 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- 引入 jQuery 库 -->
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- 引入首页样式表 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">

    <!-- 引入公共脚本文件 -->
    <script type="text/javascript" src="{{ asset('js/common.js') }}"></script>

    @yield('head-append')

</head>

<body>
    <!-- 内容放置于此div内 -->
    <div class="main-part">

    @yield('header')

    <!-- 主内容 -->
        <div class="main">
            @yield('main')
        </div>

        @yield('footer')
    </div>

    @yield('body-append')
</body>

</html>
