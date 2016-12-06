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
** Name : Divider shortcodes
*/
/* Single line */

function shortcode_dividers_single( $atts, $content = null) {
	$style="";
	if(!empty( $atts['color'] )){
		$style = 'style="background:'.$atts['color'].';"';
	}
	return '<div '. $style .' class="divider-line"></div>';
}
add_shortcode('div-line', 'shortcode_dividers_single');

?>