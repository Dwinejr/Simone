/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 
jQuery(document).ready(function($) {

	$('.click_gen').click(function() {
		var _this, title, a;
		_this = $(this);
		title = _this.closest('.whit_click');
		a = _this.closest('#general_settings').find(".active_settings");
		if(_this.attr('class') === 'click_gen general_click'){
			title.removeClass("general_title").addClass("general_title_active");
			_this.removeClass("general_click").addClass("general_onclick");
			_this.closest('#general_settings').find(".active_settings").slideToggle("1000");
		}else{
			title.removeClass("general_title_active").addClass("general_title");
			_this.removeClass("general_onclick").addClass("general_click");
			_this.closest('#general_settings').find(".active_settings").slideToggle("1000");
		}
		return false;
	});
	
	// 
	/* Logo setings in header-footer page */
	$("#homepage_slider").each(function(){
		var option = $("option:selected", this).val();
		if(option == "Nivo Slider"){
			$(".nivo_general_settings, .nivo_slides").css("display", "block");
		}else if(option == "Revolution Slider"){
			$(".rev_set, .background-control").css("display", "block");
		}else if(option == "LayerSlider"){
			$(".layer_set, .background-control").css("display", "block");
		}else if(option == "FullScreen Slider"){
			$(".fullWidth_general_settings, .nivo_slides").css("display", "block");
		}else if(option == "FullScreen Image"){
			$(".img-control, .img-background-control").css("display", "block");
		}
	});
	
	$("#homepage_slider").change(function(event){
		$("option:selected", $(this)).each(function(){
			var option = document.getElementById('homepage_slider').value;
			if(option == "Nivo Slider"){
			
				$(".layer_set, .rev_set, .background-control, .img-control, .img-background-control").fadeOut(500);
				$(".fullWidth_general_settings").slideUp(500);
				$(".nivo_general_settings, .nivo_slides").slideDown(500);
				
			} else if(option == "Revolution Slider"){
			
				$(".nivo_general_settings, .nivo_slides, .fullWidth_general_settings, .img-control, .img-background-control").slideUp(600);
				$(".rev_set, .background-control").slideDown(500);
				$(".layer_set").slideUp(500);
				
			} else if(option == "LayerSlider"){
			
				$(".nivo_general_settings, .nivo_slides, .fullWidth_general_settings, .img-control, .img-background-control").slideUp(600);
				$(".rev_set").slideUp(500);
				$(".layer_set, .background-control").slideDown(500);
				
			}  else if(option == "FullScreen Slider"){
			
				$(".nivo_general_settings").slideUp(500);
				$(".fullWidth_general_settings, .nivo_slides").slideDown(600);
				$(".layer_set, .rev_set, .background-control, .img-control, .img-background-control").fadeOut(500);
				
			}  else if(option == "FullScreen Image"){
			
				$(".img-control, .img-background-control").fadeIn(500);
				$(".nivo_general_settings, .fullWidth_general_settings, .nivo_slides").slideUp(600);
				$(".layer_set, .rev_set, .background-control").fadeOut(500);
				
			} else {
			
				$(".nivo_general_settings, .fullWidth_general_settings, .nivo_slides, rev_set, .layer_set").slideUp();
				
			}
		});
	});
});

jQuery(document).ready(function($){	
	$(function() {
		$("#section_block").sortable({ 
		handle: '.section_change', 
		opacity: 0.6, 
		cursor: 'move', 
		placeholder: 'placeholder',
		update: function() {
			var items = $('#section_block').sortable('toArray');
			var itemStr = items.join(',');
			$('#section_block').find(':input[type=hidden][name=items]').val(itemStr );
		}								  
		});
	});

});

jQuery(document).ready(function($){	
	$("#social-sortable").sortable({ 
		handle: '.section_change', 
		opacity: 0.6, 
		cursor: 'move', 
		placeholder: 'social_placeholder',
		update: function() {
			var items = $('#social-sortable').sortable('toArray');
			var itemStr = items.join(',');
			$('#social-sortable').find(':input[type=hidden][name=items]').val(itemStr );
		}								  
	});
});


