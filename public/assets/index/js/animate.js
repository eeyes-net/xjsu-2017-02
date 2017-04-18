/**
 * Created by ganlv on 2017/4/18.
 */
var Animate = Animate || {};
Animate.const = {};
Animate.const.flip = {};
Animate.const.flip.interval = 50;
Animate.const.flip.duration = 200;
Animate.const.slide = {};
Animate.const.slide.duration = 500;
Animate.flip = function ($body, html, direction, callback) {
    if ($body.hasClass('animate-lock')) {
        $body.children().last().html(html);
        return false;
    }
    $body.addClass('animate-lock');
    var $old = $body.children().first();
    var $oldChildren = $old.children();
    var $new = $old.clone();
    $new.html(html);
    $new.css('margin-top', -$old.outerHeight());
    var $newChildren = $new.children();
    $newChildren.css('opacity', '0');
    $body.append($new);
    var h1 = $new.height();
    $new.height($old.height());
    var animateIn = '', animateOut = '';
    switch (direction) {
        case 'down':
            animateIn = 'flipDownInX';
            animateOut = 'flipDownOutX';
            break;
        case 'up':
            animateIn = 'flipUpInX';
            animateOut = 'flipUpOutX';
            break;
    }
    for (var i = 0; i < $oldChildren.length; ++i) {
        (function (i) {
            var $oldChildrenI = $($oldChildren[i]);
            setTimeout(function () {
                $oldChildrenI.addClass(animateOut);
                $oldChildrenI.css('opacity', '0');
                setTimeout(function () {
                    $oldChildrenI.removeClass(animateOut);
                }, Animate.const.flip.duration);
            }, i * Animate.const.flip.interval);
        })(i);
    }
    setTimeout(function () {
        $new.animate({
            height: h1
        }, Animate.const.flip.duration, function () {
            $new.css('height', '');
        });
    }, Animate.const.flip.duration + $oldChildren.length * Animate.const.flip.interval);
    for (var i = 0; i < $newChildren.length; ++i) {
        (function (i) {
            var $newChildrenI = $($newChildren[i]);
            setTimeout(function () {
                $newChildrenI.addClass(animateIn);
                $newChildrenI.css('opacity', '');
                setTimeout(function () {
                    $newChildrenI.removeClass(animateIn);
                }, Animate.const.flip.duration);
            }, Animate.const.flip.duration + i * Animate.const.flip.interval);
        })(i);
    }
    setTimeout(function () {
        $newChildren.removeClass('flipDownInX flipUpInX');
        $new.css('margin-top', '');
        $body.empty();
        $body.append($new);
        $body.removeClass('animate-lock');
        callback && callback();
    }, 2 * Animate.const.flip.duration + $newChildren.length * Animate.const.flip.interval);
};
Animate.slide = function ($body, html, direction, callback) {
    if ($body.hasClass('animate-lock')) {
        $body.children().last().html(html);
        return false;
    }
    $body.addClass('animate-lock');
    $body.css('overflow', 'hidden');
    var $old = $body.children().first();
    var $new = $old.clone();
    $new.html(html);
    $new.css('margin-top', -$old.outerHeight());
    $body.append($new);
    switch (direction) {
        case 'left':
            $old.addClass('slideLeftOutX');
            $new.addClass('slideRightInX');
            break;
        case 'right':
            $old.addClass('slideRightOutX');
            $new.addClass('slideLeftInX');
            break;
    }
    $old.css('opacity', '0');
    $new.css('opacity', '1');
    setTimeout(function () {
        $new.removeClass('slideRightInX slideLeftInX');
        $new.css('margin-top', '');
        $body.empty();
        $body.append($new);
        $body.removeClass('animate-lock');
        callback && callback();
    }, Animate.const.slide.duration);
};
Animate.flipUp = function ($body, html, callback) {
    Animate.flip($body, html, 'up', callback);
};
Animate.flipDown = function ($body, html, callback) {
    Animate.flip($body, html, 'down', callback);
};
Animate.slideLeft = function ($body, html, callback) {
    Animate.slide($body, html, 'left', callback);
};
Animate.slideRight = function ($body, html, callback) {
    Animate.slide($body, html, 'right', callback);
};
