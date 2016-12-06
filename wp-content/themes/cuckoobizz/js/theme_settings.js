/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*/

jQuery(document).ready(function($) {
	/* Flickr get links */
	$("#flickr_wrapper").each(function(){
		$(this).find("a").attr("target", "_blank");
	});
	
	/* Contact settings **********************************************/

	$("#cuckoo-contact-form").each(function() {
		var name = $(this).find(":input[type=text]#contact_name"),
		namelabel = $(this).find(".form_label_logs_name"),
		email = $(this).find(":input[type=email]#email_contact"),
		emaillabel = $(this).find(".form_label_logs_email"),
		subject = $(this).find(":input[type=text]#subject_contact"),
		subjectlabel = $(this).find(".form_label_logs_subject"),
		content = $(this).find("textarea#contact_message"),
		contentlabel = $(this).find(".form_label_textarea"),
		numbers = $(this).find(":input.amount-checker");
		removeContent = $("span#message", this).find(".bloking_all");
		
		/* Chek name */
		name.focus(function() {
			if( this.value != "" || this.value == "" ) {
				namelabel.animate({top: "-28px"}, 600 , "easeInBack");
				name.css("border", "none");
			}
		});
		name.blur(function() {
			if( this.value == "" ) {
				namelabel.animate({top: "6px"}, 400 , "easeOutBounce");
			}else{
				namelabel.animate({top: "-28px"}, 600 , "easeInBack");
			}
		});		
		
		/* Chek email */
		email.focus(function() {
			if( this.value != "" || this.value == "" ) {
				emaillabel.animate({top: "-28px"}, 600 , "easeInBack");
				email.css("border", "none");
			}
		});
		email.blur(function() {
			if( this.value == "" ) {
				emaillabel.animate({top: "6px"}, 400 , "easeOutBounce");
			}else{
				emaillabel.animate({top: "-28px"}, 600 , "easeInBack");
			}
		});			
		
		/* Chek subject */
		subject.focus(function() {
			if( this.value != "" || this.value == "" ) {
				subjectlabel.animate({top: "-28px"}, 600 , "easeInBack");
				subject.css("border", "none");
			}
		});
		subject.blur(function() {
			if( this.value == "" ) {
				subjectlabel.animate({top: "6px"}, 400 , "easeOutBounce");
			}else{
				subjectlabel.animate({top: "-28px"}, 600 , "easeInBack");
			}
		});		
		
		/* Chek content */
		content.focus(function() {
			if( this.value != "" || this.value == "" ) {
				contentlabel.animate({top: "-28px"}, 600 , "easeInBack");
				content.css("border", "none");
				removeContent.remove();
			}
		});
		content.blur(function() {
			if( this.value == "" ) {
				contentlabel.animate({top: "10px"}, 400 , "easeOutBounce");
			}else{
				contentlabel.animate({top: "-28px"}, 600 , "easeInBack");
			}
		});
		numbers.focus(function() {
			if( this.value != "" || this.value == "" ) {
				numbers.css("border", "none");
			}
		});
	});
	
	
	$("#contact").each(function(){
		var height = $(this).height(),
		width = $(this).width(),
		header = $(this).children("header").height(),
		iframeHeight = header == "null" ? height : height-header;
		if($(this).find("iframe.map-baqckground, .cuckoo_map_shortcode").length > 0){
			$(this).css("height", height);
		}
		$(this).find("iframe.map-baqckground, .cuckoo_map_shortcode").css("width", width + "px");
		$(this).find("iframe.map-baqckground, .cuckoo_map_shortcode").css("height", iframeHeight + "px");
	});
	
	$(".show-map").css('width', $(".show-map").width());
	
	resizeElements();
	
	$(".show-map").click(function(){
		var a = $(this),
		marginSize = 20,
		marginTop = 70,
		mainContent = a.parent().css('height', a.parent().height()),
		content = a.parent().find(".contact-content"),
		sendButton = content.find('#submit-contact-form'),
		contentWidth = content.parent().width(),
		contentHeight = content.parent().height(),
		headerFind = content.parent().children("header").length,
		slideCount = contentWidth/2,
		sHeight = contentHeight/2,
		aheight = a.height()/2,
		infoBlock = content.find(".contact-info-block"),
		formBlock = content.find(".contact-form"),
		mainId = content.parent().position(),
		elementWidth = a.width()+marginSize;
		
		if( content.width() == 960 ){
			/* Button control */
			if(content.css("display") == "block"){
				var slideCountHeight = headerFind == 0 ? sHeight-aheight : sHeight+aheight;
				a.delay(1000).animate({left: contentWidth-elementWidth + "px"}, 1200, "easeOutBack" , function(){
					$(this).addClass("only-map").text("Map Off");
				});
			}
			
			/* Info form settings */
			if( infoBlock.css("right") == "0px" ){
				infoBlock.animate({right: "-"+slideCount}, { easing:"easeInBack", duration:1000 });
			}else{
				infoBlock.animate({right: 0}, { easing:"easeOutBack", duration:1000 });
			}
			/* Form block settings */
			if( formBlock.css("left") == "0px" ){
				formBlock.animate({left: "-"+contentWidth}, 1000 , "easeInBack" , function(){
					content.css("display", "none");
				});
			}else{
				infoBlock.css( 'margin-top', 0 );
				content.css("display", "block");
				var section = content.parent();
				var header = section.children("header").height();
				var elementTop = header != "null" ? marginTop+header : marginTop;
				if( content.height() < a.parent().height() ){
					a.parent().find('iframe').css({ 'height': content.height()+elementTop+20, 'width':$(window).width() });
					a.parent().animate({ height: content.height()+elementTop+20 }, 800);
				}
				formBlock.animate({left: 0}, 1000, "easeOutBack" , function(){
					var infoPosition = infoBlock.offset();
					if(content.css("display") == "block"){
						a.animate({left: infoPosition.left-elementWidth-24 + "px"}, 1200, "easeOutBack" , function(){
							$(this).removeClass("only-map").text("Map On");
						});
					}
				});
			}
		}else if( content.width() == 715 ){
		
			/* Button control */
			if(content.css("display") == "block"){
				var slideCountHeight = headerFind == 0 ? sHeight-aheight : sHeight+aheight;
				a.delay(1000).animate({width : 75}, 1000, function(){
					$(this).animate({left: ( contentWidth-$(this).width()-marginSize )}, 1200, "easeOutBack" , function(){
						$(this).addClass("only-map").text("Map Off");
					});
				});
			}
			
			/* Info form settings */
			if( infoBlock.css("right") == "0px" ){
				infoBlock.animate({right: "-"+slideCount}, { easing:"easeInBack", duration:1000 });
			}else{
				infoBlock.animate({right: 0}, { easing:"easeOutBack", duration:1000 });
			}
			/* Form block settings */
			if( formBlock.css("left") == "0px" ){
				formBlock.animate({left: "-"+contentWidth}, 1000 , "easeInBack" , function(){
					content.css("display", "none");
				});
			}else{
				var section = content.parent();
				var header = section.children("header").height();
				var elementTop = header != "null" ? marginTop+header : marginTop;
				content.css("display", "block");
				infoBlock.css( 'margin-top', 70 );
				if( content.height() > a.parent().height() ){
					a.parent().find('iframe').css({ 'height': content.height()+elementTop+10, 'width':$(window).width() });
					a.parent().animate({ height: content.height()+elementTop+10 }, 800);
				}
				formBlock.animate({left: 0}, 1000, "easeOutBack" , function(){
					if(content.css("display") == "block"){
						var infoPosition = infoBlock.offset();
						a.css('bottom', 'auto');
						a.animate({left: infoPosition.left + "px" }, 1200, "easeOutBack" , function(){
							$(this).removeClass("only-map").text("Map Off");
							$(this).animate({width: 204}, 1000);
						});
					}
				});
			}
		}else{
			/* Button control */
			if(content.css("display") == "block"){
				var slideCountHeight = headerFind == 0 ? sHeight-aheight : sHeight+aheight;
				a.delay(1000).animate({width : 75}, 1000, function(){ 
					$(this).animate({left: ( contentWidth-$(this).width()-marginSize )}, 1200, "easeOutBack" , function(){
						$(this).addClass("only-map").text("Map On");
					});
				});
			}
			
			/* Info form settings */
			if( infoBlock.css("right") == "0px" ){
				infoBlock.animate({right: "-"+slideCount}, { easing:"easeInBack", duration:1000 });
			}else{
				infoBlock.animate({right: 0}, { easing:"easeOutBack", duration:1000 });
			}
			/* Form block settings */
			if( formBlock.css("left") == "0px" ){
				formBlock.animate({left: "-"+contentWidth}, 1000 , "easeInBack" , function(){
					content.css("display", "none");
				});
			}else{
				var section = content.parent();
				var header = section.children("header").height();
				var elementTop = header != "null" ? marginTop+header : marginTop;
				content.css("display", "block");
				infoBlock.css( 'margin-top', 70 );
				if( content.height() > a.parent().height() ){
					a.parent().find('iframe').css({ 'height': content.height()+elementTop+10, 'width':$(window).width() });
					a.parent().animate({ height: content.height()+elementTop+10 }, 800);
				}
				formBlock.animate({left: 0}, 1000, "easeOutBack" , function(){
					if(content.css("display") == "block"){
						var infoPosition = infoBlock.offset();
						a.css('bottom', 'auto');
						a.animate({left: infoPosition.left + "px"}, 1200, "easeOutBack" , function(){
							$(this).animate({width: 204}, 1000);
							$(this).removeClass("only-map").text("Map On");
						});
					}
				});
			}
		}
	});
	/* End Contact setting *******************************************/
	
	/* Comment ************************************************/
	$("#comments").each(function(){
		var getDepth = $(this).find(".depth-2");
		getDepth.children(".comment-body").prepend('<div class="comment-arrow"></div>');
	});
	
	$(".comment-reply-link").click(function(){
		$("#respond").find(".comment-shadow").fadeOut();
		$("#respond").find(".respond-arrow").fadeIn();
	});
	
	$("#cancel-comment-reply-link").click(function(){
		$("#respond").find(".comment-shadow").fadeIn();
		$("#respond").find(".respond-arrow").fadeOut();
	});
	
	$('.number-close').click(function(){
		$('#number_checked').fadeOut(600);
		$('.show-map').css('z-index', 5);
	});
	
	
	$("#respond").each(function() {
		var name, namelabel, emailType, emaillabel, content, contentlabel,
		nametype = $(this).find(":input[type=text]#author"),
		namelabelType = $(this).find(".form_label_logs_name"),
		emailType = $(this).find(":input[type=email]#email"),
		emaillabelType = $(this).find(".form_label_logs_email"),
		contentType = $(this).find("textarea#comment"),
		contentlabelType = $(this).find(".form_label_textarea");
		
		if(typeof nametype != "undefined"){
			name = nametype
		}else{
			name = undefined
		}		
		
		if(typeof namelabelType != "undefined"){
			namelabel = namelabelType
		}else{
			namelabel = undefined
		}		
		
		if(typeof emailType != "undefined"){
			email = emailType
		}else{
			email = undefined
		}		
		
		if(typeof emaillabelType != "undefined"){
			emaillabel = emaillabelType
		}else{
			emaillabel = undefined
		}		
		
		if(typeof contentType != "undefined"){
			content = contentType
		}else{
			content = undefined
		}		
		
		if(typeof contentlabelType != "undefined"){
			contentlabel = contentlabelType
		}else{
			contentlabel = undefined
		}
		
		/* Chek name */
		if( name.val() != "" ) {
			namelabel.css('top', '-28px');
		}else{
			namelabel.css('top', '6px');
		}
		
		name.focus(function() {
			if( this.value != "" || this.value == "" ) {
				namelabel.animate({top: "-28px"}, 600 , "easeInBack");
				name.css("border", "none");
			}
		});
		name.blur(function() {
			if( this.value == "" ) {
				namelabel.animate({top: "6px"}, 400 , "easeOutBounce");
			}else{
				namelabel.animate({top: "-28px"}, 600 , "easeInBack");
			}
		});		
		
		/* Chek email */
		if( email.val() != "" ) {
			emaillabel.css('top', '-28px');
		}else{
			emaillabel.css('top', '6px');
		}
		
		email.focus(function() {
			if( this.value != "" || this.value == "" ) {
				emaillabel.animate({top: "-28px"}, 600 , "easeInBack");
				email.css("border", "none");
			}
		});
		email.blur(function() {
			if( this.value == "" ) {
				emaillabel.animate({top: "6px"}, 400 , "easeOutBounce");
			}else{
				emaillabel.animate({top: "-28px"}, 600 , "easeInBack");
			}
		});		
		
		/* Chek content */
		if( content.val() != "" ) {
			contentlabel.css('top', '-28px');
		}else{
			contentlabel.css('top', '10px');
		}
		
		content.focus(function() {
			if( this.value != "" || this.value == "" ) {
				contentlabel.animate({top: "-28px"}, 600 , "easeInBack");
				content.css("border", "none");
			}
		});
		content.blur(function() {
			if( this.value == "" ) {
				contentlabel.animate({top: "10px"}, 400 , "easeOutBounce");
			}else{
				contentlabel.animate({top: "-28px"}, 600 , "easeInBack");
			}
		});
	});
	
	$("#commentform").submit(function() {
		var a = $(this), name, email, content;
		a.each(function(){
			name = $(this).find(":input[type=text]#author").val();
			email = $(this).find(":input[type=email]#email").val();
			content = $(this).find("textarea#comment").val();

			if( name == '') {
				$(this).find(":input[type=text]#author").css("border", "1px solid red");
			}
			
			if( content == '' ) { 
				$(this).find("textarea#comment").css("border", "1px solid red");
			}
			
			if( email == '' ) {
				$(this).find(":input[type=email]#email").css("border", "1px solid red");
			}
			
		});
		if( name == "" ||  content == "" || email == "" ) {
			return false;
		}
		return true;
    });
	
	$("#comments-title").click(function(){
		var a = $(this),
			main = a.parent().find("#comments-main"), 
			arrowClass = a.find(".comment-arrow");
		
		if( main.css("display") == "block" ){
			main.slideUp(1000);
			a.attr('title', 'Show Comments');
			arrowClass.removeClass('open-comment');
			arrowClass.addClass('comment-toggle');
			
		}else{
			main.slideDown(1000);
			a.attr('title', 'Hide Comments');
			arrowClass.removeClass('comment-toggle');
			arrowClass.addClass('open-comment');
		}
	});
	
	/* Password correct *****************/
	$("input.password_input").keyup(function(){
		var content = $(this).val();
		if(content == ""){
			$(this).parent().find(".pass-label").css("display", "block");
		}else{
			$(this).parent().find(".pass-label").css("display", "none");
		}
	});
	
	if( $(".password_input").length > 0 ){
		$("input.password_input").each(function(){
			var content = $(this).val();
			if( content != "" ){
				$(this).parent().find(".pass-label").css("display", "none");
			}
		});
	}
	/* End password correct ***********************/
	
	/* Getting height if not full content and fill him */
	var heightBodyToFooter = $('body').height(),
		heightWindowToFooter = $(window).height();
	if( heightBodyToFooter < heightWindowToFooter ) {
		var countToHeight = heightWindowToFooter - heightBodyToFooter,
			heightFooter = $('#main-footer').height(),
			heightFooterPlus = heightFooter + countToHeight;
		if(document.getElementById('wpadminbar')){ 
			var heightAdminBar =  heightFooterPlus - '28';
			$('#main-footer').css('height', heightAdminBar + 'px' );
		}else{
			$('#main-footer').css('height', heightFooterPlus + 'px' );
		}
	}
	/* Search widget */
	$('.search-content').each(function(){
		var inp = $(this).find('input#s').val() != '' ? $(this).find('label.screen-reader-text').css('display', 'none') : '' ;
	});
	
	$("input#s").focus(function () {
		var inp = $(this).val() == '' ? $(this).parent().find('label.screen-reader-text').css('display', 'none') : '' ;
		$(this).css('border', '0 none');
	});	
	
	$("input#s").blur(function () {
		var inp = $(this).val() == '' ? $(this).parent().find('label.screen-reader-text').css('display', 'block') : '' ;
	});
	
	$("#searchform").submit(function() {
		var a = $(this);
		if(a.find('#s').val() == ''){
			a.find('#s').css('border', '1px solid red');
			return false;
		}
	});
	
	
	/* Search */
	$('#search_nav').click(function(){
		$('#search-content', this).fadeIn(500);
	});	
	
	$('.search-wrap').click(function(){
		var a = $('#search-content');
		a.fadeOut(500);
		a.find('#searchsubmit-header').css('display', 'block');
		a.find('#s-header').css('display', 'block').css('border', '0 none');
		a.find('.img-loader').css('display', 'none');
		return false;
	});
	
	$(document).bind('keyup.keyboard', function(event){
		var a, KEYCODE_ESC;
		a = $('#search-content');
		KEYCODE_ESC = 27;
		keycode = event.keyCode;
		if( a.css('display') != 'none' && keycode === KEYCODE_ESC ){
			a.fadeOut();
			a.find('#searchsubmit-header').css('display', 'block');
			a.find('#s-header').css('display', 'block').css('border', '0 none');
			a.find('.img-loader').css('display', 'none');
		}
	});
	
	$("#searchform-header").submit(function() {
		var a = $(this);
		if(a.find('#s-header').val() != ''){
			a.find('#searchsubmit-header').css('display', 'none');
			a.find('#s-header').css('display', 'none');
			a.find('.img-loader').fadeIn();
		}else{
			a.find('#s-header').css('border', '1px solid red');
			return false;
		}
	});
	
	$("input#s-header").focus(function () {
		$(this).css('border', '0 none');
	});
	
	$("#content-main a, .page-content a").each(function(){
	var getImg = $(this).find("img"),
		ulrTitle = $(this).attr("title"),
		getImgTitle = $(this).find("img").attr("title");
	if(getImg.length > 0){
		/* images to select lightbox */
		var path = $(this).attr("href");
		// if(path.indexOf('uploads') > -1){ // old 
		if (path && path.indexOf ('uploads')> -1) { // new and not tested
			$(this).addClass('cuckoo-lightbox').attr("title", getImgTitle );
		}else{
			$(this).attr('rel','attachment');
		}
	}
	});
	
	$('.cuckoo-lightbox').cuckoolightbox({
		title: 'outside'
	});
	
	/* First elements no margin */
	/*-- content --*/
	$("#content-main").children().first().css('margin-top', 0);
	$("#content-main").children().last().css('margin-bottom', 0);
	
	if($(".toggle-content-all").length > 0){
		$(".toggle-content-all").each(function(){
			$(this).children().first().css('margin-top', 0);
			$(this).children().last().css('margin-bottom', 0);
		});
	}
	
	if($(".textbox-short-content").length > 0){
		$(".textbox-short-content").each(function(){
			$(this).children().first().css('margin-top', 0);
			$(this).children().last().css('margin-bottom', 0);
		});
	}
	
	/* Shortcodes */
	if($(".tabs").length > 0){
		$(".tabs").tabs({
			speed: 800
		});
	}
	
	if($(".toggle-accordion").length > 0){
		$(".toggle-accordion").toggles({
			speed: 600,
			style: 'accordion',
			toggleClassButton : 'accordion-arrow'
		});
	}
	
	if($(".toggle-content").length > 0){
		$(".toggle-content").toggles({
			speed: 600,
			fullClickClass: 'toggle_shortcode_title',
			toggleClassButton : 'accordion-arrow'
		});	
	}
	
	var userAgent = navigator.userAgent.toString().toLowerCase();
	if ((userAgent.indexOf('safari') != -1) && !(userAgent.indexOf('chrome') != -1)) {
		$(".circle_preload").css("display", "none");
	}
	
	$(".social-short").hover(
		function () {
			$(this).find('.fb_iframe_widget iframe').css('z-index', 100);
		},
		function () {
			$(this).find('.fb_iframe_widget iframe').css('z-index', 1);
		}
	);
	$(".percent-bar").hover(
		function() {
			var a = $(this).find('.percent-fill');
			var b = $(this).find('.percent-text');
			var c = a.data('cuckoo-percent');
			var d = b.css('color');
			var e = b.css('font-size');
			b.stop(true, true).css('z-index', 11);
			a.stop(true, true).append('<span class="show-percent"><span>0</span>%</span>');
			a.stop(true, true).css('z-index', 10).animate({ height: '+=20', width: '+=20', left: '-10', top:'-10'}, 1000, 'easeOutElastic');
			$('.show-percent').css({'color': d, 'font-size': e});
			$('.show-percent span').countTo({
				from: 0,
				to: c.replace('%',''),
				speed: 1000,
				refreshInterval: 10,
				onComplete: {}
			});
		},
		function() {
			var a = $(this).find('.percent-fill');
			var b = $(this).find('.percent-text');
			b.stop(true, true).css('z-index', 2);
			a.stop(true, true).css('z-index', 1).animate({ height: '-=20', width: '-=20', left: '0', top:'0' }, 500, 'linear');
			$('.show-percent').remove();
		}
	);
	$('.icon_box_container').hover(
		function(){
			var a = $(this).find('.icon-background');
			a.stop(true, true).animate({ height: '+=30', width: '+=30', left: '-15', top:'-15'}, 1000, 'easeOutElastic');
		},
		function(){
			var a = $(this).find('.icon-background');
			a.stop(true, true).animate({ height: '-=30', width: '-=30', left: '0', top:'0' }, 500, 'linear');
		}
	);
	
});

