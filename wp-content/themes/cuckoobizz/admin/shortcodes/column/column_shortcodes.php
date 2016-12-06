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
** Name : Column's shortcodes
*/
function shortcode_col( $atts, $content = null, $shortcodename ="" ){
	$class = "content-$shortcodename";
	$last = isset($atts['last']) ? ($atts['last'] == 'true' ? ' last_element' : '') : '' ;
	$title = isset($atts['title']) ? '<h3 class="col-title">' . $atts['title'] . '</h3>' : '' ;
	return '<div class="' . $class . $last . '">'. $title  . wptexturize(wpautop(do_shortcode($content))) . '</div>';
}

add_shortcode( 'one-half', 'shortcode_col' );
add_shortcode( 'one-third', 'shortcode_col' );
add_shortcode( 'two-third', 'shortcode_col' );
add_shortcode( 'one-fourth', 'shortcode_col' );
add_shortcode( 'three-fourth', 'shortcode_col' );


?>