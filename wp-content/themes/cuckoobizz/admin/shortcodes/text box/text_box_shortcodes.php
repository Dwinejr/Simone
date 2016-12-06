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
** Name : Text box shortcode
*/
function shortcode_textBox( $atts, $content = null ) {
	$titleColor = ( isset($atts["titlefont"]) ? 'style="color:' . $atts["titlefont"] . ';"' : '' );
	$title = ( isset($atts["title"]) ? '<h3 '.$titleColor.' class="text_box_shortcodes_title">' . $atts["title"] . '</h3>' : '' );
	$width = ( isset($atts["width"]) ? ' width:' . $atts["width"] . ';' : ' width:100%;' );
	$fontColor = ( isset($atts["font"]) ? ' color:' . $atts["font"] . ';' : '' );
	$backgroundColor = ( isset($atts["background"]) ? ' background-color:' . $atts["background"] . ';' : ' background-color:#ebebeb;');
	$repeat = ( isset($atts["repeat"]) ? ' background-repeat:' . $atts["repeat"] . ';' : '' );
	$backgroundImage = ( isset($atts["image"]) ? ' background-image:url(' . $atts["image"] . ');' : '' );
	$contents = '<div class="textbox-short-content">'.wptexturize(wpautop(do_shortcode($content))).'</div>';
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
	$style = 'style="' . $width.$fontColor.$backgroundColor.$backgroundImage.$repeat . '"';
	
	return '<div class="text_box_shortcodes clearfix '.$align.'" '. $style .'><div class="text_box_text">' . $title.$contents . '</div></div>';
}
add_shortcode('text-box', 'shortcode_textBox');
?>