jQuery.event.add(window, "load", resizeElements);
jQuery.event.add(window, "resize", resizeElements);


function resizeElements() 
{
	var showMap = jQuery("#contact").find(".show-map") == "undefined" ? "" : jQuery("#contact").find(".show-map").each(function(){	
		var a = jQuery(this), 
		marginSize = 20,
		marginTop = 70,
		mainContent = a.parent(),
		mainContentHeight = mainContent.height(),
		content = mainContent.find(".contact-content"),
		section = content.parent(),
		infoBlock = content.find(".contact-info-block"),
		sendButton = content.find('#submit-contact-form'),
		sendButtonPosition = sendButton.offset(),
		formBlock = content.find(".contact-form"),
		contentPosition = content.position(),
		infoPosition = infoBlock.offset(),
		elementWidth = a.width()+marginSize,
		header = section.children("header").height(),
		elementTop = ( header != "null" ? marginTop+header : marginTop ),
		mainHeader = mainContent.children("header").height(),
		iframeHeight = ( mainHeader == "null" ? mainContentHeight : mainContentHeight-mainHeader );
		
		if( content.width() == 960 || content.width() == 720 ){
			a.css('width', 75);
			infoBlock.css( 'margin-top', 0 );
			if( content.height() < a.parent().height() ){
				a.parent().find('iframe').css({ 'height': ( content.height()+elementTop+10 ) , 'width':jQuery(window).width() });
				a.parent().css({ height: ( content.height()+elementTop+10 ) });
			}
			iframeMap = mainContent.find('iframe.map-baqckground, .cuckoo_map_shortcode').css({'height': iframeHeight, 'width':jQuery(window).width() });
			if(content.css("display") == "block") {
				mainContent.css('height', 'auto');
				a.css({ top: elementTop + "px", left: ( infoPosition.left-elementWidth-24 ) });
			}else{
				a.css({ top: elementTop + "px", left: section.width()-elementWidth });
			}
		}else if( content.width() == 480 ){
			a.css('width', 204);
			if( content.height() > a.parent().height() ){
				a.parent().find('iframe').css({ 'height': ( content.height()+elementTop+10 ), 'width':jQuery(window).width() });
				a.parent().css({ height: ( content.height()+elementTop+80 ) });
			}
			iframeMap = mainContent.find('iframe.map-baqckground, .cuckoo_map_shortcode').css({'height': iframeHeight+70, 'width':jQuery(window).width() });
			if(content.css("display") == "block") {
				mainContent.css('height', 'auto');
				infoBlock.css( 'margin-top', 70 );
				a.css({ top: elementTop + "px", left: infoPosition.left + "px" });
			}else{
				mainContent.css('height', content.height()+elementTop+80);
				a.css('width', 75);
				a.css({ top: elementTop + "px", left: section.width()-elementWidth + "px"});
			}
		}else{
			a.css('width', 204);
			if( content.height() > a.parent().height() ){
				a.parent().find('iframe').css({ 'height': content.height()+elementTop+10, 'width':jQuery(window).width() });
				a.parent().css({ height: content.height()+elementTop+80 });
			}
			iframeMap = mainContent.find('iframe.map-baqckground, .cuckoo_map_shortcode').css({'height': iframeHeight+70, 'width':jQuery(window).width() });
			if(content.css("display") == "block") {
				mainContent.css('height', 'auto');
				infoBlock.css( 'margin-top', 70 );	
				a.css({ top: ( sendButton.position().top+elementTop+a.height()+50 ), left: infoPosition.left + "px" });
			}else{
				var cheight = content.css('display', 'block'),
				eheight = sendButton.position().top+elementTop+a.height()+50,
				closeHeight = content.css('display', 'none');
				mainContent.css('height', content.height()+elementTop+10);
				a.css('width', 75);
				a.css({ top: eheight, left: section.width()-elementWidth + "px"});
			}
		}
	});
}

