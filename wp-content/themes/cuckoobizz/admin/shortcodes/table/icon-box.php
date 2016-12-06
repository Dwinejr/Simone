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
** Name : Icon Box shortcode
*
*/
// Container
function shortcode_icon_box_container($atts, $content = null) {

	extract(shortcode_atts(array(
		'background'	=> '',
    ), $atts));

	$class = '';
	$b = "";
	if( $background ) :
		$background = $background ? 'background-color:'.$background.'!important;' : '';
		$style = ' style="'.$background.'"';
		$class = ' with-background';
		$b = '<div class="icon_box_back_color" '.$style.'></div>';
	endif;
	
	return '<section class="icon_box_container'.$class.'">'. do_shortcode($content) . $b .'</section>';
}
add_shortcode('icon-container', 'shortcode_icon_box_container');

// Icon Place
function shortcode_icon_box_header($atts, $content=null) {
	extract(shortcode_atts(array(
		'id' 			=> '1',
		'background'	=> '',
		'circle'		=> 'true'
    ), $atts));
	
	$circle = $circle == 'true' ? ' circle' : '';
	$id = 'icon-'.$id ;
	
	$background = $background ? 'background-color:'.$background.';' : '';
	
	$style = 'style="'.$background.'"';
	
	return '<header class="icon-box-header"><div class="cuckoo-ico '.$id.'"></div><div '.$style.' class="icon-background'.$circle.'"></div></header>';
}
add_shortcode('icon-header', 'shortcode_icon_box_header');

// Title 
function shortcode_icon_box_title($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'color' => '',
		'size' => ''
    ), $atts));
	
	$style = '';
	if( $color or $size ) :
		$color = $color ? 'color:'.$color.'!important;' : '';
		$size = $size ? 'font-size:'.$size.'!important;' : '';
		$style = ' style="'.$color.$size.'"';
	endif;
	
	return '<h3 class="icon_box_title"'.$style.'>'. $title .'</h3>';
}
add_shortcode('icon-title', 'shortcode_icon_box_title');

// Body
function shortcode_icon_box_body($atts, $content = null) {
	extract(shortcode_atts(array(
		'color' => '',
		'size' => '',
		'line' => ''
    ), $atts));
	
	$style = '';
	if( $color or $size or $line ) :
		$line = $line ? 'line-height:'.$line.'!important;' : '';
		$color = $color ? ' color:'.$color.'!important;' : '';
		$size = $size ? ' font-size:'.$size.'!important;' : '';
		$style = ' style="'.$color.$size.$line.'"';
	endif;
	
	return '<div class="icon_box_body"'.$style.'>'. do_shortcode($content) .'</div>';
}
add_shortcode('icon-body', 'shortcode_icon_box_body');

// Button
function shortcode_icon_box_button($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'url' => 'http://www.cuckoothemes.com',
		'color' => '',
		'size' => '',
		'background' => ''
    ), $atts));
	
	$style = '';
	if( $color or $size or $background ) :
		$color = $color ? 'color:'.$color.'!important; ' : '';
		$size = $size ? 'font-size:'.$size.'!important; ' : '';
		$background = $background ? 'background-color:'.$background.'; ' : '';
		$style = ' style="'.$color.$size.$background.'"';
	endif;
	
	return '<div class="ico-button-container"><a class="icon_box_button"'.$style.' title="'.$title.'" href="'.$url.'">'. $title .'</a></div>';
}
add_shortcode('icon-button', 'shortcode_icon_box_button');

?>