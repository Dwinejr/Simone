<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
** Name : Pin It shortcode
*
*/

function cuckoo_pinit_create( $atts ) {
	extract( shortcode_atts( array(
		'url' => get_permalink(),
		'img' => '',
		'countbox' => 'none', // none, horizontal, vertical
		'title' => get_the_title(),
		'left'	=> '',
		'top'	=> '',
		'right'	=> '',
		'bottom'=> ''
	), $atts ) );
	
	$left = ($left == null ? '' :  ' margin-left:'.$left.';');
	$right = ($right == null ? '' : ' margin-right:'.$right.';');
	$top = ($top == null ? '' : ' margin-top:'.$top.';');
	$bottom = ($bottom == null ? '' : ' margin-bottom:'.$bottom.';');
	$style="";
	if( $left or $right or $top or $bottom ) {
		$style = 'style="' .$left.$right.$top.$bottom. '"';
	}
	
	return '<div class="social-short" '. $style .'><a href="http://pinterest.com/pin/create/button/?url='.esc_attr( urlencode($url) ).'&media='.esc_attr( urlencode($img) ).'&description='.esc_attr( urlencode( $title) ).'" class="pin-it-button" count-layout="'.$countbox.'"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a><script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script></div>';
}
add_shortcode( 'pin-create', 'cuckoo_pinit_create' );
?>