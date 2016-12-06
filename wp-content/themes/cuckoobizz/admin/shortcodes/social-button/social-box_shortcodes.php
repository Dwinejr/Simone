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
** Name : Social box 
*/
function shortcode_social_box( $atts, $content = null ) {
	switch( isset($atts["align"]) ? $atts["align"] : '' ){
		case 'left':
			$align = 'alignleft';
		break;
		case 'right':
			$align = 'alignright';
		break;
		case 'center':
			$align = 'aligncenter';
		break;
		default :
			$align = 'alignnone';
		break;
	}
	
	return '<div class="social-box '.$align.'">' . do_shortcode($content). '</div>';
}
add_shortcode('social-box', 'shortcode_social_box');

function shortcode_social_box_list( $atts, $content = null ) {
	
	return '<span class="social-box-list">' . do_shortcode($content). '</span>';
}
add_shortcode('sbl', 'shortcode_social_box_list');


?>