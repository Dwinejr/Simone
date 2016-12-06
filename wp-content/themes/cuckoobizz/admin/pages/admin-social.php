<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 **************/

$cuckoo_social = get_option( THEMEPREFIX . "_social_settings" );
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
?>
<section id="main_content">
<?php
if(isset($_REQUEST['all']))
{
	$r = 1;
	$items = $_POST['items'];
	$elements = array();
	$ItemsAll = array();
	$all = array();
	$items_array = explode(',', $items);
	
	foreach($items_array as $key=>$item) 
	{ 
		$items = substr($item,4);
		if($items != '')
		{
			$ItemsAll[$key] = $items;
			$keys = $key+$r;
			$socialId = array( 'eile' => $keys , 'id' => $items );
			array_push($elements, $socialId);
		}
	}
	foreach($elements as $key=>$val)
	{
		if( $val['id'] == 1 )
		{
			$ele = array( $key => array( 'id' => '1', 'name' => 'Facebook', 'class' => 'facebook' , 'link' => '' , 'description' => 'Enter your Facebook URL.', 'values' => $_POST['Facebook'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 2 )
		{
			$ele = array( $key => array( 'id' => '2' , 'name' => 'Twitter', 'class' => 'twitter' , 'link' => '' , 'description' => 'Enter your Twitter URL.', 'values' => $_POST['Twitter'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 3 )
		{
			$ele = array( $key => array( 'id' => '3', 'name' => 'Google+', 'class' => 'google' , 'link' => '' , 'description' => 'Enter your Google+ URL.', 'values' => $_POST['Google+'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 4 )
		{
			$ele = array( $key => array( 'id' => '4', 'name' => 'Flickr', 'class' => 'flickr' , 'link' => '' , 'description' => 'Enter your Flickr URL.', 'values' => $_POST['Flickr'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 5 )
		{
			$ele = array( $key => array( 'id' => '5', 'name' => 'Instagram', 'class' => 'instagram' , 'link' => '' , 'description' => 'Enter your Instagram URL.', 'values' => $_POST['Instagram'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 6 )
		{
			$ele = array( $key => array( 'id' => '6', 'name' => 'Pinterest', 'class' => 'pinterest' , 'link' => '' , 'description' => 'Enter your Pinterest URL.', 'values' => $_POST['Pinterest'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 7 )
		{
			$ele = array( $key => array( 'id' => '7', 'name' => 'Dribbble', 'class' => 'dribble' , 'link' => '' , 'description' => 'Enter your Dribbble URL.', 'values' => $_POST['Dribbble'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 8 )
		{
			$ele = array( $key => array( 'id' => '8', 'name' => 'Behance', 'class' => 'behance' , 'link' => '' , 'description' => 'Enter your Behance URL.', 'values' => $_POST['Behance'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 9 )
		{
			$ele = array( $key => array( 'id' => '9', 'name' => 'YouTube', 'class' => 'youtube' , 'link' => '' , 'description' => 'Enter your YouTube URL.', 'values' => $_POST['YouTube'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 10 )
		{
			$ele = array( $key => array( 'id' => '10', 'name' => 'Vimeo', 'class' => 'vimeo' , 'link' => '' , 'description' => 'Enter your Vimeo URL.', 'values' => $_POST['Vimeo'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 11 )
		{
			$ele = array( $key => array( 'id' => '11', 'name' => 'Linkedin', 'class' => 'linkendin' , 'link' => '' , 'description' => 'Enter your Linkedin URL.', 'values' => $_POST['Linkedin'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 12 )
		{
			$ele = array( $key => array( 'id' => '12', 'name' => 'Email', 'class' => 'email' , 'link' => 'mailto:' , 'description' => 'Enter your contact Email Address.', 'values' => $_POST['Email'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 13 )
		{
			$ele = array( $key => array( 'id' => '13', 'name' => 'RSS', 'class' => 'rss' , 'link' => '' , 'description' => 'Enter the RSS feed URL.', 'values' => $_POST['RSS'] ));
			array_push($all, $ele);
		}
	}
	$settingsContent = array( 
		'post' => array(
			'post-linkedin' 		=> esc_attr( $_POST['post-linkedin'] ),
			'post-facebook' 		=> esc_attr( $_POST['post-facebook'] ),
			'post-facebook-id' 		=> esc_attr( $_POST['post-facebook-id'] ),
			'post-twitter' 			=> esc_attr( $_POST['post-twitter'] ),
			'post-twitter-share' 	=> esc_attr( $_POST['post-twitter-share'] ),
			'post-google' 			=> esc_attr( $_POST['post-google'] ),
			'post-pinterest' 		=> esc_attr( $_POST['post-pinterest'] ),
		), 
		'work' => array(
			'work-linkedin' 		=> esc_attr( $_POST['work-linkedin'] ),
			'work-facebook' 		=> esc_attr( $_POST['work-facebook'] ),
			'work-facebook-id' 		=> esc_attr( $_POST['work-facebook-id'] ),
			'work-twitter' 			=> esc_attr( $_POST['work-twitter'] ),
			'work-twitter-share' 	=> esc_attr( $_POST['work-twitter-share'] ),
			'work-google' 			=> esc_attr( $_POST['work-google'] ),
			'work-pinterest' 		=> esc_attr( $_POST['work-pinterest'] ),
		),
		'another' => array(
			'display_media_search' => esc_attr( $_POST['display_media_search'] )
		),
		'background' => array(
			'background-social-image' 		=> esc_attr( ($_POST['upload_image-social']) ) , 
			'background-position-social' 		=> esc_attr( ($_POST['background-position-social']) ) ,
			'background-setting-attach-social'=> esc_attr( ($_POST['background-setting-attach-social']) ) , 
			'background-setting-reapet-social'=> esc_attr( ($_POST['background-setting-reapet-social']) ) , 
			'background-setting-social-color'=> esc_attr( ($_POST['color_picker_color-32']) ) ,
			'parallax-social' 				=> esc_attr($_POST['parallax-effect-social']), 
			'parallax-speed-social' 			=> $speed = ( esc_attr($_POST['parallax-speed-social']) == '' ? 10 : esc_attr($_POST['parallax-speed-social'])),
		)
	);
	
	$cuckoo_social = array( 'elements' => $all , 'settings' => $settingsContent );
	update_option( THEMEPREFIX . "_social_settings" , $cuckoo_social );
?>
	<div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
<?php
}
?>
	<?php cuckoo_framework_head( __('Social Media', 'cuckoothemes') ); ?>
	<script type="text/javascript">
		document.onselectstart = function () { return false; }
	</script>
	<form id="formId" method="POST" action="">
		<div id="general_settings">
			<div class="general_title_active">
				<span class="float_left"><?php _e('Landing Page Social Media Unit', 'cuckoothemes'); ?></span>
				<label class="float_right" style="font-size:12px; font-weight:normal;" for="display_media_search">
						<input type="checkbox" name="display_media_search" id="display_media_search" value="1" <?php echo ($cuckoo_social['settings']['another']['display_media_search'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e(' Display Social Media Unit in Landing Pages.', 'cuckoothemes'); ?>
				</label>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<div class="full-width">
						<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
							<?php _e('Enter background settings for Landing Pages Social Media Unit. These settings does not affect Homepage Social Media Unit. Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', 'cuckoothemes'); ?>
						</div>
						<div class="titleBackground">
							<b><?php _e('Background','cuckoothemes'); ?></b>
							<select id="parallax-effect-social" name="parallax-effect-social" class="background-select-parallax">
							<?php if($cuckoo_social['settings']['background']['parallax-social'] == '1') :?>
								<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
							<?php else: ?>
								<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
								<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
							<?php endif; ?>
							</select>
						</div>
						<label for="upload_image-social">
							<input id="image_url_input-social" class="upload_image-social upLaoding" style="width:82%;" type="text" size="36" name="upload_image-social" value="<?php echo $cuckoo_social['settings']['background']['background-social-image'] ?>" />
							<input id="uploadId-social" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
						</label>
						<div class="col-1" style="width:63%; padding-top:25px;">
							<div id="background-setting-position-social" class="radio_block parallax-settigs">
								<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
								<select class="radio-position-clone bposition" name="background-position-social">
									<?php foreach($color_position as $k=>$v): ?>
										<?php if( $v == $cuckoo_social['settings']['background']['background-position-social']  ) : ?>
											<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
										<?php else : ?>
											<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<div id="background-setting-reapet-social" class="radio_block parallax-settigs">
								<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
								<?php foreach($repeat_img as $k=>$v): ?>
									<?php if( $k == $cuckoo_social['settings']['background']['background-setting-reapet-social'] ) : ?>
										<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-social" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-repeat-clone" name="background-setting-reapet-social" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>													
							<div id="background-setting-attach-social" class="radio_block parallax-settigs">
								<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
								<?php foreach($attachament_img as $k=>$v): ?>
									<?php if( $k == $cuckoo_social['settings']['background']['background-setting-attach-social'] ) : ?>
										<input type="radio" class="radio-attachment-clone" name="background-setting-attach-social" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-attachment-clone" name="background-setting-attach-social" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
							<div id="background-setting-speed-social" class="radio_block parallax-settigs" style="padding:15px 0 0;">
								<label for="parallax-speed-social"> 
									<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
								</label>
								<input type="text" id="parallax-speed-social" class="parallax-speed" name="parallax-speed-social" value="<?php echo $cuckoo_social['settings']['background']['parallax-speed-social']; ?>" />
							</div>
						</div>
						<div class="col-1 last" style="width:33%; padding-top:25px;">
							<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
							<input type="text" id="color-32" value="<?php echo $back = empty($cuckoo_social['settings']['background']['background-setting-social-color']) ? '#' : $cuckoo_social['settings']['background']['background-setting-social-color']; ?>" class="colorInput" name="color_picker_color-32" style="background-color:<?php echo $cuckoo_social['settings']['background']['background-setting-social-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-32" />
							<div id="color_picker_color-32" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>				
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Share Your Content', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<div class="desc_bottom" style="padding-top:0; padding-bottom:30px;">
						<?php _e("Add Social Media functionality to your posts and works, and share your content in the most popular social networks. 
						Choose Social Media Networks where you want to share your content, and share buttons will be displayed in each blog post and work social.", 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Share Your Posts', 'cuckoothemes'); ?>
						</div>
						<div class="contact-checkbox">
							<label for="post-linkedin">
								<input type="checkbox" name="post-linkedin" id="post-linkedin" value="1" <?php echo ($cuckoo_social['settings']['post']['post-linkedin'] == 1) ? 'checked="checked"' : ''; ?> /> Linkedin
							</label>
						</div>
						<div class="contact-checkbox">
							<div class="add-element-input-1">
								<label for="post-facebook">
									<input type="checkbox" id="post-facebook" name="post-facebook" value="1" <?php echo ($cuckoo_social['settings']['post']['post-facebook'] == 1) ? 'checked="checked"' : ''; ?> />  Facebook
								</label>
							</div>
							<div class="add-element-input-2">
								<label class="item-desc" for="post-facebook-id">Enter Your Facebook ID</label>
								<input type="text" id="post-facebook-id" name="post-facebook-id" class="itemInputText" value="<?php echo $cuckoo_social['settings']['post']['post-facebook-id']; ?>" />
							</div>
						</div>
						<div class="contact-checkbox">
							<div class="add-element-input-1">
								<label for="post-twitter">
									<input type="checkbox" name="post-twitter" id="post-twitter" value="1" <?php echo ($cuckoo_social['settings']['post']['post-twitter'] == 1) ? 'checked="checked"' : ''; ?> /> Twitter
								</label>
							</div>
							<div class="add-element-input-2">
								<label class="item-desc" for="post-twitter-share">Your Share Text</label>
								<input type="text" id="post-twitter-share" name="post-twitter-share" class="itemInputText" value="<?php echo $cuckoo_social['settings']['post']['post-twitter-share']; ?>" />
							</div>
						</div>						
						<div class="contact-checkbox">
							<label for="post-google">
								<input type="checkbox" name="post-google" id="post-google" value="1" <?php echo ($cuckoo_social['settings']['post']['post-google'] == 1) ? 'checked="checked"' : ''; ?> /> Google+
							</label>
						</div>						
						<div class="contact-checkbox">
							<label for="post-pinterest">
								<input type="checkbox" name="post-pinterest" id="post-pinterest" value="1" <?php echo ($cuckoo_social['settings']['post']['post-pinterest'] == 1) ? 'checked="checked"' : ''; ?> /> Pinterest
							</label>
						</div>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Share Your Works', 'cuckoothemes'); ?>
						</div>
						<div class="contact-checkbox">
							<label for="work-linkedin">
								<input type="checkbox" name="work-linkedin" id="work-linkedin" value="1" <?php echo ($cuckoo_social['settings']['work']['work-linkedin'] == 1) ? 'checked="checked"' : ''; ?> /> Linkedin
							</label>
						</div>	
						<div class="contact-checkbox">
							<div class="add-element-input-1">
								<label for="work-facebook">
									<input type="checkbox" name="work-facebook" id="work-facebook" value="1" <?php echo ($cuckoo_social['settings']['work']['work-facebook'] == 1) ? 'checked="checked"' : ''; ?> /> Facebook
								</label>
							</div>
							<div class="add-element-input-2">
								<label class="item-desc" for="work-facebook-id">Enter Your Facebook ID</label>
								<input type="text" id="work-facebook-id" name="work-facebook-id" class="itemInputText" value="<?php echo $cuckoo_social['settings']['work']['work-facebook-id']; ?>" />
							</div>
						</div>
						<div class="contact-checkbox">
							<div class="add-element-input-1">
								<label for="work-twitter">
									<input type="checkbox" name="work-twitter" id="work-twitter" value="1" <?php echo ($cuckoo_social['settings']['work']['work-twitter'] == 1) ? 'checked="checked"' : ''; ?> /> Twitter
								</label>
							</div>
							<div class="add-element-input-2">
								<label class="item-desc" for="work-twitter-share">Your Share Text</label>
								<input type="text" id="work-twitter-share" name="work-twitter-share" class="itemInputText" value="<?php echo $cuckoo_social['settings']['work']['work-twitter-share']; ?>" />
							</div>
						</div>						
						<div class="contact-checkbox">
							<label for="work-google">
								<input type="checkbox" name="work-google" id="work-google" value="1" <?php echo ($cuckoo_social['settings']['work']['work-google'] == 1) ? 'checked="checked"' : ''; ?> /> Google+
							</label>
						</div>						
						<div class="contact-checkbox">
							<label for="work-pinterest">
								<input type="checkbox" name="work-pinterest" id="work-pinterest" value="1" <?php echo ($cuckoo_social['settings']['work']['work-pinterest'] == 1) ? 'checked="checked"' : ''; ?> /> Pinterest
							</label>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Link to Your Social Profiles', 'cuckoothemes'); ?></span>
			</div>
			<div id="social-sortable" class="active_settings" style="display: block; margin-bottom:40px;">
				<div class="section_settings" style="border-bottom:none; position:relative;">
					<div class="desc_bottom" style="padding-top:0;">
						<?php _e("Add URLs to your Social Media Profiles, and Icons will be displayed in Homepage Social Media Unit, Contact Unit, and in the Landing Pages Social Media Unit above the Contact Unit. All Icons will be arranged in the same sequence as they are displayed here. You can change the sequence of the icons by dragging them up or down.", 'cuckoothemes'); ?>
					</div>
					<div class="clear"></div>
				</div>
				<?php
				foreach($cuckoo_social['elements'] as $k => $val)
				{
					foreach($val as $key => $value)
					{ ?>
						<div class="social_section" style="height: 20px;" id="item<?php echo $value['id']; ?>">
							<b><?php echo $value['name']; ?></b>
							<input type="text" class="soc" name="<?php echo $value['name']; ?>" value="<?php echo $value['values']; ?>" />
							<span><?php echo $value['description']; ?></span>
							<div class="section_change"></div>
						</div>
						<?php 
					}
				}	
				?>
				<input type="hidden" name="items" value="<?php foreach($cuckoo_social['elements'] as $k => $val){ foreach($val as $key => $value){ echo "item".$value['id'].","; } } ?>" />
			</div>
		</div>
		<p style="display:inline;">
			<input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" />
		</p>
		<?php cuckoo_framework_footer(); ?>
	</form>
</section>