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
** Name : Twitter box
*/
function twitter_shortcode( $atts, $content=null ){

    extract(shortcode_atts(array(
        'url' => get_permalink(),
        'counturl' => null,
        'via' => '',
        'text' => '',
        'related' => '',
        'countbox' => 'none', // none, horizontal, vertical
		'left'	=> '',
		'top'	=> '',
		'right'	=> '',
		'bottom'=> ''
    ), $atts));
 
    // Check for count url and set to $url if not provided
    if($counturl == null) $counturl = $url;
 
    // Shorten title if its too long
    if(strlen($text) < 115){
        $text = substr($text, 0, 115);
    }
	
	$left = ($left == null ? '' :  ' margin-left:'.$left.';');
	$right = ($right == null ? '' : ' margin-right:'.$right.';');
	$top = ($top == null ? '' : ' margin-top:'.$top.';');
	$bottom = ($bottom == null ? '' : ' margin-bottom:'.$bottom.';');
	$style = "";
	if( $left or $right or $top or $bottom ) {
		$style = 'style="' .$left.$right.$top.$bottom. '"';
	}
 
    $twitter_code = '<div class="social-short" '. $style .'>
	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<a href="http://twitter.com/share" class="twitter-share-button"
    data-url="'.$url.'"
    data-counturl="'.$counturl.'"
    data-via="'.$via.'"
    data-text="'.$text.'"
    data-related="'.$related.'"
    data-count="'.$countbox.'"></a>
	</div>';
 
    return $twitter_code;
 
}
add_shortcode('twitter-share', 'twitter_shortcode');
?>