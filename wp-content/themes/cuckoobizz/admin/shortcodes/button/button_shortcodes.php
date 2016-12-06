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
** Name : Button shortcodes
*/
function shortcode_button( $atts, $content = null) {
    extract(shortcode_atts(array(
		"title"	=> 'Button Title',
        "color" => '#4F4F4F',
		"titlecolor" => '#ffffff',
		"width"	=> '225px',
		"url" 	=> 'http://www.cuckoothemes.com',
		"target" => '',
		"left"	=> '',
		"top"	=> '',
		"right"	=> '',
		"bottom"=> '',
		"withid" => ''
    ), $atts));
	switch(isset($atts["align"]) ? $atts["align"] : ''){
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
	$withid = ($withid != 'true') ? '' : 'cuckoo-with-ID';
	$left = ($left == null ? '' :  ' margin-left:'.$left.';');
	$right = ($right == null ? '' : ' margin-right:'.$right.';');
	$top = ($top == null ? '' : ' margin-top:'.$top.';');
	$bottom = ($bottom == null ? '' : ' margin-bottom:'.$bottom.';');
	$color = ($color == null ? '' : ' background-color:'.$color.';');
	$titlecolor = ( $titlecolor == null ? '' : ' color:'.$titlecolor.'!important;' );
	$width = ( $width == null ? ' width:225px;' : 'width:'.$width.';' );
	$style = 'style="' .$titlecolor.$color.$left.$right.$top.$bottom.$width. '"';
	$target_show = ($target == null ? '' : 'target="'.$target.'"');
	return '<a class="btn-short '.$withid.' '.$align.'" '.$style.' title="'.$title.'" '.$target_show.' href="'.$url.'">'.wptexturize($title).'</a>';
}
add_shortcode('btn', 'shortcode_button');
?>