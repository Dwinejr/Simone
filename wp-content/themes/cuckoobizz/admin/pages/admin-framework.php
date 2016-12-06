<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );

$effect_lists_array = array(
	'elementsQuicklyLeft' => 'Slide Left',
	'elementOpacity' => 'Fade',
	'default' => 'Default'
);
?>
<section id="main_content">
<?php
if(isset($_REQUEST['all'])){
	// wpml
	if( function_exists('icl_register_string') ) :
		icl_register_string(THEMENAME.' Related Works Unit', 'Title', esc_attr( $_POST['related_work_title'] ));
		icl_register_string(THEMENAME.' Related Posts Unit', 'Title', esc_attr( $_POST['related_post_title'] ));
		icl_register_string(THEMENAME.' Related Team Unit', 'Title', esc_attr( $_POST['related_team_title'] ));
	endif;
	$cuckoo_settings = array(
		'responsive' => esc_attr( $_POST['on_off_button'] ) ,
		'smooth' => esc_attr( $_POST['smooth'] ) ,
		'related_works' => esc_attr( $_POST['related_works'] ) ,
		'related_work_title' => esc_attr( $_POST['related_work_title'] ),
		'related_posts' => esc_attr( $_POST['related_posts'] ),
		'BlogElementsEffects' => esc_attr( $_POST['BlogElementsEffects'] ),
		'related_post_title' => esc_attr( $_POST['related_post_title'] ),
		'related_team' => esc_attr( $_POST['related_team'] ),
		'TeamElementsEffects' => esc_attr( $_POST['TeamElementsEffects'] ),
		'related_team_title' => esc_attr( $_POST['related_team_title'] ),
		'favicon_url' => $favicon_url = (esc_attr( $_POST['upload_image1'] ) == "") ? THEMEICONE : esc_attr( $_POST['upload_image1'] ),
		'tracking_code' => cuckoo_get_value($_POST['tracking_code'])
	);
	update_option( THEMEPREFIX . "_general_settings" , $cuckoo_settings );
?>
	<div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
<?php
}
?>
	<?php cuckoo_framework_head( __('General Settings', 'cuckoothemes') ); ?>
	<form id="formId" method="POST" action="">
		<div id="general_settings">
			<!-- Responsive config's ------------------------->
			<div class="general_title_active">
				<span class="float_left"><?php _e('Responsivity Settings', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<span style="font-size:15px; font-weight:bold; color:#333333; padding-right:65px;">
						<?php _e('Activate Responsivity', 'cuckoothemes'); ?>
					</span>
					<?php if($cuckoo_settings['responsive'] == "Yes"){ ?>
						<input class="slider_front_page_active" type="button" name="on_off" value="<?php _e('Yes', 'cuckoothemes'); ?>" style="margin-right:20px;" />
						<input class="slider_front_page" type="button" name="on_off" value="<?php _e('No', 'cuckoothemes'); ?>" />
						<input type="hidden" name="on_off_button" value="Yes" />
					<?php }else{ ?>
						<input class="slider_front_page" type="button" name="on_off" value="<?php _e('Yes', 'cuckoothemes'); ?>" style="margin-right:25px;" />
						<input class="slider_front_page_active" type="button" name="on_off" value="<?php _e('No', 'cuckoothemes'); ?>" />
						<input type="hidden" name="on_off_button" value="No" />
					<?php } ?>
					<div class="clear"></div>
				</div>
			</div>			
			<!-- Smooth Scroll Effect config's ------------------------->
			<div class="general_title_active">
				<span class="float_left"><?php _e('Smooth Scroll Effect', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<div class="contact-checkbox">
						<label for="smooth">
						<?php _e('Smooth Scroll is Activated', 'cuckoothemes'); ?>  <input type="checkbox" style="left: 10px; position: relative;" id="smooth" name="smooth" value="1" <?php echo ($cuckoo_settings['smooth'] == 1) ? 'checked="checked"' : ''; ?> />
						</label>
					</div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Related Content', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">					
				<div class="section_settings">
					<!-- Theme Related Posts config's -------------------------------->
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Related Posts', 'cuckoothemes'); ?>
						</div>
						<?php switch($cuckoo_settings['related_posts'])
						{
							case 'display' : ?>
								<select name="related_posts">
									<option value="display"><?php _e('Display Related Posts', 'cuckoothemes'); ?></option>
									<option value="hide"><?php _e('Hide Related Posts', 'cuckoothemes'); ?></option>
								</select>
							<?php break;
							case 'hide' : ?>
								<select name="related_posts">
									<option value="hide"><?php _e('Hide Related Posts', 'cuckoothemes'); ?></option>
									<option value="display"><?php _e('Display Related Posts', 'cuckoothemes'); ?></option>
								</select>
							<?php break;
						} ?>
						<div class="desc_bottom">
							<?php _e('Related posts will be displayed below each post in a single post page.', 'cuckoothemes'); ?>
						</div>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Enter a Title for Related Posts Unit', 'cuckoothemes'); ?>
						</div>
						<input type="text" name="related_post_title" class="itemInputText" value="<?php echo $cuckoo_settings['related_post_title']; ?>" />
					</div>
					<div class="clear"></div>
					<div class="settings_left" style="float:none; padding-top:25px;">
						<div class="settings_left_full">
							<div class="settings_left_title"><?php _e("Choose Animation Effect",'cuckoothemes'); ?></div>
							<select name="BlogElementsEffects" class="itemHiddenCelect testimEffects">
								<?php foreach($effect_lists_array as $k => $v){ ?>
									<?php if($cuckoo_settings['BlogElementsEffects'] == $k) { ?>
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
					<!-- Theme Related Works config's -------------------------------->
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Related Works', 'cuckoothemes'); ?>
						</div>
						<?php switch($cuckoo_settings['related_works'])
						{
							case 'display' : ?>
								<select name="related_works">
									<option value="display"><?php _e('Display Related Works', 'cuckoothemes'); ?></option>
									<option value="hide"><?php _e('Hide Related Works', 'cuckoothemes'); ?></option>
								</select>
							<?php break;
							case 'hide' : ?>
								<select name="related_works">
									<option value="hide"><?php _e('Hide Related Works', 'cuckoothemes'); ?></option>
									<option value="display"><?php _e('Display Related Works', 'cuckoothemes'); ?></option>
								</select>
							<?php break;
						} ?>
						<div class="desc_bottom">
							<?php _e('Related Works will be displayed below each work in a single work page.', 'cuckoothemes'); ?>
						</div>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Enter a Title for Related Works Unit', 'cuckoothemes'); ?>
						</div>
						<input type="text" name="related_work_title" class="itemInputText" value="<?php echo $cuckoo_settings['related_work_title']; ?>" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="section_settings">
					<!-- Theme Related Team config's -------------------------------->
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Team Members', 'cuckoothemes'); ?>
						</div>
						<?php switch($cuckoo_settings['related_team'])
						{
							case 'display' : ?>
								<select name="related_team">
									<option value="display"><?php _e('Display Team Members', 'cuckoothemes'); ?></option>
									<option value="hide"><?php _e('Hide Team Members', 'cuckoothemes'); ?></option>
								</select>
							<?php break;
							default : ?>
								<select name="related_team">
									<option value="hide"><?php _e('Hide Team Members', 'cuckoothemes'); ?></option>
									<option value="display"><?php _e('Display Team Members', 'cuckoothemes'); ?></option>
								</select>
							<?php break;
						} ?>
						<div class="desc_bottom">
							<?php _e('Team Members will be displayed below each team member page in a single team member page.', 'cuckoothemes'); ?>
						</div>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Enter a Title for Team Members Unit', 'cuckoothemes'); ?>
						</div>
						<input type="text" name="related_team_title" class="itemInputText" value="<?php echo $cuckoo_settings['related_team_title']; ?>" />
					</div>
					<div class="clear"></div>
					<div class="settings_left" style="float:none; padding-top:25px;">
						<div class="settings_left_full">
							<div class="settings_left_title"><?php _e("Choose Animation Effect",'cuckoothemes'); ?></div>
							<select name="TeamElementsEffects" class="itemHiddenCelect testimEffects">
								<?php foreach($effect_lists_array as $k => $v){ ?>
									<?php if($cuckoo_settings['TeamElementsEffects'] == $k) { ?>
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
			<!-- Favicon config's ------------------------->
			<div class="general_title_active">
				<span class="float_left"><?php _e('Favicon', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<p style="margin:12px 0;">
						<th scope="row"></th>
						<td>
							<label for="upload_image1">
								<input id="image_url_input1" class="upload_image1" type="text" size="36" name="upload_image1" style="width:80%; margin-right:4%;" value="<?php echo $cuckoo_settings['favicon_url']; ?>" />
								<input id="uploadId1" class="upload_button_new button" type="button" value="Upload Image" style="float:none; width:15%" />
							</label>
						</td>
					</p>
					<div class="desc_bottom">
						<?php _e("Upload a 16 x 16 px *.png / *.gif / *.ico image that will be used as your website's favicon.", 'cuckoothemes'); ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Tracking Code', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block; ">	
				<div class="section_settings" style="border:none;">
					<div class="settings_left">
						<textarea type="text" name="tracking_code"><?php echo $cuckoo_settings['tracking_code']; ?></textarea>
					</div>
					<div class="settings_left">
						<?php _e('Enter your Google Analytics (or other) tracking code here and get detailed statistics about the visitors of your website.', 'cuckoothemes'); ?>
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