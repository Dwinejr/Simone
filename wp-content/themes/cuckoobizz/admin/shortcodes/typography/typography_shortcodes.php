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
** Name : Typography shortcodes
*/

/* H1 shortcode */
function shortcode_h1( $atts, $content = null) {
	extract(shortcode_atts(array(
        "color" => '',
        "align" => '',
	), $atts));
	
	$style = "";
	
	switch( $align ){
		case 'left':
			$align = 'text-align:left;';
		break;
		case 'right':
			$align = 'text-align:right;';
		break;
		case 'center':
			$align = 'text-align:center;';
		break;
		default :
			$align = '';
		break;
	}
	
	if($color){
		$color = 'color:'. $color .';';
	}
	
	if($align or $color){
		$style = ' style="' .$align . $color. '"';
	}
	return '<h1 class="short-title" '. $style .'>' . wptexturize($content) . '</h1>';
}
add_shortcode('h1', 'shortcode_h1');

/* H2 shortcode */
function shortcode_h2( $atts, $content = null) {
	extract(shortcode_atts(array(
        "color" => '',
        "align" => '',
	), $atts));
	
	$style = "";
	
	switch( $align ){
		case 'left':
			$align = 'text-align:left;';
		break;
		case 'right':
			$align = 'text-align:right;';
		break;
		case 'center':
			$align = 'text-align:center;';
		break;
		default :
			$align = '';
		break;
	}
	
	if($color){
		$color = 'color:'. $color .';';
	}
	
	if($align or $color){
		$style = ' style="' .$align . $color. '"';
	}
	return '<h2 class="short-title" '. $style .'>' . wptexturize($content) . '</h2>';
}
add_shortcode('h2', 'shortcode_h2');

/* H3 shortcode */
function shortcode_h3( $atts, $content = null) {
	extract(shortcode_atts(array(
        "color" => '',
        "align" => '',
	), $atts));
	
	$style = "";
	
	switch( $align ){
		case 'left':
			$align = 'text-align:left;';
		break;
		case 'right':
			$align = 'text-align:right;';
		break;
		case 'center':
			$align = 'text-align:center;';
		break;
		default :
			$align = '';
		break;
	}
	
	if($color){
		$color = 'color:'. $color .';';
	}
	
	if($align or $color){
		$style = ' style="' .$align . $color. '"';
	}
	return '<h3 class="short-title" '. $style .'>' . wptexturize($content) . '</h3>';
}
add_shortcode('h3', 'shortcode_h3');

/* H4 shortcode */
function shortcode_h4( $atts, $content = null) {
	extract(shortcode_atts(array(
        "color" => '',
        "align" => '',
	), $atts));
	
	$style = "";
	
	switch( $align ){
		case 'left':
			$align = 'text-align:left;';
		break;
		case 'right':
			$align = 'text-align:right;';
		break;
		case 'center':
			$align = 'text-align:center;';
		break;
		default :
			$align = '';
		break;
	}
	
	if($color){
		$color = 'color:'. $color .';';
	}
	
	if($align or $color){
		$style = ' style="' .$align . $color. '"';
	}
	return '<h4'. $style .'>' . wptexturize($content) . '</h4>';
}
add_shortcode('h4', 'shortcode_h4');

/* H5 shortcode */
function shortcode_h5( $atts, $content = null) {
	extract(shortcode_atts(array(
        "color" => '',
        "align" => '',
	), $atts));
	
	$style = "";
	
	switch( $align ){
		case 'left':
			$align = 'text-align:left;';
		break;
		case 'right':
			$align = 'text-align:right;';
		break;
		case 'center':
			$align = 'text-align:center;';
		break;
		default :
			$align = '';
		break;
	}
	
	if($color){
		$color = 'color:'. $color .';';
	}
	
	if($align or $color){
		$style = ' style="' .$align . $color. '"';
	}
	return '<h5'. $style .'>' . wptexturize($content) . '</h5>';
}
add_shortcode('h5', 'shortcode_h5');

/* H6 shortcode */
function shortcode_h6( $atts, $content = null) {
	extract(shortcode_atts(array(
        "color" => '',
        "align" => '',
	), $atts));
	
	$style = "";
	
	switch( $align ){
		case 'left':
			$align = 'text-align:left;';
		break;
		case 'right':
			$align = 'text-align:right;';
		break;
		case 'center':
			$align = 'text-align:center;';
		break;
		default :
			$align = '';
		break;
	}
	
	if($color){
		$color = 'color:'. $color .';';
	}
	
	if($align or $color){
		$style = ' style="' .$align . $color. '"';
	}
	return '<h6'. $style .'>' . wptexturize($content) . '</h6>';
}
add_shortcode('h6', 'shortcode_h6');

