<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 
 $slider_elements = get_option( THEMEPREFIX . "_slidershow_settings" );
 $effects = array(
    'sliceDown',
    'sliceDownLeft',
    'sliceUp',
    'sliceUpLeft',
    'sliceUpDown',
    'sliceUpDownLeft',
    'fold',
    'fade',
    'random',
    'slideInRight',
    'slideInLeft',
    'boxRandom',
    'boxRain',
    'boxRainReverse',
	'boxRainGrow',
	'boxRainGrowReverse',
 );

 $sliders = array(
	'Nivo Slider',
	'Revolution Slider',
	'LayerSlider',
	'FullScreen Slider',
	'FullScreen Image'
 );
 $radio = array(
	'Left',
	'Center',
	'Right',
 );
 $captionEffect = array(
	'slide',
	'fade',
	'none'
 );
 
$color_position = array(
	'Top Right',
	'Top Left',
	'Top Center',	
	'Center Right',
	'Center Left',
	'Center Center',	
	'Bottom Right',
	'Bottom Left',
	'Bottom Center'
);
$repeat_img = array(
	'no-repeat'	=> 'No repeat',
	'repeat' 	=> 'Tile',
	'repeat-x'	=> 'Tile Horizontally',
	'repeat-y'	=> 'Tile Vertically'
);
$attachament_img = array(
	'scroll' 	=> 'Scroll',
	'fixed'  	=> 'Fixed'
);
$effects_FullScreen = array(
	'None',
	'Fade',
	'Slide Top',
	'Slide Right',
	'Slide Bottom',
	'Slide Left',
	'Carousel Right',
	'Carousel Left',
);

$yes_no_array = array(
	'1' => 'Yes',
	'0' => 'No'
);

