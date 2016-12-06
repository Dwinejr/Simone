<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 /*
 * Galerry page 
 */
$cuckoo_gallery = get_option( THEMEPREFIX . "_gallery_settings" );
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
?>
<script type="text/javascript">
	jQuery(document).ready(function($){
		$(".section_settings").change(function () {
			var family = $(this).find("select.font_select option:selected").val();
			var fontSize = $(this).find("select.mini_last_select option:selected").val();
			var fontWeight = $(this).find("select.mini_select_first option:selected").val();
			var fontStyle = $(this).find("select.mini_select option:selected").val();
			var fontLine = $(this).find("input.mini_select-input").val();
			var fontColor = $(this).find("input.mini_select-input-color").val();
			var familyShow = family;
			
			$("head").append('<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='+familyShow+':200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic">');
			$(this).find(".font_preview").css('font-family', familyShow+" , sans-serif");
			$(this).find(".font_preview").css('font-style', fontStyle);
			$(this).find(".font_preview").css('font-weight', fontWeight);
			$(this).find(".font_preview").css('color', fontColor);
			if( fontSize > 0 ){
				$(this).find(".font_preview").css('font-size', fontSize+"px");
			}else{
				$(this).find(".font_preview").css('font-size', "12px");
			}				
			if( fontLine > 0 ){
				$(this).find(".font_preview").css('line-height', fontLine);
			}else{
				$(this).find(".font_preview").css('line-height', "1.3");
			}
		}).trigger('change');
		$("#restore_font").click(function(){
			var answer = confirm('Do you really want to reset all fonts settings?');
			return answer;
		});
		$(".selectPicker").click(function(){
			var color = $(this).parent().find('.mini_select-input-color').val();
			$(this).parent().parent().parent().find(".font_preview").css('color', color);
		});
	});