jQuery(document).ready(function($){
	$('.remove_block').click(function(){
		sect = $(".section").length;
		var id = $(this).attr('id').replace(/removeId/, '');
		var item = "item"+id+",";
		var valueItem = $('#item' +id).find(':input[type=text][name=upload_image'+ id +']').val();
		var nameSlides = $('#item' +id).find(':input[type=text][name=img_title'+ id +']').val();
		var showname = ( nameSlides > "" ? nameSlides : "No title" );
		if( valueItem.length > 0 ){
			if(confirm("You are about to delete \""+ showname +"\" slide?\nClick 'Cancel' to stop, 'OK' to continue.")){
				a = $('#section_block').find(':input[type=hidden][name=items]').val().replace(item, '');
				if( sect > 1 ) {
					$('#section_block').find(':input[type=hidden][name=items]').attr('value', a);
					$( '#item' +id ).remove();
				}else{
					$('.section .section_main').find('#up_image'+id).attr('src', '' ),
					$('.section .section_main').find(':input[type=text][name=img_title'+ id +']').attr('value', '' ),
					$('.section .section_main').find(':input[type=text][name=url_site'+ id +']').attr('value', '' ),
					$('.section .section_main').find(':input[type=text][name=upload_image'+ id +']').attr('value', '' );
					/* */
					$('.section .img_description').find('#slide_title'+ id ).attr('value', '' );
					$('.section .img_description').find('#slide_subtitle'+ id ).attr('value', '' );
					$('.section .img_description').find(':input[type=text][name=title_button_slides'+ id +']').attr('value', '' );
					$('.section .img_description').find(':input[type=text][name=url_button_slides'+ id +']').attr('value', '' );
					$('.section .img_description').find(':input:radio:checked').removeAttr('checked');
				}
				alert("Delete '"+ showname +"' slide!");
			}
		}else{
			a = $('#section_block').find(':input[type=hidden][name=items]').val().replace(item, '');
			if( sect > 1 ) {
				$('#section_block').find(':input[type=hidden][name=items]').attr('value', a);
				$( '#item' +id ).remove();
			}
		}
		return false;
	});
});


jQuery(document).ready(function($){
	$('.remove_sidebar').click(function(){
		sect = $(".section").length;
		var id = $(this).attr('id').replace(/removeId/, '');
		var item = "item"+id+",";
		var valueItem = $('#item' +id).find(':input[type=text]').val();
		if( valueItem.length > 0 ){
			if(confirm("You are about to delete \""+ valueItem +"\" sidebar?\nClick 'Cancel' to stop, 'OK' to continue.")){
				a = $('#section_block').find(':input[type=hidden][name=items]').val().replace(item, '');
				if( sect > 1 ) {
					$('#section_block').find(':input[type=hidden][name=items]').attr('value', a);
					$( '#item' +id ).remove();
				}else{
					$('#item' +id).find(':input[type=text]').attr('value', '' );
				}
				alert("Delete '"+ valueItem +"' sidebar!");
			}
		}else{
			a = $('#section_block').find(':input[type=hidden][name=items]').val().replace(item, '');
			if( sect > 1 ) {
				$('#section_block').find(':input[type=hidden][name=items]').attr('value', a);
				$( '#item' +id ).remove();
			}
		}
		return false;
	});
});

/*
jQuery(document).ready(function() {
jQuery('.upload_image_button').click(function() {
var ids = jQuery(this).attr('id').replace(/uploadId/, '');
formfield = jQuery(this).prev('.upload_image'+ids);
//item = 'item'+ids+',';
//ite =  jQuery('#section_block').find(':input[type=hidden][name=items]').attr('value').replace(item, '');
//items = ite+item;
tb_show('', 'media-upload.php?type=image&TB_iframe=true');
window.send_to_editor = function(html) {
if (jQuery(html).is("a")) {
var imgurl = jQuery('img', html).attr('src');
} else if (jQuery(html).is("img")) {
var imgurl = jQuery(html).attr('src');
}
var newImg = new Image();
newImg.src = imgurl;
jQuery(newImg).live("load",function(){
width = newImg.width;
height = newImg.height;
if( width > '225' || height > '150' ){
format = imgurl.substr(imgurl.length - 4);
jpegFormat = imgurl.substr(imgurl.length - 5);
if( width > 225 ) { newWidth = 225; } else { newWidth = width; }
if( height > 150 ) { newHeight = 150; } else { newHeight = height; }
if(format == ".jpg") { im=imgurl.replace(/.jpg/, '-'+newWidth+'x'+newHeight+'.jpg'); }
if(format == ".png") { im=imgurl.replace(/.png/, '-'+newWidth+'x'+newHeight+'.png'); }
if(format == ".gif") { im=imgurl.replace(/.gif/, '-'+newWidth+'x'+newHeight+'.gif'); }
if(jpegFormat == ".jpeg") { im=imgurl.replace(/.jpeg/, '-'+newWidth+'x'+newHeight+'.jpeg'); }
jQuery("#up_image"+ids).attr('src', im);
}else{
jQuery("#up_image"+ids).attr('src', imgurl);
}
});
jQuery('.upload_image'+ids).val(imgurl);
//jQuery('#section_block').find(':input[type=hidden][name=items]').attr('value', items);
tb_remove();
}
return false;
});
});
*/

