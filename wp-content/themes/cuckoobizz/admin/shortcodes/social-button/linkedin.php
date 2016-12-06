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
** Name : Linkedin shortcode
*/
function linkedin_shortcode($atts) {
	extract(shortcode_atts(array(
        'counter' => '',
        'left' => '',
        'right' => '',
        'top' => '',
        'bottom' => '',
    ), $atts));
	
	$counterAttr = $counter ? 'data-counter="'.$counter.'"' : '';
	
	$left = ($left == null ? '' :  ' margin-left:'.$left.';');
	$right = ($right == null ? '' : ' margin-right:'.$right.';');
	$top = ($top == null ? '' : ' margin-top:'.$top.';');
	$bottom = ($bottom == null ? '' : ' margin-bottom:'.$bottom.';');
	$style="";
	if( $left or $right or $top or $bottom ) {
		$style = 'style="' .$left.$right.$top.$bottom. '"';
	}

	$code = '<div class="social-short" '. $style .'><script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-url="'.get_permalink().'" '.$counterAttr.'></script></div>';


return  $code;
}

add_shortcode('linkedin', 'linkedin_shortcode');
?>