</script>
<section id="main_content">
<?php
if(isset($_REQUEST['all']))
{
$portfolio			= esc_attr( $_POST['portfolio_content'] );
$exclude			= esc_attr( $_POST['exclude'] );
$exclude_portfilio	= esc_attr ( $_POST['port_exclude_name'] );
$portfolio_sort		= esc_attr ( $_POST['portfolio_sort'] );
$by_type_sort		= esc_attr ( $_POST['by_type_sort'] );


$cuckoo_gallery = array(
'portfolio'			=> $portfolio,
'exclude_name'		=> $exclude,
'exclude'			=> cuckoo_exclude_from_categories($exclude , 'types'),
'port_exclude_name'	=> $exclude_portfilio,
'exclude_portfilio' => cuckoo_exclude_from_categories($exclude_portfilio , 'types'),
'portfolio_sort'	=> $portfolio_sort,
'by_type_sort'		=> $by_type_sort,

/* Homepage Static Work Type Font */
'homepage-static-font' 			=> esc_attr( $_POST['homepage-static-font'] ) , 
'homepage-static-weight' 		=> esc_attr( $_POST['homepage-static-weight'] ) ,
'homepage-static-style' 		=> esc_attr( $_POST['homepage-static-style'] ) ,
'homepage-static-size' 			=> $size = (esc_attr( $_POST['homepage-static-size'] ) == "" ? '20' : esc_attr( $_POST['homepage-static-size'] )) ,	
'homepage-static-lheight' 		=> esc_attr( $_POST['homepage-static-lheight'] ) ,	
'homepage-static-color' 		=> esc_attr( $_POST['color_picker_color-homepage-static'] ) ,

/* Homepage Work Type Font on Hover */
'homepage-hover-font' 			=> esc_attr( $_POST['homepage-hover-font'] ) , 
'homepage-hover-weight' 		=> esc_attr( $_POST['homepage-hover-weight'] ) ,
'homepage-hover-style' 			=> esc_attr( $_POST['homepage-hover-style'] ) ,
'homepage-hover-size' 			=> $size = (esc_attr( $_POST['homepage-hover-size'] ) == "" ? '20' : esc_attr( $_POST['homepage-hover-size'] )) ,	
'homepage-hover-lheight' 		=> esc_attr( $_POST['homepage-hover-lheight'] ) ,	
'homepage-hover-color' 			=> esc_attr( $_POST['color_picker_color-homepage-hover'] ) ,

/* Homepage Work Type background */
'homepage-background-color' => esc_attr( $_POST['color_picker_color-homepage-background'] ),

/* Landing Static Work Type Font */
'landing-static-font' 			=> esc_attr( $_POST['landing-static-font'] ) , 
'landing-static-weight' 		=> esc_attr( $_POST['landing-static-weight'] ) ,
'landing-static-style' 			=> esc_attr( $_POST['landing-static-style'] ) ,
'landing-static-size' 			=> $size = (esc_attr( $_POST['landing-static-size'] ) == "" ? '20' : esc_attr( $_POST['landing-static-size'] )) ,	
'landing-static-lheight' 		=> esc_attr( $_POST['landing-static-lheight'] ) ,	
'landing-static-color' 			=> esc_attr( $_POST['color_picker_color-landing-static'] ) ,

/* Landing Work Type Font on Hover */
'landing-hover-font' 			=> esc_attr( $_POST['landing-hover-font'] ) , 
'landing-hover-weight' 			=> esc_attr( $_POST['landing-hover-weight'] ) ,
'landing-hover-style' 			=> esc_attr( $_POST['landing-hover-style'] ) ,
'landing-hover-size' 			=> $size = (esc_attr( $_POST['landing-hover-size'] ) == "" ? '20' : esc_attr( $_POST['landing-hover-size'] )) ,	
'landing-hover-lheight' 		=> esc_attr( $_POST['landing-hover-lheight'] ) ,	
'landing-hover-color' 			=> esc_attr( $_POST['color_picker_color-landing-hover'] ) ,

/* Landing Work Type background */
'landing-background-color' => esc_attr( $_POST['color_picker_color-landing-background'] ),
);

update_option( THEMEPREFIX . "_gallery_settings" , $cuckoo_gallery );
?>
	<div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
<?php
}
?>
	<?php cuckoo_framework_head( __('Portfolio Gallery', 'cuckoothemes') ); ?>
	<form id="formId" method="POST" action="">
		<div id="general_settings">
			<div class="general_title_active">
				<span class="float_left"><?php _e('Portfolio Page Templates', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<div class="desc_bottom" style="padding-top:0;">
						<?php _e('Current settings will be applied to the following templates: Portfolio 2 Columns (thumbnail size 480 x 240 pixels) and Portfolio 4 Columns (thumbnail size 240 x 240 pixels).', 'cuckoothemes'); ?>
					</div>
				</div>
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Choose Default Portfolio Page Content', 'cuckoothemes'); ?>
						</div>
						<?php	
						 wp_dropdown_categories( array(
							'class' 			=> 'dropdown',
							'name' 				=> 'portfolio_content', 
							'show_option_all'	=> 'All Types of Works',
							'taxonomy'			=> 'types',
							'selected'			=> 	$cuckoo_gallery['portfolio']
						));					 				 
						 ?>
						 <div class="desc_bottom">
							<?php _e('Choose Type of Works to be displayed in Portfolio Page Templates by default.', 'cuckoothemes'); ?>
						</div>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Exclude Types of Works', 'cuckoothemes'); ?>
						</div>
						<input type="text" name="port_exclude_name" size="60" value="<?php echo $cuckoo_gallery['port_exclude_name']; ?>" />
						<div class="desc_bottom">
							<?php _e("Enter a comma-separated list of Types of Works that you want to exclude from displaying in Portfolio Page Templates. Example: Type1, Type2, Type3 ", 'cuckoothemes'); ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Choose Sorting of Works', 'cuckoothemes'); ?>
							</div>
							<select name="portfolio_sort" class="dropdown">
								<?php switch($cuckoo_gallery['portfolio_sort']) { 
									case "date" : ?>
										<option value="date"><?php _e('By Date', 'cuckoothemes'); ?></option>
										<option value="rand"><?php _e('Random', 'cuckoothemes'); ?></option>
									<?php break;
									case "rand" : ?>
										<option value="rand"><?php _e('Random', 'cuckoothemes'); ?></option>
										<option value="date"><?php _e('By Date', 'cuckoothemes'); ?></option>
								<?php break;
								} ?>
							</select>
						</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Portfolio Templates by Work Type ', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<div class="desc_bottom" style="padding-top:0;">
						<?php _e('Current settings will be applied to the following templates: Portfolio 2 Columns by Work Type (thumbnail size 480 x 240 pixels) and Portfolio 4 Columns by Work Type (thumbnail size 240 x 240 pixels). Using these templates you can build portfolio pages for a single work type.', 'cuckoothemes'); ?>
					</div>
				</div>
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Choose Sorting of Works', 'cuckoothemes'); ?>
						</div>
						<select name="by_type_sort" class="dropdown">
							<?php switch($cuckoo_gallery['by_type_sort']) { 
								case "date" : ?>
									<option value="date"><?php _e('By Date', 'cuckoothemes'); ?></option>
									<option value="rand"><?php _e('Random', 'cuckoothemes'); ?></option>
								<?php break;
								case "rand" : ?>
									<option value="rand"><?php _e('Random', 'cuckoothemes'); ?></option>
									<option value="date"><?php _e('By Date', 'cuckoothemes'); ?></option>
							<?php break;
							} ?>
						</select>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Works Filter Settings', 'cuckoothemes'); ?></span>
			</div>			
			<div class="active_settings" style="display: block;">
				<div class="title_active_bold">
					<span class="float_left"><?php _e('Filter of Homepage Works Gallery Unit', 'cuckoothemes'); ?></span>
				</div>
			<!-- Homepage Static Work Type Font -->
				<div class="section_settings">
					<div class="settings_left_title">
						<?php _e('Static Work Type Font', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="homepage-static-font">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_gallery['homepage-static-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_gallery['homepage-static-font']) 
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
							<select class="mini_select_first" name="homepage-static-weight">
								<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_gallery['homepage-static-weight']) 
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
							<select class="mini_select" name="homepage-static-style">
								<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_gallery['homepage-static-style']) 
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
							<select class="mini_last_select" name="homepage-static-size">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_gallery['homepage-static-size'] == $i ) :
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
							<input class="mini_select-input" type="text" name="homepage-static-lheight" value="<?php echo $cuckoo_gallery['homepage-static-lheight'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-homepage-static" value="<?php echo $back = empty($cuckoo_gallery['homepage-static-color']) ? '#' : $cuckoo_gallery['homepage-static-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-homepage-static" style="background-color:<?php echo $cuckoo_gallery['homepage-static-color']; ?>; top:-3px; position:relative;" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-homepage-static" />
							<div id="color_picker_color-homepage-static" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>	
			<!-- Homepage Work Type Font on Hover -->
				<div class="section_settings">
					<div class="settings_left_title">
						<?php _e('Work Type Font on Hover', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="homepage-hover-font">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_gallery['homepage-hover-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_gallery['homepage-hover-font']) 
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
							<select class="mini_select_first" name="homepage-hover-weight">
								<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_gallery['homepage-hover-weight']) 
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
							<select class="mini_select" name="homepage-hover-style">
								<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_gallery['homepage-hover-style']) 
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
							<select class="mini_last_select" name="homepage-hover-size">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_gallery['homepage-hover-size'] == $i ) :
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
							<input class="mini_select-input" type="text" name="homepage-hover-lheight" value="<?php echo $cuckoo_gallery['homepage-hover-lheight'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-homepage-hover" value="<?php echo $back = empty($cuckoo_gallery['homepage-hover-color']) ? '#' : $cuckoo_gallery['homepage-hover-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-homepage-hover" style="background-color:<?php echo $cuckoo_gallery['homepage-hover-color']; ?>; top:-3px; position:relative;" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-homepage-hover" />
							<div id="color_picker_color-homepage-hover" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			<!-- Homepage Work Type background -->
				<div class="section_settings">
					<div class="full-width">											
						<div class="fonts_attr_bottom">
							<div class="font_description_mini_color">
								<?php _e('Work Type Background Box', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-homepage-background" value="<?php echo $back = empty($cuckoo_gallery['homepage-background-color']) ? '#' : $cuckoo_gallery['homepage-background-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-homepage-background" style="background-color:<?php echo $cuckoo_gallery['homepage-background-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-homepage-background" />
							<div id="color_picker_color-homepage-background" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>	
				<div class="title_active_bold">
					<span class="float_left"><?php _e('Filter of Landing Page Works Gallery Template', 'cuckoothemes'); ?></span>
				</div>
				<!-- Static Work Type Font -->
				<div class="section_settings">
					<div class="settings_left_title">
						<?php _e('Static Work Type Font', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="landing-static-font">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_gallery['landing-static-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_gallery['landing-static-font']) 
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
							<select class="mini_select_first" name="landing-static-weight">
								<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_gallery['landing-static-weight']) 
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
							<select class="mini_select" name="landing-static-style">
								<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_gallery['landing-static-style']) 
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
							<select class="mini_last_select" name="landing-static-size">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_gallery['landing-static-size'] == $i ) :
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
							<input class="mini_select-input" type="text" name="landing-static-lheight" value="<?php echo $cuckoo_gallery['landing-static-lheight'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-landing-static" value="<?php echo $back = empty($cuckoo_gallery['landing-static-color']) ? '#' : $cuckoo_gallery['landing-static-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-landing-static" style="background-color:<?php echo $cuckoo_gallery['landing-static-color']; ?>; top:-3px; position:relative;" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-landing-static" />
							<div id="color_picker_color-landing-static" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>	
		<!-- Work Type Font on Hover -->
				<div class="section_settings">
					<div class="settings_left_title">
						<?php _e('Work Type Font on Hover', 'cuckoothemes'); ?>
					</div>
					<div class="settings_left">
						<div class="font_description">
							<?php _e('Font Family', 'cuckoothemes'); ?>
						</div>
						<select class="font_select" name="landing-hover-font">
							<?php
							echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($flatIt_array as $k=>$v) {
								if ($v == $cuckoo_gallery['landing-hover-font']) 
									echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
								else
									echo '<option value="' . $v . '">' . $v . '</option>\n'; 
							}
							echo '<option value="" disabled="disabled" >----</option>';
							echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
							echo '<option value="" disabled="disabled" >----</option>';
							foreach ($google_array as $k=>$v) {
								if ($v == $cuckoo_gallery['landing-hover-font']) 
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
							<select class="mini_select_first" name="landing-hover-weight">
								<?php
								foreach ($font_weight as $k=>$v) {
									if ($k == $cuckoo_gallery['landing-hover-weight']) 
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
							<select class="mini_select" name="landing-hover-style">
								<?php
								foreach ($font_style as $k=>$v) {
									if ($k == $cuckoo_gallery['landing-hover-style']) 
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
							<select class="mini_last_select" name="landing-hover-size">
								<?php
									for($i=3; $i<=150; $i++) :
										if ($cuckoo_gallery['landing-hover-size'] == $i ) :
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
							<input class="mini_select-input" type="text" name="landing-hover-lheight" value="<?php echo $cuckoo_gallery['landing-hover-lheight'] ?>">
						</div>
						<div class="fonts_attr_bottom" style="margin-right: -4px;">
							<div class="font_description_mini">
								<?php _e('Font Color', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-landing-hover" value="<?php echo $back = empty($cuckoo_gallery['landing-hover-color']) ? '#' : $cuckoo_gallery['landing-hover-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-landing-hover" style="background-color:<?php echo $cuckoo_gallery['landing-hover-color']; ?>; top:-3px; position:relative;" />
							<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-landing-hover" />
							<div id="color_picker_color-landing-hover" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="settings_left" style="padding-right: 0; width:370px;">
						<div class="font_preview">
							<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section_settings" style="border-bottom:0;">
					<div class="full-width">											
						<div class="fonts_attr_bottom">
							<div class="font_description_mini_color">
								<?php _e('Work Type Background Box', 'cuckoothemes'); ?>
							</div>				
							<input type="text" id="color-landing-background" value="<?php echo $back = empty($cuckoo_gallery['landing-background-color']) ? '#' : $cuckoo_gallery['landing-background-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-landing-background" style="background-color:<?php echo $cuckoo_gallery['landing-background-color']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-landing-background" />
							<div id="color_picker_color-landing-background" class="colorPickerMain"></div>
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