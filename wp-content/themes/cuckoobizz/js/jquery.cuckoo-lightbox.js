/* Copyright (c) CuckooThemes
* Author: CuckooThemes
* Url: http://cuckoothemes.com
* Version: 1.0.0
* Create: 2013.01.31
*/

(function( $ ){
		
	var methods = {
	
	defaults: {
		fadeSpeed: 500,
		animationSpeed: 500,
		minWidth: 200,
		minHeight: 150,
		easing: 'easeOutBack',
		title: 'standart', // inside, outside, standart, slide
		type: null,
		iframeWidth: 800,
		iframeHeight: 600,
		player: false,
		playerSpeed: 5000,
		playsettings: {
			timer: null,
			isActive: false
		},
		slideTitleEffect: 'slideInLeft', // slideInLeft, slideInRight, fadeUp, fadeDown
		slideTitlePositionVertical: 'bottom', // middle, top, bottom
		slideTitlePositionHorizontal: 'center', // center, right, left
		slideTitleSpeed: 1500,
		slideTitleEasing: 'easeInOutBack',
		minTitleFontHeight : 10
    },
	
    obj: {},
	
    init : function(options) {

		methods.obj = $.extend({}, methods.defaults, options);
		var a = $(this);
		a.click(function(e) {
			var $this, $class, $link;
				
			$this = $(this);
			$this.data("first-lightbox-element", "1");
			$class = $this.data('cuckoolightbox-class') ? $this.data('cuckoolightbox-class')  : $this.attr('class');
			$link = $this.attr('href');
			// create template
			methods.tpl($class, options);
			// start lightbox
			methods.start($class, $link, options);
			
			return false;
		});
    },
	
	tpl : function(thisClass, options){
			/* Template */
			var imgCount, nav;
			
			methods.obj = $.extend({}, methods.defaults, options);
			imgCount = $('body').find('a.' + thisClass);
			nav = $('div.cuckoo-navigation');
			
			if(!document.getElementById("cuckoo-lightbox")){
				$("<section>", { id: 'cuckoo-lightbox' })
					.append($('<div/>', { id: 'cuckoo-lightbox-wrap' }),
				$('<div/>', { id: 'cuckoo-lightbox-container' })
					.append($('<ul/>', { id: 'cuckoo-image-content' }))
					.append($('<div/>', { 'class': 'cuckoo-another-elements' })
					.append($('<div/>', { 'class': 'cuckooLoading',  title: 'Loading' }))))
					.appendTo($('body'));
			}
			
			if( imgCount.length > 1 ){
				if( nav.length == 0 ){
					if( methods.obj.player == true ){
						$('ul#cuckoo-image-content')
							.after($('<div/>', { 'class': 'cuckoo-navigation player' })
							.append($('<a/>', { 'class': 'cuckoo-previous', href: 'javascript:;', title:'Previuos' }))
							.append($('<a/>', { 'class': 'cuckoo-player', href: 'javascript:;', title:'Play' }))
							.append($('<a/>', { 'class': 'cuckoo-next', href: 'javascript:;', title:'Next' }))
							.append($('<a/>', { 'class': 'close-lightbox', href: 'javascript:;', title:'Close' })));
					}else{
						$('ul#cuckoo-image-content')
							.after($('<div/>', { 'class': 'cuckoo-navigation single' })
							.append($('<a/>', { 'class': 'cuckoo-previous', href: 'javascript:;', title:'Previuos' }))
							.append($('<a/>', { 'class': 'cuckoo-next', href: 'javascript:;', title:'Next' }))
							.append($('<a/>', { 'class': 'close-lightbox', href: 'javascript:;', title:'Close' })));
					}
				}
			}else{
				$('ul#cuckoo-image-content')
					.after($('<div/>', { 'class': 'cuckoo-navigation single' }).append($('<a/>', { 'class': 'close-lightbox', href: 'javascript:;', title:'Close' })));
			}
	},
	
	start : function( $class ,$link, options){
		var $main, $container;	
		
		methods.obj = $.extend({}, methods.defaults, options);
		$main = $('#cuckoo-lightbox');
		$container = $('#cuckoo-lightbox-container');
		if($main.css('display') == 'block'){
			return false;
		}
		$main.width($(window).width()).height($(window).height()).fadeIn(methods.obj.fadeSpeed, function(){
			// insert images
			methods.insertImg($link, $class, methods.obj.title);
			methods.showImage();
		});	
		methods.preloader(true, 'block');
	},
	
	end : function(){
		var $wrap, $img, $container, $closeButton, $nav;
		
		$wrap = $('#cuckoo-lightbox');
		$img = $('li.img-container');
		$container = $('#cuckoo-lightbox-container');
		$closeButton = $('.close-lightbox');
		$nav = $('div.cuckoo-navigation');
		
		if($wrap.is(':animated')){
			$wrap.stop(true, true).css('display', 'none');
			$container.stop().attr('style', '');
			$img.remove();
			$nav.remove();
		}else{
			$wrap.fadeOut('fast', function(){
				$container.stop().attr('style', '');
				$img.remove();
				$nav.remove();
			});
		}
		methods.preloader(false, 'none');
		$closeButton.css('display', 'none');
		$(document).unbind('keyup.keyboard');
		$(window).unbind('resize');
		$('a.cuckoo-next').unbind('click');
		$('a.cuckoo-previous').unbind('click');
		methods.sliderPlayer(false);
	},
	
	insertImg : function($link, $class, $title){
		var $container, imgLink, imgTitle, img, type, ids, typeObj, active, a;
		
		$container = $('#cuckoo-image-content');
			$('a.' +  $class).each(function(){
				a = $(this);
				type = a.data('cuckoolightbox-type');
				firstElement = a.data('first-lightbox-element');
				imgLink = a.attr('href');
				imgTitle = a.attr('title');
				ids = new Date().getTime();
				active = firstElement == '1' ? ' active-light' : '';
				
				if(active){
					a.removeData("first-lightbox-element");
				}
				
				if(type == 'iframe'){
					$('<li/>', { 'class':'img-container' })
						.append($('<iframe id="cuckoolightbox-iframe-'+ids+'" name="cuckoolightbox-iframe-'+ids+'" class="img-single'+active+'" src="'+imgLink+'" frameborder="0" framepadding="0" allowTransparency="true"></iframe>'),
						$('<div/>', { 'class':'img-title' }).append($('<span/>', { text:imgTitle })))
						.appendTo($container);
				}else{
					$('<li/>', { 'class':'img-container' })
						.append($('<img/>', { src:imgLink, 'class': 'img-single'+active , title:imgTitle, alt:imgTitle, 'data-original':imgLink}),
						$('<div/>', { 'class':'img-title' })
						.append($('<span/>', { text:imgTitle })))
						.appendTo($container);
				}
				
			});
		$('li.img-container img').lazyload(); // lazyload plugin
		methods.titleSettings($title);
	},
	
	titleSettings : function(title){
		var titleClass;
			titleClass = $('.img-title');
			
		switch( title ){
			case 'inside':
				titleClass.each(function(){
					$(this).addClass('ins-title');
				});
			break;				
			case 'outside':
				titleClass.each(function(){
					$(this).addClass('outs-title');
				});
			break;				
			case 'slide':
				titleClass.each(function(){
					$(this).addClass('slide-title');
				});
			break;			
			default:
				titleClass.each(function(){
					$(this).addClass('stnd-title');
				});
		}
	},
	
	showImage : function(){
		var img, title, nav, allImgArr;
		img = $('#cuckoo-image-content').find('.active-light');
		
		methods.fontsResizing("li.img-container .img-title");
		
		if(img.get(0).tagName == 'IFRAME'){
			title = img.parent().find('div.img-title');
			methods.ContainerAndImage(img, title , 'IFRAME');
		}else{
			allImgArr = [$(img).attr('src')];
			methods.imgLoading(allImgArr, function(){
				title = img.parent().find('div.img-title');
				methods.ContainerAndImage(img, title, '');
			});
		}
		
		$('a.cuckoo-next').bind('click', function(){
			methods.nextPrevImage('next');
			methods.sliderPlayer(false);
		});	
		$('a.cuckoo-previous').bind('click', function(){
			methods.nextPrevImage('prev');
			methods.sliderPlayer(false);
		});
		$('a.cuckoo-player').bind('click', function(){
			methods.sliderPlayer(true);
		});
		$(document).bind('keyup.keyboard', function(event){
			methods.keyboardAction(event);
		});
		$(window).bind('resize', methods.contentResize);
		
		$('#cuckoo-lightbox-wrap, .close-lightbox').bind('click', methods.end );
 
	},
	
	nextPrevImage : function(nextOrPrev){
		var $imgContainer, $closeButton, $prev, $next, $play, $visibleImg, $closetsLi, title, imgSet, $NextImg, nextReal;
		
		imgSet = nextOrPrev == 'prev' ? 'last' : 'first';
		$imgContainer = $("#cuckoo-image-content");
		$closeButton = $('.close-lightbox');
		$prev = $('a.cuckoo-previous');
		$play = $('a.cuckoo-player');
		$next = $('a.cuckoo-next');
		$visibleImg = $imgContainer.find('li.img-container .img-single:visible');
		if( $visibleImg.get(0).tagName == 'IFRAME' ){
			$visibleImg.attr('src', $visibleImg.attr('src'));
		}
		$imgContainer.find('li.img-container div.img-title:visible').css('display', 'none');
		$closetsLi = $visibleImg.closest('li');
		$visibleImg.removeClass('active-light').css('display', 'none');
		$NextImg = nextOrPrev == 'prev' ? $closetsLi.prev().find('.img-single') : $closetsLi.next().find('.img-single');
		methods.preloader(true, 'block');
		$closeButton.css('display','none');
		$next.css('display','none');
		$prev.css('display','none');
		$play.css('display','none');
		nextReal = $NextImg.length ? $NextImg : $('li.img-container:'+imgSet).find('.img-single');
		nextReal.addClass('active-light');
		title = nextReal.parent().find('div.img-title');
		imgArr = [$(nextReal).attr('src')];
		
		if(nextReal.get(0).tagName == 'IFRAME'){
			methods.ContainerAndImage(nextReal, title , 'IFRAME');
		}else{
			methods.imgLoading(imgArr, function(){
				methods.ContainerAndImage(nextReal, title, nextReal.get(0).tagName);
			});
		}
	},
	
	ContainerAndImage : function(img, title, type){
		var $container, containerTopPadding, $play, containerRightPadding, containerBottomPadding, containerLeftPadding, newWidth, newHeight, playerHeight, titleText, $closeButton, $player, $next, $prev, titleHeight, heightReal;
		
		if( type == 'IFRAME' ){ 
			$(img).attr('src', $(img).attr('src'));
			$(img).width(methods.obj.iframeWidth).height(methods.obj.iframeHeight);
		}
		$container = $('#cuckoo-lightbox-container');
		$closeButton = $('.close-lightbox');
		$prev = $('a.cuckoo-previous');
		$next = $('a.cuckoo-next');
		$play = $('a.cuckoo-player');
		$player = $('div.cuckoo-navigation.player');
		playerHeight = $player != 'undefined' ? $player.outerHeight() : 0;
		methods.imageSize(img); 
		title.width(img.width()-10);
		titleText = title.text() == '' ? '' : title.outerHeight();
		titleHeight = 0;
		if( methods.obj.title == 'standart' || methods.obj.title == 'outside' ) titleHeight = titleText;
		containerTopPadding = parseInt($container.css('padding-top'), 10);
		containerRightPadding = parseInt($container.css('padding-right'), 10);
		containerBottomPadding = parseInt($container.css('padding-bottom'), 10);
		containerLeftPadding = parseInt($container.css('padding-left'), 10);
		newWidth = img.width() + containerLeftPadding + containerRightPadding;
		newHeight = img.height() + containerTopPadding + containerBottomPadding + titleHeight - playerHeight - 40;
		heightReal = methods.obj.title == 'outside' ? img.height() : img.height() + titleHeight ;
		if( methods.obj.title == 'slide' ) title.width(img.width()-20).height(heightReal-20);
		
		$container.animate({
			width: img.width(), 
			height: heightReal, 
			left: (($(window).width() - newWidth)/2), 
			top: (($(window).height() - newHeight)/2),
			margin: '0'
		}, methods.obj.animationSpeed , methods.obj.easing ,function(){
			if( type != 'IFRAME' ){
				methods.preloader(false, 'none');
				$closeButton.fadeIn(methods.obj.fadeSpeed);
				$next.fadeIn(methods.obj.fadeSpeed);
				$prev.fadeIn(methods.obj.fadeSpeed);
				$play.fadeIn(methods.obj.fadeSpeed);
				img.css({
					display: 'none',
					visibility: 'visible',
				}).fadeIn(methods.obj.fadeSpeed);
			}else{
				methods.preloader(false, 'none');
				$closeButton.fadeIn(methods.obj.fadeSpeed);
				$next.fadeIn(methods.obj.fadeSpeed);
				$prev.fadeIn(methods.obj.fadeSpeed);
				$play.fadeIn(methods.obj.fadeSpeed);
				img.css({
					display: 'none',
					visibility: 'visible',
				}).fadeIn(methods.obj.fadeSpeed);
			}
			if( titleHeight > 0 || title.text() != '' ){
				if(methods.obj.title == 'inside'){
					title.slideDown(methods.obj.fadeSpeed, methods.obj.easing); 
				}else if(methods.obj.title == 'outside'){
					title.slideDown(methods.obj.fadeSpeed, methods.obj.easing); 
				}else if(methods.obj.title == 'slide'){
					methods.sliderImage(title); 
				}else{
					title.fadeIn(methods.obj.fadeSpeed); 
				}
			}
		});
	},
	
	imageSize : function(img){
		var paddingTop, paddingBottom;		
		
		paddingTop = 100;
		paddingBottom = 150;
		
		img.css({'max-width': ( $(window).width()-paddingTop ), 'max-height': ( $(window).height()-paddingBottom)});
			
		if( img.width() < methods.obj.minWidth || img.height() < methods.obj.minHeight  ){
			img.css({'max-width': methods.obj.minWidth, 'max-height': methods.obj.minHeight });
		}
	},
	
	keyboardAction : function(event) {
		var KEYCODE_ESC, KEYCODE_LEFTARROW, KEYCODE_RIGHTARROW, key, keycode, timer, $container;
		
		KEYCODE_ESC = 27;
		KEYCODE_LEFTARROW = 37;
		KEYCODE_RIGHTARROW = 39;
		timer = 0;
		$container = $("#cuckoo-lightbox-container");
		keycode = event.keyCode;
		key = String.fromCharCode(keycode).toLowerCase();
		if (keycode === KEYCODE_ESC || key.match(/x|o|c/)) {
			methods.end();
		} else if ( keycode === KEYCODE_LEFTARROW ) {
			if($container.is(':not(:animated)')) if($container.find('.cuckoo-next').length > 0 && $container.find('.cuckoo-previous').length > 0) methods.nextPrevImage('prev'); methods.sliderPlayer(false);
		} else if ( keycode === KEYCODE_RIGHTARROW ) {
			if($container.is(':not(:animated)')) if($container.find('.cuckoo-next').length > 0 && $container.find('.cuckoo-previous').length > 0) methods.nextPrevImage('next'); methods.sliderPlayer(false);
		}
	},
	
	contentResize : function(){
		var $main, $container, $imgContainer, $img, $title, $titleText, $titleHeight, playerHeight, $player, containerTopPadding, containerRightPadding, containerBottomPadding, containerLeftPadding, newWidth, newHeight, heightReal;
		
		$titleHeight = 0;
		$main = $('#cuckoo-lightbox');
		$container = $('#cuckoo-lightbox-container');
		$imgContainer = $("#cuckoo-image-content");
		$img = $imgContainer.find('li.img-container .img-single:visible');
		$title = $imgContainer.find('li.img-container div.img-title:visible');
		methods.imageSize($img);
		$player = $('div.cuckoo-navigation.player');
		playerHeight = $player != 'undefined' ? $player.outerHeight() : 0;
		if($title.text() != '') $title.width($img.width()-10);
		$titleText = $title.text() == '' ? '' : $title.outerHeight();
		if( $title.attr('class') == 'img-title stnd-title' || $title.attr('class') == 'img-title outs-title' ) $titleHeight = $titleText;
		containerTopPadding = parseInt($container.css('padding-top'), 10);
		containerRightPadding = parseInt($container.css('padding-right'), 10);
		containerBottomPadding = parseInt($container.css('padding-bottom'), 10);
		containerLeftPadding = parseInt($container.css('padding-left'), 10);
		newWidth = ( $img.width() ) + containerLeftPadding + containerRightPadding;
		newHeight = ( $img.height() ) + containerTopPadding + containerBottomPadding + $titleHeight - playerHeight - 40;
		heightReal = $title.attr('class') == 'img-title outs-title' ? $img.height() : $img.height() + $titleHeight;
		if( $title.attr('class') == 'img-title slide-title' ) $title.width($img.width()-20).height(heightReal-20);

		$container.css({
			width: $img.width(), 
			height: heightReal,
			margin: '0',
			left: (($(window).width() - newWidth)/2), 
			top: (($(window).height() - newHeight)/2),
		});
		$main.width($(window).width()).height($(window).height());	
	},
	
	fontsResizing : function(selector){
		var originalWinWidth, originalFontSize, ratioOfChange, $this, winWidth, widthDiff, pixelsToIncrease, newFontSize, pixelsToDecrease, w, pix, newFont, minFontHeight, maxWindowWidth, maxFontHeight, original, resizing ;
		
		$this = $(selector);
		if($this.get(0) === undefined){
			return false;
		}
		
		minFontHeight = methods.obj.minTitleFontHeight;
		maxFontHeight = $this.css("font-size").replace('px', '');
		maxWindowWidth = 960;
		ratioOfChange =  95;
		originalWinWidth = $(window).width(); 
		w = maxWindowWidth - originalWinWidth;
        pix = Math.round(w / ratioOfChange);
		original = originalWinWidth < maxWindowWidth ? $this.css("font-size").replace('px', '') - pix : $this.css("font-size").replace('px', '') ;
		originalFontSize = original < minFontHeight ? minFontHeight : original;
		
		$this.css("font-size", originalFontSize);
		
		resizing = function(){
			winWidth = $(window).width();
			widthDiff = winWidth - originalWinWidth;
 
			if(widthDiff > 0){
				pixelsToIncrease = Math.round(widthDiff / ratioOfChange);
				newFontSize = originalFontSize + pixelsToIncrease;
				newFontSize = newFontSize > maxFontHeight ? maxFontHeight : newFontSize;
				$this.css("font-size", newFontSize);
			} else {
				pixelsToDecrease = Math.round(Math.abs(widthDiff) / ratioOfChange);
				newFontSize = originalFontSize - pixelsToDecrease;
				newFontSize = newFontSize < minFontHeight ? minFontHeight : newFontSize;
				$this.css("font-size", newFontSize);
			}
		};
	
		$(window).bind('resize', function(){
			resizing();
		});
	},
	
	sliderPlayer: function(action){
		var active,
			$main = $('#cuckoo-lightbox'),
			startSlide = function(){
				$main.find('a.cuckoo-player').addClass('paused').attr('title', 'Pause');
				methods.obj.playsettings.isActive = false;
				clearTimeout(methods.obj.playsettings.timer);
				methods.obj.playsettings.timer = setTimeout(function(){
					startSlide();
					methods.nextPrevImage('next');
				}, methods.obj.playerSpeed);
				
			},
			stopSlide = function () {
				methods.obj.playsettings.isActive= false;
				clearTimeout(methods.obj.playsettings.timer);
				$('body').unbind('.cuckoo-player');
				$main.find('a.cuckoo-player').removeClass('paused').attr('title', 'Play');
			};
		
		
		if( !methods.obj.player || !$main.is(':visible') ){
			return false;
		}
		
		if($main.find('a.cuckoo-player.paused').length > 0){
			action = false;
		}
		
		if (action === true || (!methods.obj.playsettings.isActive && action !== false)) {
			startSlide();
		} else {
			stopSlide();
		}
		
	},
	
	sliderImage : function($title){
		var span;
		
		if(methods.obj.title != 'slide'){
			return;
		}
		
		/* effects */
		switch(methods.obj.slideTitleEffect){
			case 'slideInLeft':
				$title.css({ 
					'display': 'table',
					'text-align': methods.obj.slideTitlePositionHorizontal
				});
				$title.children('span').addClass(methods.obj.slideTitlePositionVertical).css({
					right: -($title.width())+'px'
				}).animate({
					right: 0
				}, methods.obj.slideTitleSpeed, methods.obj.slideTitleEasing);
			break;
			case 'slideInRight':
				$title.css({ 
					'display': 'table',
					'text-align': methods.obj.slideTitlePositionHorizontal
				});
				$title.children('span').addClass(methods.obj.slideTitlePositionVertical).css({
					left: -($title.width())+'px'
				}).animate({
					left: 0
				}, methods.obj.slideTitleSpeed, methods.obj.slideTitleEasing);
			break;			
			case 'fadeUp':
				$title.css({ 
					'display': 'table',
					'text-align': methods.obj.slideTitlePositionHorizontal
				});
				$title.children('span').addClass(methods.obj.slideTitlePositionVertical).css({
					left: 0,
					opacity: 0,
					
				}).animate({
					opacity: 1,
					top: '-=20'
				}, methods.obj.slideTitleSpeed, methods.obj.slideTitleEasing);
			break;			
			case 'fadeDown':
				$title.css({ 
					'display': 'table',
					'text-align': methods.obj.slideTitlePositionHorizontal
				});
				$title.children('span').addClass(methods.obj.slideTitlePositionVertical).css({
					left: 0,
					opacity: 0,
					
				}).animate({
					opacity: 1,
					top: '+=20'
				}, methods.obj.slideTitleSpeed, methods.obj.slideTitleEasing);
			break;
		}
		return this;
	},
	
	imgLoading : function(imgArr, callback){
		var imagesLoaded = 0;
		
		function _loadAllImages(callback){
			var img = new Image();
			$(img).attr('src',imgArr[imagesLoaded]);
			if (img.complete || img.readyState == 4) {
				imagesLoaded++;
				if(imagesLoaded == imgArr.length) {
					callback();
				} else {
					_loadAllImages(callback);
				}
			} else {
				$(img).load(function(){
					imagesLoaded++;
					if(imagesLoaded == imgArr.length) {
						callback();
					} else {
						_loadAllImages(callback);
					}
				});
				//.error(function() {
				//	return 'error-img';
				//});
			}
		};		
		_loadAllImages(callback);
	},
	
	preloader : function(active, display){
		var $preloader, rotation, $main;
			
		$main = $('#cuckoo-lightbox');
		$preloader = $('.cuckooLoading');
		rotation = function (){
			if($main.is(':visible')){
				$preloader.rotate({
					angle:0, 
					animateTo:360, 
					callback: rotation,
					easing: function (x,t,b,c,d){
						return c*(t/d)+b;
					}
				});
			}
		};
			
		if( active == true ){
			rotation();
		}
		$preloader.css('display', display);
	}
  };

  $.fn.cuckoolightbox = function( method ) {
    
    // Method calling logic
    if ( methods[method] ) {
	
		return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
	  
    } else if ( typeof method === 'object' || ! method ) {
	
		return methods.init.apply( this, arguments );
	  
    } else {
	
		$.error( 'Method ' +  method + ' does not exist on jQuery.cuckoolightbox' );
	  
    }
  
  };

})( jQuery );




