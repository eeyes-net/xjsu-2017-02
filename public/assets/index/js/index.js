$(function () {
    // 导航栏跳转滚动屏幕

    /**
     * 平滑滚动到页面某处
     *
     * @param {number} y
     * @param {number} [time]
     */
    var scrollTo = function (y, time) {
        if (void 0 === time) {
            time = (y > 1500) ? 750 : (y / 2);
        }
        $('body').animate({scrollTop: y}, time);
    };
    $('.nav-link-li a').on('click', function (e) {
        e.preventDefault();
        scrollTo($($(this).attr('href')).offset().top);
        return false;
    });

    // 轮播图切换

    Number.prototype.mod = function (n) {
        return ((this % n) + n) % n;
    };
    /**
     * 跳转到第i张图片
     * @param {number} i 第一个是0，第二个是1
     */
    var setCarousel = function (i) {
        i = parseInt(i).mod($('.carousel-image-li').length);
        $('.carousel-image-ul')
        .attr('data-index', i)
        .animate({marginLeft: (-i * 1366 + 'px')}, 500);
        $('.carousel-ordered-button').removeClass('active');
        $('.carousel-ordered-button[data-index="' + i + '"]').addClass('active');
    };
    $('.carousel-shift-button.pre').on('click', function () {
        setCarousel(($('.carousel-image-ul').attr('data-index') || 0) - 1);
    });
    $('.carousel-shift-button.next').on('click', function () {
        setCarousel(($('.carousel-image-ul').attr('data-index') || 0) + 1);
    });
    $('.carousel-ordered-button').on('click', function () {
        setCarousel($(this).attr('data-index'));
    });
    setInterval(function () {
        $('.carousel-shift-button.next').trigger('click');
    }, 3000);

    // 校园服务切换标签页

    $('.service-tab-title-li').on('click', function () {
        $('.service-tab-title-li').removeClass('active');
        $(this).addClass('active');
        var href = $(this).find('.service-tab-title-text').attr('data-href');
        $('.service-tab').removeClass('active');
        $(href).addClass('active');
    });

    // Pjax翻页
    var pjax = function ($body, url, animate, callback) {
        $.get(url, function (html) {
            animate($body, html, callback);
        });
    };

    // 翻页通用函数
    var selectNewsPage = function (page, relative) {
        page = parseInt(page);
        relative = relative || false;
        var $section = $('#news');
        var $body = $section.find('.news-section-body');
        var currentPage = $body.attr('data-page') || 1;
        if (relative) {
            page += parseInt(currentPage);
        }
        if (page > 3) {
            // TODO
        } else if (page > 0) {
            var callback = function () {
                $body.attr('data-page', page);
                $section.find('.main-section-ordered-button-li button').removeClass('active').eq(page - 1).addClass('active');
            };
            if (page > currentPage) {
                pjax($body, '/pjax/news?page=' + page, Animate.flipDown, callback);
            } else if (page < currentPage) {
                pjax($body, '/pjax/news?page=' + page, Animate.flipUp, callback);
            }
        }
    };
    var selectPushPage = function (page, relative) {
        page = parseInt(page);
        relative = relative || false;
        var $section = $('#push');
        var $body = $section.find('.main-section-body-photo-card');
        var currentPage = $body.attr('data-page') || 1;
        if (relative) {
            page += parseInt(currentPage);
        }
        if (page > 3) {
            // TODO
        } else if (page > 0) {
            var callback = function () {
                $body.attr('data-page', page);
                $section.find('.main-section-ordered-button-li button').removeClass('active').eq(page - 1).addClass('active');
            };
            if (page > currentPage) {
                pjax($body, '/pjax/push?page=' + page, Animate.slideLeft, callback);
            } else if (page < currentPage) {
                pjax($body, '/pjax/push?page=' + page, Animate.slideRight, callback);
            }
        }
    };
    var selectActivityPage = function (page, relative) {
        page = parseInt(page);
        relative = relative || false;
        var $section = $('#activity');
        var $body = $section.find('.main-section-body-photo-card');
        var currentPage = $body.attr('data-page') || 1;
        if (relative) {
            page += parseInt(currentPage);
        }
        if (page > 3) {
            // TODO
        } else if (page > 0) {
            var callback = function () {
                $body.attr('data-page', page);
                $section.find('.main-section-ordered-button-li button').removeClass('active').eq(page - 1).addClass('active');
            };
            if (page > currentPage) {
                pjax($body, '/pjax/activity?page=' + page, Animate.slideLeft, callback);
            } else if (page < currentPage) {
                pjax($body, '/pjax/activity?page=' + page, Animate.slideRight, callback);
            }
        }
    };

    // 翻页Listener
    var $news = $('#news');
    $news.find('.main-section-shift-button.next').on('click', function () {
        selectNewsPage(1, true);
    });
    $news.find('.main-section-shift-button.pre').on('click', function () {
        selectNewsPage(-1, true);
    });
    $news.find('.main-section-ordered-button').on('click', function () {
        selectNewsPage(parseInt($(this).text()));
    });
    var $push = $('#push');
    $push.find('.main-section-shift-button.next').on('click', function () {
        selectPushPage(1, true);
    });
    $push.find('.main-section-shift-button.pre').on('click', function () {
        selectPushPage(-1, true);
    });
    $push.find('.main-section-ordered-button').on('click', function () {
        selectPushPage(parseInt($(this).text()));
    });
    var $activity = $('#activity');
    $activity.find('.main-section-shift-button.next').on('click', function () {
        selectActivityPage(1, true);
    });
    $activity.find('.main-section-shift-button.pre').on('click', function () {
        selectActivityPage(-1, true);
    });
    $activity.find('.main-section-ordered-button').on('click', function () {
        selectActivityPage(parseInt($(this).text()));
    });
});