/* Unordered List shortcode */
function shortcode_unordered_list( $atts, $content = null) {
	$title = empty($atts['title']) ? '' : '<h4 class="title_shortcodes">' . $atts['title'] . '</h4>';
	return wptexturize( '<div class="short-box">'.$title .'<ul class="unordered-list">'.do_shortcode($content).'</ul></div>' );
}
add_shortcode('unordered', 'shortcode_unordered_list');

/* Ordered List shortcode */
function shortcode_ordered_list( $atts, $content = null) {
	$title = ($atts['title'] == null ? '' : '<h4 class="title_shortcodes">' . $atts['title'] . '</h4>');
	return wptexturize( '<div class="short-box">'.$title .'<ol class="ordered-list">'.do_shortcode($content).'</ol></div>' );
}
add_shortcode('ordered', 'shortcode_ordered_list');

/* <li> element shortcode */
function shortcode_line( $atts, $content = null) {
	return '<li class="list-item">' . wptexturize($content) . '</li>';
}
add_shortcode('line', 'shortcode_line');

/* Selected shortcode */
function shortcode_selected( $atts, $content = null) {
	$style=""; 
	$back=""; 
	$color="";
	if(!empty( $atts['background'] ) or !empty( $atts['color'] )){
		if( $atts['background'] ){
			$back = 'background:'.$atts['background'].';';
		}
		if( $atts['color'] ){
			$color = ' color:'.$atts['color'].';';
		}
		$style = 'style="'.$back . $color.'"';
	}
	return '<span '. $style .' class="selected_text">' . wptexturize($content) . '</span>';
}
add_shortcode('selected', 'shortcode_selected');

/* Del shortcode */
function shortcode_del( $atts, $content = null) {
	return '<del>' . wptexturize($content) . '</del>';
}
add_shortcode('deleted', 'shortcode_del');

/* <code> element shortcode */
function shortcode_pre( $atts, $content = null) {
	$contour = (!isset($atts['contour']) ? ' border: 1px solid #e2e2e3;' : 'border: 1px solid '. $atts['contour'] . ';' );
	$width = (!isset($atts["width"]) ? ' width:100%;' : ' width:' . $atts["width"] . ';');
	$fontColor = (!isset($atts["font"])? '' : ' color:' . $atts["font"] . ';');
	$backgroundColor = (!isset($atts["background"]) ? '' : ' background-color:' . $atts["background"] . ';');
	$repeat = (!isset($atts["repeat"]) ? '' :  ' background-repeat:' . $atts["repeat"] . ';' );
	$backgroundImage = (!isset($atts["image"]) ? '' : ' background-image:url(' . $atts["image"] . ');');
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
	$style = 'style="' . $contour.$width.$fontColor.$backgroundColor.$backgroundImage.$repeat . '"';
	
	return '<div class="text_box_shortcodes code-short '.$align.'" '. $style .'><code>' .   esc_attr( $content ) . '</code></div>';
}
add_shortcode('code', 'shortcode_pre');

/* Quote shortcode */
function shortcode_quote( $atts, $content = null) {

	$width = ( isset($atts["width"]) ? ' width:' . $atts["width"] . ';' : ' width:100%;' );
	$fontColor = ( isset($atts["font"]) ? ' color:' . $atts["font"] . ';' : '' );
	$backgroundColor = ( isset($atts["background"]) ? ' background-color:' . $atts["background"] . ';' : '');
	$repeat = ( isset($atts["repeat"]) ? ' background-repeat:' . $atts["repeat"] . ';' : '' );
	$backgroundImage = ( isset($atts["image"]) ? ' background-image:url(' . $atts["image"] . ');' : '' );
	$author = "";
	
	if( isset( $atts['author']) ){
		$author = '<div class="author-quote">'. $atts['author'] .'</div>';
	}
	
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
	
	return '<div class="text_box_shortcodes '.$align.'" '. $style .'><div class="test-quote-list"></div><blockquote class="quote_shortcodes">' . wptexturize(do_shortcode($content)) . '</blockquote>'.$author.'</div>';
}
add_shortcode('quote', 'shortcode_quote');

function shortcode_link_ID( $atts, $content = null) {
	extract(shortcode_atts(array(
        "color" => '',
        "align" => '',
        "url" => 'http://www.cuckoothemes.com',
	), $atts));
	
	$style = "";
	
	switch( $align ){
		case 'left':
			$align = 'text-align:left;';
		break;
		case 'right':
			$align = 'text-align:right;';
		break;
		case 'center':
			$align = 'text-align:center;';
		break;
		default :
			$align = '';
		break;
	}
	
	if($color){
		$color = 'color:'. $color .'!important;';
	}
	
	if($align or $color){
		$style = ' style="' .$align . $color. '"';
	}
	return '<a class="cuckoo-with-ID" href="'.$url.'" '. $style .'>' . wptexturize($content) . '</a>';
}
add_shortcode('urlwithid', 'shortcode_link_ID');

?>