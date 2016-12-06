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
** Name : Twitter Follow
*/
function cuckoo_twitter_follow($atts, $content=null){

    extract(shortcode_atts(array(
        'show_count' => false,
        'button' => 'blue', // blue, grey
        'text_color' => '',
        'link_color' => '',
        'lang' => 'en',
		'user' => '',
        'width' => '',
        'align' => '',
		'left'	=> '',
		'top'	=> '',
		'right'	=> '',
		'bottom'=> ''
        ), $atts));
		
		$left = ($left == null ? '' :  ' margin-left:'.$left.';');
		$right = ($right == null ? '' : ' margin-right:'.$right.';');
		$top = ($top == null ? '' : ' margin-top:'.$top.';');
		$bottom = ($bottom == null ? '' : ' margin-bottom:'.$bottom.';');
		$style="";
		if( $left or $right or $top or $bottom ) {
			$style = 'style="' .$left.$right.$top.$bottom. '"';
		}
 
        $twitter_follow_code = '<div class="social-short" '.$style.'>
		<a href="http://twitter.com/'.$user.'" class="twitter-follow-button"
        data-show-count="'.$show_count.'"
        data-button="'.$button.'"
        data-text-color="'.$text_color.'"
        data-link-color="'.$link_color.'"
        data-lang="'.$lang.'"
        data-width="'.$width.'"
        data-align="'.$align.'">Follow @$user</a>
		<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
		</div>';
 
        return $twitter_follow_code;
}
add_shortcode('twitter-follow', 'cuckoo_twitter_follow');
?>