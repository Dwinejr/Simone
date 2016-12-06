/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*/
jQuery(document).ready(function($){
	$('#main-container').each(function(){
		var $container = $(this);
		if($container.find('.woocommerce-active').length > 0){
		
			var wooHeader = $container.find('h1.page-title'), // woo header
			//	wooPath = $container.find('#breadcrumb'), // woo breadcrumb
				wooTermDesc = $container.find('.term-description'), // woo term description
			//	hideElementsWooPath = wooPath.hide(),
				hideElementsWooTermDesc= wooTermDesc.hide(),
			//	path = $('.container-woo-path').append('<div id="breadcrumb">' + wooPath.html() + '</div>'),
				products = $container.find('ul.products'),
				related = $('#related-products');
				
				if(related != 'undefined'){
					titleRelated = related.find('div.related h2');
					related.find('div.related').addClass('screen-large-portfolio');
					if( titleRelated.text() != '' ){
						titleRelated.remove();
					}
				}
				
				if( wooHeader.text() != '' ){
					wooHeader.hide();
					$('#item-header').append('<div id="header-position" class="screen-large"></div>');
					$('#header-position').append('<div class="title-block"><h1>'+ wooHeader.text() +'</h1></div>');
				}
				
				if( wooTermDesc.text() != '' ){
					$('#header-position').append('<div class="item-info-block"><div class="item-info-line one"><span class="item-info-list">'+ wooTermDesc.text() +'</span></div></div>');
				}else{
					$('.title-block').css('padding-bottom','40px');
				}
				
				/* Remove elements */
				wooHeader.remove();
			//	wooPath.remove();
				wooTermDesc.remove();
		}
	});
	
	/* homepage mansory 
	if($(".woo-cuckoo-homepage").length > 0){
		$('.woo-cuckoo-homepage').masonry({
		  itemSelector: '.product',
		  columnWidth: 5,
		  isAnimated: !Modernizr.csstransitions
		});
	}
	*/
	
	/* Shop mansory */
	if( $('.cuckoo-not-single-element').length > 0 ){
		var gets_masonry = $('.cuckoo-not-single-element').find('ul.products');
		gets_masonry.masonry({
		  itemSelector: '.product',
		  columnWidth: 5,
		  isAnimated: !Modernizr.csstransitions
		});
	}
	
	/* Review */
	$("#review_form").each(function() {
		var name, namelabel, emailType, emaillabel, content, contentlabel,
		nametype = $(this).find(":input#author"),
		namelabelType = $(this).find("label[for=author]"),
		emailType = $(this).find(":input#email"),
		emaillabelType = $(this).find("label[for=email]"),
		contentType = $(this).find("textarea#comment"),
		contentlabelType = $(this).find("label[for=comment]"),
		spanRequire = $(this).find('p.comment-form-author span.required');
		spanRequireEmail = $(this).find('p.comment-form-email span.required');
		namelabelType.append('<span class="required">'+ spanRequire.text() +'</span>');
		emaillabelType.append('<span class="required">'+ spanRequireEmail.text() +'</span>');
		spanRequire.remove();
		spanRequireEmail.remove();
		
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
		
		namelabel.css('top', '-25px');
		emaillabel.css('top', '-25px');
		contentlabel.css('top', '-30px');
	});
	
	$('.woocommerce-tabs').each(function(){
		var text = $(this).find('li.reviews_tab a').text(),
		first = text.replace("(","["),
		strText = first.replace(")","]");
		$(this).find('li.reviews_tab a').text(strText);
	});
	
	$('.woocommerce_message').each(function(){
		var e = $(this),
			aLink = e.find('a.button:first-child');
		if( aLink != 'undefined' && aLink != '' ){
			aLink.addClass('link-after');
			e.after($('a.button.link-after'));
			$('a.button.link-after').wrap('<div class="link-message-after" />');
		}
	});
});

jQuery(window).load(function(){
	/* Homepage masonry reload  elements *
	if(jQuery(".woo-cuckoo-homepage.man").length > 0){
		jQuery('.woo-cuckoo-homepage.man').masonry('reload');
	}
	*/
	/* Shop mansory */
	if( jQuery('.cuckoo-not-single-element').length > 0 ){
		var gets_masonry = jQuery('.cuckoo-not-single-element').find('ul.products');
		gets_masonry.masonry('reload');
	}
});