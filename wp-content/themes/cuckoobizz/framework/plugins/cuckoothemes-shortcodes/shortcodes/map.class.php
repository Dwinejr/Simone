<?php
/* @class MapShortcode
 * @version	1.0.0
 * @since 1.0
 * @package	CuckooShortcode
 * @author CuckooThemes
*/

if ( ! class_exists( 'MapShortcode' ) ) {

	class MapShortcode {
	
		private static $sliderSerial = 0;
		
		/* @@@ GET MAP @@@ 
			Array $mapSettings gets ->
			1. Zoom,
			2. MapType,
			3. LatLng,
			4. MArker text after Click,
			5. Marker Icom
		*/
		
		public static function checkMapID($mapId) {
			$option = CuckooShortcodes_option::cuckoo_option('cuckoo_shortcodes_map');
			$mapId = trim($mapId);
			$ids = array();
			foreach( $option as $k=>$v ) :
				$ids[] = $v['map-id'];
			endforeach;
			
			if (!in_array($mapId , $ids)) {
				self::errorMSG(0);
			}
		}
		
		public static function getMap($mapId, $subid = '') {
			
			try{
				$option = CuckooShortcodes_option::cuckoo_option('cuckoo_shortcodes_map');
				$mapId = trim($mapId);
				
				self::checkMapID($mapId);
				
				$output = '';
				
				$sub = trim($subid);
				
				if( !empty($mapId) && is_numeric($mapId) ) :
				
					foreach( $option as $k=>$v ) :
						if($v['map-id'] == $mapId) :
							$mapId = $mapId.$sub;
							$func = 'loadMap'.$mapId;
							$mapSettings = array(
								$v['zoom'],
								$v['type'],
								$v['lat-long'],
								$v['marker-display'],
								$v['marker-elements'],
								$v['zoom-control'],
								$v['pan-control'],
								$v['scale-control'],
								$v['maptype-control'],
								$v['maptype-control-style'],
								$v['streetView-control'],
								$v['maptype-control-position'],
								$v['zoom-control-style'],
								$v['zoom-control-position'],
								$v['pan-control-position'],
								$v['streetView-position'],
								$v['map-scroll'],
							);
							$output .= self::mapStyle('cuckoo-map-'.$mapId, $v['map-height'], $v['map-width'], $v['margin'], $v['map-background-color']);
							$output .= self::mapContent(CuckooShortcodes_option::makeID($v['map-var'].$sub), $func, 'cuckoo-map-'.$mapId, $mapSettings);
						endif;
					endforeach;
					
					echo $output;
				
				else :
					
					self::errorMSG(1);
					
				endif;
			
			}catch(Exception $e){
				$message = $e->getMessage();
				self::errorMSG(1);
			}
		}
		
		public static function mapContent($var, $function, $id, $settings = array()){
			
			$zoom = $settings[0];
			$mapType = $settings[1];
			$LatLng = $settings[2];
			$MarkerDisplay = $settings[3];
			$MarkerElementsArray = $settings[4];
			$zoomControl = $settings[5] == 'Yes' ? 'true' : 'false' ;
			$panControl = $settings[6] == 'Yes' ? 'true' : 'false' ;
			$scaleControl = $settings[7] == 'Yes' ? 'true' : 'false' ;
			$maptypeControl = $settings[8] == 'Yes' ? 'true' : 'false' ;
			$maptypeControlStyle = $settings[9];
			$streetViewControl = $settings[10] == 'Yes' ? 'true' : 'false' ;
			$maptypeControlPosition = $settings[11];
			$zoomControlStyle = $settings[12];
			$zoomControlPosition = $settings[13];
			$panControlPosition = $settings[14];
			$streetViewPosition = $settings[15];
			$scrollwheel = $settings[16] == 'Yes' ? 'true' : 'false' ;
			
			$output = '
			<script type="text/javascript">
				var '.$var.';
				function '.$function.'() {
					  var mapOptions_'.$var.' = { mapTypeControl: '.$maptypeControl.',
							mapTypeControlOptions: { 
								style: google.maps.MapTypeControlStyle.'.$maptypeControlStyle.',
								position: google.maps.ControlPosition.'.$maptypeControlPosition.'
							}, 
							zoom: '.$zoom.',
							zoomControl: '.$zoomControl.',
							zoomControlOptions: {
								style: google.maps.ZoomControlStyle.'.$zoomControlStyle.',
								position: google.maps.ControlPosition.'.$zoomControlPosition.'
							},
							panControl: '.$panControl.',
							panControlOptions: {
								position: google.maps.ControlPosition.'.$panControlPosition.'
							},
							scaleControl: '.$scaleControl.',
							streetViewControl: '.$streetViewControl.',
							streetViewControlOptions: {
								position: google.maps.ControlPosition.'.$streetViewPosition.'
							},
							scrollwheel: '.$scrollwheel.',
							center: new google.maps.LatLng('.$LatLng.'),
							mapTypeId: google.maps.MapTypeId.'.$mapType.'
					  };'.$var.' = new google.maps.Map(document.getElementById("'.$id.'"), mapOptions_'.$var.');';
					  
			/* Marker Options */
			if($MarkerDisplay === "Yes") :
				$output .='setMarkers_'.$var.'('.$var.', beaches_'.$var.');';
			endif;
			$output .= '}';
			if($MarkerDisplay === "Yes") :
			$output .=	self::markers($MarkerElementsArray, $var);
			endif;
				
			$output .= 'google.maps.event.addDomListener(window, "load", '.$function.');
			</script>';
			$output .= '<div id="'.$id.'" class="cuckoo_map_shortcode"></div>';
			
			return $output;
			
		}
		
		public static function markers($array, $id){
			
			// get @var's
			
			$output = 'var beaches_'.$id.' = [';
			
			foreach($array as $k=>$v) :
				
				$title = isset($v['marker-title']) ? $v['marker-title'] : '';
				$zindex = isset($v['marker-zindex']) ? $v['marker-zindex'] : 1;
				$icon = isset($v['marker-main-icon']) ? $v['marker-main-icon'] : '';
				$animation = empty($v['marker-animation']) ? 'false' : $v['marker-animation'] == 'None' ? 'false' : 'google.maps.Animation.'.$v['marker-animation'];
				
				$output .= '["'.$title.'",'.$v['marker-lat-long'].','.$zindex.',"'.$icon.'", '.$animation.'],';
				
			endforeach;
			
			$output .= '];';
			
			### setMarkers function ###
			$output .= 'function setMarkers_'.$id.'(map, locations) {
				for (var i = 0; i < locations.length; i++) {
					var beach = locations[i];
					var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
					var marker_'.$id.' = new google.maps.Marker({
						position: myLatLng,
						map: map,
						icon: beach[4],
						title: beach[0],
						animation : beach[5],
						zIndex: beach[3]
					});
					attachSecretMessage'.$id.'(marker_'.$id.', i);
				} 
			}';	
			### setMarkers function end ###
			
			
			$output .= 'function attachSecretMessage'.$id.'(marker, num, map) {';
			
			$output .= 'var message = [';
			
			foreach($array as $k=>$v) :
				

				$text = isset($v['marker-text']) ? preg_replace('/(\r\n|\n|\r)/','<br/>', cuckoo_decode( $v['marker-text']) ) : '';
				$text = str_replace('"', "'", $text);
				
				$output .= '"'.$text.'",';
				
			endforeach;
			
			$output .= '];';
			
			 $output .= 'var infowindow = new google.maps.InfoWindow({ content: message[num] });
			if(message[num]){
				  google.maps.event.addListener(marker, "click", function() {
					infowindow.open(marker.get("map"), marker);
				  });
			}
			}';
			
			return $output;
		}
		
		public static function mapStyle( $id, $height, $width, $margin, $background ){
			$width = $width == '0' ? '100%' : $width.'px';
			$output = '<style>
				#'.$id.' { height: '.$height.'px; background-color:'.$background.'!important; width: '.$width.'; margin: '.$margin.';}
				#'.$id.' img { max-width: none!important; }
				</style>';
			
			return $output;
		}
		
		public static function errorMSG($code) {
			
			switch ($code){
				case 0 :
					$message = 'Wrong ID';
				break;
				case 1 :
					$message = 'No Logic, please check your code';
				break;
			}
				
			?>
			<div style="width:100%;height:50px;border:1px solid black;margin:30px auto;">
				<div style="padding:13px;line-height:1.5;color:red;font-size:16px;text-align:center;">
					<?php _e("Map Shortcode Error", CUCKOOSHORTCODE_LANG)?>: <?php echo $message?> 
				</div>
			</div>
			<?php 
		}
		/*
		This create nead
		
		public function map_dropdown($id = 'map_dropdown', $name = 'map_dropdown', $class = '' ){
			
			$option = CuckooShortcodes_option::cuckoo_option('cuckoo_shortcodes_map');
			$output = '';
			
			if(is_array($option) && !empty($option)) :
				
				$output .='<select id="'.$id.'" name="'.$name.'" class="'.$class.'">';
				foreach($option as $k=>$v):
					
				endforeach;
				$output .='</select>';
				
			else :
			
			endif;
			
		}
		*/
	
	}
}
?>