(function($) {
	
	$.fn.tabs = function(parameters) {
		var parameters = jQuery.extend( {
			speed: '500',
			speedOut: '300',
			easing: 'linear',
			contentClass: 'tab-content',
			navigationClass: 'tab-nav',
			activeClass: 'active',
			conteinerAll: 'tab-container'
		}, parameters);

		return this.each(function(i,e) {
			var tabs = $(e);
			var navigation = tabs.find("."+parameters.navigationClass);
			var contents = tabs.find("."+parameters.contentClass+":gt(0)").hide();
			var conteinerBig = tabs.find("."+parameters.conteinerAll);
			var items = navigation.find("li");
			var firstContent = items.first().find("a").attr("href");
			var firstHeight = $(firstContent).height();
			$(conteinerBig).css({ height : firstHeight});
			items.first().addClass(parameters.activeClass);
			items.each(function(j, item) {
				var item = $(item);
				$(window).resize(function(){
					items.removeClass(parameters.activeClass).first().addClass(parameters.activeClass);
					tabs.find("."+parameters.contentClass).css('display', 'block').not(":first-child").css('display', 'none');
					conteinerBig.css({ height : conteinerBig.first().children().height()});
				});
				item.find("a").click(function() {
					var a = $(this);
					var li = a.parent("li");
					if(li.hasClass(parameters.activeClass))
						return false;
					items.removeClass(parameters.activeClass);
					li.addClass(parameters.activeClass);
					var contents = tabs.find("."+parameters.contentClass).fadeOut(parameters.speedOut, parameters.easing);
					var activeTab = a.attr("href");
					var activeHeight = $(activeTab).height();
					$(conteinerBig).css({ height : activeHeight});
					$(activeTab).fadeIn(parameters.speed, parameters.easing);
					
					return false;
				});
			});
		});
	}

})(jQuery);

