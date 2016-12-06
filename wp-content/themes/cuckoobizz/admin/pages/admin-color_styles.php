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
** Name : Color styles
*/
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
$hoverEffects = array(
	'WhiteBlack-Hover-Coloring' => 'Grayscale to Color',
	'Coloring-Hover-WhiteBlack' => 'Color to Grayscale',
	'WhiteBlack-Hover-zoomIn-Coloring' => 'Grayscale to Color with Zoom In',
	'WhiteBlack-Hover-zoomOut-Coloring' => 'Grayscale to Color with Zoom Out',
	'Coloring-Hover-zoomIn-WhiteBlack' => 'Color to Grayscale on Hover Zoom In',
	'Coloring-Hover-zoomOut-WhiteBlack' => 'Color to Grayscale on Hover Zoom Out',
	'WhiteBlack-noHover' => 'Grayscale Thumbnail',
	'Coloring-noHover' => 'Color Thumbnail',
	'Coloring-Opacity' => 'Color Thumbnail Opacity',
	'Coloring-Zoom-In' => 'Color Thumbnail Zoom In',
	'Coloring-imperial-Out' => 'Color Thumbnail Smaller',
	'Coloring-border' => 'Color Thumbnail Border Radius',
);
$effect_lists_array = array(
	'elementsQuicklyLeft' => 'Slide Left',
	'elementOpacity' => 'Fade',
	'default' => 'Default'
);
$yes_no_array = array(
	'1' => 'On',
	'2' => 'Off'
);
?>
<script type="text/javascript">
	jQuery(document).ready(function($){
		$("#restore_font").click(function(){
			var answer = confirm('Do you really want to reset all Colors settings?');
			return answer;
		});
	});
