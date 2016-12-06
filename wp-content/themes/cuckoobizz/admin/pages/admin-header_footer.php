<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/

$cuckoo_footer = get_option( THEMEPREFIX . "_header_footer_settings" );
$logo_setting = array(
	"Image Logo",
	"Plain Text Logo",
	"No Logo"
);

$google_array = google_font();
$flatIt_array = flatIt_font();
/* Styles Font's */
$font_style = array(
	'Normal' 	=> 'Normal',
	'Italic' 	=> 'Italic'
);
/* Weight Font's */
$font_weight = array(
	'200' 	=> '200',
	'300' 	=> '300',
	'400' 	=> '400',
	'500' 	=> '500',
	'600' 	=> '600',
	'700'	=> '700',
	'800'	=> '800',
	'900'	=> '900',
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
$search_button = array(
	'search-black-color' 		=> 'Black Color',
	'search-black-transparent' 	=> 'Black Transparent',
	'search-white-color'	 	=> 'White Color',
	'search-white-transparent' 	=> 'White Transparent',
);
?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$(".font_block").change(function () {
				var family = $(this).find("select.font_select option:selected").val();
				var fontSize = $(this).find("select.mini_last_select option:selected").val();
				var fontWeight = $(this).find("select.mini_select_first option:selected").val();
				var fontStyle = $(this).find("select.mini_select option:selected").val();
				var fontLine = $(this).find("input.mini_select-input").val();
				var fontColor = $(this).find("input.mini_select-input-color").val();
				var familyShow = family;
				if(family) {
					$("head").append('<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='+familyShow+':200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic">');
				}
				$(this).find(".font_preview").css('font-family', familyShow+" , sans-serif");
				$(this).find(".font_preview").css('font-style', fontStyle);
				$(this).find(".font_preview").css('font-weight', fontWeight);
				$(this).find(".font_preview").css('color', fontColor);
				if( fontSize > 0 ){
					$(this).find(".font_preview").css('font-size', fontSize+"px");
				}else{
					$(this).find(".font_preview").css('font-size', "13px");
				}
				if( fontLine > 0 ){
					$(this).find(".font_preview").css('line-height', fontLine);
				}
			}).trigger('change');
			
			$(".selectPicker").click(function(){
				var color = $(this).parent().find('.mini_select-input-color').val();
				$(this).parent().parent().parent().find(".font_preview").css('color', color);
			});
			
			$("#restore_font").click(function(){
				var answer = confirm('Do you really want to reset all fonts settings?');
				return answer;
			});
		});
	</script>
<section id="main_content">
<?php