/*
 * Lazy Load - jQuery plugin for lazy loading images
 *
 * Copyright (c) 2007-2013 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   http://www.appelsiini.net/projects/lazyload
 *
 * Version:  1.8.4
 *
 */
(function($, window, document, undefined) {
    var $window = $(window);

    $.fn.lazyload = function(options) {
        var elements = this;
        var $container;
        var settings = {
            threshold       : 0,
            failure_limit   : 0,
            event           : "scroll",
            effect          : "show",
            container       : window,
            data_attribute  : "original",
            skip_invisible  : true,
            appear          : null,
            load            : null
        };

        function update() {
            var counter = 0;
      
            elements.each(function() {
                var $this = $(this);
                if (settings.skip_invisible && !$this.is(":visible")) {
                    return;
                }
                if ($.abovethetop(this, settings) ||
                    $.leftofbegin(this, settings)) {
                        /* Nothing. */
                } else if (!$.belowthefold(this, settings) &&
                    !$.rightoffold(this, settings)) {
                        $this.trigger("appear");
                        /* if we found an image we'll load, reset the counter */
                        counter = 0;
                } else {
                    if (++counter > settings.failure_limit) {
                        return false;
                    }
                }
            });

        }

        if(options) {
            /* Maintain BC for a couple of versions. */
            if (undefined !== options.failurelimit) {
                options.failure_limit = options.failurelimit; 
                delete options.failurelimit;
            }
            if (undefined !== options.effectspeed) {
                options.effect_speed = options.effectspeed; 
                delete options.effectspeed;
            }

            $.extend(settings, options);
        }

        /* Cache container as jQuery as object. */
        $container = (settings.container === undefined ||
                      settings.container === window) ? $window : $(settings.container);

        /* Fire one scroll event per scroll. Not one scroll event per image. */
        if (0 === settings.event.indexOf("scroll")) {
            $container.bind(settings.event, function(event) {
                return update();
            });
        }

        this.each(function() {
            var self = this;
            var $self = $(self);

            self.loaded = false;

            /* When appear is triggered load original image. */
            $self.one("appear", function() {
                if (!this.loaded) {
                    if (settings.appear) {
                        var elements_left = elements.length;
                        settings.appear.call(self, elements_left, settings);
                    }
                    $("<img />")
                        .bind("load", function() {
                            $self
                                .hide()
                                .attr("src", $self.data(settings.data_attribute))
                                [settings.effect](settings.effect_speed);
                            self.loaded = true;

                            /* Remove image from array so it is not looped next time. */
                            var temp = $.grep(elements, function(element) {
                                return !element.loaded;
                            });
                            elements = $(temp);

                            if (settings.load) {
                                var elements_left = elements.length;
                                settings.load.call(self, elements_left, settings);
                            }
                        })
                        .attr("src", $self.data(settings.data_attribute));
                }
            });

            /* When wanted event is triggered load original image */
            /* by triggering appear.                              */
            if (0 !== settings.event.indexOf("scroll")) {
                $self.bind(settings.event, function(event) {
                    if (!self.loaded) {
                        $self.trigger("appear");
                    }
                });
            }
        });

        /* Check if something appears when window is resized. */
        $window.bind("resize", function(event) {
            update();
        });
              
        /* With IOS5 force loading images when navigating with back button. */
        /* Non optimal workaround. */
        if ((/iphone|ipod|ipad.*os 5/gi).test(navigator.appVersion)) {
            $window.bind("pageshow", function(event) {
                if (event.originalEvent.persisted) {
                    elements.each(function() {
                        $(this).trigger("appear");
                    });
                }
            });
        }

        /* Force initial check if images should appear. */
        $(window).load(function() {
            update();
        });
        
        return this;
    };

    /* Convenience methods in jQuery namespace.           */
    /* Use as  $.belowthefold(element, {threshold : 100, container : window}) */

    $.belowthefold = function(element, settings) {
        var fold;
        
        if (settings.container === undefined || settings.container === window) {
            fold = $window.height() + $window.scrollTop();
        } else {
            fold = $(settings.container).offset().top + $(settings.container).height();
        }

        return fold <= $(element).offset().top - settings.threshold;
    };
    
    $.rightoffold = function(element, settings) {
        var fold;

        if (settings.container === undefined || settings.container === window) {
            fold = $window.width() + $window.scrollLeft();
        } else {
            fold = $(settings.container).offset().left + $(settings.container).width();
        }

        return fold <= $(element).offset().left - settings.threshold;
    };
        
    $.abovethetop = function(element, settings) {
        var fold;
        
        if (settings.container === undefined || settings.container === window) {
            fold = $window.scrollTop();
        } else {
            fold = $(settings.container).offset().top;
        }

        return fold >= $(element).offset().top + settings.threshold  + $(element).height();
    };
    
    $.leftofbegin = function(element, settings) {
        var fold;
        
        if (settings.container === undefined || settings.container === window) {
            fold = $window.scrollLeft();
        } else {
            fold = $(settings.container).offset().left;
        }

        return fold >= $(element).offset().left + settings.threshold + $(element).width();
    };

    $.inviewport = function(element, settings) {
         return !$.rightoffold(element, settings) && !$.leftofbegin(element, settings) &&
                !$.belowthefold(element, settings) && !$.abovethetop(element, settings);
     };

    /* Custom selectors for your convenience.   */
    /* Use as $("img:below-the-fold").something() or */
    /* $("img").filter(":below-the-fold").something() which is faster */

    $.extend($.expr[':'], {
        "below-the-fold" : function(a) { return $.belowthefold(a, {threshold : 0}); },
        "above-the-top"  : function(a) { return !$.belowthefold(a, {threshold : 0}); },
        "right-of-screen": function(a) { return $.rightoffold(a, {threshold : 0}); },
        "left-of-screen" : function(a) { return !$.rightoffold(a, {threshold : 0}); },
        "in-viewport"    : function(a) { return $.inviewport(a, {threshold : 0}); },
        /* Maintain BC for couple of versions. */
        "above-the-fold" : function(a) { return !$.belowthefold(a, {threshold : 0}); },
        "right-of-fold"  : function(a) { return $.rightoffold(a, {threshold : 0}); },
        "left-of-fold"   : function(a) { return !$.rightoffold(a, {threshold : 0}); }
    });

})(jQuery, window, document);