?>
<section id="main_content">
<?php
if(isset($_REQUEST['all']))
{
	$r = 1;
	$items = $_POST['items'];
	$elements = array();
	$ItemsAll = array();
	$items_array = explode(',', $items);
	foreach($items_array as $key=>$item) 
	{ 
		$items = substr($item,4);
		if($items != '')
		$ItemsAll[$key] = $items;
		$keys = $key+$r;
		
		// wpml
		if( function_exists('icl_register_string') ) :
			icl_register_string(THEMENAME.' Homepage Slides #'.$items, 'Image Title', $_POST["img_title".$items]);
			icl_register_string(THEMENAME.' Homepage Slides #'.$items, 'Slide Title', unit_title_scan($_POST['slide_title'.$items]));
			icl_register_string(THEMENAME.' Homepage Slides #'.$items, 'Slide Subtitle', unit_title_scan($_POST['slide_subtitle'.$items]));
			icl_register_string(THEMENAME.' Homepage Slides #'.$items, 'Slide Button Title', unit_title_scan( $_POST["title_button_slides".$items] ));
		endif;
		
		$elements_insert = array( $keys => array( 
		'remove' 				=> $keys , 
		'img' 					=> esc_attr($_POST["upload_image".$items]), 
		'title' 				=> unit_title_scan($_POST["img_title".$items]),
		'slide_title' 			=> unit_title_scan($_POST["slide_title".$items]),
		'slide_subtitle' 		=> unit_title_scan($_POST["slide_subtitle".$items]),
		'title_button_slides'	=> unit_title_scan($_POST["title_button_slides".$items]),
		'url_button_slides'		=> esc_attr($_POST["url_button_slides".$items]),
		'font_color'			=> esc_attr($_POST["color_picker_color-".$items]),
		'title_aling'			=> $aling = ( esc_attr($_POST["radio_title".$items]) == null ? 'Left' : esc_attr($_POST["radio_title".$items]) )
		));
		if($elements_insert[$keys]['img'] == null ) 
		{ 
			unset($elements_insert[$keys]);
		}
		array_push($elements, $elements_insert);
		
	}
	$allElements = array( 'elements' => $elements );
	// wpml
	if( function_exists('icl_register_string') ) :
		icl_register_string(THEMENAME.' Homepage FullScreen Image', 'Title', unit_title_scan($_POST['image_full_title']));
		icl_register_string(THEMENAME.' Homepage FullScreen Image', 'Subtitle', unit_title_scan($_POST['image_full_subtitle']));
	endif;
	$settings = array( 
		'settings' => array(  
			'nivo_effect' 				=> esc_attr($_POST["nivo_effect"]),
			'caption_effect' 			=> esc_attr($_POST["caption_effect"]),
			'slider_timeout' 			=> esc_attr($_POST["slider_timeout"]),
			'slider_hover'				=> esc_attr($_POST["slideshow_hover"]),
			'animationspeed' 			=> $animationspeed = (esc_attr($_POST["slideshow_hover_time"]) == null ? 1000 : esc_attr($_POST["slideshow_hover_time"])),
			'box_rows' 					=> $box_rows = (esc_attr($_POST["box_rows"]) == null ? 4 : esc_attr($_POST["box_rows"])),
			'box_cols' 					=> $box_cols = (esc_attr($_POST["box_cols"]) == null ? 12 : esc_attr($_POST["box_cols"])),
			'overlay_lines_slideshow'	=> esc_attr($_POST['overlay_lines_slideshow']) ,
			
			'rev_alias' 			=> cuckoo_get_value($_POST["rev_alias"]),
			
			'layer_shortcode' 		=> cuckoo_get_value($_POST["layer_shortcode"]),
			
			'homepage_slider'		=> esc_attr($_POST["homepage_slider"]),
			'parallax'				=> esc_attr($_POST["parallax-effect-1"]),
			'background-image'		=> esc_attr($_POST["upload_image1000"]),
			'background-position'	=> esc_attr($_POST["background-position"]),
			'background-repeat'		=> esc_attr($_POST["background-repeat"]),
			'background-attachment'	=> esc_attr($_POST["background-attachment"]),
			'parallax-speed'		=> esc_attr($_POST["parallax-speed"]),
			'background-color'		=> esc_attr($_POST["color_picker_color-10000"]),			
			
			'img-parallax'				=> esc_attr($_POST["img-parallax-effect-1"]),
			'img-background-image'		=> esc_attr($_POST["upload_image1000s"]),
			'img-background-position'	=> esc_attr($_POST["img-background-position"]),
			'img-background-repeat'		=> esc_attr($_POST["img-background-repeat"]),
			'img-background-attachment'	=> esc_attr($_POST["img-background-attachment"]),
			'img-parallax-speed'		=> esc_attr($_POST["img-parallax-speed"]),
			'img-background-color'		=> esc_attr($_POST["color_picker_color-10000s"]),
			
			'effects_FullScreen'			=> esc_attr($_POST["effects_FullScreen"]),
			'FullScreen_transition_speed'	=> $FullScreen_transition_speed = (esc_attr($_POST["FullScreen_transition_speed"]) == null ? 1000 : esc_attr($_POST["FullScreen_transition_speed"])),
			'FullScreen_slide_interval'		=> $FullScreen_slide_interval = (esc_attr($_POST["FullScreen_slide_interval"]) == null ? 6000 : esc_attr($_POST["FullScreen_slide_interval"])),
			'FullScreen_progress_bar'		=> esc_attr($_POST["FullScreen_progress_bar"]),
			
			'image_full_title'		=> cuckoo_get_value($_POST["image_full_title"]),
			'image_full_subtitle' 	=> cuckoo_get_value($_POST["image_full_subtitle"]),
			'title-parallax' 		=> esc_attr($_POST["title-parallax"]),
			'subtitle-parallax' 	=> esc_attr($_POST["subtitle-parallax"]),
			'parallax-effect-image' => esc_attr($_POST["parallax-effect-1a"]),
			'parallax-speed-logo' 	=> esc_attr($_POST["parallax-speed-1ar"]),
			'img-logo-parallax' 	=> esc_attr($_POST["upload_image1000a"]),
			'background-position-a' => esc_attr($_POST["background-position-a"]),
			'background-repeat-a' 	=> esc_attr($_POST["background-repeat-a"]),
			'background-attachment-a'=> esc_attr($_POST["background-attachment-a"]),
			'aling_text' 			=> esc_attr($_POST["radio_title-a"]),
		)
	);
	$slider_elements = array_merge($allElements, $settings);
	update_option( THEMEPREFIX . "_slidershow_settings", $slider_elements );
	?>
    <div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
<?php
}
?>
	<?php cuckoo_framework_head( __('Slideshow Player', 'cuckoothemes') ); ?>
	<script type="text/javascript">
		document.onselectstart = function () { return false; }
	</script>
	<form id="formId" method="POST" action="">
	<div id="general_settings">
		<div class="whit_click general_title_active">
			<span class="float_left"><?php _e('Homepage Slideshow Settings', 'cuckoothemes'); ?></span>
			<span class="float_right"><a href="#" class="click_gen general_onclick"></a></span>
		</div>
		<div class="active_settings" style="display:block;">
			<div class="section_settings" style="border-bottom:0;">
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Choose Homepage Slider', 'cuckoothemes'); ?>
					</div>
					<select id="homepage_slider" name="homepage_slider">
					<?php foreach($sliders as $k => $v) :
						if($slider_elements['settings']['homepage_slider'] == $v) { ?>
							<option value="<?php echo $v; ?>" selected ><?php echo $v; ?></option>
						<?php }else{ ?>
							<option value="<?php echo $v; ?>" ><?php echo $v; ?></option>
						<?php } ?>
					<?php endforeach; ?>
					</select>
					<div class="desc_bottom">
						<?php _e("", 'cuckoothemes'); ?>
					</div>
				</div>
				<div class="settings_left rev_set" style="padding:0; width:350px;">
					<div class="settings_left_title">
						<?php _e('Enter Revolution Slider Shortcode', 'cuckoothemes'); ?>
					</div>
					<input style="font-size:12px; width:100%; color:#333333;" type="text" name="rev_alias" value="<?php echo $slider_elements['settings']['rev_alias']; ?>" />
					<div class="desc_bottom">
						<?php _e('Enter Revolution Slider Shortcode. It will be used for embedding the slider. Example: [rev_slider homepage]', 'cuckoothemes'); ?>
					</div>
				</div>				
				<div class="settings_left layer_set" style="padding:0; width:350px;">
					<div class="settings_left_title">
						<?php _e('Enter LayerSlider Shortcode', 'cuckoothemes'); ?>
					</div>
					<input style="font-size:12px; width:100%; color:#333333;" type="text" name="layer_shortcode" value="<?php echo $slider_elements['settings']['layer_shortcode']; ?>" />
					<div class="desc_bottom">
						<?php _e('Enter LayerSlider Shortcode. It will be used for embedding the slider. Example: [layerslider id="1"]', 'cuckoothemes'); ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		<!-- Full Width image -->
		<div class="img-control">
			<div class="line-cuckoo"></div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('FullScreen Image Title and Subtile', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Enter Title', 'cuckoothemes'); ?>
						</div>
						<textarea name="image_full_title" style="min-width:100%; max-width:100%; min-height: 100px;"><?php echo $slider_elements['settings']['image_full_title']; ?></textarea>
					</div>
					<div class="settings_left" style="padding-right:0; width:373px;">
						<div class="settings_left_title">
							<?php _e('Enter Subtitle', 'cuckoothemes'); ?>
						</div>
						<textarea name="image_full_subtitle" style="min-width:100%; max-width:100%; min-height: 100px;"><?php echo $slider_elements['settings']['image_full_subtitle']; ?></textarea>
					</div>
					<div class="settings_left" style="padding-top:25px;">
						<div class="settings_left_title">
							<?php _e('Title Unit Alignment', 'cuckoothemes'); ?>
						</div>
						<?php foreach( $radio as $k => $v ) : ?>
							<?php if( $v == $slider_elements['settings']['aling_text'] ) : ?>
								<div class="title-radio-1">
									<input type="radio" id="title-<?php echo $v; ?>" name="radio_title-a" value="<?php echo $v; ?>" checked />
									<label class="title-radio" for="title-<?php echo $v; ?>">Align <?php echo $v; ?></label>
								</div>
							<?php else : ?>
								<div class="title-radio-1">
									<input type="radio" id="title-<?php echo $v; ?>" name="radio_title-a" value="<?php echo $v; ?>" />
									<label class="title-radio" for="title-<?php echo $v; ?>">Align <?php echo $v; ?></label>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>					
					<div class="settings_left" style="padding-top:25px;">
						<div class="settings_left_title">
							<?php _e('Choose Font Color', 'cuckoothemes'); ?>
						</div>
						<div class="desc_bottom" style="padding-top:0;">
							<?php _e('Title and Subtile Font color can be set by going to Dashboard > CuckooBizz > <a href="'.home_url().'/wp-admin/admin.php?page=fonts" title="Theme Fonts">Theme Fonts</a> and editing Nivo Slideshow Title & Nivo Slideshow Subtitle font groups.', 'cuckoothemes'); ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Additional Image Layer', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="desc_bottom" style="padding:20px 0 0;">
					<?php _e('You can add an additional Image Layer. For example your company logo or transparent overlay effect that will be displayed behind Title and Subtitle unit if it is created.', 'cuckoothemes'); ?>
				</div>
				<div class="section_settings" style="border-bottom:0;">
						<div class="full-width">
							<div class="titleBackground">
								<b><?php _e('Display Image as','cuckoothemes'); ?></b>
								<select id="parallax-effect-1a" name="parallax-effect-1a" class="background-select-parallax">
								<?php if($slider_elements['settings']['parallax-effect-image'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
									<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
									<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label class="uploader" for="upload_image1000a">
								<input id="image_url_input1000a" class="upload_image1000a upLaoding" style="width:82%;" type="text" size="36" name="upload_image1000a" value="<?php echo $slider_elements['settings']['img-logo-parallax'] ?>" />
								<input id="uploadId1000a" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-1a" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
									<select class="radio-position-clone bposition" name="background-position-a">
										<?php foreach($color_position as $k=>$v): ?>
											<?php if( $v == $slider_elements['settings']['background-position-a']  ) : ?>
												<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
											<?php else : ?>
												<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div id="background-setting-reapet-1a" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $slider_elements['settings']['background-repeat-a'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="background-repeat-a" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="background-repeat-a" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-1a" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $slider_elements['settings']['background-attachment-a'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="background-attachment-a" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="background-attachment-a" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-1a" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-1a"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="parallax-speed-1ar" class="parallax-speed" name="parallax-speed-1ar" value="<?php echo $slider_elements['settings']['parallax-speed-logo']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
							</div>
						</div>
					<div class="clear"></div>
				</div>	
			</div>	
		</div>

		
		<!--- Full Width Image Background -->
		<div class="img-background-control">
			<div class="line-cuckoo"></div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('FullScreen Background Image', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings" style="border-bottom:0;">
					<div class="full-width">
						<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
							<?php _e('For a FullScreen Background, Images smaller than width 1680 pixels width x 1080 pixels height are not recommended.', 'cuckoothemes'); ?>
						</div>
						<div class="titleBackground">
							<b><?php _e('Background','cuckoothemes'); ?></b>
							<select id="parallax-effect-1s" name="img-parallax-effect-1" class="background-select-parallax">
							<?php if($slider_elements['settings']['img-parallax'] == '1') :?>
								<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
							<?php else: ?>
								<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
								<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
							<?php endif; ?>
							</select>
						</div>
						<label for="upload_image1000">
							<input id="image_url_input1000s" class="upload_image1000s upLaoding" style="width:82%;" type="text" size="36" name="upload_image1000s" value="<?php echo $slider_elements['settings']['img-background-image'] ?>" />
							<input id="uploadId1000s" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
						</label>
						<div class="col-1" style="width:63%; padding-top:25px;">
							<div id="background-setting-position-1s" class="radio_block parallax-settigs">
								<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
								<select class="radio-position-clone bposition" name="img-background-position">
									<?php foreach($color_position as $k=>$v): ?>
										<?php if( $v == $slider_elements['settings']['img-background-position']  ) : ?>
											<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
										<?php else : ?>
											<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<div id="background-setting-reapet-1s" class="radio_block parallax-settigs">
								<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
								<?php foreach($repeat_img as $k=>$v): ?>
									<?php if( $k == $slider_elements['settings']['img-background-repeat'] ) : ?>
										<input type="radio" class="radio-repeat-clone" name="img-background-repeat" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-repeat-clone" name="img-background-repeat" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>													
							<div id="background-setting-attach-1s" class="radio_block parallax-settigs">
								<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
								<?php foreach($attachament_img as $k=>$v): ?>
									<?php if( $k == $slider_elements['settings']['img-background-attachment'] ) : ?>
										<input type="radio" class="radio-attachment-clone" name="img-background-attachment" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-attachment-clone" name="img-background-attachment" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
								</div>
							<div id="background-setting-speed-1s" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-1s"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="img-parallax-speed" class="parallax-speed" name="img-parallax-speed" value="<?php echo $slider_elements['settings']['img-parallax-speed']; ?>" />
							</div>
						</div>
						<div class="col-1 last" style="width:33%; padding-top:25px;">
							<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
							<input type="text" id="color-10000s" value="<?php echo $back = empty($slider_elements['settings']['img-background-color']) ? '#' : $slider_elements['settings']['img-background-color']; ?>" class="colorInput" name="color_picker_color-10000s" style="background-color:<?php echo $slider_elements['settings']['img-background-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-10000s" />
							<div id="color_picker_color-10000s" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>				
			</div>	
		</div>		
		
		<!--- Background Settings -->
		<div class="background-control">
			<div class="line-cuckoo"></div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Background Settings', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings" style="border-bottom:0;">
					<div class="full-width">
						<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
							<?php _e('Upload custom background image, set display properties for it. Custom background will be visible only under the slides with transparent background."', 'cuckoothemes'); ?>
						</div>
						<div class="titleBackground">
							<b><?php _e('Background','cuckoothemes'); ?></b>
							<select id="parallax-effect-1" name="parallax-effect-1" class="background-select-parallax">
							<?php if($slider_elements['settings']['parallax'] == '1') :?>
								<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
							<?php else: ?>
								<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
								<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
							<?php endif; ?>
							</select>
						</div>
						<label for="upload_image1000">
							<input id="image_url_input1000" class="upload_image1000 upLaoding" style="width:82%;" type="text" size="36" name="upload_image1000" value="<?php echo $slider_elements['settings']['background-image'] ?>" />
							<input id="uploadId1000" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
						</label>
						<div class="col-1" style="width:63%; padding-top:25px;">
							<div id="background-setting-position-1" class="radio_block parallax-settigs">
								<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
								<select class="radio-position-clone bposition" name="background-position">
									<?php foreach($color_position as $k=>$v): ?>
										<?php if( $v == $slider_elements['settings']['background-position']  ) : ?>
											<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
										<?php else : ?>
											<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<div id="background-setting-reapet-1" class="radio_block parallax-settigs">
								<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
								<?php foreach($repeat_img as $k=>$v): ?>
									<?php if( $k == $slider_elements['settings']['background-repeat'] ) : ?>
										<input type="radio" class="radio-repeat-clone" name="background-repeat" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-repeat-clone" name="background-repeat" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>													
							<div id="background-setting-attach-1" class="radio_block parallax-settigs">
								<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
								<?php foreach($attachament_img as $k=>$v): ?>
									<?php if( $k == $slider_elements['settings']['background-attachment'] ) : ?>
										<input type="radio" class="radio-attachment-clone" name="background-attachment" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-attachment-clone" name="background-attachment" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
								</div>
							<div id="background-setting-speed-1" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-1"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="parallax-speed" class="parallax-speed" name="parallax-speed" value="<?php echo $slider_elements['settings']['parallax-speed']; ?>" />
							</div>
						</div>
						<div class="col-1 last" style="width:33%; padding-top:25px;">
							<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
							<input type="text" id="color-10000" value="<?php echo $back = empty($slider_elements['settings']['background-color']) ? '#' : $slider_elements['settings']['background-color']; ?>" class="colorInput" name="color_picker_color-10000" style="background-color:<?php echo $slider_elements['settings']['background-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-10000" />
							<div id="color_picker_color-10000" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>				
			</div>	
		</div>
	</div>
	
	<!-- FullScreen player -->
	<div id="general_settings" class="fullWidth_general_settings">
		<div class="general_title whit_click">
			<span class="float_left"><?php _e('FullScreen Slider Settings', 'cuckoothemes'); ?></span>
			<span class="float_right"><a href="#" class="click_gen general_click"></a></span>
		</div>
		<div class="active_settings">
			<div class="section_settings" style="">
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Choose Animation Effect', 'cuckoothemes'); ?>
					</div>
					<select name="effects_FullScreen">
					<?php foreach($effects_FullScreen as $k => $v) :
						if($slider_elements['settings']['effects_FullScreen'] == $k) { ?>
							<option value="<?php echo $k; ?>" selected ><?php echo $v; ?></option>
						<?php }else{ ?>
							<option value="<?php echo $k; ?>" ><?php echo $v; ?></option>
						<?php } ?>
					<?php endforeach; ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Choose Effect for your slideshow animation.", 'cuckoothemes'); ?>
					</div>
				</div>
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Display Progress Bar', 'cuckoothemes'); ?>
					</div>
					<select name="FullScreen_progress_bar">
					<?php foreach($yes_no_array as $k => $v) :
						if($slider_elements['settings']['FullScreen_progress_bar'] == $k) { ?>
							<option value="<?php echo $k; ?>" selected ><?php echo $v; ?></option>
						<?php }else{ ?>
							<option value="<?php echo $k; ?>" ><?php echo $v; ?></option>
						<?php } ?>
					<?php endforeach; ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Select Yes if you want Progress Bar to be displayed.", 'cuckoothemes'); ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section_settings" style="border-bottom:0;">
				<div class="settings_left">
					<span style="font-size:15px; font-weight:bold; color:#333333; padding-bottom:15px; display:block;">
						<?php _e('Slide Display Time', 'cuckoothemes'); ?>
					</span>
					<input style="text-align:center; font-size:12px; color:#333333;" size="6" type="text" name="FullScreen_slide_interval" maxlength="5" value="<?php echo $slider_elements['settings']['FullScreen_slide_interval']; ?>" />
					<span style="font-size:12px; color:#999999; width:250px; padding-left:20px; position:absolute;">
						<?php _e('Set time duration for moving to next slide. Default is set to 6000ms.', 'cuckoothemes'); ?>
					</span>
				</div>
				<div class="settings_left" style="padding:0; width:350px;">
					<div class="settings_left_title">
						<?php _e('Animation Speed', 'cuckoothemes'); ?>
					</div>
					<input type="text" name="FullScreen_transition_speed" style="text-align:center;" size="6" value="<?php echo $slider_elements['settings']['FullScreen_transition_speed']; ?>" />
					<span style="float:right; width: 257px; padding:0 0 0 20px;">
						<?php _e("Set slide transition speed. Default is set to 1000ms.", 'cuckoothemes'); ?>
					</span>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>	
	
	<!-- Nivo player -->
	<div id="general_settings" class="nivo_general_settings">
		<div class="general_title whit_click">
			<span class="float_left"><?php _e('Nivo Slider Settings', 'cuckoothemes'); ?></span>
			<span class="float_right"><a href="#" class="click_gen general_click"></a></span>
		</div>
		<div class="active_settings">
			<div class="section_settings" style="">
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Choose Nivo Effect', 'cuckoothemes'); ?>
					</div>
					<select name="nivo_effect">
					<?php foreach($effects as $k => $v) :
						if($slider_elements['settings']['nivo_effect'] == $v) { ?>
							<option value="<?php echo $v; ?>" selected ><?php echo $v; ?></option>
						<?php }else{ ?>
							<option value="<?php echo $v; ?>" ><?php echo $v; ?></option>
						<?php } ?>
					<?php endforeach; ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Choose Nivo Effect for your slideshow animation.", 'cuckoothemes'); ?>
					</div>
				</div>
				<div class="settings_left" style="padding:0; width:350px;">
					<div class="settings_left_title">
						<?php _e('Choose Title Effect', 'cuckoothemes'); ?>
					</div>
					<select name="caption_effect">
					<?php foreach($captionEffect as $k => $v) :
						if($slider_elements['settings']['caption_effect'] == $v) { ?>
							<option value="<?php echo $v; ?>" selected ><?php echo $v; ?></option>
						<?php }else{ ?>
							<option value="<?php echo $v; ?>" ><?php echo $v; ?></option>
						<?php } ?>
					<?php endforeach; ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Choose animation effect for your Title Unit.", 'cuckoothemes'); ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section_settings">
				<div class="settings_left">
					<span style="font-size:15px; font-weight:bold; color:#333333; padding-bottom:15px; display:block;">
						<?php _e('Slide Display Time', 'cuckoothemes'); ?>
					</span>
					<input style="text-align:center; font-size:12px; color:#333333;" size="6" type="text" name="slider_timeout" maxlength="5" value="<?php echo $slider_elements['settings']['slider_timeout']; ?>" />
					<span style="font-size:12px; color:#999999; width:250px; padding-left:20px; position:absolute;">
						<?php _e('Set time duration for moving to next slide. Default is set to 6000ms.', 'cuckoothemes'); ?>
					</span>
				</div>
				<div class="settings_left" style="padding:0; width:350px;">
					<div class="settings_left_title">
						<?php _e('Animation Speed', 'cuckoothemes'); ?>
					</div>
					<input type="text" name="slideshow_hover_time" style="text-align:center;" size="6" value="<?php echo $slider_elements['settings']['animationspeed']; ?>" />
					<span style="float:right; width: 257px; padding:0 0 0 20px;">
						<?php _e("Set slide transition speed. Default is set to 1000ms.", 'cuckoothemes'); ?>
					</span>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section_settings" style="">
				<div class="settings_left">
					<span style="font-size:15px; font-weight:bold; color:#333333; padding-bottom:15px; display:block;">
						<?php _e('Box Cols', 'cuckoothemes'); ?>
					</span>
					<input style="text-align:center; font-size:12px; color:#333333;" size="6" type="text" name="box_cols" maxlength="5" value="<?php echo $slider_elements['settings']['box_cols']; ?>" />
					<span style="font-size:12px; color:#999999; width:250px; padding-left:20px; position:absolute;">
						<?php _e('Set box cols for box animations.', 'cuckoothemes'); ?>
					</span>
				</div>
				<div class="settings_left" style="padding:0; width:350px;">
					<span style="font-size:15px; font-weight:bold; color:#333333; padding-bottom:15px; display:block;">
						<?php _e('Box Rows', 'cuckoothemes'); ?>
					</span>
					<input style="text-align:center; font-size:12px; color:#333333;" size="6" type="text" name="box_rows" maxlength="5" value="<?php echo $slider_elements['settings']['box_rows']; ?>" />
					<span style="font-size:12px; color:#999999; width:250px; padding-left:20px; position:absolute;">
						<?php _e('Set box rows for box animations.', 'cuckoothemes'); ?>
					</span>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section_settings" style="border-bottom:none;">
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Slideshow animation pause', 'cuckoothemes'); ?>
					</div>
					<select name="slideshow_hover">
					<?php switch($slider_elements['settings']['slider_hover'])
					{
						case 'true' : ?>
							<option value="true"><?php _e('Yes', 'cuckoothemes'); ?></option>
							<option value="false"><?php _e('No', 'cuckoothemes'); ?></option>
						<?php break;
						case 'false' : ?>
							<option value="false"><?php _e('No', 'cuckoothemes'); ?></option>
							<option value="true"><?php _e('Yes', 'cuckoothemes'); ?></option>
						<?php break;
					} ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Select Yes if you want to pause slideshow animation when the mouse is over a slide.", 'cuckoothemes'); ?>
					</div>
				</div>				
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Slideshow Overlay Effect', 'cuckoothemes'); ?>
					</div>
					<label for="overlay_lines_slideshow">
						<input type="checkbox" name="overlay_lines_slideshow" id="overlay_lines_slideshow" value="1" <?php echo ($slider_elements['settings']['overlay_lines_slideshow'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e(' Display Slideshow Overlay Effect on Nivo Slider.', 'cuckoothemes'); ?>
					</label>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	<!-- Slides -->
	<div id="general_settings_dubble" class="nivo_slides">
		<div class="general_title_dubble">
			<span class="float_left"><?php _e('Slides', 'cuckoothemes'); ?></span>
			<span class="float_right">
				<input id="add_elements" class="add_element" rel=".section" style="font-size:11px; font-weight:normal; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; " type="button" value="Add Slide" />
			</span>
		</div>
		<div class="active_settings_dubble">
		<div class="desc_bottom" style="padding:20px 0;">
			<?php _e("Click Add Slide button to add a new slide. 
			Upload new image or choose an existing one from the Media Gallery by clicking the Upload Image button. 
			Enter a Title for your slide (optional). When you have more than one slide, you can change slide sequence by dragging slides up or down. 
			You can also add a Title, Subtitle and Button for each slide and set an alignment for these element unit. 
			If you want to delete a slide, click Delete Slide button and then click Save button at the bottom of this framework page.<br /><br />

			Recommended size for the images:<br />
			1. Nivo Slider is a FullWidth Slider so recommended image width is 1680 pixels. Height of the image can be any. Also we suggest you to use images of the same size to make animation flow smoothly.<br />
			2. Recommended size for FullScreen Slider and FullScreen Image is 1680 x 1080 pixels.", 'cuckoothemes'); ?>
		</div>
			<div id="section_block">
				<?php
					$sliderArray = empty($slider_elements['elements'][0]) ? array(0=>array(0)) : $slider_elements['elements'] ; 
					foreach($sliderArray as $keys=>$val){
						foreach($val as $keys=>$values)
						{
							if(is_numeric($keys))
							{
							?>
							<div class="section" id="item<?php echo $keys; ?>">
								<div class="section_title">
									<span class="float_left">
										<input id="removeId<?php echo $keys; ?>" class="remove_block" type="button" value="Delete Slide" />
									</span>
									<span class="float_right">
										<div class="change_text"><?php _e('Change Sequence', 'cuckoothemes'); ?></div>
										<div class="section_change"></div>
									</span>
								</div>
								<div class="section_main">
									<div class="section_left">
										<img class="img_input" id="up_image<?php echo $keys; ?>" <?php if($values['img'] == "" or $values['img'] == get_template_directory_uri(). '/images/slideshow-default.jpg' ){ echo 'src="'.LOGOATTACH.'"';}else{ echo "src=".cuckoo_get_attachment_all_size( $values['img'] , 'admin-slide-show')."";} ?> />
									</div>
									<div class="section_right">
										<p style="padding-bottom:5px;">
											<b><?php _e('Title', 'cuckoothemes'); ?></b>
											<input class="width_input_title" name="img_title<?php echo $keys; ?>" type="text" maxlength="70" value="<?php echo $values['title']; ?>" />
										</p>
										<p>
											<th scope="row"></th>
											<td>
												<label class="up-img" for="upload_image<?php echo $keys; ?>">
													<b><?php _e('Image URL', 'cuckoothemes'); ?></b>
													<input id="image_url_input<?php echo $keys; ?>" class="upload_image<?php echo $keys; ?> slide_img_url" type="text" size="36" name="upload_image<?php echo $keys; ?>" value="<?php echo $values['img']; ?>" />
													<input id="uploadId<?php echo $keys; ?>" class="upload_image_button" type="button" value="Upload Image" />
												</label>
											</td>
										</p>
										<div class="desc_bottom" style="padding-top:0px;">
											<?php _e(esc_attr("Example: http://www.cuckoothemes.com"), 'cuckoothemes'); ?>
										</div>
									</div>
								</div>
								<div class="img_description">
									<div class="slide_title">
										<b><?php _e( "Enter Slide Title" , 'cuckoothemes' ); ?></b>
										<textarea name="slide_title<?php echo $keys; ?>" class="slide_title" id="slide_title<?php echo $keys; ?>" ><?php echo $values['slide_title']; ?></textarea>
									</div>
									<div class="slide_subtitle">
										<b><?php _e( "Enter Slide Subtitle" , 'cuckoothemes' ); ?></b>
										<textarea name="slide_subtitle<?php echo $keys; ?>" class="slide_subtitle" id="slide_subtitle<?php echo $keys; ?>"><?php echo $values['slide_subtitle']; ?></textarea>
									</div>
									<div class="slide_button">
										<b><?php _e( "Enter Button Title" , 'cuckoothemes' ); ?></b>
										<input type="text" style="margin-bottom:25px;" class="button-title-slide" name="title_button_slides<?php echo $keys; ?>" value="<?php echo $values['title_button_slides']; ?>" />
										<b><?php _e( "Enter Button URL" , 'cuckoothemes' ); ?></b>
										<input type="text" name="url_button_slides<?php echo $keys; ?>" class="button-url-slide" value="<?php echo $values['url_button_slides']; ?>" />
									</div>
								</div>
								<div class="section_settings font_block" style="padding:25px 0 0; border-bottom:0;">
									<div class="settings_left" style="padding-right: 30px;">
										<div class="settings_left_title" style="font-size:12px;">
											<?php _e('Title Unit Alignment', 'cuckoothemes'); ?>
										</div>
										<?php foreach( $radio as $k => $v ) : ?>
											<?php if( $v == $values['title_aling'] ) : ?>
												<div class="radio_value title-radio-value-<?php echo $v; ?> title-rad">
													<input type="radio" id="title-<?php echo $v; ?>-<?php echo $keys; ?>" name="radio_title<?php echo $keys; ?>" value="<?php echo $v; ?>" checked />
													<label class="title-radio-label-<?php echo $v; ?>" for="title-<?php echo $v; ?>-<?php echo $keys; ?>">Align <?php echo $v; ?></label>
												</div>
											<?php else : ?>
												<div class="radio_value title-radio-value-<?php echo $v; ?> title-rad">
													<input type="radio" id="title-<?php echo $v; ?>-<?php echo $keys; ?>" name="radio_title<?php echo $keys; ?>" value="<?php echo $v; ?>" />
													<label class="title-radio-label-<?php echo $v; ?>" for="title-<?php echo $v; ?>-<?php echo $keys; ?>">Align <?php echo $v; ?></label>
												</div>
											<?php endif; ?>
										<?php endforeach; ?>
									</div>
									<div class="settings_left" style="padding:0!important; width:333px!important;">
										<div class="settings_left_title" style="font-size:12px;">
											<?php _e('Choose Font Color', 'cuckoothemes'); ?>
										</div>
										<div class="fonts_attr_bottom" style="margin-right: -4px;">			
											<input type="text" id="color-<?php echo $keys; ?>" value="<?php echo $back = empty($values['font_color']) ? '#' : $values['font_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-<?php echo $keys; ?>" style="background-color:<?php echo $values['font_color']; ?> ; top:-3px; position:relative;" />
											<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-<?php echo $keys; ?>" />
											<div id="color_picker_color-<?php echo $keys; ?>" class="colorPickerMain"></div>
										</div>
										<div class="desc-color-slide">
											<?php _e('If left blank, default color will be used','cuckoothemes'); ?>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
							<?php
							}
						}
					}
						?>
				<input type="hidden" value="<?php foreach($sliderArray as $keys=>$val) {  foreach($val as $keys=>$values) { echo "item".$keys.","; } } ?>" name="items" />
			</div>
		</div>
	</div>
	<p style="display:inline;">
    <input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" /> 
	</p>
	<?php cuckoo_framework_footer(); ?>
	</form>
</section>