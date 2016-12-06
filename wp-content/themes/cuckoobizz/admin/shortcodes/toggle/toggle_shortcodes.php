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
** Name : Toggle shortcode
*/
function shortcode_toggle($atts, $content=null) {
	$title = ( isset($atts["title"]) ? $atts["title"] : '' );
	$titlecolor = ( isset( $atts['titlecolor'] ) ? 'style="color:' . $atts['titlecolor']  . ';"': '' );
	$fold = ( isset($atts['fold']) ? ( $atts['fold'] == 'true' ? '' : 'active' ) : '' );
	$foldNone = ( isset($atts['fold']) ? ( $atts['fold'] == 'true' ? '' : ' display:none;' ) : '' );
	$fontColor = ( isset($atts["font"]) ? ' color:' . $atts["font"] . ';' : '' );
	$backgroundColor = ( isset($atts["background"]) ? ' background-color:' . $atts["background"] . ';' : ' background-color:#EBEBEB;');
	$repeat = ( isset($atts["repeat"]) ? ' background-repeat:' . $atts["repeat"] . ';' : '' );
	$backgroundImage = ( isset($atts["image"]) ? ' background-image:url(' . $atts["image"] . ');' : '' );
	$style = 'style="' . $foldNone.$fontColor.$backgroundColor.$backgroundImage.$repeat . '"';
	$content_all = "";
	$content_all .= '<div class="toggle-content">';
	$content_all .= '<div class="toggle_shortcode_title">';
	$content_all .= '<h3 '.$titlecolor.'>' . $title . '</h3>';
	$content_all .= '<div class="toggle-arrow-position"><div class="accordion-arrow open-comment ' . $fold . '"></div></div>';
	$content_all .= '</div>';
	$content_all .= '<div class="toggle-content-text" ' . $style . '><div class="text_box_shadow"></div>';
	$content_all .= '<div class="toggle-content-all">'.wptexturize(wpautop(do_shortcode($content))) . '</div></div>';
	$content_all .= '</div>';
	return $content_all;
	
}
add_shortcode('toggle', 'shortcode_toggle');
?>