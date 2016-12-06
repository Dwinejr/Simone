<?php
/*
 * @class CuckooShortcodes_option
 * @version	1.0.0
 * @since 1.0
 * @package	CuckooShortcode
 * @author CuckooThemes
*/

if ( ! class_exists( 'CuckooShortcodes_option' ) ) {

	class CuckooShortcodes_option extends CuckooShortcode {
		
		public static function cuckoo_option( $option_name, $var_array='', $request='' ){
			
			$option = get_option($option_name);
			if(isset($_REQUEST[$request]) && !empty($var_array)){
				$option = $var_array;
				update_option( $option_name , $option );
				echo $output = '<div id="save_upadate" class="updated">'. _x('New settings saved!', CUCKOOSHORTCODE_LANG) .'</div>';
			}
			return $option;
		}
		
		public function insert( $string, $function, $default = '' ){
			
			switch( $function ){
				case '0':
					return self::exst($string);
				break;
				case '1':
					return esc_attr( self::exst($string) );
				break;
				case '2':
					return esc_attr( self::exst($string, $default) );
				break;				
				case '3':
					return self::makeID( $string );
				break;				
				case '4':
					return self::cuckoo_get_value( self::exst($string) );
				break;
			}
			
		}
		
		public function check_ID( $string, $option = array(), $value ){
			
			if(!empty($string)) :
			
				return $string;
				
			else :
				if( !empty($option) ) :
					$keys = array_keys($option);
					$last = end($keys);
					$count = $option[$last][$value]+1;
				else:
					$count = 1;
				endif;
				
				return $count;
				
			endif;
			
		}
		
		public static function MapGlobalSettings(){
			
			$returnArray = array(
			
				'mapType' => array(
					'ROADMAP',
					'SATELLITE',
					'HYBRID',
					'TERRAIN'
				),
				'YesNo' => array(
					'Yes',
					'No'
				),
				'mapTypeStyle' => array(
					'DEFAULT',
					'DROPDOWN_MENU',
					'HORIZONTAL_BAR',
				),
				'zoomStyle' => array(
					'DEFAULT',
					'SMALL',
					'LARGE',
				),
				'markerAnimation' => array(
					'None',
					'BOUNCE',
					'DROP',
				),
				'position' => array(
					'TOP_RIGHT',
					'TOP_LEFT',
					'TOP_CENTER',
					'RIGHT_TOP',
					'RIGHT_CENTER',
					'RIGHT_BOTTOM',
					'LEFT_TOP',
					'LEFT_CENTER',
					'LEFT_BOTTOM',
					'BOTTOM_RIGHT',
					'BOTTOM_LEFT',
					'BOTTOM_CENTER',
				),
				'positionDefaultTop' => array(
					'TOP_LEFT',
					'TOP_RIGHT',
					'TOP_CENTER',
					'RIGHT_TOP',
					'RIGHT_CENTER',
					'RIGHT_BOTTOM',
					'LEFT_TOP',
					'LEFT_CENTER',
					'LEFT_BOTTOM',
					'BOTTOM_RIGHT',
					'BOTTOM_LEFT',
					'BOTTOM_CENTER',
				),
				'MapDefaultBackground' => '#E5E3DF'
				
			);
		
			return $returnArray;
		}
		
		/* Helpers */
		
		public function makeID($text){
			$text = strtolower(trim($text));
			$text = preg_replace('/[^a-z0-9-]/', '', $text);
			$text = preg_replace('/-+/', '', $text);
			return $text;
		}
		
		public function ints($s){
			return($a=preg_replace('/[^\-\d]*(\-?\d*).*/','$1',$s))?$a:'0';
		}
		
		public function cuckoo_get_value($value) {
			return htmlspecialchars(stripslashes($value), ENT_QUOTES);
		}
		
		public function cuckoo_decode($str) {
			return html_entity_decode($str, ENT_QUOTES);
		}
		
		public function exst( & $var, $default = ""){
			$t = "";
			if ( !isset($var)  || !$var ) {
				if (isset($default) && $default != "") $t = $default;
			}
			else  {  
				$t = $var;
			}
			if (is_string($t)) $t = trim($t);
			return $t;
		}
		
		public function converVal($string){
			
			$string = trim($string);
			$string = str_replace('_', ' ', $string);
			$string = ucwords(strtolower($string));
			
			return $string;
		}
		
	}
}
?>