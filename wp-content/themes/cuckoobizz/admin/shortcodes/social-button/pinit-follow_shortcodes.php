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
** Name : Pin It shortcode
*/
function cuckoo_pinit_follow($atts) {
	extract(shortcode_atts(array(
        'user'		=> "cuckoothemes",
		'width'		=> "",
		'height'	=> "",
		'size'		=> 'medium',
		"left"		=> '',
		"top"		=> '',
		"right"		=> '15px',
		"bottom"	=> ''
    ), $atts));
	
	$left = ($left == null ? '' : 'margin-left:'.$left.';');
	$right = ($right == null ? '' : 'margin-right:'.$right.';');
	$top = ($top == null ? '' : 'margin-top:'.$top.';');
	$bottom = ($bottom == null ? '' : 'margin-bottom:'.$bottom.';');
	$style = 'style="' .$left.$right.$top.$bottom. '"';
	
	switch($size){
		case 'small':
			$img = 'small-p-button.png';
			$width = '16';
			$height = '16';
		break;
		case 'medium':
			$img = 'pinterest-button.png';
			$width = '80';
			$height = '28';
		break;
		case 'large':
			$img = 'big-p-button.png';
			$width = '60';
			$height = '60';
		break;
		case 'follow':
			$img = 'follow-me-on-pinterest-button.png';
			$width = '169';
			$height = '28';
		break;
	}

return '<div class="social-short" '.$style.'><a href="http://pinterest.com/'.$user.'/"><img src="http://passets-lt.pinterest.com/images/about/buttons/'.$img.'" width="'.$width.'" height="'.$height.'" alt="Follow Me on Pinterest" /></a></div>'; }
add_shortcode('pin-follow', 'cuckoo_pinit_follow');
?>