jQuery(document).ready(function() {
jQuery('.upload-header').click(function() {
tb_show('', 'media-upload.php?type=image&TB_iframe=true');
window.send_to_editor = function(html) {
if (jQuery(html).is("a")) {
var imgurl = jQuery('img', html).attr('src');
} else if (jQuery(html).is("img")) {
var imgurl = jQuery(html).attr('src');
}
var newImg = new Image();
newImg.src = imgurl;
jQuery(newImg).live("load",function(){
width = newImg.width;
height = newImg.height;
if( width > '225' || height > '150' ){
format = imgurl.substr(imgurl.length - 4);
jpegFormat = imgurl.substr(imgurl.length - 5);
if( width > 225 ) { newWidth = 225; } else { newWidth = width; }
if( height > 150 ) { newHeight = 150; } else { newHeight = height; }
if(format == ".jpg") { im=imgurl.replace(/.jpg/, '-'+newWidth+'x'+newHeight+'.jpg'); }
if(format == ".png") { im=imgurl.replace(/.png/, '-'+newWidth+'x'+newHeight+'.png'); }
if(format == ".gif") { im=imgurl.replace(/.gif/, '-'+newWidth+'x'+newHeight+'.gif'); }
if(jpegFormat == ".jpeg") { im=imgurl.replace(/.jpeg/, '-'+newWidth+'x'+newHeight+'.jpeg'); }
jQuery("#up_image").attr('src', im);
}else{
jQuery("#up_image").attr('src', imgurl);
}
});
jQuery('.upload_image').val(imgurl);
tb_remove();
}
return false;
});
});

jQuery(document).ready(function() {
jQuery('.upload-small-button').click(function() {
var ids = jQuery(this).attr('id').replace(/input-upload-/, '');
formfield = jQuery(this).prev('.small-image-upload-'+ids);
tb_show('', 'media-upload.php?type=image&TB_iframe=true');
window.send_to_editor = function(html) {
if (jQuery(html).is("a")) {
var imgurl = jQuery('img', html).attr('src');
} else if (jQuery(html).is("img")) {
var imgurl = jQuery(html).attr('src');
}
var newImg = new Image();
newImg.src = imgurl;
jQuery(newImg).live("load",function(){
width = newImg.width;
height = newImg.height;

});
jQuery('.small-image-upload-'+ids).val(imgurl);

tb_remove();
}
return false;
});
});


jQuery(document).ready(function($){
$('.add_element').relCopy();
});

/* sidebar page  */
jQuery(document).ready(function($){
$('.add_sidebar').relCopy();
});
/* sidebar page  */
jQuery(document).ready(function($){
$(function(){
	$('input[name=on_off]').click(function(){
	$(this).parent().children('input[name=on_off]').each(function(){
	a=$(this).val();
    $(this).removeClass('slider_front_page_active').addClass('slider_front_page');
	$('.active_settings').find(':input[type=hidden][name=on_off_button]').attr('value', a);
	});
	b=$(this).val();
	$(this).removeClass('slider_front_page').addClass('slider_front_page_active');
	$('.active_settings').find(':input[type=hidden][name=on_off_button]').attr('value', b);
	});
	});
	 return false;
});

jQuery(document).ready(function($){
$(function(){
	$('input[name=on_off_drop]').click(function(){
	$(this).parent().children('input[name=on_off_drop]').each(function(){
	a=$(this).val();
    $(this).removeClass('slider_front_page_active').addClass('slider_front_page');
	$('.active_settings').find(':input[type=hidden][name=on_off_button_drop]').attr('value', a);
	});
	b=$(this).val();
	$(this).removeClass('slider_front_page').addClass('slider_front_page_active');
	$('.active_settings').find(':input[type=hidden][name=on_off_button_drop]').attr('value', b);
	});
	});
	 return false;
});


jQuery(document).ready(function() {
jQuery('.upload_button').click(function() {
tb_show('', 'media-upload.php?type=image&TB_iframe=true');
window.send_to_editor = function(html) {
if (jQuery(html).is("a")) {
var imgurl = jQuery('img', html).attr('src');
} else if (jQuery(html).is("img")) {
var imgurl = jQuery(html).attr('src');
}
jQuery('.upload_image').val(imgurl);
tb_remove();
}
return false;
});
});