(function($) {
    $.fn.countTo = function(options) {
        // merge the default plugin settings with the custom options
        options = $.extend({}, $.fn.countTo.defaults, options || {});

        // how many times to update the value, and how much to increment the value on each update
        var loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;

        return $(this).each(function() {
            var _this = this,
                loopCount = 0,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);

            function updateTimer() {
                value += increment;
                loopCount++;
                $(_this).html(value.toFixed(options.decimals));

                if (typeof(options.onUpdate) == 'function') {
                    options.onUpdate.call(_this, value);
                }

                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;

                    if (typeof(options.onComplete) == 'function') {
                        options.onComplete.call(_this, value);
                    }
                }
            }
        });
    };

    $.fn.countTo.defaults = {
        from: 0,  // the number the element should start at
        to: 100,  // the number the element should end at
        speed: 1000,  // how long it should take to count between the target numbers
        refreshInterval: 100,  // how often the element should be updated
        decimals: 0,  // the number of decimal places to show
        onUpdate: null,  // callback method for every time the element is updated,
        onComplete: null,  // callback method for when the element finishes updating
    };
})(jQuery);


(function($) {
	
	$.fn.toggles = function(parameters) {
		var parameters = jQuery.extend( {
			speed: '500',
			easing: 'easeInCubic',
			contentClass: '.toggle-content-text',
			activeClass: 'active',
			toggleClassButton: 'toggle-open',
			style: 'toggle',
			accordionItem: 'toggle-accordion-content',
			accordionStyle: 'open-close',
			fullClickClass: 'toggle_shortcode_title'
		}, parameters);
		
		return this.each(function(i,e) {
			var item = $(e);
			var toggleOpenText = $(parameters.contentClass, this);
			switch(parameters.style){
			case 'toggle':
				item.each(function(){
					$("."+parameters.fullClickClass, this).click(function() {
							toggleOpenText.toggle(parameters.speed, parameters.easing),
							$(this).find("."+parameters.toggleClassButton).toggleClass(parameters.activeClass);
						return false;
					});
				});
			break;
			case 'accordion':
				var getActiveClassCount = item.find("."+parameters.activeClass).length;
				var getAllAccordionElement = item.find("."+parameters.accordionItem).length;
				if(getActiveClassCount == getAllAccordionElement){
					$('.' + parameters.accordionItem + ':first-child',this).find("." + parameters.activeClass );
					$('.' + parameters.accordionItem + ':first-child',this).find(parameters.contentClass);
				}
				switch(parameters.accordionStyle){
				case 'not-close':
					item.each(function(i,e){
						$("."+parameters.fullClickClass, this).click(function() {
							var parent = $(this).closest("."+parameters.accordionItem);
							var content = parent.find(parameters.contentClass);
							if(content.css("display") == "none") {
								item.not(parent).find(parameters.contentClass).slideUp(parameters.speed, parameters.easing);
								item.not(parent).find("."+parameters.toggleClassButton).addClass(parameters.activeClass);
								parent.find(parameters.contentClass).slideDown(parameters.speed, parameters.easing);
								$(this).find("."+parameters.toggleClassButton).removeClass(parameters.activeClass);
							}
							return false;
						});
					});
				break;
				case 'open-close':
					item.each(function(i,e){
						$("."+parameters.fullClickClass, this).click(function() {
							var parent = $(this).closest("."+parameters.accordionItem);
							var content = parent.find(parameters.contentClass);
								item.not(parent).find(parameters.contentClass).slideUp(parameters.speed, parameters.easing);
								item.not(parent).find("."+parameters.toggleClassButton).addClass(parameters.activeClass);
							if(content.css("display") == "none") {
								parent.find(parameters.contentClass).slideDown(parameters.speed, parameters.easing);
								$(this).find("."+parameters.toggleClassButton).removeClass(parameters.activeClass);
							}
							return false;
						});
					});
				break;
				}
			break;
			}
		});
	}

})(jQuery);

/* New settings */

