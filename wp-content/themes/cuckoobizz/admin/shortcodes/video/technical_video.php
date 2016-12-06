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
** Name : video shortcode
*/
function shortcode_technical_video($atts, $content = null) {
	$id = $atts['id'];
	$class = isset($atts['class']) ? 'class="'.$atts['class'].'"' : '';
	$width = isset($atts['width']) ? $atts['width'] : "100%";
	$video_code = getVideoCode($id);
	$code = "";

	if(is_youtube($id)) {
		$height = isset($atts['height']) ? $atts['height'] : "384px";
		$code = '<iframe '.$class.' style="width:'.$width.'; height:'.$height.'" src="http://www.youtube.com/embed/'.$video_code.'?wmode=transparent"></iframe>';
	}
	elseif(is_vimeo($id)) {
		$height = isset($atts['height']) ? $atts['height'] : "354px";
		$code = '<iframe '.$class.' style="width:'.$width.'; height:'.$height.'" src="http://player.vimeo.com/video/'.$video_code.'?title=0&amp;byline=0&amp;portrait=0"></iframe>';
	}

	return $code;
}
add_shortcode("video_techical", "shortcode_technical_video");
?>