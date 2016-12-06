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
** Name : Pricing tab shortcode
*
*/
// Container
function shortcode_table($atts, $content = null) {

	extract(shortcode_atts(array(
		'vertical' 	=> 'middle'
    ), $atts));

	return '<div class="short-table '.$vertical.'">'. do_shortcode($content) .'</div>';
}
add_shortcode('table', 'shortcode_table');


?>