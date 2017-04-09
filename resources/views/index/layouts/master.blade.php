<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <meta name="description" content="西安交通大学学生会官方网站">
    <meta name="author" content="Ganlv,eeyes.net">
    <title>西安交通大学学生会官方网站</title>
    <link rel="stylesheet" href="/assets/index/css/index.css">
    @yield('head-append')
</head>

<body>

    @yield('header')

    <div class="main">
        @yield('main')
    </div>

    @yield('footer')

    @yield('body-append')
</body>

</html>