(function($) {
	
	var methods = {
	
		init : function(options) {
			methods.loadFunctions();
			methods.topNavigationChildrenHover();
			//methods.navigation();
		},
		
		// Navigation Settings
		navigation : function(){
			var span, originalWidth, currentMenuItem, li, leftPosition, url, hashClassActive;
			
			$('#nav').append($('<div/>', { 'class' : 'current-nav'}));
			span  = $('#nav').find('div.current-nav');
			url = window.location.hash;
			
			$('#nav div ul li a').each(function(){
				var a = this.hash;
				if(a){
					//if(a === url) $(this).parent().addClass('active-scroll');
				}
			});
			hashClassActive = $("#nav").find('.active-scroll');
			if(hashClassActive.length > 0){
				currentMenuItem	= $("#nav").find('>div>ul>.active-scroll');
			}else{
				currentMenuItem	= $("#nav").find('>div>ul>.current-menu-item, >div>ul>.current_page_item');
				currentMenuItem.addClass('active-scroll');
			}
			
			if(!currentMenuItem.is(':visible')){
				currentMenuItem = $("#nav > div > ul li:first-child");
				currentMenuItem.addClass('active-scroll');
			}
				
			span.width(currentMenuItem.width())
				.css("left", currentMenuItem.position().left + parseInt(currentMenuItem.css("padding-left"), 10) + 1)
				.data("originalLeft", span.position().left);
			
			//Navigation scroll
			
			$('#nav div ul li a').each(function(){
				if(this.hash){
					if(this.hash == '#home' && document.getElementById('home')){
						$(this).parent().addClass('active-scroll-home active-scroll');
					}else{
						$(this).parent().removeClass('active-scroll');	
					}
				}
			});
			
			/*
			$(window).scroll(function(){
				$('nav.navigation-top div ul li a').each(function(){
					var a = this.hash;
					var b = $('nav.navigation-top div ul').find('.active-scroll');
					var c = $('nav.navigation-top div ul').find('.active-scroll-home.active-scroll');
			
					if(a){
						if(methods.isScrolledIntoView(a)){
							$(this).parent().addClass('active-scroll');
							li = $(this).parent();
							leftPosition = li.position().left + parseInt(li.css("padding-left"), 10) + 1;
							span.stop().animate({left: leftPosition, width: li.width() }, 1000).data("originalLeft", leftPosition);
							$('nav.navigation-top div ul').find('.active-scroll-home').removeClass('active-scroll');
						}else{
							$(this).parent().removeClass('active-scroll');
						}
					}

					if(b.length == 0){
						$('nav.navigation-top div ul').find('.active-scroll-home').addClass('active-scroll');
						lis = $('nav.navigation-top div ul').find('.active-scroll-home');
						leftPosition = lis.position().left + parseInt(lis.css("padding-left"), 10) + 1;
						span.stop().animate({left: leftPosition, width: lis.width() }, 1000).data("originalLeft", leftPosition);
					}
				});
			});
			*/
		
			
			originalWidth = currentMenuItem.width();
			
			// Navigation hover
			$("#nav > div > ul > li").hover(
				function () {
					li = $(this);
					leftPosition = li.position().left + parseInt(li.css("padding-left"), 10) + 1;
					span.stop().animate({left: leftPosition, width: li.width() });
				},
				function () {
					span.stop().animate({
						left: span.data("originalLeft"),
						width: originalWidth
					});
				}
			);
		},
		
		unbinds : function(){
			$(window).unbind( 'load' );
			$(window).unbind( 'resize' );
		},
		
		topNavigationChildrenHover : function(){	
			var navigationElement, navEffect, theClass;
			
			navEffect = $("div#header_nav nav");
			navigationElement = $("div#header_nav nav ul li ul li ul").parent();
			navEffect.find("li").each(function() {
				$(this).hover( function() { 
					if($('ul.sub-menu',this).length > 0 ) {
						theClass = $('ul.sub-menu',this).parent().parent().attr('id');
						if(theClass == 'cuckoo-nav-top'){
							$('ul',this).first().css({display: 'block', top: '50px', opacity: 0}).stop(true, true).animate({ opacity:1, top: 40 },150);
						}else{
							$('ul',this).first().css({display: 'block', left: '210px', opacity: 0}).stop(true, true).animate({ opacity:1, left: 200 },150);
						}
					}
				}, function() {
					if($('ul',this).length > 0 ) {
						theClass = $('ul.sub-menu',this).parent().parent().attr('id');

						if(theClass == 'cuckoo-nav-top'){
							$('ul',this).first().stop().animate({ opacity:0, top: 70 },250, function(){
								$(this).css('display', 'none');
							});
						}else{
							$('ul',this).first().stop().animate({opacity:0, left: 230},250, function(){
								$(this).css('display', 'none');
							});
						}
					}
				});
			});
			
			navigationElement.each(function(){
				$("a",this).first().append('<span class="nav_arrow"></span>');
			});
			
		},
		
		isScrolledIntoView : function(elem){
			
			if(!document.getElementById(elem.replace('#',''))){
				return;
			}
			var docViewTop = $(window).scrollTop(),
				docViewBottom = docViewTop + $(window).height(),
				elemTop = $(elem).offset().top,
				elemBottom = elemTop + $(elem).height();
		   //Is more than half of the element visible
		   return ((elemTop + (elemBottom - elemTop)) >= docViewTop && ((elemTop + (elemBottom - elemTop)) <= docViewBottom));
		},
		
		// If needs to load page for functions
		loadFunctions : function(){
			$(window).bind( 'load', function(){
				methods.navigation();
			});
		},
		
		blogListHomepage : function( param ){
			var param = jQuery.extend( {
				main: 'body',
				mainUL: 'ul.blog-list-homepage',
				visibleClass: 'visible-element',
				hiddenClass: 'hidden-element',
				animateSpeed: 400,
				easing: 'easeInExpo',
				effect: 'default', // effects -> elementsQuicklyLeft, elementOpacity, default
				Lefteasing: 'easeOutBack',
				navigationClass: 'post-navigation',
				LeftPosition: 200,
				backwhiteeffect: true, // effect blackWhite attributes for function BlackAndWhite(), this is plugin for http://www.gianlucaguarini.com/
				hoverEffect: 'WhiteBlack-Hover-Coloring',
				around: 1,
				responsive: true
			}, param);
			
			
			var highestElement = function(section){
				var highest, t_elem;
				highest = 0; // the height of the highest element (after the function runs)
				t_elem;  // the highest element (after the function runs)
				
				$(section).each(function () {
					if ( $(this).outerHeight() > highest ) {
						t_elem=this;
						highest=$(this).outerHeight();
					}
				});
				return highest;
			};
			
			$(param.main).each(function() {
				var _this, this_child, this_parent, child_width, child_margin, next_button, prev_button, this_c, get_all;
				_this = $(this).find(param.mainUL);
				this_parent = _this.parent();
				this_child = _this.children();
				child_margin = parseInt(this_child.css('margin-right'), 10);
				child_width = this_child.width()+(child_margin*2);
				next_button = this_parent.parent().find('div.next-blog-nav');
				prev_button = this_parent.parent().find('div.prev-blog-nav');
				
				// get width
				_this.width(child_width*(this_child.length)).css('left', 0);

				this_child.each(function(){
					var a,b;
					a = $(this);
					b = a.position();
					
					if(b.left < this_parent.width()){
						$(this).addClass(param.visibleClass).css('opacity', 1);
					}else{
						if(param.effect == 'default'){
							$(this).addClass(param.hiddenClass).css({'opacity': 1 , 'visibility': 'visible'});
						}else{
							$(this).addClass(param.hiddenClass);
						}
					}
				});
				
				get_all = (this_child.outerWidth()+child_margin)*this_child.length;
				
				if( (get_all-child_margin) > this_parent.width() ){
					_this.parent().parent().find('.'+param.navigationClass).fadeIn();
				}else{
					_this.parent().parent().find('.'+param.navigationClass).fadeOut();
				}
				
				if(param.around != 1){
					prev_button.css('display', 'none');
				}
				
				// effects image blackWhite
				methods.blackWhiteEffectsUse(_this.find('img'), param.hoverEffect);
				
				// resize
				$(window).bind('resize', function(){
					var t, a, b, e;
					this_child = _this.children();
					child_margin = parseInt(this_child.css('margin-right'), 10);
					child_width = this_child.width()+(child_margin*2);
					t = _this.children('.'+param.visibleClass);
					a = this_parent.width();
					b = (this_child.outerWidth()+child_margin)*t.length;
					e = (this_child.outerWidth()+child_margin)*this_child.length;
					
					if( (b-child_margin) > a ){
						t.last().removeClass(param.visibleClass).addClass(param.hiddenClass);
					}
					if( (b-child_margin) < a ){
						t.last().next().removeClass(param.hiddenClass).addClass(param.visibleClass).css('opacity', 1);
					}
					
					if( (e-child_margin) > this_parent.width() ){
						_this.parent().parent().find('.'+param.navigationClass).fadeIn();
					}else{
						_this.parent().parent().find('.'+param.navigationClass).fadeOut();
					}
					
					_this.animate({height: highestElement(_this.children('.'+param.visibleClass))}, param.animateSpeed);
				});
				
				// get height
				$(window).load(function(){
					_this.height(highestElement(_this.children('.'+param.visibleClass)));
				});
			
				//next
				next_button.bind('click', function(event){
					event.preventDefault();
					if ( _this.is(':animated') ) {
						return;
					}
					
					var position, run, firstEl, lastEl;
					
					_this.data('html_clone',_this.html());
					this_clone = _this.data('html_clone');
					position = _this.position();
					run = position.left-(child_width-child_margin);
					this_parent.parent().addClass('unselectable');
					
					if(param.around == 1){
					
						if(_this.find('li.'+param.visibleClass+':last').next("li").length == 0){
							if(param.effect == 'default'){
								$(this_clone).removeClass(param.visibleClass).addClass(param.hiddenClass).css({'opacity': 1, 'visibility': 'visible'}).appendTo(_this);
							}else{
								$(this_clone).removeClass(param.visibleClass).addClass(param.hiddenClass).css('opacity', 0).appendTo(_this);
							}
							_this.width(child_width*(_this.children().length));
							methods.blackWhiteEffectsUse(_this.find('img'), param.hoverEffect);
						}
						
						firstEl = _this.find('li.'+param.visibleClass+':first');
						lastEl = _this.find('li.'+param.visibleClass+':last').next();
						
						if ( firstEl.is(':animated') && lastEl.is(':animated') ) {
							return;
						}
						
						if(param.effect == 'elementsQuicklyLeft'){
							firstEl.css('left', 'auto').animate({opacity:0, right: param.LeftPosition}, param.animateSpeed*2, param.Lefteasing, function(){
								$(this).css('right', 'auto');
							});
						}else if(param.effect == 'elementOpacity'){
							firstEl.animate({opacity:0}, param.animateSpeed*2);
						}
							
						_this.stop(true, true).delay(param.animateSpeed/4).animate({left: run}, param.animateSpeed, param.easing, function(){
							firstEl.removeClass(param.visibleClass).addClass(param.hiddenClass);
							var a = lastEl.removeClass(param.hiddenClass).addClass(param.visibleClass);
							_this.animate({height: highestElement(_this.children('.'+param.visibleClass))}, param.animateSpeed);
							if(param.effect == 'elementsQuicklyLeft'){
								a.css({'left': param.LeftPosition}).animate({opacity:1, left:0}, param.animateSpeed, param.Lefteasing);
							}else if(param.effect == 'elementOpacity'){
								a.animate({opacity:1}, param.animateSpeed);
							}else{
								a.css('opacity',1);
							}
							this_parent.parent().removeClass('unselectable');
						});
						
					}else{
						
						firstEl = _this.find('li.'+param.visibleClass+':first');
						lastEl = _this.find('li.'+param.visibleClass+':last').next();
						
						if ( firstEl.is(':animated') && lastEl.is(':animated') ) {
							return;
						}

					
						if((run+_this.width()+this_child.width()) > this_parent.width()){
					
							if(param.effect == 'elementsQuicklyLeft'){
								firstEl.css('left', 'auto').animate({opacity:0, right: param.LeftPosition}, param.animateSpeed*2, param.Lefteasing, function(){
									$(this).css('right', 'auto');
								});
							}else if(param.effect == 'elementOpacity'){
								firstEl.animate({opacity:0}, param.animateSpeed*2);
							}
								
							_this.stop(true, true).delay(param.animateSpeed/4).animate({left: run}, param.animateSpeed, param.easing, function(){
								firstEl.removeClass(param.visibleClass).addClass(param.hiddenClass);
								var a = lastEl.removeClass(param.hiddenClass).addClass(param.visibleClass);
								_this.animate({height: highestElement(_this.children('.'+param.visibleClass))}, param.animateSpeed);
								if(param.effect == 'elementsQuicklyLeft'){
									a.css({'left': param.LeftPosition}).animate({opacity:1, left:0}, param.animateSpeed, param.Lefteasing);
								}else if(param.effect == 'elementOpacity'){
									a.animate({opacity:1}, param.animateSpeed);
								}else{
									a.css('opacity',1);
								}
								
								if( a.next().length == 0 ){
									next_button.fadeOut();
								}
								if( a.prev().length != 0 ){
									prev_button.fadeIn();
								}
								
								this_parent.parent().removeClass('unselectable');
							});
							
						}
						
					}
				});
				//previuos
				prev_button.bind('click', function(event){	
					event.preventDefault(); 
					if ( _this.is(':animated') ) {
						return;
					}
					
					var position, run, firstEl, lastEl, getPrev, prevHeight, prevPos;
					position = _this.position();
					this_parent.parent().addClass('unselectable');
					_this.data('html_clone',_this.html());
					this_clone = _this.data('html_clone');
					
					
					if(param.around == 1){
					
						if(_this.find('li.'+param.visibleClass+':first').prev("li").length == 0){
							_this.children().each(function(){
								$(this).removeClass('new-prev-elements');
							});
							if(param.effect == 'default'){
								$(this_clone).removeClass(param.visibleClass).addClass(param.hiddenClass).css({'opacity': 1, 'visibility': 'visible'}).addClass('new-prev-elements').prependTo(_this);
							}else{
								$(this_clone).removeClass(param.visibleClass).addClass(param.hiddenClass).css('opacity', 0).addClass('new-prev-elements').prependTo(_this);
							}
							getPrev = _this.find('.new-prev-elements').length;
							prevHeight = getPrev*(child_width-child_margin);
							_this.width(child_width*(_this.children().length)).css('left', -prevHeight);
							methods.blackWhiteEffectsUse(_this.find('img'), param.hoverEffect);
						}
						
						firstEl = _this.find('li.'+param.visibleClass+':first').prev();
						lastEl = _this.find('li.'+param.visibleClass+':last');
						position = _this.position();
						run = position.left+(child_width-child_margin);
						
						if ( firstEl.is(':animated') && lastEl.is(':animated') ) {
							return;
						}

						if(param.effect == 'elementsQuicklyLeft'){
							lastEl.css('right', 'auto').animate({opacity:0, left: param.LeftPosition}, param.animateSpeed*2, param.Lefteasing, function(){
								$(this).css('left', 'auto');
							});
						}else if(param.effect == 'elementOpacity'){
							lastEl.animate({opacity:0}, param.animateSpeed*2);
						}
							
						_this.stop(true, true).delay(param.animateSpeed/4).animate({left: run}, param.animateSpeed, param.easing, function(){
							lastEl.removeClass(param.visibleClass).addClass(param.hiddenClass);
							var a = firstEl.removeClass(param.hiddenClass).addClass(param.visibleClass);
							_this.animate({height: highestElement(_this.children('.'+param.visibleClass))}, param.animateSpeed);
							if(param.effect == 'elementsQuicklyLeft'){
								a.css({'right': param.LeftPosition}).animate({opacity:1, right:0}, param.animateSpeed, param.Lefteasing);
							}else if(param.effect == 'elementOpacity'){
								a.animate({opacity:1}, param.animateSpeed);
							}else{
								a.css('opacity',1);
							}
							this_parent.parent().removeClass('unselectable');
						});
						
					}else{
						
						firstEl = _this.find('li.'+param.visibleClass+':first').prev();
						lastEl = _this.find('li.'+param.visibleClass+':last');
						position = _this.position();
						run = position.left+(child_width-child_margin);
						button = $(this);
						
						if ( firstEl.is(':animated') && lastEl.is(':animated') ) {
							return;
						}
						
						if( position.left < 0 ){

							if(param.effect == 'elementsQuicklyLeft'){
								lastEl.css('right', 'auto').animate({opacity:0, left: param.LeftPosition}, param.animateSpeed*2, param.Lefteasing, function(){
									$(this).css('left', 'auto');
								});
							}else if(param.effect == 'elementOpacity'){
								lastEl.animate({opacity:0}, param.animateSpeed*2);
							}
								
							_this.stop(true, true).delay(param.animateSpeed/4).animate({left: run}, param.animateSpeed, param.easing, function(){
								lastEl.removeClass(param.visibleClass).addClass(param.hiddenClass);
								var a = firstEl.removeClass(param.hiddenClass).addClass(param.visibleClass);
								_this.animate({height: highestElement(_this.children('.'+param.visibleClass))}, param.animateSpeed);
								if(param.effect == 'elementsQuicklyLeft'){
									a.css({'right': param.LeftPosition}).animate({opacity:1, right:0}, param.animateSpeed, param.Lefteasing);
								}else if(param.effect == 'elementOpacity'){
									a.animate({opacity:1}, param.animateSpeed);
								}else{
									a.css('opacity',1);
								}
								if( a.prev().length == 0 ){
									prev_button.fadeOut();
								}
								if( a.next().length != 0 ){
									next_button.fadeIn();
								}
								
								this_parent.parent().removeClass('unselectable');
							});
						
						}

					}
					
				});
			});
		},
		
		blackWhiteEffectsUse: function(selector, effects){
			// effects  -->	'WhiteBlack-Hover-Coloring', 'Coloring-Hover-WhiteBlack', 'WhiteBlack-Hover-zoomIn-Coloring', 'WhiteBlack-Hover-zoomOut-Coloring', 'Coloring-Hover-zoomIn-WhiteBlack', 'Coloring-Hover-zoomOut-WhiteBlack', 'WhiteBlack-noHover', 'Coloring-noHover'
			if($().BlackAndWhite){
				switch(effects){
					case 'WhiteBlack-Hover-Coloring':
						$(selector).bind('load',function (){
							var a = $(this).parent().find('.BWfade').remove();
							$(this).parent().BlackAndWhite({ 
								responsive: false,
								hoverEffect : true, // default true
								webworkerPath : false,	// set the path to BnWWorker.js for a superfast implementation
								responsive:false, // for the images with a fluid width and height 
								invertHoverEffect: false, // to invert the hover effect
							});
						});
					break;
					case 'Coloring-Hover-WhiteBlack':
						$(selector).bind('load',function (){
							var a = $(this).parent().find('.BWfade').remove();
							$(this).parent().BlackAndWhite({ 
								responsive: false,
								hoverEffect : true,
								webworkerPath : false,
								responsive:false,
								invertHoverEffect: true
							});
						});
					break						
					case 'WhiteBlack-Hover-zoomIn-Coloring':
						$(selector).bind('load',function (){
							var a = $(this).parent().find('.BWfade').remove();
							$(this).parent().BlackAndWhite({ 
								responsive: false,
								hoverEffect : true,
								webworkerPath : false,
								responsive:false,
								invertHoverEffect: false,
								speed: { 
									fadeIn: 200,
									fadeOut: 800 
								}
							});
						});
						$(selector).parent().hover(
							function(){
								$('img:last', this).stop(true, true).animate({width: '+=20', height: '+=20', left: '-=10', top: '-=10'}, 200, 'linear');
							},
							function(){
								$('img:last', this).stop(true, true).animate({width: '-=20', height: '-=20',left: '+=10', top: '+=10'}, 200, 'linear');
							}
						);
					break;		
					case 'WhiteBlack-Hover-zoomOut-Coloring':
						$(selector).bind('load',function (){
							var a = $(this).parent().find('.BWfade').remove();
							$(this).parent().BlackAndWhite({ 
								responsive: false,
								hoverEffect : true,
								webworkerPath : false,
								responsive:false,
								invertHoverEffect: false
							});
						});
						$(selector).load(function(){
							$(this).each( function(){
								$(this).parent().find('img:last').css({width: '+=20', height: '+=20', left: '-10px', top: '-10px'});
								$(this).parent().find('.BWfade').css({width: '+=20', height: '+=20', left: '-10px', top: '-10px'});
							}).parent().hover(
								function(){
									$('img',this).stop(true, true).animate({width: '-=20', height: '-=20', left: '+=10', top: '+=10'}, 200, 'linear');
								},
								function(){
									$('img',this).stop(true, true).animate({width: '+=20', height: '+=20',left: '-=10', top: '-=10'}, 200, 'linear');
								}
							);
						});
					break;
					case 'Coloring-Hover-zoomIn-WhiteBlack':
						$(selector).bind('load',function (){
							var a = $(this).parent().find('.BWfade').remove();
							$(this).parent().BlackAndWhite({ 
								responsive: false,
								hoverEffect : true,
								webworkerPath : false,
								responsive:false,
								invertHoverEffect: true
							});
						});
						$(selector).load(function(){
							$(this).parent().hover(
								function(){
									$('canvas', this).stop(true, true).animate({width: '+=20', height: '+=20', left: '-=10', top: '-=10'}, 200, 'linear');
									$('img', this).stop(true, true).animate({width: '+=20', height: '+=20', left: '-=10', top: '-=10'}, 200, 'linear');
								},
								function(){
									$('canvas', this).stop(true, true).animate({width: '-=20', height: '-=20',left: '+=10', top: '+=10'}, 200, 'linear');
									$('img', this).stop(true, true).animate({width: '-=20', height: '-=20',left: '+=10', top: '+=10'}, 200, 'linear');
								}
							);
						});
					break;	
					case 'Coloring-Hover-zoomOut-WhiteBlack':
						$(selector).bind('load',function (){
							var a = $(this).parent().find('.BWfade').remove();
							$(this).parent().BlackAndWhite({ 
								responsive: false,
								hoverEffect : true,
								webworkerPath : false,
								responsive:false,
								invertHoverEffect: true
							});
						});
						$(selector).load(function(){
							$(this).each( function(){
								$(this).parent().find('img:last').css({width: '+=20', height: '+=20', left: '-10px', top: '-10px'});
								$(this).parent().find('.BWfade').css({width: '+=20', height: '+=20', left: '-10px', top: '-10px'});
							}).parent().hover(
								function(){
									$('canvas',this).stop(true, true).animate({width: '-=20', height: '-=20', left: '+=10', top: '+=10'}, 200, 'linear');
									$('img',this).stop(true, true).animate({width: '-=20', height: '-=20', left: '+=10', top: '+=10'}, 200, 'linear');
								},
								function(){
									$('canvas',this).stop(true, true).animate({width: '+=20', height: '+=20',left: '-=10', top: '-=10'}, 200, 'linear');
									$('img',this).stop(true, true).animate({width: '+=20', height: '+=20',left: '-=10', top: '-=10'}, 200, 'linear');
								}
							);
						});
					break;
					case 'WhiteBlack-noHover':
						$(selector).bind('load',function (){
							var a = $(this).parent().find('.BWfade').remove();
							$(this).parent().BlackAndWhite({ 
								responsive: false,
								hoverEffect : false,
								webworkerPath : false,
								responsive:false,
								invertHoverEffect: false
							});
						});
					break;
					case 'Coloring-noHover':
						$(selector).bind('load',function (){
							var a = $(this).parent().find('.BWfade').remove();
							$(this).parent().BlackAndWhite({ 
								responsive: false,
								hoverEffect : false,
								webworkerPath : false,
								responsive:false,
								invertHoverEffect: true
							});
						});
					break;					
					case 'Coloring-Opacity':
						$(selector).parent().hover(
							function(){
								$('img', this).stop(true, true).animate({opacity:0.5}, 200, 'linear');
							},
							function(){
								$('img', this).stop(true, true).animate({opacity:1}, 200, 'linear');
							}
						);
					break;					
					case 'Coloring-Zoom-In':
						$(selector).parent().hover(
							function(){
								$('img', this).stop(true, true).animate({width: '+=20', height: '+=20', left: '-=10', top: '-=10'}, 200, 'linear');
							},
							function(){
								$('img', this).stop(true, true).animate({width: '-=20', height: '-=20',left: '+=10', top: '+=10'}, 200, 'linear');
							}
						);
					break;					
					case 'Coloring-imperial-Out':
						$(selector).parent().hover(
							function(){
								$('img', this).stop(true, true).animate({width: '-=20', height: '-=20', left: '+=10', top: '+=10'}, 200, 'linear');
							},
							function(){
								$('img', this).stop(true, true).animate({width: '+=20', height: '+=20',left: '-=10', top: '-=10'}, 200, 'linear');
							}
						);
					break;					
					case 'Coloring-border':
						$(selector).parent().hover(
							function(){
								$('img', this).stop(true, true).animate({borderRadius: 150}, 200, 'linear');
							},
							function(){
								$('img', this).stop(true, true).animate({borderRadius: 0}, 200, 'linear');
							}
						);
					break;
					default:
						$(selector).bind('load',function (){
							var a = $(this).parent().find('.BWfade').remove();
							$(this).parent().BlackAndWhite({ 
								responsive: false,
								hoverEffect : true,
								webworkerPath : false,
								responsive:false,
								invertHoverEffect: false,
							});
						});
					break;
				}
				
				$(window).load(function(){
					$(selector).each(function(){
						var a = $(this).parent().find('.BWfade');
						if(a.length == 0){
							$(this).trigger('load');
						}
					});
				});
			}
		},
		
		rotationCuckoo: function(selector){
			var CuckooRotation = function (){
				$(selector).rotate({
					angle:0, 
					animateTo:360, 
					callback: CuckooRotation,
					easing: function (x,t,b,c,d){
						return c*(t/d)+b;
					}
				});	
			};
			CuckooRotation();
		},
		
		ajaxLoadMore: function(){
			// The number of the next page to load (/page/x/).
			var pageNum = parseInt(cuckoo_ajax.startPage) + 1;
			
			// The maximum number of pages the current query can return.
			var max = parseInt(cuckoo_ajax.maxPages);
			
			// The link of the next page of posts.
			var nextLink = cuckoo_ajax.nextLink;
			
			// The post types need to know types class.
			var posttypes = cuckoo_ajax.posttypes;
			
			if( $('.item-list-main').length > 0 ){
				var $mainContent = $('.item-list-main');
					$mainContent.masonry({
						itemSelector: '.cuckoo-list',
						columnWidth: 5,
						isAnimated: !Modernizr.csstransitions
					});
			}else if( $('.blog-full-width').length > 0 ){
				var $mainContent = $('.blog-full-width');
				posttypes = "list-full-width";
			}else if( $('.work-content').length > 0 ){
				var $mainContent = $('.work-content');
				posttypes = "work-item-240";
			}else{
				var $mainContent = $('.search-content');
				posttypes = "search-list";
			}
			
			/**
			 * Replace the traditional navigation with our own,
			 * but only if there is at least one page of new posts to load.
			 */
			if(pageNum <= max) {
				$mainContent.append('<div class="cuckoo-ajax-placeholder-'+ pageNum +' not-visible"></div>')
			}else{
				$('#load-more-position').remove();
			}
			
			/**
			 * Load new posts when the link is clicked.
			 */
			$('#load-more-position').click(function() {
			
				// Are there more posts to load?
				if(pageNum <= max) {
				
					// Show that we're working.
					$(this).find('.load-more').hide();
					if($(this).find('.img-loader').length == 0){
						$(this).append('<div class="img-loader"></div>');
					}else{
						$(this).find('.img-loader').fadeIn();
					}
					var hoverEffec, hoverEffecClass;
					hoverEffec = $(this).parent().data('hovereffects-img');
					hoverEffecClass = $(this).parent().data('hovereffects-class');
					
					$('.cuckoo-ajax-placeholder-'+ pageNum).load(nextLink + ' .'+posttypes,
						function() {
							// Update page number and nextLink.
							var typesDisplay = posttypes == 'team' ? posttypes + ' members' : posttypes;
							var old = pageNum;
							var elements = $('.cuckoo-ajax-placeholder-'+ old).html();
							
							if( $('.item-list-main').length > 0 ){
								// need for cuckoobizz theme
								$('footer').append('<div class="cuckoo-hidden-elements"></div>').css('float', 'left');
								$('.cuckoo-hidden-elements').append(elements);
								$('.cuckoo-hidden-elements').each(function(){
									$(this).find('.cuckoo-list').addClass('cuckoo-page-elements-'+pageNum);
								});
								var newElemenst = $('.cuckoo-hidden-elements').html();
								$('.cuckoo-hidden-elements').remove();
								
								$mainContent.append( newElemenst ).masonry( 'reload' );
								if(hoverEffec){
									var aa = $('.cuckoo-page-elements-'+pageNum);
									methods.blackWhiteEffectsUse(aa.find('img'), hoverEffec);
								}
							}else if($('.blog-full-width').length > 0){
								// need for cuckoobizz theme
								$('footer').append('<div class="cuckoo-hidden-elements"></div>').css('float', 'left');
								$('.cuckoo-hidden-elements').append(elements);
								$('.cuckoo-hidden-elements').each(function(){
									$(this).find('.list-full-width').addClass('cuckoo-page-elements-'+pageNum);
								});
								var newElemenst = $('.cuckoo-hidden-elements').html();
								$('.cuckoo-hidden-elements').remove();
								
								var insertsElements = $(newElemenst).appendTo('.blog-full-width').hide();
								insertsElements.slideDown(1000);
								
								if(hoverEffec){
									var aa = $('.cuckoo-page-elements-'+pageNum);
									methods.blackWhiteEffectsUse(aa.find('img'), hoverEffec);
								}
							}else{
								var insertsElements = $(elements).appendTo('.search-content').hide();
								insertsElements.slideDown(1000);
							}

							$('.cuckoo-ajax-placeholder-'+ old).remove();
							pageNum++;
							nextLink = nextLink.replace(/paged[=].[0-9]?/, 'paged='+ pageNum);
							
							// Add a new placeholder, for when user clicks again.
							$mainContent.append('<div class="cuckoo-ajax-placeholder-'+ pageNum +' not-visible"></div>');
							
							
							// Update the button message.
							if(pageNum <= max) {
								$('#load-more-position').find('.img-loader').fadeOut('50');
								$('#load-more-position').find('.load-more').fadeIn();
							} else {
								$('#load-more-position').find('.img-loader').fadeOut('50');
								$('#load-more-position').slideUp();
								
							}

						}
					);
				} 
				
				return false;
			});
		}
	};
	
	$.fn.cuckoobizz = function( method ) {
    
		// Method calling logic
		if ( methods[method] ) {
		
			return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
		  
		} else if ( typeof method === 'object' || ! method ) {
		
			return methods.init.apply( this, arguments );
		  
		} else {
		
			$.error( 'Method ' +  method + ' does not exist on jQuery.cuckoobizz' );
		  
		}
  
	};
	
	jQuery(document).ready(function($){
		$('body').cuckoobizz();
		$('body').cuckoobizz('rotationCuckoo', '.img-loader');
		var getLoader = setInterval(function() {
			var wrap = $('body').find('.rev_slider_wrapper');
			if(wrap.length > 0){
				if($('.tp-loader').length > 0){
					$('body').cuckoobizz('rotationCuckoo', '.tp-loader');
					clearInterval(getLoader);
				}
			}
		}, 10);
		
	});
	
})(jQuery);

