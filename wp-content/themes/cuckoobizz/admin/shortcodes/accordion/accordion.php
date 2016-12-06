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
** Name : Accordion shortcodes
*/
function shortcode_accordion( $atts, $content = null) {
    extract(shortcode_atts(array(
		"width"	=> '100%',
		"align" => ''
    ), $atts));
	switch($align){
		case 'left':
			$align = 'alignleft';
		break;
		case 'right':
			$align = 'alignright';
		break;
		default :
			$align = 'alignnone';
		break;
	}
	$content_to_show = '<div class="toggle-accordion '.$align.'" style="width:'.$width.'">'.do_shortcode($content).'</div>';
	return $content_to_show;
}
add_shortcode('accordion', 'shortcode_accordion');

function shortcode_accordion_item( $atts, $content = null) {
    extract(shortcode_atts(array(
		"title"	=> 'Title Accordion',
		"fold" => '',
		"titlecolor" => '#494949',
		"font" => '',
		"background" => '#EBEBEB;',
		"repeat" => '',
		"image" => ''
    ), $atts));
	
	$activeclass = ($fold == 'true' ? '' : 'active');
	$foldNone = ($fold == 'true' ? ' display:block; ' : ' display:none;');
	$fontColor = ($font != null ? ' color:' . $font . ';' : '');
	$titlecolor = 'style="color:' . $titlecolor . ';"';
	$backgroundColor =  ' background-color:' . $background;
	$repeat = ( $repeat != null ? ' background-repeat:' . $repeat . ';' : '');
	$backgroundImage = ( $image != null ? ' background-image:url(' . $image . ');' : '');
	$style = 'style="' . $foldNone.$fontColor.$backgroundColor.$backgroundImage.$repeat . '"';
	$content_all = "";
	$content_all .= '<div class="toggle-accordion-content">';
	$content_all .= '<div class="toggle_shortcode_title">';
	$content_all .= '<h3 '.$titlecolor.'>' . $title . '</h3>';
	$content_all .= '<div class="toggle-arrow-position"><div class="accordion-arrow open-comment ' . $activeclass . '"></div></div>';
	$content_all .= '</div>';
	$content_all .= '<div class="toggle-content-text" ' . $style . '><div class="text_box_shadow"></div>';
	$content_all .= '<div class="toggle-content-all">'.wptexturize(wpautop(do_shortcode($content))) . '</div>';
	$content_all .= '</div>';
	$content_all .= '</div>';
	return $content_all;
}
add_shortcode('accord-item', 'shortcode_accordion_item');
?>