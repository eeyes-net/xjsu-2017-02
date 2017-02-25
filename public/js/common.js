$(document).ready(function(){
	const carouselrate = 3.2524;
	var wwidth = $(window).width();
	var wheight = $(window).height();
	var mainPartWidth = wwidth - 166;

	var mainPart = $('.main-part');
	mainPart.width(mainPartWidth);

	// 技术支持统一调整高度
	var techSupports = $('.tech-support > *');
	techSupports.each(function(i){
		var jthis = $(this);
		var iheight = jthis.height();
		jthis.css({marginTop: 24 - iheight / 2});
	})

	// 轮播图部分
	var carousel = $('carousel');
	var carouselBg = $('.carousel-bg');
	carousel.width(mainPartWidth);
	carouselBg.width(wwidth);

	// 高度自适应
	var realHeight = wwidth / carouselrate;
	carousel.height(realHeight);
	carouselBg.height(realHeight);
	carouselBg.css({marginLeft: -83});

	var carouselImg = $('.carousel-img');
	carouselImg.width(wwidth);
	carouselImg.height(realHeight);
	// carouselImg.on('mouseenter',function(){
	// 	carouselImg.css({cursor: 'pointer'});
	// });

	// 轮播图
	var carouselBgUl = $('.carousel-bg ul');
	carouselBgUl.width(wwidth * 3);

	var carouselBgA = $('.carousel-bg a');
	carouselBgA.width(wwidth);
	carouselBgA.height(realHeight);

	var carouselIndexLi = $('.carousel-index li');
	carouselIndexLi.on('click',function(){
		var carouselCurrentIndex = carouselIndexLi.index($('.carousel-index li.c-active')[0]);
		var carouselTargetIndex = carouselIndexLi.index(this);
		carouselBgUl.css({marginLeft: - wwidth * carouselTargetIndex + 'px'});
		$('.carousel-index li.c-active').removeClass('c-active');
		$(this).addClass('c-active');
	});

	// 主标题悬浮效果
	var mainTitle = $('.main-title');
	var mainTitlep = $('.main-title p');
	mainTitle.on('mouseenter',function(){
		mainTitle.css({backgroundColor: '#26997c', cursor: 'pointer'});
		mainTitlep.css({color: '#fff'});
	});
	mainTitle.on('mouseleave',function(){
		mainTitle.css({backgroundColor: '#fff', cursor: 'default'});
		mainTitlep.css({color: '#26997c'});
	});

	// 精品推送、品牌活动间距自适应效果
	var realPicturePadding = ( mainPartWidth - 1080 ) / 2;
	var pwi = $('.pwi');
	var pwcontentul = $('.pw-content ul');
	pwi.css({padding:  '0 ' + realPicturePadding / 2 + 'px', width: 360 + realPicturePadding + 'px'});
	pwcontentul.css({marginLeft: - realPicturePadding / 2 + 'px', width: mainPartWidth * 2});

	// 精品推送、品牌活动翻页支持
	var contentIndexUl = $('.content-index ul');
	var contentIndexli = $('.content-index li');
	contentIndexli.on('click',function(){
		var contentCurrentIndex = contentIndexli.index($('.content-index li.c-active')[0]);
		var contentTargetIndex = contentIndexli.index(this);
		contentIndexUl.css({marginLeft: - mainPartWidth * contentTargetIndex + 'px'});
		$('.content-index li.content-active').removeClass('content-active');
		$(this).addClass('content-active');
	});
})