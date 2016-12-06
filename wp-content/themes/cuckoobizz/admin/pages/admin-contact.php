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
** Name : contact settings
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

$selectMap = array(
	'Default Map',
	'Map Shortcode',
	'Hide Map',
);

$cuckoo_contact = get_option( THEMEPREFIX . "_contact_settings" );
	?>
<section id="main_content">
	<?php
	if(isset($_REQUEST['all'])){
	
	//wpml
	if( function_exists('icl_register_string') ) :
		icl_register_string(THEMENAME.' Contact Information', 'Contact Unit Title', esc_attr( $_POST['contact_title'] ));
		icl_register_string(THEMENAME.' Contact Information', 'Address', esc_textarea( trim($_POST['contact_address']) ));
		icl_register_string(THEMENAME.' Contact Information', 'Contact Details', esc_textarea( trim($_POST['contact_details']) ));
		icl_register_string(THEMENAME.' Contact Information', 'Primary Email Address', esc_attr( $_POST['contact_primary_email'] ));
		icl_register_string(THEMENAME.' Contact Information', 'Contact Form Email Address', esc_attr( $_POST['contact_form_email'] ));
		icl_register_string(THEMENAME.' Contact Information', 'Website Address', esc_attr( $_POST['contact_web'] ));
		icl_register_string(THEMENAME.' Contact Information', 'Welcome Message', esc_attr( $_POST['welcome_message'] ));
		icl_register_string(THEMENAME.' Contact Information', 'Your Address Google Map', esc_attr( $_POST['google_properties'] ));
	endif;
	/* all names settings */
	$cuckoo_contact = array( 
	'displayInHomepage' 	=> esc_attr( ($_POST['displayInHomepage']) ) , 
	'DisplayinLanding' 		=> esc_attr( ($_POST['DisplayinLanding']) ) , 
	'contact_title' 		=> esc_attr( ($_POST['contact_title']) ) , 
	'contact_address' 		=> cuckoo_get_value( trim($_POST['contact_address']) ) ,
	'contact_details' 		=> cuckoo_get_value( trim($_POST['contact_details']) ) ,
	'welcome_message' 		=> cuckoo_get_value( trim($_POST['welcome_message']) ) ,
	'contact_primary_email'	=> esc_attr( $_POST['contact_primary_email'] ) ,
	'contact_form_email'	=> esc_attr( $_POST['contact_form_email'] ) ,
	'contact_web'			=> esc_attr( $_POST['contact_web'] ) ,
	'display_icon'			=> esc_attr( $_POST['on_off_button'] ) ,
	'google_properties'		=> esc_attr( $_POST['google_properties'] ) ,
	'google_zoom_level'		=> $zoom = ( esc_attr( $_POST['google_zoom_level'] ) == null || !is_numeric(esc_attr( $_POST['google_zoom_level'] ))  ? 15 : esc_attr( $_POST['google_zoom_level'] ) ),
	'parallax'				=> esc_attr( $_POST['parallax-effect-1'] ) ,
	'img_url'				=> esc_attr( $_POST['upload_image1'] ) ,
	'imgPosition'			=> esc_attr( $_POST['radio_position-1'] ) ,
	'imgRepeat'				=> esc_attr( $_POST['radio_repeat-1'] ) ,
	'imgAttachment'			=> esc_attr( $_POST['radio_attachment-1'] ) ,
	'parallax-speed'		=> $speed = ( esc_attr($_POST['parallax-speed-1']) == '' ? 10 : esc_attr($_POST['parallax-speed-1'])) ,
	'backgroundColor'		=> esc_attr( $_POST['color_picker_color-1'] ) ,
	/* Since 1.3 */
	'google_shoose'			=> esc_attr( $_POST['google_shoose'] ),
	'google_new_shortcode'	=> cuckoo_get_value( $_POST['google_new_shortcode'] ),
	);
	update_option( THEMEPREFIX . "_contact_settings" , $cuckoo_contact );
	?>
		<div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
	<?php
	}
	?>
		<?php cuckoo_framework_head( __('Contact Information', 'cuckoothemes') ); ?>
		<form id="formId" method="POST" action="">
			<div id="general_settings">
				<div class="general_title_active">
						<span class="float_left"><?php _e('Contact Unit Display Settings', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
					<div class="section_settings">
						<div class="settings_left">
							<div class="contact-checkbox">
								<input type="checkbox" name="displayInHomepage" value="1" <?php echo ($cuckoo_contact['displayInHomepage'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e('Display in Homepage', 'cuckoothemes'); ?><br />
							</div>
							<div class="contact-checkbox">
								<input type="checkbox" name="DisplayinLanding" value="1" <?php echo ($cuckoo_contact['DisplayinLanding'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e('Display in Landing Pages', 'cuckoothemes'); ?>
							</div>
							<span style="padding-top:10px; display:block;">
								<?php _e("Check boxes if you want Contact Unit to be displayed in Homepage and in Landing Pages.", 'cuckoothemes'); ?>
							</span>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="general_title_active">
						<span class="float_left"><?php _e('Contact Information', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
					<!-- Address area -->
					<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Address', 'cuckoothemes'); ?>
							</div>
							<textarea type="text" name="contact_address"><?php echo $cuckoo_contact['contact_address']; ?></textarea>
							<span style="padding-top:10px; display:block;"><?php _e('Enter your Address. It will be displayed in the Contact Unit of Homepage and Landing Pages.', 'cuckoothemes'); ?></span>
						</div>
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Contact Details', 'cuckoothemes'); ?>
							</div>
							<textarea type="text" name="contact_details"><?php echo $cuckoo_contact['contact_details']; ?></textarea>
							<span style="padding-top:10px; display:block;"><?php _e('Enter your Phone, Mobile Phone and Fax Numbers. It will be displayed in the Contact Unit.', 'cuckoothemes'); ?></span>
						</div>
						<div class="clear"></div>
					</div>
					<!-- Email area -->
					<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Primary Email Address', 'cuckoothemes'); ?>
							</div>
							<input type="text" name="contact_primary_email" class="itemInputText" value="<?php echo $cuckoo_contact['contact_primary_email']; ?>" />
							<span style="padding-top:10px; display:block;">
								<?php _e("Email address will be displayed in Contact Unit as your primary contact.", 'cuckoothemes'); ?>
							</span>
						</div>
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Contact Form Email Address', 'cuckoothemes'); ?>
							</div>
							<input type="text" name="contact_form_email" class="itemInputText" value="<?php echo $cuckoo_contact['contact_form_email']; ?>" />
							<span style="padding-top:10px; display:block;">
								<?php _e("All messages sent using contact form in Contact Unit will be delivered to this email address. 
								If left blank, WordPress administrator's email address will be used.", 'cuckoothemes'); ?>
							</span>
						</div>
						<div class="clear"></div>
					</div>
					<!-- WEB area -->
					<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Website Address', 'cuckoothemes'); ?>
							</div>
							<input type="text" name="contact_web" class="itemInputText" value="<?php echo $cuckoo_contact['contact_web']; ?>" />
							<span style="padding-top:10px; display:block;">
								<?php _e("Website address will be displayed in Contact Unit.", 'cuckoothemes'); ?>
							</span>
						</div>
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Welcome Message', 'cuckoothemes'); ?>
							</div>
							<textarea type="text" name="welcome_message"><?php echo $cuckoo_contact['welcome_message']; ?></textarea>
							<span style="padding-top:10px; display:block;"><?php _e('If you want you can enter welcome message. Remember that it will be displayed only when background map is turned off.', 'cuckoothemes'); ?></span>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- Social media area -->
				<div class="general_title_active">
						<span class="float_left"><?php _e('Social Media', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<span style="font-size:15px; font-weight:bold; color:#333333; padding-right:65px;">
							<?php _e('Display Social Media Icons?', 'cuckoothemes'); ?>
						</span>
						<?php
						if($cuckoo_contact['display_icon'] == "Yes"){
						?>
							<input class="slider_front_page_active" type="button" name="on_off" value="<?php _e('Yes', 'cuckoothemes'); ?>" style="margin-right:20px;" />
							<input class="slider_front_page" type="button" name="on_off" value="<?php _e('No', 'cuckoothemes'); ?>" />
							<input type="hidden" name="on_off_button" value="Yes" />
						<?php
						}else{ 
						?>
							<input class="slider_front_page" type="button" name="on_off" value="<?php _e('Yes', 'cuckoothemes'); ?>" style="margin-right:25px;" />
							<input class="slider_front_page_active" type="button" name="on_off" value="<?php _e('No', 'cuckoothemes'); ?>" />
							<input type="hidden" name="on_off_button" value="No" />
						<?php
						}
						?>
						<div class="clear"></div>
						<div class="desc_bottom">
							<?php _e("Social Media Icons will be displayed in Contact Unit below contact information in the same sequence as they are set in Social Media section of the framework.", 'cuckoothemes'); ?>
						</div>
					</div>
				</div>
				<!-- Google map area -->
				<div class="general_title_active">
					<span class="float_left"><?php _e('Google Map', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
					<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Choose Map Source', THEMENAME); ?>
							</div>
							<select id="google_shoose" name="google_shoose" class="itemInputText google_shoose">
								<?php foreach($selectMap as $k=>$v) : ?>
									<?php if($k == $cuckoo_contact['google_shoose']) : ?>
										<option selected value="<?php echo $k; ?>"><?php echo $v; ?></option>
									<?php else : ?>
										<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
									<?php endif ?>
								<?php endforeach; ?>
							</select>
							<span style="padding-top:10px; display:block;">
								<?php _e("Choose Map Source for your site's Contact Unit.", THEMENAME); ?>
							</span>
						</div>
						<div class="settings_left shortcode_map_new">
							<div class="settings_left_title">
								<?php _e('Enter Map Shortcode', THEMENAME); ?>
							</div>
							<input type="text" name="google_new_shortcode"  class="itemInputText" value="<?php echo $cuckoo_contact['google_new_shortcode']; ?>" />
							<span style="padding-top:10px; display:block;">
								<?php _e('Enter Map Shortcode. It will be used for embedding the map in Contact Unit. Example: [cuckoo_map id="1"]', THEMENAME); ?>
							</span>
						</div>
						<div class="clear"></div>
					</div>					
					<div class="section_settings show_iframe">
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Your Address', THEMENAME); ?>
							</div>
							<input type="text" name="google_properties" class="itemInputText" value="<?php echo $cuckoo_contact['google_properties']; ?>" />
							<span style="padding-top:10px; display:block;">
								<?php _e('Enter your address, and Google Map will be displayed in the Contact Unit. Example: "Minster Court, London SE1 7JB, United Kingdom".', THEMENAME); ?>
							</span>
						</div>
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Set Default Zoom Level', THEMENAME); ?>
							</div>
							<input type="text" name="google_zoom_level"  class="itemInputText" value="<?php echo $cuckoo_contact['google_zoom_level']; ?>" />
							<span style="padding-top:10px; display:block;">
								<?php _e("Recommended value ranges from 5 to 15. If left blank, default value will be set on 15.", THEMENAME); ?>
							</span>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- Google map area -->
				<div class="general_title_active">
					<span class="float_left"><?php _e('Contact Unit Background', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
					<div class="section_settings" style="border:none;">
					<?php /* Background control */ ?>
						<div id="background-settings-1" class="background-setting" style="border-top:0 none; padding-top:0; margin-top:0;">
							<div class="titleBackground">
								<b><?php _e('Background','cuckoothemes'); ?></b>
								<select id="parallax-effect-1" name="parallax-effect-1" class="background-select-parallax">
									<?php if($cuckoo_contact['parallax'] == 1) :?>
										<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
										<option value="0"><?php _e('Default Background','cuckoothemes'); ?></option>
									<?php else: ?>
										<option value="0" selected><?php _e('Default Background','cuckoothemes'); ?></option>
										<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
									<?php endif; ?>
								</select>
							</div>
								<label for="upload_image1">
									<input id="image_url_input1" class="upload_image1 upLaoding" style="width:82%;" type="text" size="36" name="upload_image1" value="<?php echo $cuckoo_contact['img_url'] ?>" />
									<input id="uploadId1" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
								</label>
							<div class="col-1 float_left" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-1" class="radio_block parallax-settigs back-posi">
									<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
									<select class="radio-position-clone bposition" name="radio_position-1">
										<?php foreach($color_position as $k=>$v): ?>
											<?php if( $v == $cuckoo_contact['imgPosition']  ) : ?>
												<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
											<?php else : ?>
												<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div id="background-setting-reapet-1" class="radio_block parallax-settigs back-repeat">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_contact['imgRepeat'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="radio_repeat-1" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="radio_repeat-1" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-1" class="radio_block parallax-settigs back-attach">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_contact['imgAttachment'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="radio_attachment-1" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="radio_attachment-1" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-1" class="radio_block parallax-settigs back-speed" style="padding:15px 0 0;">
									<label for="parallax-speed-1"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
									</label>
									<input type="text" id="parallax-speed-1" class="parallax-speed" name="parallax-speed-1" value="<?php echo $cuckoo_contact['parallax-speed']; ?>" />
								</div>
							</div>
							<div class="col-1 last float_right" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
								<input type="text" id="color-1" value="<?php echo $back = empty($cuckoo_contact['backgroundColor']) ? '#' : $cuckoo_contact['backgroundColor']; ?>" class="colorInput" name="color_picker_color-1" style="background-color:<?php echo $cuckoo_contact['backgroundColor']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-1" />
								<div id="color_picker_color-1" class="colorPickerMain"></div>
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