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
** Name : facebook box shortcode
*/
function fb_like( $atts, $content=null ){

    extract(shortcode_atts(array(
            'send' => 'false',
            'layout' => 'standard',
            'show_faces' => 'true',
            'width' => '400px',
            'action' => 'like',
            'font' => '',
            'colorscheme' => 'light',
            'ref' => '',
            'locale' => 'en_US',
            'appId' => '', // Put your AppId here is you have one
			'left'	=> '',
			'top'	=> '',
			'right'	=> '',
			'bottom'=> ''
    ), $atts));
	
	$left = ($left == null ? '' :  ' margin-left:'.$left.';');
	$right = ($right == null ? '' : ' margin-right:'.$right.';');
	$top = ($top == null ? '' : ' margin-top:'.$top.';');
	$bottom = ($bottom == null ? '' : ' margin-bottom:'.$bottom.';');
	$style = "";
	if( $left or $right or $top or $bottom ) {
		$style = 'style="' .$left.$right.$top.$bottom. '"';
	}
 
    $fb_like_code = '<div class="social-short" '. $style .'><div id="fb-root"></div><script src="http://connect.facebook.net/'.$locale.'/all.js#appId='.$appId.'&amp;xfbml=1"></script>
        <fb:like ref="'.$ref.'" href="'.$content.'" layout="'.$layout.'" colorscheme="'.$colorscheme.'" action="'.$action.'" send="'.$send.'" width="'.$width.'" show_faces="'.$show_faces.'" font="'.$font.'"></fb:like></div>';
 
    return $fb_like_code;
}
add_shortcode('fb', 'fb_like');
?>