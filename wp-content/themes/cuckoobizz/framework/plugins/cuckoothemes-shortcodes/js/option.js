/*
Plugin Name: CuckooThemes Shortcode
Plugin URI: http://cuckoothemes.com
Author: CuckooThemes
*/
jQuery(document).ready(function($){
	
	$('.current-element').on("click", function () {
		var t = $(this);
		if(t.hasClass('close')){
			t.parent().find('.close-elements').slideDown();
			t.removeClass('close').addClass('open').attr('title', 'Close');
		}else if(t.hasClass('open')){
			t.parent().find('.close-elements').slideUp();
			t.removeClass('open').addClass('close').attr('title', 'Open');
		}
		return false;
	});
	
	$(".regular-text-cuckoo").on("click", function () {
		$(this).select();
	});
	
	$('.wp-color-picker-field').wpColorPicker();

	var _custom_media = true,
	_orig_send_attachment = wp.media.editor.send.attachment;

	$('.upload_button_new.button_short').click(function(e) {
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
	  
	$('.remove-marker').click(function(){
		
		var MainID, $a, $b, $c, MarkerID, MarkerSection, deleteElement;
		
		$a = $(this);
		$b = $a.closest('.section');
		sect = $b.find('.marker-section').length;
		MainID = $b.attr('id').replace('item-', '');
		$c = $b.find(':input[type=hidden][name=markers-'+MainID+']');
		MarkerSection = $a.parent();
		MarkerID = MarkerSection.attr('id').replace('marker-'+MainID+'-', '');
		deleteElement = 'marker-'+MarkerID+',';
		name = MarkerSection.find('#marker-title-'+MarkerID+'-'+MainID).val();
		showname = ( name > "" ? name : "No title" );
		
		if( name.length > 0 ){
			if(confirm("You are about to delete \""+ showname +"\" Marker?\nClick 'Cancel' to stop, 'OK' to continue.")){
			
				t = $c.val().replace(deleteElement, '');
				
				if( sect > 1 ) {
					$c.val(t);
					MarkerSection.remove();
				}else{
					MarkerSection.each(function(){
						$(this).find('input[type=text]').attr('value', '');
					});
				}
				alert("Delete '"+ showname +"' Marker!");
			}
		}else{
			t = $c.val().replace(deleteElement, '');
			if( sect > 1 ) {
				$c.val(t);
				MarkerSection.remove();
			}
		}
	});
	
	$('.shortcode_remove').click(function(){
		sect = $(".section").length;
		var id = $(this).attr('id').replace(/remove-item-/, '');
		var item = "item-"+id+",";
		var valueItem = $('#item-' +id).find(':input[type=text][name=shortcode-title-'+ id +']').val();
		var nameSlides = $('#item-' +id).find(':input[type=text][name=shortcode-title-'+ id +']').val();
		var showname = ( nameSlides > "" ? nameSlides : "No title" );
		if( valueItem.length > 0 ){
			if(confirm("You are about to delete \""+ showname +"\" Shortcode?\nClick 'Cancel' to stop, 'OK' to continue.")){
				a = $('#general_settings').find(':input[type=hidden][name=items]').val().replace(item, '');
				if( sect > 1 ) {
					$('#general_settings').find(':input[type=hidden][name=items]').attr('value', a);
					$( '#item-' +id ).remove();
				}else{
					$('.section .section_main').find(':input[type=text][name=title-'+ id +']').attr('value', '' );
				}
				alert("Delete '"+ showname +"' Shortcode!");
			}
		}else{
			a = $('#general_settings').find(':input[type=hidden][name=items]').val().replace(item, '');
			if( sect > 1 ) {
				$('#general_settings').find(':input[type=hidden][name=items]').attr('value', a);
				$( '#item-' +id ).remove();
			}
		}
		return false;
	});

	$('.add-marker').relCopyMarker();
	$('.add-shortcode').relCopyShortcode();
	
});

(function(a)
{a.fn.relCopyMarker=function(e){

var b=jQuery.extend({excludeSelector:".exclude",emptySelector:".empty",copyClass:"copy",append:"",clearInputs:!0,limit:0},e);
b.limit=parseInt(b.limit);

this.each(function(){
a(this).click(function(){

	var f=a(this).attr("rel"),
	d=a(f).length,
	d=d-1;
	if(0!=b.limit&&d>=b.limit)return!1;
	var c=a(f+":first"),
	e=a(c).parent(),
	c=a(c).clone(!0).addClass(b.copyClass+d).append(b.append);
	b.excludeSelector&&a(c).find(b.excludeSelector).remove();
	b.emptySelector&&a(c).find(b.emptySelector).empty();
	MainID = a(this).closest('.section').attr('id').replace('item-', '');
	a(c).attr('id', "marker-"+MainID+"-"+(d+1));
	hid = a(this).closest('.section').find(':input[type=hidden][name=markers-'+MainID+']').val();
	valu = 'marker-'+(d+1);
	a(this).closest('.section').find(':input[type=hidden][name=markers-'+MainID+']').attr('value', hid+valu+',');
	a(c).find('.marker-title input').attr('id', 'marker-title-'+(d+1)+'-'+MainID).attr('name', 'marker-title-'+(d+1)+'-'+MainID);
	a(c).find('.marker-address input').attr('id', 'marker-address-'+(d+1)+'-'+MainID).attr('name', 'marker-address-'+(d+1)+'-'+MainID);
	a(c).find('.marker-animation select').attr('id', 'marker-animation-'+(d+1)+'-'+MainID).attr('name', 'marker-animation-'+(d+1)+'-'+MainID);
	a(c).find('.marker-z-index input').attr('id', 'marker-zindex-'+(d+1)+'-'+MainID).attr('name', 'marker-zindex-'+(d+1)+'-'+MainID);
	a(c).find('.marker-main-icon label').attr('for', 'upload_imagemarker-main-icon-'+(d+1)+'-'+MainID);
	a(c).find('.marker-main-icon input[type=text]').attr('id', 'image_url_inputmarker-main-icon-'+(d+1)+'-'+MainID).attr('class', 'upLaoding upload_imagemarker-main-icon-'+(d+1)+'-'+MainID).attr('name', 'marker-main-icon-'+(d+1)+'-'+MainID);
	a(c).find('.marker-main-icon input[type=button]').attr('id', 'uploadIdmarker-main-icon-'+(d+1)+'-'+MainID);
	a(c).find('.marker-text textarea').attr('id', 'marker-text-'+(d+1)+'-'+MainID).attr('name', 'marker-text-'+(d+1)+'-'+MainID);
	
	b.clearInputs&&a(c).find(":input").each(function(){
	switch(a(this).attr("type")){
	case "button":break;
	case "reset":break;
	case "submit":break;
	case "checkbox":a(this).attr("checked","");break;
	case "radio":break;
	default:a(this).val("")}});
	a(e).find(f+":last").after(c);return!1})

});
return this}})
(jQuery);

(function(a)
{a.fn.relCopyShortcode=function(e){

var b=jQuery.extend({excludeSelector:".exclude",emptySelector:".empty",copyClass:"copy",append:"",clearInputs:!0,limit:0},e);
b.limit=parseInt(b.limit);

this.each(function(){
a(this).click(function(){
	
	var f=a(this).attr("rel"),
	d=a(f).length,
	d=d-1;
	if(0!=b.limit&&d>=b.limit)return!1;
	var c=a(f+":first"),
	e=a(c).parent(),
	c=a(c).clone(!0).addClass(b.copyClass+d).append(b.append);
	b.excludeSelector&&a(c).find(b.excludeSelector).remove();
	b.emptySelector&&a(c).find(b.emptySelector).empty();
	
	a(c).attr('id', "item-"+(d+1));
	hid = a('#general_settings').find(':input[type=hidden][name=items]').val();
	valu = 'item-'+(d+1);
	a('#general_settings').find(':input[type=hidden][name=items]').attr('value', hid+valu+',');
	a(c).find('.drag-container').css("display", "none");
	a(c).find('.section').attr('id', valu),
	a(c).find('.expand_button').attr('id', 'expand-item-'+(d+1)),
	a(c).find('.expand_button').val('Expand'),
	a(c).find('.shortcode_remove').attr('id', 'remove-item-'+(d+1)),
	a(c).find('.title-item').attr('id', 'unit-title-item-'+(d+1)).text('Map Title'),
	a(c).find('.map-shortcode').attr('id', 'shortcode-'+(d+1)).text(''),
	// title and address
	a(c).find('.short-title input').attr('id', 'shortcode-title-'+(d+1)).attr('name', 'shortcode-title-'+(d+1)).attr('value',''),
	a(c).find('.short-address input').attr('id', 'address-'+(d+1)).attr('name', 'address-'+(d+1)).attr('value',''),
	// Close elements
	a(c).find('.current-element').attr('class', 'current-element close').attr('title', 'Open'),
	a(c).find('.close-elements').css('display', 'none'),
	// map Type
	a(c).find('.maptype-control select').attr('id', 'maptype-control-'+(d+1)).attr('name', 'maptype-control-'+(d+1)),
	a(c).find('.maptype-type select').attr('id', 'type-'+(d+1)).attr('name', 'type-'+(d+1)),
	a(c).find('.maptype-style select').attr('id', 'maptype-control-style-'+(d+1)).attr('name', 'maptype-control-style-'+(d+1)),
	a(c).find('.maptype-position select').attr('id', 'maptype-control-position-'+(d+1)).attr('name', 'maptype-control-position-'+(d+1)),
	//a(c).find('.maptype-control option').removeAttr( 'selected' ),
	a(c).find('.maptype-control option:first-child').attr('selected', 'selected'),
	a(c).find('.maptype-type option').removeAttr( 'selected' ),
	a(c).find('.maptype-type option:first-child').attr('selected', 'selected'),
	a(c).find('.maptype-style option:first-child').attr('selected', 'selected'),
	a(c).find('.maptype-position option:first-child').attr('selected', 'selected'),
	// zoom 
	a(c).find('.zoom-map input').attr('id', 'zoom-'+(d+1)).attr('name', 'zoom-'+(d+1)).attr('value', ''),
	a(c).find('.zoom-control select').attr('id', 'zoom-control-'+(d+1)).attr('name', 'zoom-control-'+(d+1)),
	a(c).find('.zoom-style select').attr('id', 'zoom-control-style-'+(d+1)).attr('name', 'zoom-control-style-'+(d+1)),
	a(c).find('.zoom-position select').attr('id', 'zoom-control-position-'+(d+1)).attr('name', 'zoom-control-position-'+(d+1)),
	a(c).find('.zoom-control option:first-child').attr('selected', 'selected'),
	a(c).find('.zoom-style option:first-child').attr('selected', 'selected'),
	a(c).find('.zoom-position option:first-child').attr('selected', 'selected'),
	// Pan 
	a(c).find('.pan-control select').attr('id', 'pan-control-'+(d+1)).attr('name', 'pan-control-'+(d+1)),
	a(c).find('.pan-position select').attr('id', 'pan-control-position-'+(d+1)).attr('name', 'pan-control-position-'+(d+1)),
	a(c).find('.pan-control option:first-child').attr('selected', 'selected'),
	a(c).find('.pan-position option:first-child').attr('selected', 'selected'),
	// Scale 
	a(c).find('.scale-control select').attr('id', 'scale-control-'+(d+1)).attr('name', 'scale-control-'+(d+1)),
	a(c).find('.scale-position select').attr('id', 'scale-control-position-'+(d+1)).attr('name', 'scale-control-position-'+(d+1)),
	a(c).find('.scale-control option:first-child').attr('selected', 'selected'),
	a(c).find('.scale-position option:first-child').attr('selected', 'selected'),	
	// streetView 
	a(c).find('.streetView-control select').attr('id', 'streetView-control-'+(d+1)).attr('name', 'streetView-control-'+(d+1)),
	a(c).find('.streetView-position select').attr('id', 'streetView-position-'+(d+1)).attr('name', 'streetView-position-'+(d+1)),
	a(c).find('.streetView-control option:first-child').attr('selected', 'selected'),
	a(c).find('.streetView-position option:first-child').attr('selected', 'selected'),
	// Marker 
	a(c).find('.marker-display select').attr('id', 'marker-display-'+(d+1)).attr('name', 'marker-display-'+(d+1)),
	a(c).find('.marker-display option:first-child').attr('selected', 'selected'),
	a(c).find('.marker-section').not(':first').remove();
	a(c).find('.marker-section').attr('id', 'marker-'+(d+1)+'-0'),
	a(c).find('.marker-section').attr('class', 'marker-section marker-section-'+(d+1)),
	a(c).find('.marker-title input').attr('id', 'marker-title-0-'+(d+1)).attr('name', 'marker-title-0-'+(d+1)).attr('value', ''),
	a(c).find('.marker-address input').attr('id', 'marker-address-0-'+(d+1)).attr('name', 'marker-address-0-'+(d+1)).attr('value', ''),
	a(c).find('.marker-zindex input').attr('id', 'marker-zindex-0-'+(d+1)).attr('name', 'marker-zindex-0-'+(d+1)).attr('value', ''),
	a(c).find('.marker-animation select').attr('id', 'marker-animation-0-'+(d+1)).attr('name', 'marker-animation-0-'+(d+1)),
	a(c).find('.marker-animation option:first-child').attr('selected', 'selected'),
	a(c).find('.marker-main-icon label').attr('for', 'upload_imagemarker-main-icon-0-'+(d+1)),
	a(c).find('.marker-main-icon input.upload_image.upLaoding').attr('id', 'image_url_inputmarker-main-icon-0-'+(d+1)).attr('name', 'marker-main-icon-0-'+(d+1)).attr('value', ''),
	a(c).find('.marker-main-icon input.upload_button_new.button_short').attr('id', 'uploadIdmarker-main-icon-0-'+(d+1)),
	a(c).find('.marker-text textarea').attr('id', 'marker-text-0-'+(d+1)).attr('name', 'marker-text-0-'+(d+1)).text(''),
	// Another Setteings
	a(c).find('.map-scroll select').attr('id', 'map-scroll-'+(d+1)).attr('name', 'map-scroll-'+(d+1)),
	a(c).find('.map-scroll option:first-child').attr('selected', 'selected'),
	// CSS settings
	a(c).find('.map-width input').attr('id', 'map-width-'+(d+1)).attr('name', 'map-width-'+(d+1)).attr('value', ''),
	a(c).find('.map-height input').attr('id', 'map-height-'+(d+1)).attr('name', 'map-height-'+(d+1)).attr('value', ''),
	a(c).find('.map-margin-top input').attr('id', 'margin-top-'+(d+1)).attr('name', 'margin-top-'+(d+1)).attr('value', ''),
	a(c).find('.map-margin-bottom input').attr('id', 'margin-bottom-'+(d+1)).attr('name', 'margin-bottom-'+(d+1)).attr('value', ''),
	a(c).find('.map-margin-left input').attr('id', 'margin-left-'+(d+1)).attr('name', 'margin-left-'+(d+1)).attr('value', ''),
	a(c).find('.map-margin-right input').attr('id', 'margin-right-'+(d+1)).attr('name', 'margin-right-'+(d+1)).attr('value', ''),
	// Background
	a(c).find('.wp-picker-container').remove(),
	a(c).find('.pick-cuckoo').after('<b>').append('<input type="text" value="#" name="map-background-color-'+(d+1)+'" id="map-background-color-'+(d+1)+'" class="wp-color-picker-field" data-default-color="" />'),
	a(c).find('.wp-color-picker-field').wpColorPicker(),
	// hidden
	a(c).find('input.marker-list').attr('name', 'markers-'+(d+1)).attr('value', 'marker-0,'),
	a(c).find('input.shortcode-ids').attr('name', 'shortcodeID-'+(d+1)).attr('value', ''),
	
	b.clearInputs&&a(c).find(":input").each(function(){
	switch(a(this).attr("type")){
	case "button":break;
	case "reset":break;
	case "submit":break;
	case "checkbox":a(this).attr("checked","");break;
	case "radio":break;
	default:a(this).not('.marker-list').val("")}});
	a(e).find(f+":last").after(c);return!1})

});
return this}})
(jQuery);
