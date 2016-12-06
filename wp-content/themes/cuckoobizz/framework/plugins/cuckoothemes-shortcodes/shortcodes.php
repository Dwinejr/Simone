<?php
/*
 * @version	1.0.0
 * @since 1.0
 * @package	CuckooShortcode
 * @author CuckooThemes
*/


######################################
/* Map Shortcode and all attributes */
######################################
if (!function_exists('shortcode_map')) {
	
	function shortcode_map($arg){
		extract(shortcode_atts(array(
			'id'	=> '1',
			'subid' => ''
		), $arg));
		
		ob_start();
		$output = MapShortcode::getMap($id, $subid);
		$content = ob_get_contents();
		ob_clean();
		ob_end_clean();
			
		return ($content);
	}
	
}
add_shortcode( 'cuckoo_map', 'shortcode_map' );

?>