jQuery(document).ready(function() {
jQuery('.upload_button_color').click(function() {
var ids = jQuery(this).attr('id').replace(/uploadId/, '');
tb_show('', 'media-upload.php?type=image&TB_iframe=true');
window.send_to_editor = function(html) {
if (jQuery(html).is("a")) {
var imgurl = jQuery('img', html).attr('src');
} else if (jQuery(html).is("img")) {
var imgurl = jQuery(html).attr('src');
}
jQuery('.upload_image'+ids).val(imgurl);
tb_remove();
}
return false;
});
});


/* Slideshow page :
	Sections Titles : 
		'Additional Image Layer', 
		'FullScreen Background Image',
		'Background Settings'
	Homepage builder:
		'Background control'
*/
jQuery(document).ready(function($){
	  var _custom_media = true,
		  _orig_send_attachment = wp.media.editor.send.attachment;

	  $('.upload_button_new.button').click(function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('uploadId', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
		  if ( _custom_media ) {
			$("#image_url_input"+id).val(attachment.url);
		  } else {
			return _orig_send_attachment.apply( this, [props, attachment] );
		  };
		}

		wp.media.editor.open(button);
		return false;
	  });

});

/* Slideshow page: slides elements */
jQuery(document).ready(function($) {
	var _custom_media = true,
	_orig_send_attachment = wp.media.editor.send.attachment;

	$('.upload_image_button').click(function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('uploadId', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
				$("#image_url_input"+id).val(attachment.url);
				var newImg = new Image();
				var imgurl = attachment.url;
				newImg.src = imgurl;
				$("#up_image"+id).attr('src', '').addClass('upload-img-cuckoo');
				$(newImg).live("load",function(){
				
					width = newImg.width;
					height = newImg.height;
					if( width > '225' || height > '150' ){
						format = imgurl.substr(imgurl.length - 4);
						jpegFormat = imgurl.substr(imgurl.length - 5);
						if( width > 225 ) { newWidth = 225; } else { newWidth = width; }
						if( height > 150 ) { newHeight = 150; } else { newHeight = height; }
						if(format == ".jpg") { im=imgurl.replace(/.jpg/, '-'+newWidth+'x'+newHeight+'.jpg'); }
						if(format == ".png") { im=imgurl.replace(/.png/, '-'+newWidth+'x'+newHeight+'.png'); }
						if(format == ".gif") { im=imgurl.replace(/.gif/, '-'+newWidth+'x'+newHeight+'.gif'); }
						if(jpegFormat == ".jpeg") { im=imgurl.replace(/.jpeg/, '-'+newWidth+'x'+newHeight+'.jpeg'); }
						$("#up_image"+id).removeClass('upload-img-cuckoo').attr('src', im);
					}else{
						$("#up_image"+id).removeClass('upload-img-cuckoo').attr('src', imgurl);
					}
				});
				
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			}
		}
		wp.media.editor.open(button);
		return false;
	});




	jQuery('.upload-header').click(function() {
	tb_show('', 'media-upload.php?type=image&TB_iframe=true');
	window.send_to_editor = function(html) {
	if (jQuery(html).is("a")) {
	var imgurl = jQuery('img', html).attr('src');
	} else if (jQuery(html).is("img")) {
	var imgurl = jQuery(html).attr('src');
	}
	var newImg = new Image();
	newImg.src = imgurl;
	jQuery(newImg).live("load",function(){
	width = newImg.width;
	height = newImg.height;
	if( width > '225' || height > '150' ){
	format = imgurl.substr(imgurl.length - 4);
	jpegFormat = imgurl.substr(imgurl.length - 5);
	if( width > 225 ) { newWidth = 225; } else { newWidth = width; }
	if( height > 150 ) { newHeight = 150; } else { newHeight = height; }
	if(format == ".jpg") { im=imgurl.replace(/.jpg/, '-'+newWidth+'x'+newHeight+'.jpg'); }
	if(format == ".png") { im=imgurl.replace(/.png/, '-'+newWidth+'x'+newHeight+'.png'); }
	if(format == ".gif") { im=imgurl.replace(/.gif/, '-'+newWidth+'x'+newHeight+'.gif'); }
	if(jpegFormat == ".jpeg") { im=imgurl.replace(/.jpeg/, '-'+newWidth+'x'+newHeight+'.jpeg'); }
	jQuery("#up_image").attr('src', im);
	}else{
	jQuery("#up_image").attr('src', imgurl);
	}
	});
	jQuery('.upload_image').val(imgurl);
	tb_remove();
	}
	return false;
	});
	
});