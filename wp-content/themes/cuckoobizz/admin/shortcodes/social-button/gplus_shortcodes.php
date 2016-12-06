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
** Name : Google plus shortcode
*/
$plus1flag = false;
 
function plus1( $atts, $content=null ){
 
extract(shortcode_atts(array(
        'url' => get_permalink(),
        'lang' => 'en-US',
        'parsetags' => 'onload',
        'count' => 'true',
        'size' => 'medium',
        'callback' => '',
		'left'	=> '',
		'top'	=> '',
		'right'	=> '',
		'bottom'=> ''
        ), $atts));
 
    // Set global flag
    global $plus1flag;
    $plus1flag = true;
    $left = ($left == null ? '' :  ' margin-left:'.$left.';');
	$right = ($right == null ? '' : ' margin-right:'.$right.';');
	$top = ($top == null ? '' : ' margin-top:'.$top.';');
	$bottom = ($bottom == null ? '' : ' margin-bottom:'.$bottom.';');
	$style = '';
	if( $left or $right or $top or $bottom ) {
		$style = 'style="' .$left.$right.$top.$bottom. '"';
	}
 
    $plus1_code = '<div class="social-short" '.$style.'><g:plusone href='.$url.' count="'.$count.'" size="'.$size.'" callback="'.$callback.'"></g:plusone></div>';
 
    return $plus1_code;
}
 
// Add meta for front page ONLY and add scripts to any page with a shortcode
function addPlus1Meta(){
/* Author: Nicholas P. Iler
 * URL: http://www.ilertech.com/2011/06/add-google-1-to-wordpress-3-0-with-a-simple-shortcode/
 */
    global $plus1flag;
    if($plus1flag){
        if(is_home()){ // check for front page
            echo "<link rel='canonical' href='" . site_url() ."' />";
        }
         
        echo '<script type="text/javascript">
          (function() {
            var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
            po.src = "https://apis.google.com/js/plusone.js";
            var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>';
    }
}
 
add_shortcode('gplus', 'plus1');
add_action('wp_footer', 'addPlus1Meta');
?>