if(isset($_REQUEST['all'])) {

	// wpml
	if( function_exists('icl_register_string') ) :
		icl_register_string(THEMENAME.' Header & Footer', 'Plain Text Logo Title', esc_attr( $_POST['plain_text_header'] ));
		icl_register_string(THEMENAME.' Header & Footer', 'Image Logo Title', esc_attr( $_POST['img_title'] ));
		icl_register_string(THEMENAME.' Header & Footer', 'Line 1', esc_attr( $_POST['line1'] ));
		icl_register_string(THEMENAME.' Header & Footer', 'Line 2', esc_attr( $_POST['line2'] ));
		icl_register_string(THEMENAME.' Header & Footer', 'Line 3', esc_attr( $_POST['line3'] ));
	endif;
/* all names settings */
	$cuckoo_footer = array( 
	'logo_setting' 					=> esc_attr( $_POST['logo_setting'] ),
	'plain_text_header'				=> esc_attr( $_POST['plain_text_header'] ),
	'title_font'					=> esc_attr( $font_show = $_POST['title_font'] == "Use Default Font" ? 'BebasNeue' : $_POST['title_font'] ),
	'title_font_weight'				=> esc_attr( $_POST['title_font_weight'] ),
	'title_font_style'				=> esc_attr( $_POST['title_font_style'] ),
	'title_font_size'				=> esc_attr( $font_show = $_POST['title_font_size'] == "" ? '27' : $_POST['title_font_size'] ),
	'title_font_lheight'			=> esc_attr( $_POST['title_font_lheight'] ),
	'title_font_color'				=> esc_attr( $_POST['color_picker_color-1'] ) ,
	'image_url' 					=> esc_attr( $_POST['upload_image1'] ),
	'image_title' 					=> esc_attr( $_POST['img_title'] ),
	
	'dropd_landing_opacity'			=> esc_attr( $_POST['dropd_landing_opacity'] ),
	'dropd_homepage_opacity'		=> esc_attr( $_POST['dropd_homepage_opacity'] ),
	'background_homepage_opacity' 	=> esc_attr( $_POST['background_homepage_opacity'] ),
	'background_landing_opacity' 	=> esc_attr( $_POST['background_landing_opacity'] ),
	'landing_logo_opacity' 			=> esc_attr( $_POST['landing_logo_opacity'] ), 
	'background_logo_opacity' 		=> esc_attr( $_POST['background_logo_opacity'] ),
	
	'background_homepage' 			=> esc_attr( $_POST['color_picker_color-1-background'] ),
	'background-landing' 			=> esc_attr( $_POST['color_picker_color-2-background'] ),
	'background-logo_header' 		=> esc_attr( $_POST['color_picker_color-3-background'] ),
	'landing-logo_header' 			=> esc_attr( $_POST['color_picker_color-4-background'] ),
	'menu-dorp-color' 				=> esc_attr( $_POST['color_picker_color-5-background'] ),
	'land-menu-dorp-color' 			=> esc_attr( $_POST['color_picker_color-6-background'] ),
	
	/* fONTS */
	/* Homepage Menus */
	'menus-font' 					=> esc_attr( $_POST['menus-font'] ) , 
	'menus-weight' 					=> esc_attr( $_POST['menus-weight'] ) ,
	'menus-style' 					=> esc_attr( $_POST['menus-style'] ) ,
	'menus-size' 					=> $size = (esc_attr( $_POST['menus-size'] ) == "" ? '15' : esc_attr( $_POST['menus-size'] )) ,	
	'menus-lheight' 				=> esc_attr( $_POST['menus-lheight'] ) ,	
	'menus-color' 					=> esc_attr( $_POST['color_picker_color-8'] ) ,
	/* Homepage Menus hover */
	'menus-font-hover' 				=> esc_attr( $_POST['menus-font-hover'] ) , 
	'menus-weight-hover' 			=> esc_attr( $_POST['menus-weight-hover'] ) ,
	'menus-style-hover' 			=> esc_attr( $_POST['menus-style-hover'] ) ,
	'menus-size-hover' 				=> $size = (esc_attr( $_POST['menus-size-hover'] ) == "" ? '15' : esc_attr( $_POST['menus-size-hover'] )) ,	
	'menus-lheight-hover' 			=> esc_attr( $_POST['menus-lheight-hover'] ) ,	
	'menus-color-hover' 			=> esc_attr( $_POST['color_picker_color-29'] ) ,
	/* Homepage Menu dropdown */
	'menus-dropdown-font'			=> esc_attr( $_POST['menus-dropdown-font'] ) , 
	'menus-dropdown-weight' 		=> esc_attr( $_POST['menus-dropdown-weight'] ) ,
	'menus-dropdown-style' 			=> esc_attr( $_POST['menus-dropdown-style'] ) ,
	'menus-dropdown-size' 			=> $size = (esc_attr( $_POST['menus-dropdown-size'] ) == "" ? '20' : esc_attr( $_POST['menus-dropdown-size'] )) ,	
	'menus-dropdown-lheight' 		=> esc_attr( $_POST['menus-dropdown-lheight'] ) ,	
	'menus-dropdown-color' 			=> esc_attr( $_POST['color_picker_color-27'] ) ,
	/* Homepage Menu dropdown Hover */
	'menus-dropdown-font-hover' 	=> esc_attr( $_POST['menus-dropdown-font-hover'] ) , 
	'menus-dropdown-weight-hover' 	=> esc_attr( $_POST['menus-dropdown-weight-hover'] ) ,
	'menus-dropdown-style-hover' 	=> esc_attr( $_POST['menus-dropdown-style-hover'] ) ,
	'menus-dropdown-size-hover' 	=> $size = (esc_attr( $_POST['menus-dropdown-size-hover'] ) == "" ? '20' : esc_attr( $_POST['menus-dropdown-size-hover'] )) ,	
	'menus-dropdown-lheight-hover' 	=> esc_attr( $_POST['menus-dropdown-lheight-hover'] ) ,	
	'menus-dropdown-color-hover' 	=> esc_attr( $_POST['color_picker_color-30'] ) ,
	/* Homepage Top Right Links */
	'homepage-top-links-font' 		=> esc_attr( $_POST['homepage-top-links-font'] ) , 
	'homepage-top-links-weight' 	=> esc_attr( $_POST['homepage-top-links-weight'] ) ,
	'homepage-top-links-style' 		=> esc_attr( $_POST['homepage-top-links-style'] ) ,
	'homepage-top-links-size' 		=> $size = (esc_attr( $_POST['homepage-top-links-size'] ) == "" ? '20' : esc_attr( $_POST['homepage-top-links-size'] )) ,	
	'homepage-top-links-lheight' 	=> esc_attr( $_POST['homepage-top-links-lheight'] ) ,	
	'homepage-top-links-color' 		=> esc_attr( $_POST['color_picker_color-31'] ) ,
	/* Landing Pages Menus */
	'landing-menus-font' 			=> esc_attr( $_POST['landing-menus-font'] ) , 
	'landing-menus-weight' 			=> esc_attr( $_POST['landing-menus-weight'] ) ,
	'landing-menus-style' 			=> esc_attr( $_POST['landing-menus-style'] ) ,
	'landing-menus-size' 			=> $size = (esc_attr( $_POST['landing-menus-size'] ) == "" ? '15' : esc_attr( $_POST['landing-menus-size'] )) ,	
	'landing-menus-lheight' 		=> esc_attr( $_POST['landing-menus-lheight'] ) ,	
	'landing-menus-color' 			=> esc_attr( $_POST['color_picker_color-32'] ) ,
	/* Landing Pages Menus hover */
	'landing-menus-font-hover' 		=> esc_attr( $_POST['landing-menus-font-hover'] ) , 
	'landing-menus-weight-hover' 	=> esc_attr( $_POST['landing-menus-weight-hover'] ) ,
	'landing-menus-style-hover' 	=> esc_attr( $_POST['landing-menus-style-hover'] ) ,
	'landing-menus-size-hover' 		=> $size = (esc_attr( $_POST['landing-menus-size-hover'] ) == "" ? '15' : esc_attr( $_POST['landing-menus-size-hover'] )) ,	
	'landing-menus-lheight-hover' 	=> esc_attr( $_POST['landing-menus-lheight-hover'] ) ,	
	'landing-menus-color-hover' 	=> esc_attr( $_POST['color_picker_color-33'] ) ,
	/* Landing Pages Menu dropdown */
	'landing-menus-dropdown-font' 		=> esc_attr( $_POST['landing-menus-dropdown-font'] ) , 
	'landing-menus-dropdown-weight' 	=> esc_attr( $_POST['landing-menus-dropdown-weight'] ) ,
	'landing-menus-dropdown-style' 		=> esc_attr( $_POST['landing-menus-dropdown-style'] ) ,
	'landing-menus-dropdown-size' 		=> $size = (esc_attr( $_POST['landing-menus-dropdown-size'] ) == "" ? '20' : esc_attr( $_POST['landing-menus-dropdown-size'] )) ,	
	'landing-menus-dropdown-lheight' 	=> esc_attr( $_POST['landing-menus-dropdown-lheight'] ) ,	
	'landing-menus-dropdown-color' 		=> esc_attr( $_POST['color_picker_color-34'] ) ,	
	/* Landing Pages Menu dropdown Hover */
	'landing-menus-dropdown-font-hover' 	=> esc_attr( $_POST['landing-menus-dropdown-font-hover'] ) , 
	'landing-menus-dropdown-weight-hover' 	=> esc_attr( $_POST['landing-menus-dropdown-weight-hover'] ) ,
	'landing-menus-dropdown-style-hover' 	=> esc_attr( $_POST['landing-menus-dropdown-style-hover'] ) ,
	'landing-menus-dropdown-size-hover' 	=> $size = (esc_attr( $_POST['landing-menus-dropdown-size-hover'] ) == "" ? '20' : esc_attr( $_POST['landing-menus-dropdown-size-hover'] )) ,	
	'landing-menus-dropdown-lheight-hover' 	=> esc_attr( $_POST['landing-menus-dropdown-lheight-hover'] ) ,	
	'landing-menus-dropdown-color-hover' 	=> esc_attr( $_POST['color_picker_color-35'] ) ,
	/* Landing Pages Top Right Links */
	'landing-top-links-font' 			=> esc_attr( $_POST['landing-top-links-font'] ) , 
	'landing-top-links-weight' 			=> esc_attr( $_POST['landing-top-links-weight'] ) ,
	'landing-top-links-style' 			=> esc_attr( $_POST['landing-top-links-style'] ) ,
	'landing-top-links-size' 			=> $size = (esc_attr( $_POST['landing-top-links-size'] ) == "" ? '20' : esc_attr( $_POST['landing-top-links-size'] )) ,	
	'landing-top-links-lheight' 		=> esc_attr( $_POST['landing-top-links-lheight'] ) ,	
	'landing-top-links-color' 			=> esc_attr( $_POST['color_picker_color-36'] ) ,
	
	/* menu buttom line */
	'display_menu_hover_effect' 	=> esc_attr($_POST['display_menu_hover_effect']), 
	
	/*### Footer ###*/
	'parallax-footer' 				=> esc_attr($_POST['parallax-effect-4']), 
	'parallax-speed-footer' 		=> $speedFoo = ( esc_attr($_POST['parallax-speed-4']) == '' ? 10 : esc_attr($_POST['parallax-speed-4'])),
	'footer-position' 				=> esc_attr( ($_POST['footer-position']) ) , 
	'footer-image' 					=> esc_attr( ($_POST['upload_image4']) ) , 
	'footer-repeat' 				=> esc_attr( ($_POST['footer-repeat']) ) , 
	'footer-attachment' 			=> esc_attr( ($_POST['footer-attachment']) ) , 
	'footer-color-back' 			=> esc_attr( ($_POST['color_picker_color-100']) ) , 
	'line1' 						=> cuckoo_get_value( $_POST['line1'] ) ,
	'line2' 						=> cuckoo_get_value( $_POST['line2'] ) ,
	'line3' 						=> cuckoo_get_value( $_POST['line3'] ),
	
	/* Footer Navigation Menu */
	'footer-font-nav' 				=> esc_attr( $_POST['footer-font-nav'] ) , 
	'footer-weight-nav' 			=> esc_attr( $_POST['footer-weight-nav'] ) ,
	'footer-style-nav' 				=> esc_attr( $_POST['footer-style-nav'] ) ,
	'footer-size-nav' 				=> $size = (esc_attr( $_POST['footer-size'] ) == "" ? '12' : esc_attr( $_POST['footer-size-nav'] )) ,	
	'footer-lheight-nav' 			=> esc_attr( $_POST['footer-lheight-nav'] ) ,	
	'footer-color-nav' 				=> esc_attr( $_POST['color_picker_color-102'] ) ,	
	/* Footer Navigation Menu Hover */
	'footer-font-nav-hover' 		=> esc_attr( $_POST['footer-font-nav-hover'] ) , 
	'footer-weight-nav-hover' 		=> esc_attr( $_POST['footer-weight-nav-hover'] ) ,
	'footer-style-nav-hover' 		=> esc_attr( $_POST['footer-style-nav-hover'] ) ,
	'footer-size-nav-hover' 		=> $size = (esc_attr( $_POST['footer-size-nav-hover'] ) == "" ? '12' : esc_attr( $_POST['footer-size-nav-hover'] )) ,	
	'footer-lheight-nav-hover' 		=> esc_attr( $_POST['footer-lheight-nav-hover'] ) ,	
	'footer-color-nav-hover' 		=> esc_attr( $_POST['color_picker_color-103'] ) ,	
	/* Footer details */
	'footer-font' 					=> esc_attr( $_POST['footer-font'] ) , 
	'footer-weight' 				=> esc_attr( $_POST['footer-weight'] ) ,
	'footer-style' 					=> esc_attr( $_POST['footer-style'] ) ,
	'footer-size' 					=> $size = (esc_attr( $_POST['footer-size'] ) == "" ? '12' : esc_attr( $_POST['footer-size'] )) ,	
	'footer-lheight' 				=> esc_attr( $_POST['footer-lheight'] ) ,	
	'footer-color' 					=> esc_attr( $_POST['color_picker_color-101'] ) ,
	/* Search */
	'homepage_search_button' 		=> esc_attr( $_POST['homepage_search_button'] ) ,
	'display_search_home' 			=> esc_attr( $_POST['display_search_home'] ) ,
	'landing_search_button' 		=> esc_attr( $_POST['landing_search_button'] ) ,
	'display_search_landing' 		=> esc_attr( $_POST['display_search_landing'] ) ,
	
	/* New element since 1.3 */
	'superfoter'					=> esc_attr( $_POST['superfoter'] ),
	'superfoterhomepage'			=> esc_attr( $_POST['superfoterhomepage'] ),
	
	'parallax-super-homepage' 		=> esc_attr($_POST['parallax-effect-super-homepage']), 
	'parallax-speed-super-homepage' => $speedFoo = ( esc_attr($_POST['parallax-speed-super-homepage']) == '' ? 10 : esc_attr($_POST['parallax-speed-super-homepage'])),
	'super-homepage-position' 		=> esc_attr( ($_POST['super-homepage-position']) ) , 
	'super-homepage-image' 			=> esc_attr( ($_POST['upload_image-super-homepage']) ) , 
	'super-homepage-repeat' 		=> esc_attr( ($_POST['super-homepage-repeat']) ) , 
	'super-homepage-attachment' 	=> esc_attr( ($_POST['super-homepage-attachment']) ) , 
	'super-homepage-color' 			=> esc_attr( ($_POST['color_picker_color-super-homepage']) ) , 
	
	'parallax-super-page' 			=> esc_attr($_POST['parallax-effect-super-page']), 
	'parallax-speed-super-page' 	=> $speedFoo = ( esc_attr($_POST['parallax-speed-super-page']) == '' ? 10 : esc_attr($_POST['parallax-speed-super-page'])),
	'super-page-position' 			=> esc_attr( ($_POST['super-page-position']) ) , 
	'super-page-image' 				=> esc_attr( ($_POST['upload_image-super-page']) ) , 
	'super-page-repeat' 			=> esc_attr( ($_POST['super-page-repeat']) ) , 
	'super-page-attachment' 		=> esc_attr( ($_POST['super-page-attachment']) ) , 
	'super-page-color' 				=> esc_attr( ($_POST['color_picker_color-super-page']) ) , 
	);
	update_option( THEMEPREFIX . "_header_footer_settings", $cuckoo_footer );
	?>  
   <div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
<?php
}
?>
	<?php cuckoo_framework_head( __('Header & Footer', 'cuckoothemes') ); ?>
	<form method="POST" action="">
		<div id="general_settings">
			<?php /* Main dropdown to shose header content: text or image or nothing */ ?>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Header Logo Settings', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_full">
								<div class="settings_left_title">
									<?php _e('Choose Logo Type', 'cuckoothemes'); ?>
								</div>
								<select id="logo_setting" class="dropdown" name="logo_setting">
									<?php foreach( $logo_setting as $k => $v ) : ?>
										<?php if( $cuckoo_footer['logo_setting'] == $v ): ?>
											<option value="<?php echo $v; ?>" selected ><?php echo $v; ?></option>
										<?php else : ?>
											<option value="<?php echo $v; ?>" ><?php echo $v; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="settings_left">
							<div class="desc_bottom">
								<?php _e(THEMENAME . ' theme allows you to display an image or plain text logo. Choose what type of logo you want to display.', 'cuckoothemes'); ?>
							</div>
						</div>
					<div class="clear"></div>
				</div>
			</div>
			
			<?php /* Plain Text visible only if main dropdown selected */ ?>
			<section id="id_plain_text" class="no-bord">
				<div class="general_title_active">
					<span class="float_left"><?php _e('Plain Text Logo Settings', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
							<div class="settings_left">
								<div class="settings_left_full">
									<div class="settings_left_title">
										<?php _e('Enter a Title for Your Logo', 'cuckoothemes'); ?>
									</div>
									<input type="text" name="plain_text_header" size="60" value="<?php echo $cuckoo_footer['plain_text_header']; ?>" />
								</div>
								
							</div>
							<div class="settings_left">
								<div class="desc_bottom">
									<?php _e('Enter Your company name or any other word you like. Keep in mind that the logo area is limited up to 225 pixel width.', 'cuckoothemes'); ?>
								</div>
							</div>
						<div class="clear"></div>
					</div>
					<div class="section_settings font_block">
						<div class="settings_left_title">
							<?php _e('Choose Font for Your Logo', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="title_font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_footer['title_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_footer['title_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="title_font_weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_footer['title_font_weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="title_font_style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_footer['title_font_style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="title_font_size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_footer['title_font_size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="title_font_lheight" value="<?php echo $cuckoo_footer['title_font_lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-1" value="<?php echo $back = empty($cuckoo_footer['title_font_color']) ? '#' : $cuckoo_footer['title_font_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-1" style="background-color:<?php echo $cuckoo_footer['title_font_color']; ?> ; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-1" />
								<div id="color_picker_color-1" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</section>
			
			<?php /* Logo visible only if main dropdown selected */ ?>
			<section id="id_logo" class="no-bord">
				<div class="general_title_active">
					<span class="float_left"><?php _e('Image Logo', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="section_main">
							<div class="section_left">
								<img class="img_input" id="up_image1" src="<?php echo $show_image = ( $cuckoo_footer['image_url'] == null ) ? LOGOATTACH : cuckoo_get_attachment_tumb( $cuckoo_footer['image_url'] );?>" />
							</div>
							<div class="section_right">
								<p style="padding-bottom:5px;">
									<b><?php _e('Title', 'cuckoothemes'); ?></b>
									<input class="width_input_title" name="img_title" type="text" maxlength="70" value="<?php  echo $cuckoo_footer['image_title']; ?>" />
								</p>
								<p>
									<th scope="row"></th>
									<td>
										<label for="upload_image">
											<b><?php _e('Image URL', 'cuckoothemes'); ?></b>
											<input id="image_url_input1" class="upload_image1" style="width: 100%;" type="text" size="36" name="upload_image1" value="<?php echo $cuckoo_footer['image_url']; ?>" />
											<input id="uploadId1" class="upload_image_button" type="button" value="Upload Image" style="left: 253px; top: 137px!important;" />
										</label>
									</td>
								</p>
							</div>
							<input type="hidden" value="item1" name="items" />
						</div>
						<div class="desc_bottom" style="padding-top:20px;">
							<?php _e('Important! Upload custom logo or paste image URL. Logo area size is 225 x 100 pixels. Larger images will be resized automatically.', 'cuckoothemes'); ?>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</section>
			<?php /* Header settings END */ ?>
			
			<div class="general_title_active">
				<span class="float_left"><?php _e('Header Display Settings', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_full">
							<div class="settings_left_title">
								<?php _e('Homepage Menu Bar', 'cuckoothemes'); ?>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini"><?php _e('Opacity', 'cuckoothemes'); ?></div>
								<select class="mini_last_select" style="margin-right:16px;" name="background_homepage_opacity">
									<?php for($i=100; $i>=0; $i--) :
										if ($cuckoo_footer['background_homepage_opacity'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor; ?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini"><?php _e('Background Color', 'cuckoothemes'); ?></div>				
								<input type="text" id="color-1-background" value="<?php echo $back = empty($cuckoo_footer['background_homepage']) ? '#' : $cuckoo_footer['background_homepage']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-1-background" style="background-color:<?php echo $cuckoo_footer['background_homepage']; ?>; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-1-background" />
								<div id="color_picker_color-1-background" class="colorPickerMain"></div>
							</div>
						</div>
					</div>						
					<div class="settings_left">
						<div class="settings_left_full">
							<div class="settings_left_title"><?php _e('Landing Page Menu Bar', 'cuckoothemes'); ?></div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini"><?php _e('Opacity', 'cuckoothemes'); ?></div>
								<select class="mini_last_select" style="margin-right:16px;" name="background_landing_opacity">
									<?php for($i=100; $i>=0; $i--) :
										if ($cuckoo_footer['background_landing_opacity'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor; ?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini"><?php _e('Background Color', 'cuckoothemes'); ?></div>				
								<input type="text" id="color-2-background" value="<?php echo $back = empty($cuckoo_footer['background-landing']) ? '#' : $cuckoo_footer['background-landing']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-2-background" style="background-color:<?php echo $cuckoo_footer['background-landing']; ?>; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-2-background" />
								<div id="color_picker_color-2-background" class="colorPickerMain"></div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_full">
							<div class="settings_left_title">
								<?php _e('Homepage Logo Box Background', 'cuckoothemes'); ?>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini"><?php _e('Opacity', 'cuckoothemes'); ?></div>
								<select class="mini_last_select" style="margin-right:16px;" name="background_logo_opacity">
									<?php for($i=100; $i>=0; $i--) :
										if ($cuckoo_footer['background_logo_opacity'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor; ?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini"><?php _e('Background Color', 'cuckoothemes'); ?></div>				
								<input type="text" id="color-3-background" value="<?php echo $back = empty($cuckoo_footer['background-logo_header']) ? '#' : $cuckoo_footer['background-logo_header']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-3-background" style="background-color:<?php echo $cuckoo_footer['background-logo_header']; ?>; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-3-background" />
								<div id="color_picker_color-3-background" class="colorPickerMain"></div>
							</div>
						</div>
					</div>					
					<div class="settings_left">
						<div class="settings_left_full">
							<div class="settings_left_title">
								<?php _e('Landing Page Logo Box Background', 'cuckoothemes'); ?>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini"><?php _e('Opacity', 'cuckoothemes'); ?></div>
								<select class="mini_last_select" style="margin-right:16px;" name="landing_logo_opacity">
									<?php for($i=100; $i>=0; $i--) :
										if ($cuckoo_footer['landing_logo_opacity'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor; ?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini"><?php _e('Background Color', 'cuckoothemes'); ?></div>				
								<input type="text" id="color-4-background" value="<?php echo $back = empty($cuckoo_footer['landing-logo_header']) ? '#' : $cuckoo_footer['landing-logo_header']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-4-background" style="background-color:<?php echo $cuckoo_footer['landing-logo_header']; ?>; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-4-background" />
								<div id="color_picker_color-4-background" class="colorPickerMain"></div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_full" style="padding-bottom:0;">
							<div class="settings_left_title">
								<?php _e('Homepage Dropdown Background', 'cuckoothemes'); ?>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Opacity', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" style="margin-right:16px;" name="dropd_homepage_opacity">
								<?php
									for($i=100; $i>=0; $i--) :
										if ($cuckoo_footer['dropd_homepage_opacity'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Background Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-5-background" value="<?php echo $back = empty($cuckoo_footer['menu-dorp-color']) ? '#' : $cuckoo_footer['menu-dorp-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-5-background" style="background-color:<?php echo $cuckoo_footer['menu-dorp-color']; ?>; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-5-background" />
								<div id="color_picker_color-5-background" class="colorPickerMain"></div>
							</div>
						</div>
					</div>						
					<div class="settings_left">
						<div class="settings_left_full" style="padding-bottom:0;">
							<div class="settings_left_title">
								<?php _e('Landing Page Dropdown Background', 'cuckoothemes'); ?>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Opacity', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" style="margin-right:16px;" name="dropd_landing_opacity">
								<?php
									for($i=100; $i>=0; $i--) :
										if ($cuckoo_footer['dropd_landing_opacity'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Background Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-6-background" value="<?php echo $back = empty($cuckoo_footer['land-menu-dorp-color']) ? '#' : $cuckoo_footer['land-menu-dorp-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-6-background" style="background-color:<?php echo $cuckoo_footer['land-menu-dorp-color']; ?>; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-6-background" />
								<div id="color_picker_color-6-background" class="colorPickerMain"></div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<!--  Search here -->
			<div class="general_title_active">
				<span class="float_left"><?php _e('Search Button Settings', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Homepage Search Button Color', 'cuckoothemes'); ?>
						</div>
						<select name="homepage_search_button">
							<?php foreach($search_button as $k => $v ) : ?>
								<?php if( $cuckoo_footer['homepage_search_button'] == $k ) : ?>
									<option value="<?php echo $k; ?>" selected="selected"><?php echo $v; ?></option>
								<?php else: ?>
									<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
						<label for="display_search_home" style="padding-top:20px; position:relative; display:block;">
							<input type="checkbox" name="display_search_home" id="display_search_home" value="1" <?php echo ($cuckoo_footer['display_search_home'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e(' Display in Homepage Navigation Menu.', 'cuckoothemes'); ?>
						</label>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Landing Page Search Button Color', 'cuckoothemes'); ?>
						</div>
						<select name="landing_search_button">
							<?php foreach($search_button as $k => $v ) : ?>
								<?php if( $cuckoo_footer['landing_search_button'] == $k ) : ?>
									<option value="<?php echo $k; ?>" selected="selected"><?php echo $v; ?></option>
								<?php else: ?>
									<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
						<label for="display_search_landing" style="padding-top:20px; position:relative; display:block;">
							<input type="checkbox" name="display_search_landing" id="display_search_landing" value="1" <?php echo ($cuckoo_footer['display_search_landing'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e(' Display in Landing Page Navigation Menu.', 'cuckoothemes'); ?>
						</label>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Header Navigation Fonts', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<!-- Homepage Navigation Menus -->
				<div class="section_settings font_block">
					<div class="settings_left_title">
						<?php _e('Homepage Main Navigation Menu', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="menus-font">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['menus-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['menus-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="menus-weight">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['menus-weight']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="menus-style">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['menus-style']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="menus-size">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['menus-size'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="menus-lheight" value="<?php echo $cuckoo_footer['menus-lheight'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-8" value="<?php echo $back = empty($cuckoo_footer['menus-color']) ? '#' : $cuckoo_footer['menus-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-8" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['menus-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-8" />
							<div id="color_picker_color-8" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- Homepage Navigation Menus Hover -->
				<div class="section_settings font_block">
					<div class="settings_left_title">
						<?php _e('Homepage Main Navigation Menu Hover', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="menus-font-hover">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['menus-font-hover']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['menus-font-hover']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="menus-weight-hover">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['menus-weight-hover']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="menus-style-hover">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['menus-style-hover']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="menus-size-hover">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['menus-size-hover'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="menus-lheight-hover" value="<?php echo $cuckoo_footer['menus-lheight-hover'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-29" value="<?php echo $back = empty($cuckoo_footer['menus-color-hover']) ? '#' : $cuckoo_footer['menus-color-hover']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-29" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['menus-color-hover']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-29" />
							<div id="color_picker_color-29" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- Homepage Menus Dropdown -->
				<div class="section_settings font_block">
					<div class="settings_left_title">
						<?php _e('Homepage Main Navigation Dropdown', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="menus-dropdown-font">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['menus-dropdown-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['menus-dropdown-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="menus-dropdown-weight">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['menus-dropdown-weight']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="menus-dropdown-style">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['menus-dropdown-style']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="menus-dropdown-size">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['menus-dropdown-size'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="menus-dropdown-lheight" value="<?php echo $cuckoo_footer['menus-dropdown-lheight'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-27" value="<?php echo $back = empty($cuckoo_footer['menus-dropdown-color']) ? '#' : $cuckoo_footer['menus-dropdown-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-27" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['menus-dropdown-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-27" />
							<div id="color_picker_color-27" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- Homepage Dropdown Menus Hover -->
				<div class="section_settings font_block">
					<div class="settings_left_title">
						<?php _e('Homepage Main Navigation Dropdown Hover', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="menus-dropdown-font-hover">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['menus-dropdown-font-hover']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['menus-dropdown-font-hover']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="menus-dropdown-weight-hover">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['menus-dropdown-weight-hover']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="menus-dropdown-style-hover">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['menus-dropdown-style-hover']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="menus-dropdown-size-hover">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['menus-dropdown-size-hover'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="menus-dropdown-lheight-hover" value="<?php echo $cuckoo_footer['menus-dropdown-lheight-hover'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-30" value="<?php echo $back = empty($cuckoo_footer['menus-dropdown-color-hover']) ? '#' : $cuckoo_footer['menus-dropdown-color-hover']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-30" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['menus-dropdown-color-hover']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-30" />
							<div id="color_picker_color-30" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>	
				<!-- Homepage Header Top Right Links -->
				<div class="section_settings font_block">
					<div class="settings_left_title">
						<?php _e('Homepage Top Right Navigation Menu', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="homepage-top-links-font">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['homepage-top-links-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['homepage-top-links-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="homepage-top-links-weight">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['homepage-top-links-weight']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="homepage-top-links-style">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['homepage-top-links-style']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="homepage-top-links-size">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['homepage-top-links-size'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="homepage-top-links-lheight" value="<?php echo $cuckoo_footer['homepage-top-links-lheight'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-31" value="<?php echo $back = empty($cuckoo_footer['homepage-top-links-color']) ? '#' : $cuckoo_footer['homepage-top-links-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-31" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['homepage-top-links-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-31" />
							<div id="color_picker_color-31" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- Landing Page Navigation Menus -->
				<div class="section_settings font_block">
					<div class="settings_left_title">
						<?php _e('Landing Page Main Navigation Menu', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="landing-menus-font">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['landing-menus-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['landing-menus-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="landing-menus-weight">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['landing-menus-weight']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="landing-menus-style">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['landing-menus-style']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="landing-menus-size">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['landing-menus-size'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="landing-menus-lheight" value="<?php echo $cuckoo_footer['landing-menus-lheight'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-32" value="<?php echo $back = empty($cuckoo_footer['landing-menus-color']) ? '#' : $cuckoo_footer['landing-menus-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-32" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['landing-menus-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-32" />
							<div id="color_picker_color-32" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- Landing Pages Navigation Menus Hover -->
				<div class="section_settings font_block">
					<div class="settings_left_title">
						<?php _e('Landing Page Main Navigation Menu Hover', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="landing-menus-font-hover">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['landing-menus-font-hover']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['landing-menus-font-hover']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="landing-menus-weight-hover">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['landing-menus-weight-hover']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="landing-menus-style-hover">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['landing-menus-style-hover']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="landing-menus-size-hover">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['landing-menus-size-hover'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="landing-menus-lheight-hover" value="<?php echo $cuckoo_footer['landing-menus-lheight-hover'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-33" value="<?php echo $back = empty($cuckoo_footer['landing-menus-color-hover']) ? '#' : $cuckoo_footer['landing-menus-color-hover']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-33" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['landing-menus-color-hover']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-33" />
							<div id="color_picker_color-33" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- Landing Pages Dropdown Menus -->
				<div class="section_settings font_block">
					<div class="settings_left_title">
						<?php _e('Landing Page Main Navigation Dropdown', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="landing-menus-dropdown-font">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['landing-menus-dropdown-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['landing-menus-dropdown-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="landing-menus-dropdown-weight">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['landing-menus-dropdown-weight']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="landing-menus-dropdown-style">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['landing-menus-dropdown-style']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="landing-menus-dropdown-size">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['landing-menus-dropdown-size'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="landing-menus-dropdown-lheight" value="<?php echo $cuckoo_footer['landing-menus-dropdown-lheight'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-34" value="<?php echo $back = empty($cuckoo_footer['landing-menus-dropdown-color']) ? '#' : $cuckoo_footer['landing-menus-dropdown-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-34" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['landing-menus-dropdown-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-34" />
							<div id="color_picker_color-34" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- Landing Pages Dropdown Menus Hover -->
				<div class="section_settings font_block">
					<div class="settings_left_title">
						<?php _e('Landing Page Main Navigation Dropdown Hover', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="landing-menus-dropdown-font-hover">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['landing-menus-dropdown-font-hover']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['landing-menus-dropdown-font-hover']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="landing-menus-dropdown-weight-hover">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['landing-menus-dropdown-weight-hover']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="landing-menus-dropdown-style-hover">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['landing-menus-dropdown-style-hover']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="landing-menus-dropdown-size-hover">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['landing-menus-dropdown-size-hover'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="landing-menus-dropdown-lheight-hover" value="<?php echo $cuckoo_footer['landing-menus-dropdown-lheight-hover'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-35" value="<?php echo $back = empty($cuckoo_footer['landing-menus-dropdown-color-hover']) ? '#' : $cuckoo_footer['landing-menus-dropdown-color-hover']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-35" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['landing-menus-dropdown-color-hover']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-35" />
							<div id="color_picker_color-35" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>				
				<!-- Landing Pages Header Top Right Links -->
				<div class="section_settings font_block">
					<div class="settings_left_title">
						<?php _e('Landing Page Top Right Navigation Menu', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="landing-top-links-font">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['landing-top-links-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['landing-top-links-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="landing-top-links-weight">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['landing-top-links-weight']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="landing-top-links-style">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['landing-top-links-style']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="landing-top-links-size">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['landing-top-links-size'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="landing-top-links-lheight" value="<?php echo $cuckoo_footer['landing-top-links-lheight'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-36" value="<?php echo $back = empty($cuckoo_footer['landing-top-links-color']) ? '#' : $cuckoo_footer['landing-top-links-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-36" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['landing-top-links-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-36" />
							<div id="color_picker_color-36" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Main Navigation Menu Hover Line Effect', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<p>
						<label for="display_menu_hover_effect">
							<input type="checkbox" name="display_menu_hover_effect" id="display_menu_hover_effect" value="1" <?php echo ($cuckoo_footer['display_menu_hover_effect'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e(' Display Main Navigation Menu Hover Line Effect', 'cuckoothemes'); ?>
						</label>
					</p>
				</div>		
			</div>
			
			<?php /* Super Footer settings */ ?>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Super Footer Settings', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings" style="position:relative; border-bottom:0; padding-bottom:0px;">
					<span style="font-size:12px; color:#999999;">
						<?php _e('Enter page URL and content of that page will be displayed in Homepage or Other Pages above Footer. Background settings for Super Footer can be managed in Dashboard > CuckooTap > Theme Colors Tab.<br />Important! Only parent site pages content will be displayed. URL example: http://www.cuckoothemes.com/page.', THEMENAME); ?>
					</span>
				</div>
				<div class="section_settings" style="position:relative;">				
					<p style="margin:12px 0; display:inline-block;">
						<b style="padding:0 30px 0 0;"><?php _e('Homepage', THEMENAME); ?></b>
						<input class="width_input_title" style="width:646px;" name="superfoterhomepage" type="text" value="<?php echo $cuckoo_footer['superfoterhomepage']; ?>" />
					</p>
					<p style="margin:0; display:inline-block;">
						<b style="padding:0 20px 0 0;"><?php _e('Other Pages', THEMENAME); ?></b>
						<input class="width_input_title" style="width:646px;" name="superfoter" type="text" value="<?php echo $cuckoo_footer['superfoter']; ?>" />
					</p>	
				</div>
			</div>
			
			<div class="general_title_active">
				<span class="float_left"><?php _e('Homepage Super Footer Background Settings', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<div class="full-width">
						<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
							<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', THEMENAME); ?>
						</div>
						<div class="titleBackground">
							<b><?php _e('Background',THEMENAME); ?></b>
							<select id="parallax-effect-super-homepage" name="parallax-effect-super-homepage" class="background-select-parallax">
							<?php if($cuckoo_footer['parallax-super-homepage'] == '1') :?>
								<option value="1" selected><?php _e('Parallax Background'); ?></option>
								<option value="2"><?php _e('Default Background'); ?></option>
							<?php else: ?>
								<option value="2" selected><?php _e('Default Background'); ?></option>
								<option value="1"><?php _e('Parallax Background'); ?></option>
							<?php endif; ?>
							</select>
						</div>
						<label for="upload_image-super-homepage">
							<input id="image_url_input-super-homepage" class="upload_image-super-homepage upLaoding" style="width:82%;" type="text" size="36" name="upload_image-super-homepage" value="<?php echo $cuckoo_footer['super-homepage-image'] ?>" />
							<input id="uploadId-super-homepage" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
						</label>
						<div class="col-1" style="width:63%; padding-top:25px;">
							<div id="background-setting-position-super-homepage" class="radio_block parallax-settigs">
								<b style="padding-right:15px;"><?php _e('Position' , THEMENAME); ?></b>
								<select class="radio-position-clone bposition select-position" name="super-homepage-position">
									<?php foreach($color_position as $k=>$v): ?>
										<?php if( $v == $cuckoo_footer['super-homepage-position'] ) : ?>
											<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
										<?php else : ?>
											<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<div id="background-setting-reapet-super-homepage" class="radio_block parallax-settigs">
								<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , THEMENAME); ?></b>
								<?php foreach($repeat_img as $k=>$v): ?>
									<?php if( $k == $cuckoo_footer['super-homepage-repeat'] ) : ?>
										<input type="radio" class="radio-repeat-clone" name="super-homepage-repeat" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-repeat-clone" name="super-homepage-repeat" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>													
							<div id="background-setting-attach-super-homepage" class="radio_block parallax-settigs">
								<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , THEMENAME); ?></b>
								<?php foreach($attachament_img as $k=>$v): ?>
									<?php if( $k == $cuckoo_footer['super-homepage-attachment'] ) : ?>
										<input type="radio" class="radio-attachment-clone" name="super-homepage-attachment" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-attachment-clone" name="super-homepage-attachment" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
							<div id="background-setting-speed-super-homepage" class="radio_block parallax-settigs" style="padding:15px 0 0;">
								<label for="parallax-speed-super-homepage"> 
									<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', THEMENAME); ?></b>
								</label>
								<input type="text" id="parallax-speed-super-homepage" class="parallax-speed" name="parallax-speed-super-homepage" value="<?php echo $cuckoo_footer['parallax-speed-super-homepage']; ?>" />
							</div>
						</div>
						<div class="col-1 last" style="width:33%; padding-top:25px;">
							<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , THEMENAME); ?></b>
							<input type="text" id="color-super-homepage" value="<?php echo $back = empty($cuckoo_footer['super-homepage-color']) ? '#' : $cuckoo_footer['super-homepage-color']; ?>" class="colorInput" name="color_picker_color-super-homepage" style="background-color:<?php echo $cuckoo_footer['super-homepage-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-super-homepage" />
							<div id="color_picker_color-super-homepage" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>				
			</div>
			
			<div class="general_title_active">
				<span class="float_left"><?php _e('Other Pages Super Footer Background Settings', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<div class="full-width">
						<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
							<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', THEMENAME); ?>
						</div>
						<div class="titleBackground">
							<b><?php _e('Background',THEMENAME); ?></b>
							<select id="parallax-effect-super-page" name="parallax-effect-super-page" class="background-select-parallax">
							<?php if($cuckoo_footer['parallax-super-page'] == '1') :?>
								<option value="1" selected><?php _e('Parallax Background'); ?></option>
								<option value="2"><?php _e('Default Background'); ?></option>
							<?php else: ?>
								<option value="2" selected><?php _e('Default Background'); ?></option>
								<option value="1"><?php _e('Parallax Background'); ?></option>
							<?php endif; ?>
							</select>
						</div>
						<label for="upload_image-super-page">
							<input id="image_url_input-super-page" class="upload_image-super-page upLaoding" style="width:82%;" type="text" size="36" name="upload_image-super-page" value="<?php echo $cuckoo_footer['super-page-image'] ?>" />
							<input id="uploadId-super-page" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
						</label>
						<div class="col-1" style="width:63%; padding-top:25px;">
							<div id="background-setting-position-super-page" class="radio_block parallax-settigs">
								<b style="padding-right:15px;"><?php _e('Position' , THEMENAME); ?></b>
								<select class="radio-position-clone bposition select-position" name="super-page-position">
									<?php foreach($color_position as $k=>$v): ?>
										<?php if( $v == $cuckoo_footer['super-page-position'] ) : ?>
											<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
										<?php else : ?>
											<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<div id="background-setting-reapet-super-page" class="radio_block parallax-settigs">
								<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , THEMENAME); ?></b>
								<?php foreach($repeat_img as $k=>$v): ?>
									<?php if( $k == $cuckoo_footer['super-page-repeat'] ) : ?>
										<input type="radio" class="radio-repeat-clone" name="super-page-repeat" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-repeat-clone" name="super-page-repeat" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>													
							<div id="background-setting-attach-super-page" class="radio_block parallax-settigs">
								<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , THEMENAME); ?></b>
								<?php foreach($attachament_img as $k=>$v): ?>
									<?php if( $k == $cuckoo_footer['super-page-attachment'] ) : ?>
										<input type="radio" class="radio-attachment-clone" name="super-page-attachment" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-attachment-clone" name="super-page-attachment" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
							<div id="background-setting-speed-super-page" class="radio_block parallax-settigs" style="padding:15px 0 0;">
								<label for="parallax-speed-super-page"> 
									<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', THEMENAME); ?></b>
								</label>
								<input type="text" id="parallax-speed-super-page" class="parallax-speed" name="parallax-speed-super-page" value="<?php echo $cuckoo_footer['parallax-speed-footer']; ?>" />
							</div>
						</div>
						<div class="col-1 last" style="width:33%; padding-top:25px;">
							<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , THEMENAME); ?></b>
							<input type="text" id="color-super-page" value="<?php echo $back = empty($cuckoo_footer['super-page-color']) ? '#' : $cuckoo_footer['super-page-color']; ?>" class="colorInput" name="color_picker_color-super-page" style="background-color:<?php echo $cuckoo_footer['super-page-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-super-page" />
							<div id="color_picker_color-super-page" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>				
			</div>
			
			<?php /* Footer settings */ ?>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Footer Settings', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings" style="position:relative; border-bottom:0; padding-bottom:0px;">
					<span style="font-size:12px; color:#999999;">
						<?php _e("Using Line 1, Line 2 and Line 3 form fields you can add some texts and links in the footer.<br /> 
						".esc_attr('Example: CuckooThemes | Copyright '.date('Y').' <a title="CuckooThemes.com" href="http://cuckoothemes.com">CuckooThemes.com</a>
							Powered by <a href="http://wordpress.org/">WordPress</a> | Created by <a href="http://cuckoothemes.com">CuckooThemes.com</a>'), 'cuckoothemes'); ?>
					</span>
				</div>
				<div class="section_settings">
						<p style="margin:0; display:inline-block;">
							<b style="padding:0 18px;"><?php _e('Line 1', 'cuckoothemes'); ?></b>
							<input class="width_input_title" style="width:670px;" name="line1" type="text" value="<?php echo esc_attr( $cuckoo_footer['line1'] ); ?>" />
						</p>
						<p style="margin:12px 0;">
							<b style="padding:0 18px;"><?php _e('Line 2', 'cuckoothemes'); ?></b>
							<input class="width_input_title" style="width:670px;" name="line2" type="text" value="<?php echo esc_attr( $cuckoo_footer['line2'] ); ?>" />
						</p>
						<p style="margin:12px 0;">
							<b style="padding:0 18px;"><?php _e('Line 3', 'cuckoothemes'); ?></b>
							<input class="width_input_title" style="width:670px;" name="line3" type="text" value="<?php echo esc_attr( $cuckoo_footer['line3'] ); ?>" />
						</p>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Footer Background Settings', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<div class="full-width">
						<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
							<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', 'cuckoothemes'); ?>
						</div>
						<div class="titleBackground">
							<b><?php _e('Background','cuckoothemes'); ?></b>
							<select id="parallax-effect-4" name="parallax-effect-4" class="background-select-parallax">
							<?php if($cuckoo_footer['parallax-footer'] == '1') :?>
								<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
							<?php else: ?>
								<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
								<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
							<?php endif; ?>
							</select>
						</div>
						<label for="upload_image4">
							<input id="image_url_input4" class="upload_image4 upLaoding" style="width:82%;" type="text" size="36" name="upload_image4" value="<?php echo $cuckoo_footer['footer-image'] ?>" />
							<input id="uploadId4" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
						</label>
						<div class="col-1" style="width:63%; padding-top:25px;">
							<div id="background-setting-position-4" class="radio_block parallax-settigs">
								<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>	
								<select class="radio-position-clone bposition" name="footer-position">
								<?php foreach($color_position as $k=>$v): ?>
									<?php if( $v == $cuckoo_footer['footer-position'] ) : ?>
										<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
									<?php else : ?>
										<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
								</select>
							</div>
							<div id="background-setting-reapet-4" class="radio_block parallax-settigs">
								<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
								<?php foreach($repeat_img as $k=>$v): ?>
									<?php if( $k == $cuckoo_footer['footer-repeat'] ) : ?>
										<input type="radio" class="radio-repeat-clone" name="footer-repeat" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-repeat-clone" name="footer-repeat" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>													
							<div id="background-setting-attach-4" class="radio_block parallax-settigs">
								<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
								<?php foreach($attachament_img as $k=>$v): ?>
									<?php if( $k == $cuckoo_footer['footer-attachment'] ) : ?>
										<input type="radio" class="radio-attachment-clone" name="footer-attachment" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-attachment-clone" name="footer-attachment" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
							<div id="background-setting-speed-4" class="radio_block parallax-settigs" style="padding:15px 0 0;">
								<label for="parallax-speed-4"> 
									<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
								</label>
								<input type="text" id="parallax-speed-4" class="parallax-speed" name="parallax-speed-4" value="<?php echo $cuckoo_footer['parallax-speed-footer']; ?>" />
							</div>
						</div>
						<div class="col-1 last" style="width:33%; padding-top:25px;">
							<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
							<input type="text" id="color-100" value="<?php echo $back = empty($cuckoo_footer['footer-color-back']) ? '#' : $cuckoo_footer['footer-color-back']; ?>" class="colorInput" name="color_picker_color-100" style="background-color:<?php echo $cuckoo_footer['footer-color-back']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-100" />
							<div id="color_picker_color-100" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>				
			</div>
			<!-- Footer Fonts  -->
			<div class="general_title_active">
				<span class="float_left"><?php _e('Footer Fonts', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<!-- Footer Navigation Menu -->
				<div class="section_settings font_block">
					<div class="settings_left_title">
						<?php _e('Footer Navigation Menu', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="footer-font-nav">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['footer-font-nav']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['footer-font-nav']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="footer-weight-nav">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['footer-weight-nav']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="footer-style-nav">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['footer-style-nav']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="footer-size-nav">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['footer-size-nav'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="footer-lheight-nav" value="<?php echo $cuckoo_footer['footer-lheight-nav'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>			
							<input type="text" id="color-102" value="<?php echo $back = empty($cuckoo_footer['footer-color-nav']) ? '#' : $cuckoo_footer['footer-color-nav']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-102" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['footer-color-nav']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-102" />
							<div id="color_picker_color-102" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>					
				
				<!-- Footer Navigation Menu Hover -->
				<div class="section_settings font_block">
					<div class="settings_left_title">
						<?php _e('Footer Navigation Menu Hover', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="footer-font-nav-hover">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['footer-font-nav-hover']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['footer-font-nav-hover']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="footer-weight-nav-hover">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['footer-weight-nav-hover']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="footer-style-nav-hover">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['footer-style-nav-hover']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="footer-size-nav-hover">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['footer-size-nav-hover'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="footer-lheight-nav-hover" value="<?php echo $cuckoo_footer['footer-lheight-nav-hover'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>			
							<input type="text" id="color-103" value="<?php echo $back = empty($cuckoo_footer['footer-color-nav-hover']) ? '#' : $cuckoo_footer['footer-color-nav-hover']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-103" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['footer-color-nav-hover']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-103" />
							<div id="color_picker_color-103" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>	
				
				<!-- Footer Details -->
				<div class="section_settings font_block" style="border-bottom:0;">
					<div class="settings_left_title">
						<?php _e('Footer Details', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="footer-font">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_footer['footer-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_footer['footer-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							?>
						</select>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Weight', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select_first" name="footer-weight">
							<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_footer['footer-weight']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Style', 'cuckoothemes'); ?>
							</div>
							<select class="mini_select" name="footer-style">
							<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_footer['footer-style']) 
										echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
									else
										echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
								}
							?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Size', 'cuckoothemes'); ?>
							</div>
							<select class="mini_last_select" name="footer-size">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_footer['footer-size'] == $i ) :
											echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
										else :
											echo "<option value='" . $i . "'>" . $i . "</option>\n";
										endif;
									endfor;
								?>
							</select>
						</div>
						<div class="fonts_attr_bottom">
							<div class="font_description_mini">
								<?php _e('Line Height', 'cuckoothemes'); ?>
							</div>
							<input class="mini_select-input" type="text" name="footer-lheight" value="<?php echo $cuckoo_footer['footer-lheight'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-101" value="<?php echo $back = empty($cuckoo_footer['footer-color']) ? '#' : $cuckoo_footer['footer-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-101" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_footer['footer-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-101" />
							<div id="color_picker_color-101" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<?php /* Footer settings END */ ?>
		</div>
		<p style="display:inline">
			<input type="submit" name="all" value="Save" style="margin-right:20px; position:relative; width:100px; height:30px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " /> 
		</p>
		<?php cuckoo_framework_footer(); ?>
	</form>
</section>