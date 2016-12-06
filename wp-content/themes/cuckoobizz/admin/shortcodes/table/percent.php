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
** Name : Percent shortcode
*/
function shortcode_percent($atts, $content = null) {
	extract(shortcode_atts(array(
		'align' => 'center',
		'width' => ''
    ), $atts));
	
	switch($align){
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
	
	$style = "";
	if(isset($width)){
		$style = 'style="width:'.$width.';"';
	}
	
	$percent_content = "";
	$percent_content .= '<div '.$style.' class="percent-container ' .$align. '">'. do_shortcode($content) .'</div>';
	
	return $percent_content;
}
add_shortcode('per-cont', 'shortcode_percent');

function shortcode_percent_bar($atts, $content=null) {
	extract(shortcode_atts(array(
		'title' 		=> '',
		'percentage' 	=> '100%',
		'titlecolor'	=> '',
		'barcolor'		=> '',
		'background'	=> ''
    ), $atts));
	
	$style = "";
	$backgroundstyle = "";
	$bar = "";
	
	$barStyle = 'style="background-color:'.$barcolor.'; width:'.$percentage.';"';
	
	if( $titlecolor ){
		$style = 'style="color:'.$titlecolor.'; "';
	}	
	
	if( $background ){
		$backgroundstyle = 'style="background-color:'.$background.'; "';
	}
	
	
	$bar .='<div '.$backgroundstyle.' class="percent-bar">';
	$bar .='<span '.$style.' class="percent-text">'. $title .'</span>';
	$bar .='<div '. $barStyle .' data-cuckoo-percent="'.$percentage.'" class="percent-fill"></div>';
	$bar .='</div>';
	return $bar;
}
add_shortcode('per-bar', 'shortcode_percent_bar');
?>