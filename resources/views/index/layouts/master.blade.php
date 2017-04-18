<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1366">
    <meta name="description" content="西安交通大学学生会官方网站">
    <meta name="author" content="Ganlv,eeyes.net">
    <title>西安交通大学学生会官方网站</title>
    <link rel="stylesheet" href="/assets/index/css/index.css">
    <link rel="stylesheet" href="/assets/index/css/animate.css">
    @yield('head-append')
</head>

<body>

    @yield('header')

    <div class="main">
        @yield('main')
    </div>

    @yield('footer')

    <script src="/assets/index/dist/js/jquery-3.1.1.min.js"></script>
    <script src="/assets/index/js/animate.js"></script>
    <script src="/assets/index/js/index.js"></script>

    @yield('body-append')
</body>

</html>
