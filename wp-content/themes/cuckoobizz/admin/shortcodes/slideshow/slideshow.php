<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
*
*
** Name : Tab shortcode
*/
function shortcode_slideshow($atts, $content = null) {
	extract(shortcode_atts(array(
		'id' => '1',
		'effect' => 'random',
		'pausetime' => '6000',
		'pauseonhover' => 'true',
		'animspeed' => '1000',
		'width'	=> '100%',
		'boxcols' => '8',
		'boxrows' => '4',
		'controlnav' => 'true',
		'directionnavhide' => 'false',
		'directionnav' => 'false',
		'align' => 'center',
		'radius' => '',
    ), $atts));
	
	switch($align){
		case 'left':
			$align = 'alignleft';
		break;
		case 'right':
			$align = 'alignright';
		break;
		case 'center':
			$align = 'aligncenter';
		break;		
		case 'firstright':
			$align = 'alignfirstright';
		break;		
		case 'lastright':
			$align = 'alignlastright';
		break;		
		case 'firstleft':
			$align = 'alignfirstleft';
		break;		
		case 'lastleft':
			$align = 'alignlastleft';
		break;		
		case 'top':
			$align = 'aligntop';
		break;		
		case 'bottom':
			$align = 'alignbottom';
		break;
		default :
			$align = 'alignnone';
		break;
	}
	
	$pauseonhover = $pauseonhover == 'true' ? $pauseonhover : 'false';
	$controlnav = $controlnav == 'true' ? $controlnav : 'false';
	$directionnavhide = $directionnavhide == 'false' ? $directionnavhide : 'true';
	$styleRadius = $radius ? ' style="border-radius:'.$radius.'";' : '';
	$style = 'style="width:'.$width.';"';
	$pageId = get_the_ID();
	
	$slide_content = "";
	$slide_content .= '<div '.$style.' class="gallery-shortcode '.$align.'">';
	$slide_content .= '<script type="text/javascript">';
	$slide_content .= 'jQuery(document).ready(function(){
		var a = jQuery("#slide-short-id-'.$id.'").parent().width();
		jQuery("#slide-short-id-'.$id.' img").first().css({"max-width" : a, "height":"auto"});
		jQuery("#slide-short-id-'.$id.'").css("height", (jQuery("#slide-short-id-'.$id.' img").first().height()) );
		jQuery("#slide-short-id-'.$id.' a.nivo-imageLink").cuckoolightbox({
			title: "outside"
		});
		jQuery(".gallery-shortcode").find("br").remove();
		});';
	$slide_content .= 'jQuery(window).load(function() {';
	$slide_content .= 'jQuery("#slide-short-id-'.$id.'").nivoSlider({';
		$slide_content .= 'effect: "' .$effect. '",';
		$slide_content .= 'pauseOnHover: ' .$pauseonhover. ',';
		$slide_content .= 'heightAuto: true, ';
		$slide_content .= 'animSpeed: '. $animspeed .',';
		$slide_content .= 'pauseTime: '. $pausetime .',';
		$slide_content .= 'boxCols: '. $boxcols .','; 
		$slide_content .= 'boxRows: '. $boxrows .',';
		$slide_content .= 'controlNav: '. $controlnav .',';
		$slide_content .= 'directionNavHide: '. $directionnavhide .',';
		$slide_content .= 'directionNav : '. $directionnav .',';
		$slide_content .= 'prevText: "",'; 
		$slide_content .= 'nextText: "",';
		$slide_content .= 'afterLoad: function(){';
		$slide_content .= 'jQuery(".slidePreloadImg").fadeOut(800);';
		$slide_content .= '},';
		$slide_content .= 'beforeChange: function(){';
		$slide_content .= 'jQuery("#slide-short-id-'.$id.' .nivo-caption .title-container-shortcode").animate({opacity:0},600);';
		$slide_content .= 'var capHeight = jQuery("#slide-short-id-'.$id.' .nivo-caption").outerHeight();';
		$slide_content .= 'var capHeightAll = capHeight+35;';
		$slide_content .= 'jQuery("#slide-short-id-'.$id.'").parent().find(".nivo-controlNav").css("top", "-"+capHeightAll+"px");';
		$slide_content .= '},';
		$slide_content .= 'afterChange: function(){';
		$slide_content .= 'jQuery("#slide-short-id-'.$id.' .nivo-caption .title-container-shortcode").animate({opacity:1},600);';
		$slide_content .= 'var capHeight = jQuery("#slide-short-id-'.$id.' .nivo-caption").outerHeight();';
		$slide_content .= 'var capHeightAll = capHeight+35;';
		$slide_content .= 'jQuery("#slide-short-id-'.$id.'").parent().find(".nivo-controlNav").css("top", "-"+capHeightAll+"px");';
		$slide_content .= '}';
	$slide_content .= '});';
	$slide_content .= 'var total = jQuery("#slide-short-id-'.$id.' img").length;';
	$slide_content .= 'var getdataimg = jQuery("#slide-short-id-'.$id.' img").data("title-shortcode");';
	$slide_content .= 'if(getdataimg){';
		$slide_content .= 'var getLoader = setInterval(function() {';
			$slide_content .= 'var capHeight = jQuery("#slide-short-id-'.$id.' .nivo-caption").outerHeight();';
			$slide_content .= 'if(capHeight){';
				$slide_content .= 'var capHeightAll = capHeight+35;';
				$slide_content .= 'jQuery("#slide-short-id-'.$id.'").parent().find(".nivo-controlNav").css("top", "-"+capHeightAll+"px");';
				$slide_content .= 'clearInterval(getLoader)';
			$slide_content .= '}';
		$slide_content .= '}, 10);';
	$slide_content .= '}';
	$slide_content .= 'if( total <= 2 ){';
		$slide_content .= 'jQuery("#slide-short-id-'.$id.'").find(".nivo-controlNav").css("display", "none");';
		$slide_content .= 'jQuery(".slide-short").data("nivoslider").stop();';
	$slide_content .= '}else{';
		$slide_content .= 'jQuery(".gallery-shortcode").addClass("gallery-format-not-one");';
	$slide_content .= '}';
	$slide_content .= 'jQuery("#slide-short-id-'.$id.' a").removeClass("cuckoo-lightbox");';
	$slide_content .= '});';
	$slide_content .= '</script>';
	$slide_content .= '<article class="slideshow-content-shortcode">';
	$slide_content .= '<div id="slide-short-id-'.$id.'" class="slide-short"'.$styleRadius.'>'. do_shortcode($content) .'</div>';
	$slide_content .= '<div class="slidePreloadImg">';
	$slide_content .= '<div class="img-loader"></div>';
	$slide_content .= '</div>';
	$slide_content .= '</article>';
	$slide_content .= '</div>';
	
	return $slide_content;
}
add_shortcode('slide', 'shortcode_slideshow');

function shortcode_slideshow_image($atts, $content=null) {
	extract(shortcode_atts(array(
		'url' => '',
		'imgtitle' => '',
		'group' => 'gallery',
		'title' => ''
    ), $atts));
	
	$a = isset($title) ? ' data-title-shortcode="'.$title.'"' : '';
	
	$image .= '<a href="'. cuckoo_get_attachment_all_size($url) .'" title="'. $imgtitle .'">';
	$image .= '<img alt="'. $imgtitle .'" title="' .$imgtitle. '" src="'.cuckoo_get_attachment_all_size($url).'"'.$a.'>';
	$image .= '</a>';
	
	return $image;
}
add_shortcode('slideimg', 'shortcode_slideshow_image');
?>