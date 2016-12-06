<?php
/*
 * @class CuckooShortcodes_admin_pages
 * @version	1.0.0
 * @since 1.0
 * @package	CuckooShortcode
 * @author CuckooThemes
*/

$option = new CuckooShortcodes_option();
$pages = new CuckooShortcodes_admin_pages();

// Get Global Settings
$globalSettings = $option->MapGlobalSettings();

// map types
$mapTypeArray = $globalSettings['mapType'];

// Yes or No select
$YesNoArray = $globalSettings['YesNo'];

// map Type Styles
$mapTypeStyleArray = $globalSettings['mapTypeStyle'];

// Map zoom Styles
$zoomStyleArray = $globalSettings['zoomStyle'];

// Marker animation types
$markerAnimationArray = $globalSettings['markerAnimation'];

// Position Costants
$positionArray = $globalSettings['position'];

// Position Costants Default top elements
$positionArrayDefaultTop = $globalSettings['positionDefaultTop'];

// Map default Background
$defaultBackground = $globalSettings['MapDefaultBackground'];
?>

<section id="main_content">
	<?php
	$new_settings = '';
	if(isset( $_REQUEST['all'] )){
		$r = 1;
		$elements = array();
		$items_array = explode(',', substr($_POST['items'], 0, -1));
		foreach($items_array as $key=>$item){
			$items = substr($item,5);
			if($items != '')
			$ItemsAll[$key] = $items;
			$keys = $key+$r;
			
			$address = empty($_POST['address-'.$items]) ? 'london' : $_POST['address-'.$items];
			$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.str_replace( ' ', '+', $address).'&sensor=false');
			$output= json_decode($geocode);
			$lat = $output->results[0]->geometry->location->lat;
			$long = $output->results[0]->geometry->location->lng;
			$latLong = $lat.', '.$long;
			
			
			$margintop = empty($_POST['margin-top-'.$items]) ? '0' : $option->ints( $_POST['margin-top-'.$items] );
			$marginbottom = empty($_POST['margin-bottom-'.$items]) ? '0' : $option->ints( $_POST['margin-bottom-'.$items] );
			$marginleft = empty($_POST['margin-left-'.$items]) ? '0' : $option->ints( $_POST['margin-left-'.$items] );
			$marginright = empty($_POST['margin-right-'.$items]) ? '0' : $option->ints( $_POST['margin-right-'.$items] );
			$margin = $margintop.'px '.$marginright.'px '.$marginbottom.'px '.$marginleft.'px';
			
			$markerElements = array();
			$MarkerAll = array();
			$markersArray = explode(',', substr($_POST['markers-'.$items], 0, -1));

			foreach($markersArray as $k=>$v){
			
				$MarkerKey = substr($v,7);
				$MarkerAll[$k] = $MarkerKey;
				
					$MarkerAddress = empty($_POST['marker-address-'.$MarkerKey.'-'.$items]) ? 'london' : $_POST['marker-address-'.$MarkerKey.'-'.$items];
					
					$geocodeMarker=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.str_replace( ' ', '+', $MarkerAddress).'&sensor=false');
					
					$outputMarker= json_decode($geocodeMarker);
					$latMarker = $outputMarker->results[0]->geometry->location->lat;
					$longMarker = $outputMarker->results[0]->geometry->location->lng;
					$latLongMarker = $latMarker.', '.$longMarker;
				
					$marker_insert = array(
						'marker-title' 			=> $markerTitle = empty($_POST['marker-title-'.$MarkerKey.'-'.$items]) ? '' : $option->insert( $_POST['marker-title-'.$MarkerKey.'-'.$items] , 2 ),
						'marker-address' 		=> $markerAddress = empty($_POST['marker-address-'.$MarkerKey.'-'.$items]) ? '' : $option->insert( $_POST['marker-address-'.$MarkerKey.'-'.$items] , 2 ),
						'marker-animation' 		=> $markerAnimation = empty($_POST['marker-animation-'.$MarkerKey.'-'.$items]) ? 'None' : $option->insert( $_POST['marker-animation-'.$MarkerKey.'-'.$items] , 2 ),
						'marker-lat-long' 		=> $latLongMarker,
						'marker-text' 			=> $markerText = empty($_POST['marker-text-'.$MarkerKey.'-'.$items]) ? '' : $option->insert( $_POST['marker-text-'.$MarkerKey.'-'.$items] , 4 ),
						'marker-main-icon' 		=> $markerMainIcon = empty($_POST['marker-main-icon-'.$MarkerKey.'-'.$items]) ? '' : $option->insert( $_POST['marker-main-icon-'.$MarkerKey.'-'.$items] , 2 ),
						'marker-zindex' 		=> $markerZindex = empty($_POST['marker-zindex-'.$MarkerKey.'-'.$items]) ? '1' : $option->insert( $_POST['marker-zindex-'.$MarkerKey.'-'.$items] , 2 ),
					);
					
					array_push($markerElements, $marker_insert);
			}
			
			$new_markerElements = $markerElements;
			
			$map_ID = $option->check_ID( $option->insert( $_POST['shortcodeID-'.$items] , 3 ), $option->cuckoo_option('cuckoo_shortcodes_map'), 'map-id' );
			$title = empty($_POST['shortcode-title-'.$items]) ? 'My map' : $option->insert( $_POST['shortcode-title-'.$items] , 2 );
			
			$short = '[cuckoo_map id="'.$map_ID.'"]';
			
			$elements_insert = array(
				'map-id'		 		=> $map_ID,
				'map-var' 				=> 'mapVar_'.$title.$keys,
				'shortcode-title' 		=> $title,
				'shortcode' 			=> $short,
				'address' 				=> $option->insert( $address , 2 ),
				'lat-long' 				=> $latLong,
				'zoom' 					=> $zoom = empty($_POST['zoom-'.$items]) ? '8' : $option->insert( $option->ints( $_POST['zoom-'.$items] ) , 2 ),
				'type' 					=> $type = empty($_POST['type-'.$items]) ? 'ROADMAP' :  $option->insert( $_POST['type-'.$items] , 2 ),
				
				/* Control Settings */
				'zoom-control' 			=> $zoomControl = empty($_POST['zoom-control-'.$items]) ? 'Yes' : $option->insert( $_POST['zoom-control-'.$items] , 2 ),
				'zoom-control-style' 	=> $zoomControlStyle = empty($_POST['zoom-control-style-'.$items]) ? 'DEFAULT' : $option->insert( $_POST['zoom-control-style-'.$items] , 2 ),
				'zoom-control-position' => $zoomControlPosition = empty($_POST['zoom-control-position-'.$items]) ? 'TOP_LEFT' : $option->insert( $_POST['zoom-control-position-'.$items] , 2 ),
				'pan-control' 			=> $panControl = empty($_POST['pan-control-'.$items]) ? 'Yes' : $option->insert( $_POST['pan-control-'.$items] , 2 ),
				'pan-control-position' 	=> $panControlPosition = empty($_POST['pan-control-position-'.$items]) ? 'TOP_LEFT' : $option->insert( $_POST['pan-control-position-'.$items] , 2 ),
				'scale-control' 		=> $scaleControl = empty($_POST['scale-control-'.$items]) ? 'Yes' : $option->insert( $_POST['scale-control-'.$items] , 2 ),
				'maptype-control' 		=> $maptypeControl = empty($_POST['maptype-control-'.$items]) ? 'Yes' : $option->insert( $_POST['maptype-control-'.$items] , 2 ),
				'maptype-control-style' => $maptypeControlStyle = empty($_POST['maptype-control-style-'.$items]) ? 'DEFAULT' : $option->insert( $_POST['maptype-control-style-'.$items] , 2 ),
				'maptype-control-position'=> $maptypeControlPosition = empty($_POST['maptype-control-position-'.$items]) ? 'TOP_RIGHT' : $option->insert( $_POST['maptype-control-position-'.$items] , 2 ),
				'streetView-control' 	=> $streetViewControl = empty($_POST['streetView-control-'.$items]) ? 'Yes' : $option->insert( $_POST['streetView-control-'.$items] , 2 ),
				'streetView-position' 	=> $streetViewPosition = empty($_POST['streetView-position-'.$items]) ? 'TOP_LEFT' : $option->insert( $_POST['streetView-position-'.$items] , 2 ),
				
				/* Marker settings */
				'marker-display' 		=> $markerDisplay = empty($_POST['marker-display-'.$items]) ? 'Yes' : $option->insert( $_POST['marker-display-'.$items] , 2 ),
				'marker-elements' 		=> $new_markerElements,
				
				/* Another settings */
				'map-scroll' 			=> $mapScroll = empty($_POST['map-scroll-'.$items]) ? 'Yes' : $option->insert( $_POST['map-scroll-'.$items] , 2 ),
				
				/* Map CSS */
				'map-width' 			=> $width = empty($_POST['map-width-'.$items]) ? '0' : $option->insert( $option->ints( $_POST['map-width-'.$items] ) , 1 ),
				'map-height' 			=> $height = empty($_POST['map-height-'.$items]) ? '400' : $option->insert( $option->ints( $_POST['map-height-'.$items] ) , 1 ),
				'margin-top' 			=> $margintop,
				'margin-bottom' 		=> $marginbottom,
				'margin-left' 			=> $marginleft,
				'margin-right' 			=> $marginright,
				'margin'				=> $margin,
				'map-background-color'  => $mapColor = empty($_POST['map-background-color-'.$items]) ? $defaultBackground : $option->insert( $_POST['map-background-color-'.$items] , 2 ),
				'map-background-default'=> $defaultBackground,
			);
			
			if( empty($elements_insert[$keys]['shortcode-title']) ){
				unset($elements_insert[$keys]);
			}
			array_push($elements, $elements_insert);
		}
	
		ksort($elements);
		$new_settings = $elements;
	}
	/* Get Option or Save new settings */
	$optionVal = $option->cuckoo_option('cuckoo_shortcodes_map', $new_settings, 'all');
	//delete_option('cuckoo_shortcodes_map');
	?>
	<?php $pages->header('Map Shortcode'); ?>
	<form id="cuckoo-short-map-settings" method="POST" action="">
		<div id="general_settings">
		
			<?php $pages->element_title('Maps', '.section', 'add-shortcode' , 'Add Map'); ?>
			
			<div class="active_settings" style="display: block;">
				<div class="section_settings" style="border-bottom:0;">
				
					<?php $optionArray = empty($optionVal[0]) ? array(0=>array(0)) : $optionVal ; 
					
					foreach($optionArray as $k=>$value) : ?>
					
						<div class="section" id="item-<?php echo $k; ?>">
							<?php $pages->section_title_in_array( $k, $value['shortcode-title'], $value['shortcode'] ); ?>
							<div class="drag-container">
								<?php 
								$pages->section_input_column_1('Map Title', 'shortcode-title-'.$k, $value['shortcode-title'], false , false, 'colmarginBottom short-title');
								$pages->section_input_column_1('Map Address', 'address-'.$k, $value['address'], false, true, 'colmarginBottom short-address' );
								
								$pages->section_title('Map Type Settings', '');
								$pages->section_start();
								$pages->section_select('Display Map Type Selection Panel', 'maptype-control-'.$k, $value['maptype-control'], '' , false, $YesNoArray , 'colmarginBottom maptype-control');
								$pages->section_select('Select Default Map Type', 'type-'.$k, $value['type'], false , true, $mapTypeArray, 'colmarginBottom maptype-type' );
								$pages->section_select('Style of Map Type Selection Panel', 'maptype-control-style-'.$k, $value['maptype-control-style'], '' , false, $mapTypeStyleArray, 'colmarginBottom maptype-style' );
								$pages->section_select('Position of the Map Type Selection Panel', 'maptype-control-position-'.$k, $value['maptype-control-position'], '' , true, $positionArray, 'colmarginBottom maptype-position' );
								$pages->section_end();
								
								$pages->section_title('Map Zoom Settings', '');
								$pages->section_start();
								$pages->section_input_column_1('Default Map Zoom Level', 'zoom-'.$k, $value['zoom'], false, false, 'colmarginBottom zoom-map'  );
								$pages->section_select('Display Map Zoom Control Panel', 'zoom-control-'.$k, $value['zoom-control'], '' , true, $YesNoArray, 'colmarginBottom zoom-control');
								$pages->section_select('Style of Map Zoom Control Panel', 'zoom-control-style-'.$k, $value['zoom-control-style'], '' , false, $zoomStyleArray, 'colmarginBottom zoom-style');
								$pages->section_select('Position of the Map Zoom Control Panel', 'zoom-control-position-'.$k, $value['zoom-control-position'], '' , true, $positionArrayDefaultTop, 'colmarginBottom zoom-position');
								$pages->section_end();
								
								$pages->section_title('Pan Control Settings', '');
								$pages->section_start();
								$pages->section_select('Display Pan Control', 'pan-control-'.$k, $value['pan-control'], '' , false, $YesNoArray, 'colmarginBottom pan-control');
								$pages->section_select('Position of the Pan Control', 'pan-control-position-'.$k, $value['pan-control-position'], '' , true, $positionArrayDefaultTop, 'colmarginBottom pan-position');
								$pages->section_end();
								
								$pages->section_title('Scale Display Settings', '');
								$pages->section_start();
								$pages->section_select('Display Map Scale', 'scale-control-'.$k, $value['scale-control'], '' , false, $YesNoArray, 'colmarginBottom scale-control');
								$pages->section_end();
								
								$pages->section_title('Street View Settings', '');
								$pages->section_start();
								$pages->section_select('Display Street View Control', 'streetView-control-'.$k, $value['streetView-control'], '' , false, $YesNoArray, 'colmarginBottom streetView-control');
								$pages->section_select('Position of the Street View Control', 'streetView-position-'.$k, $value['streetView-position'], '' , true, $positionArrayDefaultTop, 'colmarginBottom streetView-position');
								$pages->section_end();
								
								$pages->section_title('Map Markers', 'add-marker' , 'Add Marker', '.marker-section-'.$k );
								$pages->section_start();
								$markerArray = empty($value['marker-elements']) ? array(0=>array(0)) : $value['marker-elements'] ;
								$pages->section_select('Display Markers', 'marker-display-'.$k, $value['marker-display'], false , false, $YesNoArray, 'colmarginBottom marker-display');
								foreach($markerArray as $markerKey=>$markerValue) : ?> 
									<div id="marker-<?php echo $k; ?>-<?php echo $markerKey; ?>" class="marker-section marker-section-<?php echo $k; ?>">
									<span class="remove-marker"></span>
									<?php $pages->section_input_column_1('Marker Title', 'marker-title-'.$markerKey.'-'.$k, $markerValue['marker-title'], '', false , 'colmarginBottom marker-title' );
										$pages->section_input_column_1('Marker Address', 'marker-address-'.$markerKey.'-'.$k, $markerValue['marker-address'], '', true , 'colmarginBottom marker-address' );
										$pages->section_input_column_1('Marker Z-index', 'marker-zindex-'.$markerKey.'-'.$k, $markerValue['marker-zindex'], '', false, 'colmarginBottom marker-z-index'  );
										$pages->section_select('Marker Animation', 'marker-animation-'.$markerKey.'-'.$k, $markerValue['marker-animation'], false , true, $markerAnimationArray, 'colmarginBottom marker-animation' );
										$pages->section_img('Upload Marker Icon (jpg, png, gif)', 'marker-main-icon-'.$markerKey.'-'.$k, $markerValue['marker-main-icon'], false, 'colmarginBottom marker-main-icon' );
										$pages->section_texteare_full('Marker Description', 'marker-text-'.$markerKey.'-'.$k, $markerValue['marker-text'], '', 'colmarginBottom marker-text' ); ?>
									</div><?php
								endforeach;
								$pages->hidden_input('markers-'.$k, $markerArray, 'marker', 'marker-list');
								$pages->section_end();
								
								$pages->section_title('Other Settings', '');
								$pages->section_start();
								$pages->section_select('Map Scrolling on Hover', 'map-scroll-'.$k, $value['map-scroll'], '' , false, $YesNoArray, 'colmarginBottom map-scroll' );
								$pages->section_end();
								
								$pages->section_title('CSS Settings', '');
								$pages->section_start();
								$pages->section_input_column_1('Map Width', 'map-width-'.$k, $value['map-width'], 'To set 100% map width, enter 0.<br />To set map width in pixels, enter any other number.', false, 'colmarginBottom map-width');
								$pages->section_input_column_1('Map Height', 'map-height-'.$k, $value['map-height'], 'Enter Height in Pixels<br /><br />', true, 'colmarginBottom map-height');
								$pages->section_input_column_4('Margin Top', 'margin-top-'.$k, $value['margin-top'], 'Px', false, 'colmarginBottom map-margin-top');
								$pages->section_input_column_4('Margin Bottom', 'margin-bottom-'.$k, $value['margin-bottom'], 'Px', false, 'colmarginBottom map-margin-bottom');
								$pages->section_input_column_4('Margin Left', 'margin-left-'.$k, $value['margin-left'], 'Px', false, 'colmarginBottom map-margin-left');
								$pages->section_input_column_4('Margin Right', 'margin-right-'.$k, $value['margin-right'], 'Px', true, 'colmarginBottom map-margin-right');
								$pages->color_input('Background', 'map-background-color-'.$k, $value['map-background-color'], $value['map-background-default']);
								$pages->section_end(); 
								$pages->hidden_input('shortcodeID-'.$k, $value['map-id'], 'item', 'shortcode-ids'); ?>
								<div class="clear"></div>
							</div>
						</div>
						
					<?php endforeach; ?>
					<?php $pages->hidden_input('items', $optionArray, 'item', ''); ?>
				</div>
			</div>
			
		</div>
		<?php $pages->save_button( 'Save', 'all', 'map-settings-submit' ); ?>
		<?php $pages->footer(); ?>
	</form>
</section>