</script>
<section id="main_content">
	<?php
	if(isset($_REQUEST['all']))
	{
	/* all names settings */

	$cuckoo_style = array(	
	'underline-static' 			=> esc_attr( ($_POST['color_picker_color-4']) ) , 
	'underline-hover' 			=> esc_attr( ($_POST['color_picker_color-5']) ) , 
	'underline-visited' 		=> esc_attr( ($_POST['color_picker_color-6']) ) , 
	'another-hover' 			=> esc_attr( ($_POST['color_picker_color-7']) ) , 
	'another-visited' 			=> esc_attr( ($_POST['color_picker_color-8']) ) , 
	'theme-primary-color' 		=> esc_attr( ($_POST['color_picker_color-9']) ) , 
	'contact-fields-color' 		=> esc_attr( ($_POST['color_picker_color-contact-fields']) ) ,
	'theme-secondary-1-color' 	=> esc_attr( ($_POST['color_picker_color-10']) ) ,
	'selected-color' 			=> esc_attr( ($_POST['color_picker_color-13']) ) , 
	'land-menu-dorp-color' 		=> esc_attr( ($_POST['color_picker_color-14']) ) , 
	'all-button-color' 			=> esc_attr( ($_POST['color_picker_color-15']) ) , 
	'map-button-color' 			=> esc_attr( ($_POST['color_picker_color-16']) ) , 
	'reply-button-color' 		=> esc_attr( ($_POST['color_picker_color-17']) ) ,
	'first-comment-color' 		=> esc_attr( ($_POST['color_picker_color-18']) ) , 
	'children-comment-color' 	=> esc_attr( ($_POST['color_picker_color-19']) ) , 
	'reply-block-color' 		=> esc_attr( ($_POST['color_picker_color-20']) ) , 
	'subtitle-line-color' 		=> esc_attr( ($_POST['color_picker_color-21']) ) , 
	'comment-line-color' 		=> esc_attr( ($_POST['color_picker_color-22']) ) ,
	'home-subtitle-line-color' 		=> esc_attr( ($_POST['color_picker_color-home-subtitle']) ) ,
	'landing-subtitle-line-color' 	=> esc_attr( ($_POST['color_picker_color-landing-subtitle-line']) ) ,
	'all-lines-color' 			=> esc_attr( ($_POST['color_picker_color-23']) ) ,  
	'selected-font-color' 		=> esc_attr( ($_POST['color_picker_color-25']) ) ,
	'display_one_px_effect' 	=> esc_attr( ($_POST['display_one_px_effect']) ) ,
	'related-works-position' 	=> esc_attr( ($_POST['related-works-position']) ) , 
	'related-works-image' 		=> esc_attr( ($_POST['upload_image2']) ) , 
	'related-works-repeat' 		=> esc_attr( ($_POST['related-works-repeat']) ) , 
	'related-works-attachment' 	=> esc_attr( ($_POST['related-works-attachment']) ) , 
	'related-works-color' 		=> esc_attr( ($_POST['color_picker_color-27']) ) , 	
	'related-posts-position' 	=> esc_attr( ($_POST['related-posts-position']) ) , 
	'related-posts-image' 		=> esc_attr( ($_POST['upload_image3']) ) , 
	'related-posts-repeat' 		=> esc_attr( ($_POST['related-posts-repeat']) ) , 
	'related-posts-attachment' 	=> esc_attr( ($_POST['related-posts-attachment']) ) , 
	'related-posts-color' 		=> esc_attr( ($_POST['color_picker_color-28']) ) ,
	'parallax' 					=> esc_attr($_POST['parallax-effect-1']), 
	'parallax-speed' 			=> $speed = ( esc_attr($_POST['parallax-speed-1']) == '' ? 10 : esc_attr($_POST['parallax-speed-1'])),	
	'parallax-related-works' 	=> esc_attr($_POST['parallax-effect-2']), 
	'parallax-speed-related-works' => $speedReW = ( esc_attr($_POST['parallax-speed-2']) == '' ? 10 : esc_attr($_POST['parallax-speed-2'])),	
	'parallax-related-post' 	=> esc_attr($_POST['parallax-effect-3']), 
	'parallax-speed-related-post' => $speedReP = ( esc_attr($_POST['parallax-speed-3']) == '' ? 10 : esc_attr($_POST['parallax-speed-3'])),	
	'menu-dorp-color' 			=> esc_attr( ($_POST['color_picker_color-30']) ) ,
	'background_homepage' 			=> esc_attr( $_POST['color_picker_color-31'] ),
	'background-landing' 			=> esc_attr( $_POST['color_picker_color-32'] ),
	'worksThumbHoverColor' 			=> esc_attr( $_POST['color_picker_color-35'] ),
	'testimonialsBack' 				=> esc_attr( $_POST['color_picker_color-36'] ),
	'testimonialsBorder' 			=> esc_attr( $_POST['color_picker_color-37'] ),
	'worksThumbHoverColorOpacity' 	=> esc_attr( $_POST['worksThumbHoverColorOpacity'] ),
	'postsThumbHover' 				=> esc_attr( $_POST['postsThumbHover'] ),
	'worksThumbHover' 				=> esc_attr( $_POST['worksThumbHover'] ),
	'teamThumbHover' 				=> esc_attr( $_POST['teamThumbHover'] ),
	'testimonialsThumbHover' 		=> esc_attr( $_POST['testimonialsThumbHover'] ),
	/* post */ 
	'background-posts-image' 		=> esc_attr( ($_POST['upload_image-post']) ) , 
	'background-position-post' 		=> esc_attr( ($_POST['background-position-post']) ) ,
	'background-setting-attach-post'=> esc_attr( ($_POST['background-setting-attach-post']) ) , 
	'background-setting-reapet-post'=> esc_attr( ($_POST['background-setting-reapet-post']) ) , 
	'background-setting-posts-color'=> esc_attr( ($_POST['color_picker_color-30']) ) ,
	'parallax-post' 				=> esc_attr($_POST['parallax-effect-post']), 
	'parallax-speed-post' 			=> $speed = ( esc_attr($_POST['parallax-speed-post']) == '' ? 10 : esc_attr($_POST['parallax-speed-post'])),	
	/* work */ 
	'background-work-image' 		=> esc_attr( ($_POST['upload_image-work']) ) , 
	'background-position-work' 		=> esc_attr( ($_POST['background-position-work']) ) ,
	'background-setting-attach-work'=> esc_attr( ($_POST['background-setting-attach-work']) ) , 
	'background-setting-reapet-work'=> esc_attr( ($_POST['background-setting-reapet-work']) ) , 
	'background-setting-work-color'=> esc_attr( ($_POST['color_picker_color-31']) ) ,
	'parallax-work' 				=> esc_attr($_POST['parallax-effect-work']), 
	'parallax-speed-work' 			=> $speed = ( esc_attr($_POST['parallax-speed-work']) == '' ? 10 : esc_attr($_POST['parallax-speed-work'])),		
	/* page */ 
	'background-page-image' 		=> esc_attr( ($_POST['upload_image-page']) ) , 
	'background-position-page' 		=> esc_attr( ($_POST['background-position-page']) ) ,
	'background-setting-attach-page'=> esc_attr( ($_POST['background-setting-attach-page']) ) , 
	'background-setting-reapet-page'=> esc_attr( ($_POST['background-setting-reapet-page']) ) , 
	'background-setting-page-color'=> esc_attr( ($_POST['color_picker_color-32']) ) ,
	'parallax-page' 				=> esc_attr($_POST['parallax-effect-page']), 
	'parallax-speed-page' 			=> $speed = ( esc_attr($_POST['parallax-speed-page']) == '' ? 10 : esc_attr($_POST['parallax-speed-page'])),	
	/* search page */ 
	'background-search-image' 		=> esc_attr( ($_POST['upload_image-search']) ) , 
	'background-position-search' 		=> esc_attr( ($_POST['background-position-search']) ) ,
	'background-setting-attach-search'=> esc_attr( ($_POST['background-setting-attach-search']) ) , 
	'background-setting-reapet-search'=> esc_attr( ($_POST['background-setting-reapet-search']) ) , 
	'background-setting-search-color'=> esc_attr( ($_POST['color_picker_color-search']) ) ,
	'parallax-search' 				=> esc_attr($_POST['parallax-effect-search']), 
	'parallax-speed-search' 			=> $speed = ( esc_attr($_POST['parallax-speed-search']) == '' ? 10 : esc_attr($_POST['parallax-speed-search'])),		
	/* team */ 
	'background-team-image' 		=> esc_attr( ($_POST['upload_image-team']) ) , 
	'background-position-team' 		=> esc_attr( ($_POST['background-position-team']) ) ,
	'background-setting-attach-team'=> esc_attr( ($_POST['background-setting-attach-team']) ) , 
	'background-setting-reapet-team'=> esc_attr( ($_POST['background-setting-reapet-team']) ) , 
	'background-setting-team-color'=> esc_attr( ($_POST['color_picker_color-33']) ) ,
	'parallax-team' 				=> esc_attr($_POST['parallax-effect-team']), 
	'parallax-speed-team' 			=> $speed = ( esc_attr($_POST['parallax-speed-team']) == '' ? 10 : esc_attr($_POST['parallax-speed-team'])),		
	/* team Related */ 
	'background-Rteam-image' 		=> esc_attr( ($_POST['upload_image-Rteam']) ) , 
	'background-position-Rteam' 		=> esc_attr( ($_POST['background-position-Rteam']) ) ,
	'background-setting-attach-Rteam'=> esc_attr( ($_POST['background-setting-attach-Rteam']) ) , 
	'background-setting-reapet-Rteam'=> esc_attr( ($_POST['background-setting-reapet-Rteam']) ) , 
	'background-setting-Rteam-color'=> esc_attr( ($_POST['color_picker_color-34']) ) ,
	'parallax-Rteam' 				=> esc_attr($_POST['parallax-effect-Rteam']), 
	'parallax-speed-Rteam' 			=> $speed = ( esc_attr($_POST['parallax-speed-Rteam']) == '' ? 10 : esc_attr($_POST['parallax-speed-Rteam'])),	
	/* testimonials */ 
	'background-testimonial-image' 		=> esc_attr( ($_POST['upload_image-testimonial']) ) , 
	'background-position-testimonial' 		=> esc_attr( ($_POST['background-position-testimonial']) ) ,
	'background-setting-attach-testimonial'=> esc_attr( ($_POST['background-setting-attach-testimonial']) ) , 
	'background-setting-reapet-testimonial'=> esc_attr( ($_POST['background-setting-reapet-testimonial']) ) , 
	'background-setting-testimonial-color'=> esc_attr( ($_POST['color_picker_color-38']) ) ,
	'parallax-testimonial' 				=> esc_attr($_POST['parallax-effect-testimonial']), 
	'parallax-speed-testimonial' 			=> $speed = ( esc_attr($_POST['parallax-speed-testimonial']) == '' ? 10 : esc_attr($_POST['parallax-speed-testimonial'])),	
	/* Tag Cloud Widget */
	'tag-background-static' 		=> esc_attr( ($_POST['color_picker_color-tag-background-static']) ) ,
	'tag-background-hover' 		=> esc_attr( ($_POST['color_picker_color-tag-background-hover']) ) ,
	);
	update_option( THEMEPREFIX . "_style_settings" , $cuckoo_style );
	?>
		<div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
	<?php
	}
	
	if(isset($_REQUEST['restore'])){
		global $theme_style;
		/* General settings get style type */
		$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
		/* Deleted old settings */
		delete_option( THEMEPREFIX . "_style_settings" );
		/* Updated new style */
		update_option( THEMEPREFIX . "_style_settings" , $theme_style['color_style_page'] );
		?>
			<div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
		<?php
	}
	$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
	?>
		<?php cuckoo_framework_head( __('Color Settings', 'cuckoothemes') ); ?>
		<form id="formId" method="POST" action="">
			<div id="general_settings">
				<div class="active_settings" style="display: block; border-top:0;">
					<div class="section_settings" style="color: #999999; border-bottom:4px solid #D6D6D6;">
						<?php _e('Choose which theme element group you want to customize.<br />
								Enter custom color number or click Select a Color button and choose color in a color picker panel.<br />
								Pick color you need and again click Select a Color button.<br /> 
								Click Save button after all settings are done.<br /> 
								Click Reset to Default Settings button to restore default color settings.', 'cuckoothemes'); ?>
					</div>
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Main Colors', 'cuckoothemes'); ?></span>
					<input id="restore_font" class="active_input float_right" name='restore' style="border:1px solid #227399; color:white; " type="submit" value="<?php _e('Reset to Default Settings', 'cuckoothemes'); ?>" />
				</div>
<!---  Main Colors --->
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Color #1', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-9" value="<?php echo $back = empty($cuckoo_style['theme-primary-color']) ? '#' : $cuckoo_style['theme-primary-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-9" style="background-color:<?php echo $cuckoo_style['theme-primary-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-9" />
								<div id="color_picker_color-9" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Color #2', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-10" value="<?php echo $back = empty($cuckoo_style['theme-secondary-1-color']) ? '#' : $cuckoo_style['theme-secondary-1-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-10" style="background-color:<?php echo $cuckoo_style['theme-secondary-1-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-10" />
								<div id="color_picker_color-10" class="colorPickerMain"></div>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Selection Background Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-13" value="<?php echo $back = empty($cuckoo_style['selected-color']) ? '#' : $cuckoo_style['selected-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-13" style="background-color:<?php echo $cuckoo_style['selected-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-13" />
								<div id="color_picker_color-13" class="colorPickerMain"></div>
							</div>	
						</div>
						<div style="width:100%; height:1px; border-bottom:1px solid #D6D6D6; clear:both; padding-top:29px;"></div>
						<div class="full-width">													
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color padding-plus">
									<?php _e('Selection Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-25" value="<?php echo $back = empty($cuckoo_style['selected-font-color']) ? '#' : $cuckoo_style['selected-font-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-25" style="background-color:<?php echo $cuckoo_style['selected-font-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-25" />
								<div id="color_picker_color-25" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color padding-plus">
									<?php _e('Contact Form Fields Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-contact-fields" value="<?php echo $back = empty($cuckoo_style['contact-fields-color']) ? '#' : $cuckoo_style['contact-fields-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-contact-fields" style="background-color:<?php echo $cuckoo_style['contact-fields-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-contact-fields" />
								<div id="color_picker_color-contact-fields" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Buttons Color Settings', 'cuckoothemes'); ?></span>
				</div>
<!----- Buttons Color Settings ---->
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Default Button Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-15" value="<?php echo $back = empty($cuckoo_style['all-button-color']) ? '#' : $cuckoo_style['all-button-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-15" style="background-color:<?php echo $cuckoo_style['all-button-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-15" />
								<div id="color_picker_color-15" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Map Button Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-16" value="<?php echo $back = empty($cuckoo_style['map-button-color']) ? '#' : $cuckoo_style['map-button-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-16" style="background-color:<?php echo $cuckoo_style['map-button-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-16" />
								<div id="color_picker_color-16" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Reply Button Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-17" value="<?php echo $back = empty($cuckoo_style['reply-button-color']) ? '#' : $cuckoo_style['reply-button-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-17" style="background-color:<?php echo $cuckoo_style['reply-button-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-17" />
								<div id="color_picker_color-17" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Comment Background Colors', 'cuckoothemes'); ?></span>
				</div>
<!------ Comment Background Colors ------>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Comment Background Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-18" value="<?php echo $back = empty($cuckoo_style['first-comment-color']) ? '#' : $cuckoo_style['first-comment-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-18" style="background-color:<?php echo $cuckoo_style['first-comment-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-18" />
								<div id="color_picker_color-18" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Child Comment Background', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-19" value="<?php echo $back = empty($cuckoo_style['children-comment-color']) ? '#' : $cuckoo_style['children-comment-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-19" style="background-color:<?php echo $cuckoo_style['children-comment-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-19" />
								<div id="color_picker_color-19" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Reply Unit Background Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-20" value="<?php echo $back = empty($cuckoo_style['reply-block-color']) ? '#' : $cuckoo_style['reply-block-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-20" style="background-color:<?php echo $cuckoo_style['reply-block-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-20" />
								<div id="color_picker_color-20" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Line Colors', 'cuckoothemes'); ?></span>
				</div>
<!------ Line Colors ------>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">						
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Comment Title Line Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-22" value="<?php echo $back = empty($cuckoo_style['comment-line-color']) ? '#' : $cuckoo_style['comment-line-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-22" style="background-color:<?php echo $cuckoo_style['comment-line-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-22" />
								<div id="color_picker_color-22" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Default Line Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-23" value="<?php echo $back = empty($cuckoo_style['all-lines-color']) ? '#' : $cuckoo_style['all-lines-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-23" style="background-color:<?php echo $cuckoo_style['all-lines-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-23" />
								<div id="color_picker_color-23" class="colorPickerMain"></div>
							</div>
						</div>						
						<div style="width:100%; height:1px; border-bottom:1px solid #D6D6D6; clear:both; padding-top:29px;"></div>
						<div class="full-width">						
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color padding-plus">
									<?php _e('Homepage Subtitle Line Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-home-subtitle" value="<?php echo $back = empty($cuckoo_style['home-subtitle-line-color']) ? '#' : $cuckoo_style['home-subtitle-line-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-home-subtitle" style="background-color:<?php echo $cuckoo_style['home-subtitle-line-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-home-subtitle" />
								<div id="color_picker_color-home-subtitle" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color padding-plus">
									<?php _e('Landing Page Subtitle Line Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-landing-subtitle-line" value="<?php echo $back = empty($cuckoo_style['landing-subtitle-line-color']) ? '#' : $cuckoo_style['landing-subtitle-line-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-landing-subtitle-line" style="background-color:<?php echo $cuckoo_style['landing-subtitle-line-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-landing-subtitle-line" />
								<div id="color_picker_color-landing-subtitle-line" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Body Link Colors', 'cuckoothemes'); ?></span>
				</div>
<!------ Body Link Colors ------->
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Static', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-4" value="<?php echo $back = empty($cuckoo_style['underline-static']) ? '#' : $cuckoo_style['underline-static']; ?>" class="colorInput mini_select-color" name="color_picker_color-4" style="background-color:<?php echo $cuckoo_style['underline-static']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-4" />
								<div id="color_picker_color-4" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Hover', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-5" value="<?php echo $back = empty($cuckoo_style['underline-hover']) ? '#' : $cuckoo_style['underline-hover']; ?>" class="colorInput mini_select-color" name="color_picker_color-5" style="background-color:<?php echo $cuckoo_style['underline-hover']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-5" />
								<div id="color_picker_color-5" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Visited', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-6" value="<?php echo $back = empty($cuckoo_style['underline-visited']) ? '#' : $cuckoo_style['underline-visited']; ?>" class="colorInput mini_select-color" name="color_picker_color-6" style="background-color:<?php echo $cuckoo_style['underline-visited']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-6" />
								<div id="color_picker_color-6" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Default Link Colors', 'cuckoothemes'); ?></span>
				</div>
<!------ Default Link Colors ------->
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">						
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Hover', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-7" value="<?php echo $back = empty($cuckoo_style['another-hover']) ? '#' : $cuckoo_style['another-hover']; ?>" class="colorInput mini_select-color" name="color_picker_color-7" style="background-color:<?php echo $cuckoo_style['another-hover']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-7" />
								<div id="color_picker_color-7" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Visited', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-8" value="<?php echo $back = empty($cuckoo_style['another-visited']) ? '#' : $cuckoo_style['another-visited']; ?>" class="colorInput mini_select-color" name="color_picker_color-8" style="background-color:<?php echo $cuckoo_style['another-visited']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-8" />
								<div id="color_picker_color-8" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Homepage Testimonial Unit Option 2', 'cuckoothemes'); ?></span>
				</div>
<!------ Homepage Testimonial Unit Option 2 ------->
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">						
							<div class="fonts_attr_bottom mar" style="margin-right:125px;">
								<div class="font_description_mini_color">
									<?php _e('Background Color of Testimonial Box', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-36" value="<?php echo $back = empty($cuckoo_style['testimonialsBack']) ? '#' : $cuckoo_style['testimonialsBack']; ?>" class="colorInput mini_select-color" name="color_picker_color-36" style="background-color:<?php echo $cuckoo_style['testimonialsBack']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-36" />
								<div id="color_picker_color-36" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Border Color of Testimonial Box', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-37" value="<?php echo $back = empty($cuckoo_style['testimonialsBorder']) ? '#' : $cuckoo_style['testimonialsBorder']; ?>" class="colorInput mini_select-color" name="color_picker_color-37" style="background-color:<?php echo $cuckoo_style['testimonialsBorder']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-37" />
								<div id="color_picker_color-37" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Tag Cloud Widget', 'cuckoothemes'); ?></span>
				</div>
<!------ Tag Cloud Widget ------->
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">						
							<div class="fonts_attr_bottom mar" style="margin-right:125px;">
								<div class="font_description_mini_color">
									<?php _e('Static Tag Background Box Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-tag-background-static" value="<?php echo $back = empty($cuckoo_style['tag-background-static']) ? '#' : $cuckoo_style['tag-background-static']; ?>" class="colorInput mini_select-color" name="color_picker_color-tag-background-static" style="background-color:<?php echo $cuckoo_style['tag-background-static']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-tag-background-static" />
								<div id="color_picker_color-tag-background-static" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Color of Tag Background Box on Hover', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-tag-background-hover" value="<?php echo $back = empty($cuckoo_style['tag-background-hover']) ? '#' : $cuckoo_style['tag-background-hover']; ?>" class="colorInput mini_select-color" name="color_picker_color-tag-background-hover" style="background-color:<?php echo $cuckoo_style['tag-background-hover']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-tag-background-hover" />
								<div id="color_picker_color-tag-background-hover" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Border Style of Theme Elements', 'cuckoothemes'); ?></span>
				</div>
<!------ Border Style of Theme Elements ------->
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<p>
							<label for="display_one_px_effect">
								<input type="checkbox" name="display_one_px_effect" id="display_one_px_effect" value="1" <?php echo ($cuckoo_style['display_one_px_effect'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e(' Display 1 px border on images, thumbnails, social media icons and other elements.', 'cuckoothemes'); ?>
							</label>
						</p>
					</div>		
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Thumbnail Hover Effect', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
					<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_full">
								<div class="settings_left_title">
									<?php _e('Posts Thumbnail', 'cuckoothemes'); ?>
								</div>
								<select name="postsThumbHover" class="itemHiddenCelect">
									<?php foreach($hoverEffects as $k => $v){ ?>
										<?php if($cuckoo_style['postsThumbHover'] == $k) { ?>
											<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
										<?php } else { ?>
											<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
					<div class="section_settings">					
						<div class="settings_left">
							<div class="settings_left_full">
								<div class="font_description_mini_color">
									<?php _e('Works Thumbnail', 'cuckoothemes'); ?>
								</div>				
								<select name="worksThumbHover" class="itemHiddenCelect">
									<?php foreach($hoverEffects as $k => $v){ ?>
										<?php if($cuckoo_style['worksThumbHover'] == $k) { ?>
											<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
										<?php } else { ?>
											<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="settings_left">
							<div class="settings_left_full">
								<div class="settings_left_title" style="padding-bottom:20px;">
									<?php _e('Works Thumbnail Hover Color', 'cuckoothemes'); ?>
								</div>
								<div class="fonts_attr_bottom">
									<select class="mini_last_select" style="margin-right:16px;" name="worksThumbHoverColorOpacity">
										<?php for($i=100; $i>=0; $i--) :
											if ($cuckoo_style['worksThumbHoverColorOpacity'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor; ?>
									</select>
									<div class="font_description_mini" style="padding-bottom:0;"><?php _e('Opacity', 'cuckoothemes'); ?></div>
								</div>
								<div class="fonts_attr_bottom">				
									<input type="text" id="color-35" value="<?php echo $back = empty($cuckoo_style['worksThumbHoverColor']) ? '#' : $cuckoo_style['worksThumbHoverColor']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-35" style="background-color:<?php echo $cuckoo_style['worksThumbHoverColor']; ?>; top:-3px; position:relative;" />
									<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-35" />
									<div id="color_picker_color-35" class="colorPickerMain"></div>
								</div>
							</div>
						</div>	
						<div class="clear"></div>
					</div>						
					<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_full">
								<div class="settings_left_title">
									<?php _e('Team Member Thumbnail', 'cuckoothemes'); ?>
								</div>
								<select name="teamThumbHover" class="itemHiddenCelect">
									<?php foreach($hoverEffects as $k => $v){ ?>
										<?php if($cuckoo_style['teamThumbHover'] == $k) { ?>
											<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
										<?php } else { ?>
											<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>					
						<div class="settings_left">
							<div class="settings_left_full">
								<div class="settings_left_title">
									<?php _e('Testimonials Thumbnail', 'cuckoothemes'); ?>
								</div>				
								<select name="testimonialsThumbHover" class="itemHiddenCelect">
									<?php foreach($hoverEffects as $k => $v){ ?>
										<?php if($cuckoo_style['testimonialsThumbHover'] == $k) { ?>
											<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
										<?php } else { ?>
											<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Theme Backgrounds', 'cuckoothemes'); ?></span>
				</div>	
				<div style="background:#D6D6D6; height:4px; margin: 0 auto; position: relative; width: 93%;"></div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Posts Background Settings', 'cuckoothemes'); ?></span>
				</div>
<!------ Posts Background Settings ------>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', 'cuckoothemes'); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background','cuckoothemes'); ?></b>
								<select id="parallax-effect-post" name="parallax-effect-post" class="background-select-parallax">
								<?php if($cuckoo_style['parallax-post'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
									<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
									<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image-post">
								<input id="image_url_input-post" class="upload_image-post upLaoding" style="width:82%;" type="text" size="36" name="upload_image-post" value="<?php echo $cuckoo_style['background-posts-image'] ?>" />
								<input id="uploadId-post" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-post" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
									<select class="radio-position-clone bposition" name="background-position-post">
										<?php foreach($color_position as $k=>$v): ?>
											<?php if( $v == $cuckoo_style['background-position-post'] ) : ?>
												<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
											<?php else : ?>
												<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div id="background-setting-reapet-post" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-reapet-post'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-post" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-post" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-post" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-attach-post'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-post" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-post" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-post" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-post"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="parallax-speed-post" class="parallax-speed" name="parallax-speed-post" value="<?php echo $cuckoo_style['parallax-speed-post']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
								<input type="text" id="color-30" value="<?php echo $back = empty($cuckoo_style['background-setting-posts-color']) ? '#' : $cuckoo_style['background-setting-posts-color']; ?>" class="colorInput" name="color_picker_color-30" style="background-color:<?php echo $cuckoo_style['background-setting-posts-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-30" />
								<div id="color_picker_color-30" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Works Background Settings', 'cuckoothemes'); ?></span>
				</div>
<!------ Works Background Settings ------>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', 'cuckoothemes'); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background','cuckoothemes'); ?></b>
								<select id="parallax-effect-work" name="parallax-effect-work" class="background-select-parallax">
								<?php if($cuckoo_style['parallax-work'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
									<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
									<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image-work">
								<input id="image_url_input-work" class="upload_image-work upLaoding" style="width:82%;" type="text" size="36" name="upload_image-work" value="<?php echo $cuckoo_style['background-work-image'] ?>" />
								<input id="uploadId-work" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-work" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>				
									<select class="radio-position-clone bposition" name="background-position-work">
										<?php foreach($color_position as $k=>$v): ?>
											<?php if( $v == $cuckoo_style['background-position-work'] ) : ?>
												<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
											<?php else : ?>
												<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div id="background-setting-reapet-work" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-reapet-work'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-work" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-work" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-work" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-attach-work'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-work" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-work" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-work" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-work"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="parallax-speed-work" class="parallax-speed" name="parallax-speed-work" value="<?php echo $cuckoo_style['parallax-speed-work']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
								<input type="text" id="color-31" value="<?php echo $back = empty($cuckoo_style['background-setting-work-color']) ? '#' : $cuckoo_style['background-setting-work-color']; ?>" class="colorInput" name="color_picker_color-31" style="background-color:<?php echo $cuckoo_style['background-setting-work-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-31" />
								<div id="color_picker_color-31" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Pages Background Settings', 'cuckoothemes'); ?></span>
				</div>
<!------ Pages Background Settings ------->
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', 'cuckoothemes'); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background','cuckoothemes'); ?></b>
								<select id="parallax-effect-page" name="parallax-effect-page" class="background-select-parallax">
								<?php if($cuckoo_style['parallax-page'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
									<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
									<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image-page">
								<input id="image_url_input-page" class="upload_image-page upLaoding" style="width:82%;" type="text" size="36" name="upload_image-page" value="<?php echo $cuckoo_style['background-page-image'] ?>" />
								<input id="uploadId-page" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-page" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
									<select class="radio-position-clone bposition" name="background-position-page">
										<?php foreach($color_position as $k=>$v): ?>
											<?php if( $v == $cuckoo_style['background-position-page'] ) : ?>
												<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
											<?php else : ?>
												<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div id="background-setting-reapet-page" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-reapet-page'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-page" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-page" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-page" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-attach-page'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-page" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-page" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-page" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-page"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="parallax-speed-page" class="parallax-speed" name="parallax-speed-page" value="<?php echo $cuckoo_style['parallax-speed-page']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
								<input type="text" id="color-32" value="<?php echo $back = empty($cuckoo_style['background-setting-page-color']) ? '#' : $cuckoo_style['background-setting-page-color']; ?>" class="colorInput" name="color_picker_color-32" style="background-color:<?php echo $cuckoo_style['background-setting-page-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-32" />
								<div id="color_picker_color-32" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Team Members Page Background Settings', 'cuckoothemes'); ?></span>
				</div>
<!------ Team Members Page Background Settings ------->
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', 'cuckoothemes'); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background','cuckoothemes'); ?></b>
								<select id="parallax-effect-team" name="parallax-effect-team" class="background-select-parallax">
								<?php if($cuckoo_style['parallax-team'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
									<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
									<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image-team">
								<input id="image_url_input-team" class="upload_image-team upLaoding" style="width:82%;" type="text" size="36" name="upload_image-team" value="<?php echo $cuckoo_style['background-team-image'] ?>" />
								<input id="uploadId-team" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-team" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
									<select class="radio-position-clone bposition" name="background-position-team">
										<?php foreach($color_position as $k=>$v): ?>
											<?php if( $v == $cuckoo_style['background-position-team'] ) : ?>
												<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
											<?php else : ?>
												<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div id="background-setting-reapet-team" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-reapet-team'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-team" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-team" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-team" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-attach-team'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-team" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-team" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-team" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-team"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="parallax-speed-team" class="parallax-speed" name="parallax-speed-team" value="<?php echo $cuckoo_style['parallax-speed-team']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
								<input type="text" id="color-33" value="<?php echo $back = empty($cuckoo_style['background-setting-team-color']) ? '#' : $cuckoo_style['background-setting-team-color']; ?>" class="colorInput" name="color_picker_color-33" style="background-color:<?php echo $cuckoo_style['background-setting-team-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-33" />
								<div id="color_picker_color-33" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Testimonials Background Settings', 'cuckoothemes'); ?></span>
				</div>
<!------ Testimonials Background Settings ------->
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', 'cuckoothemes'); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background','cuckoothemes'); ?></b>
								<select id="parallax-effect-testimonial" name="parallax-effect-testimonial" class="background-select-parallax">
								<?php if($cuckoo_style['parallax-testimonial'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
									<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
									<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image-testimonial">
								<input id="image_url_input-testimonial" class="upload_image-testimonial upLaoding" style="width:82%;" type="text" size="36" name="upload_image-testimonial" value="<?php echo $cuckoo_style['background-testimonial-image'] ?>" />
								<input id="uploadId-testimonial" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-testimonial" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
									<select class="radio-position-clone bposition" name="background-position-testimonial">
										<?php foreach($color_position as $k=>$v): ?>
											<?php if( $v == $cuckoo_style['background-position-testimonial'] ) : ?>
												<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
											<?php else : ?>
												<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div id="background-setting-reapet-testimonial" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-reapet-testimonial'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-testimonial" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-testimonial" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-testimonial" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-attach-testimonial'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-testimonial" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-testimonial" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-testimonial" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-testimonial"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="parallax-speed-testimonial" class="parallax-speed" name="parallax-speed-testimonial" value="<?php echo $cuckoo_style['parallax-speed-testimonial']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
								<input type="text" id="color-38" value="<?php echo $back = empty($cuckoo_style['background-setting-testimonial-color']) ? '#' : $cuckoo_style['background-setting-testimonial-color']; ?>" class="colorInput" name="color_picker_color-38" style="background-color:<?php echo $cuckoo_style['background-setting-testimonial-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-38" />
								<div id="color_picker_color-38" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Search Page Background Settings', 'cuckoothemes'); ?></span>
				</div>
<!------ Search Page Background Settings ------>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', 'cuckoothemes'); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background','cuckoothemes'); ?></b>
								<select id="parallax-effect-search" name="parallax-effect-search" class="background-select-parallax">
								<?php if($cuckoo_style['parallax-search'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
									<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
									<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image-search">
								<input id="image_url_input-search" class="upload_image-search upLaoding" style="width:82%;" type="text" size="36" name="upload_image-search" value="<?php echo $cuckoo_style['background-search-image'] ?>" />
								<input id="uploadId-search" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-search" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
									<select class="radio-position-clone bposition" name="background-position-search">
										<?php foreach($color_position as $k=>$v): ?>
											<?php if( $v == $cuckoo_style['background-position-search'] ) : ?>
												<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
											<?php else : ?>
												<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div id="background-setting-reapet-search" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-reapet-search'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-search" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-search" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-search" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-attach-search'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-search" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-search" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-search" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-search"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="parallax-speed-search" class="parallax-speed" name="parallax-speed-search" value="<?php echo $cuckoo_style['parallax-speed-search']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
								<input type="text" id="color-search" value="<?php echo $back = empty($cuckoo_style['background-setting-search-color']) ? '#' : $cuckoo_style['background-setting-search-color']; ?>" class="colorInput" name="color_picker_color-search" style="background-color:<?php echo $cuckoo_style['background-setting-search-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-search" />
								<div id="color_picker_color-search" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Related Posts Background Settings', 'cuckoothemes'); ?></span>
				</div>
<!------ Related Posts Background Settings ------->	
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', 'cuckoothemes'); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background','cuckoothemes'); ?></b>
								<select id="parallax-effect-3" name="parallax-effect-3" class="background-select-parallax">
								<?php if($cuckoo_style['parallax-related-post'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
									<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
									<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image3">
								<input id="image_url_input-3" class="upload_image-3 upLaoding" style="width:82%;" type="text" size="36" name="upload_image3" value="<?php echo $cuckoo_style['related-posts-image'] ?>" />
								<input id="uploadId-3" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-3" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
									<select class="radio-position-clone bposition" name="related-posts-position">
										<?php foreach($color_position as $k=>$v): ?>
											<?php if( $v == $cuckoo_style['related-posts-position'] ) : ?>
												<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
											<?php else : ?>
												<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div id="background-setting-reapet-3" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['related-posts-repeat'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="related-posts-repeat" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="related-posts-repeat" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-3" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['related-posts-attachment'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="related-posts-attachment" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="related-posts-attachment" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-3" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-3"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="parallax-speed-3" class="parallax-speed" name="parallax-speed-3" value="<?php echo $cuckoo_style['parallax-speed-related-post']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
								<input type="text" id="color-28" value="<?php echo $back = empty($cuckoo_style['related-posts-color']) ? '#' : $cuckoo_style['related-posts-color']; ?>" class="colorInput" name="color_picker_color-28" style="background-color:<?php echo $cuckoo_style['related-posts-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-28" />
								<div id="color_picker_color-28" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Related Works Background Settings', 'cuckoothemes'); ?></span>
				</div>
<!------ Related Works Background Settings ------->
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', 'cuckoothemes'); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background','cuckoothemes'); ?></b>
								<select id="parallax-effect-2" name="parallax-effect-2" class="background-select-parallax">
								<?php if($cuckoo_style['parallax-related-works'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
									<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
									<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image2">
								<input id="image_url_input-2" class="upload_image-2 upLaoding" style="width:82%;" type="text" size="36" name="upload_image2" value="<?php echo $cuckoo_style['related-works-image'] ?>" />
								<input id="uploadId-2" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-2" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
									<select class="radio-position-clone bposition" name="related-works-position">
										<?php foreach($color_position as $k=>$v): ?>
											<?php if( $v == $cuckoo_style['related-works-position'] ) : ?>
												<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
											<?php else : ?>
												<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div id="background-setting-reapet-2" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['related-works-repeat'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="related-works-repeat" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="related-works-repeat" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-2" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['related-works-attachment'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="related-works-attachment" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="related-works-attachment" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-2" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-2"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="parallax-speed-2" class="parallax-speed" name="parallax-speed-2" value="<?php echo $cuckoo_style['parallax-speed-related-works']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
								<input type="text" id="color-27" value="<?php echo $back = empty($cuckoo_style['related-works-color']) ? '#' : $cuckoo_style['related-works-color']; ?>" class="colorInput" name="color_picker_color-27" style="background-color:<?php echo $cuckoo_style['related-works-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-27" />
								<div id="color_picker_color-27" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Related Team Members Background Settings', 'cuckoothemes'); ?></span>
				</div>
<!------ Related Team Members Background Settings ------->
				<div class="active_settings" style="display: block;">	
					<div class="section_settings" style="border-bottom:0;">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', 'cuckoothemes'); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background','cuckoothemes'); ?></b>
								<select id="parallax-effect-Rteam" name="parallax-effect-Rteam" class="background-select-parallax">
								<?php if($cuckoo_style['parallax-Rteam'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
									<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
									<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image-Rteam">
								<input id="image_url_input-Rteam" class="upload_image-Rteam upLaoding" style="width:82%;" type="text" size="36" name="upload_image-Rteam" value="<?php echo $cuckoo_style['background-Rteam-image'] ?>" />
								<input id="uploadId-Rteam" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-Rteam" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
									<select class="radio-position-clone bposition" name="background-position-Rteam">
										<?php foreach($color_position as $k=>$v): ?>
											<?php if( $v == $cuckoo_style['background-position-Rteam'] ) : ?>
												<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
											<?php else : ?>
												<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div id="background-setting-reapet-Rteam" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-reapet-Rteam'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-Rteam" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-Rteam" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-Rteam" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-setting-attach-Rteam'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-Rteam" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="background-setting-attach-Rteam" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-Rteam" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-Rteam"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="parallax-speed-Rteam" class="parallax-speed" name="parallax-speed-Rteam" value="<?php echo $cuckoo_style['parallax-speed-Rteam']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
								<input type="text" id="color-34" value="<?php echo $back = empty($cuckoo_style['background-setting-Rteam-color']) ? '#' : $cuckoo_style['background-setting-Rteam-color']; ?>" class="colorInput" name="color_picker_color-34" style="background-color:<?php echo $cuckoo_style['background-setting-Rteam-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-34" />
								<div id="color_picker_color-34" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>		
			</div>
			<p style="display:inline;">
				<input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" />
			</p>
			<?php cuckoo_framework_footer(); ?>
		</form>
</section>