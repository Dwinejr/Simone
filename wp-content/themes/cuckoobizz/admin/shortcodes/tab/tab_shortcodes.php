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
** Name : Tab shortcode
*/
function shortcode_tabs($atts, $content = null) {
	$tab_content="";
	$color="";
	$width="";
	if( !empty( $atts['color'] ) ){
		$color = ' style="color:'.$atts['color'].'";';
	}
	if( !empty( $atts['width'] ) ){
		$width = ' style="width:'.$atts['width'].';"';
	}
	
	$tabs = array();
	preg_match_all('/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
	if(isset($matches[1]) && !empty($matches[1]))
		$tabs = $matches[1];
	else
		return;
		
	$tab_content .= '<div '. $width .' class="tabs">
		<ul class="tab-nav">';
		foreach($tabs as $tab) {
			$tab_title = $tab[0];
			$tab_slug = make_ID_in_text($tab_title);
			$tab_content .= '<li class="tab-navig"><a '.$color.' href="#'.$tab_slug.'">'.$tab_title.'</a></li>';
		}
		$tab_content .= '</ul>
		<div class="tab-container">' . do_shortcode($content) . '
		</div>
	</div>';
	
	return $tab_content;
}
add_shortcode('tabs', 'shortcode_tabs');

function shortcode_tab($atts, $content=null) {
	if(!isset($atts['title']))
		return;
	$tab_title = $atts['title'];
	$tab_slug = make_ID_in_text($tab_title);
	$fontColor = ( isset($atts["font"]) ? ' color:' . $atts["font"] . ';' : '' );
	$backgroundColor = ( isset($atts["background"]) ? ' background-color:' . $atts["background"] . ';' : ' background-color:#ebebeb;');
	$repeat = ( isset($atts["repeat"]) ? ' background-repeat:' . $atts["repeat"] . ';' : '' );
	$backgroundImage = ( isset($atts["image"]) ? ' background-image:url(' . $atts["image"] . ');' : '' );
	$style = 'style="' . $fontColor.$backgroundColor.$backgroundImage.$repeat . '"';
	
	return '<div id="'.$tab_slug.'" class="tab-content" '. $style .'><div class="tab-content-text">'.wptexturize(wpautop(do_shortcode($content))). '</div></div>';
	
}
add_shortcode('tab', 'shortcode_tab');
?>