<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
** Name: admin page in framework
*/
global $theme_style;
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
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

$effect_lists_array = array(
	'elementsQuicklyLeft' => 'Slide Left',
	'elementOpacity' => 'Fade',
	'default' => 'Default'
);

$hoverEffects = array(
	'WhiteBlack-Hover-Coloring' => 'Grayscale to Color',
	'Coloring-Hover-WhiteBlack' => 'Color to Grayscale',
	'WhiteBlack-noHover' => 'Grayscale Thumbnail',
	'Coloring-noHover' => 'Color Thumbnail',
	'Coloring-Opacity' => 'Color Thumbnail Opacity',
	'Coloring-border' => 'Color Thumbnail Border Radius',
);

$cuckoo_woocommerce = get_option( THEMEPREFIX . "_woocommerce_cuckoo" );

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
if(isset($_REQUEST['all']))
{

$cuckoo_woocommerce = array(
	'single_page_title' 		=> $title = $_POST['single_page_title'] == '' ? 'Shop Product' : $_POST['single_page_title'],
	'single_page_subtitle' 		=> $_POST['single_page_subtitle'],
	'related_products' 			=> $_POST['related_products'],
	'productThumbHover' 		=> $_POST['productThumbHover'],
	'related_products_show' 	=> $_POST['related_products_show'],
	'relatedEffects' 			=> $_POST['relatedEffects'],
	'parallax' 					=> $_POST['parallax-effect-1'],
	'img_url' 					=> $_POST['upload_image1'],
	'imgPosition' 				=> $_POST['radio_position-1'],
	'imgRepeat' 				=> $_POST['radio_repeat-1'],
	'imgAttachment' 			=> $_POST['radio_attachment-1'],
	'parallax-speed' 			=> $speed = $_POST['parallax-speed'] == '' ? 10 : $_POST['parallax-speed'],
	'backgroundColor' 			=> $_POST['color_picker_color-1'],
	// title
	'title_font' 				=> $_POST['title_font'],
	'title_weight' 				=> $_POST['title_weight'],
	'title_style' 				=> $_POST['title_style'],
	'title_size' 				=> $_POST['title_size'],
	'title_lheight' 			=> $_POST['title_lheight'],
	'title_color' 				=> $_POST['color_picker_color-title'],
	// subtitle
	'subtitle_font' 			=> $_POST['subtitle_font'],
	'subtitle_weight' 			=> $_POST['subtitle_weight'],
	'subtitle_style' 			=> $_POST['subtitle_style'],
	'subtitle_size' 			=> $_POST['subtitle_size'],
	'subtitle_lheight' 			=> $_POST['subtitle_lheight'],
	'subtitle_color' 			=> $_POST['color_picker_color-subtitle'],	
	// product_title
	'product_title_font' 		=> $_POST['product_title_font'],
	'product_title_weight' 		=> $_POST['product_title_weight'],
	'product_title_style' 		=> $_POST['product_title_style'],
	'product_title_size' 		=> $_POST['product_title_size'],
	'product_title_lheight' 	=> $_POST['product_title_lheight'],
	'product_title_color' 		=> $_POST['color_picker_color-product_title'],
	// Sale Box Font 
	'sale_box_font' 			=> $_POST['sale_box_font'],
	'sale_box_weight' 			=> $_POST['sale_box_weight'],
	'sale_box_style' 			=> $_POST['sale_box_style'],
	'sale_box_size' 			=> $_POST['sale_box_size'],
	'sale_box_lheight' 			=> $_POST['sale_box_lheight'],
	'sale_box_color' 			=> $_POST['color_picker_color-sale_box'],
	// Sale Price Font
	'price_font' 				=> $_POST['price_font'],
	'price_weight' 				=> $_POST['price_weight'],
	'price_style' 				=> $_POST['price_style'],
	'price_size' 				=> $_POST['price_size'],
	'price_lheight' 			=> $_POST['price_lheight'],
	'price_color' 				=> $_POST['color_picker_color-2'],
	// Regular Price Font 
	'regular_font' 				=> $_POST['regular_font'],
	'regular_weight' 			=> $_POST['regular_weight'],
	'regular_style' 			=> $_POST['regular_style'],
	'regular_size' 				=> $_POST['regular_size'],
	'regular_lheight' 			=> $_POST['regular_lheight'],
	'regular_color' 			=> $_POST['color_picker_color-3'],
	// Add to Cart Button Font 
	'add_to_cart_font' 			=> $_POST['add_to_cart_font'],
	'add_to_cart_weight' 		=> $_POST['add_to_cart_weight'],
	'add_to_cart_style' 		=> $_POST['add_to_cart_style'],
	'add_to_cart_size' 			=> $_POST['add_to_cart_size'],
	'add_to_cart_lheight' 		=> $_POST['add_to_cart_lheight'],
	'add_to_cart_color' 		=> $_POST['color_picker_color-add_to_cart'],	
	// Related Products Unit Title Font
	'related_products_font' 	=> $_POST['related_products_font'],
	'related_products_weight' 	=> $_POST['related_products_weight'],
	'related_products_style' 	=> $_POST['related_products_style'],
	'related_products_size' 	=> $_POST['related_products_size'],
	'related_products_lheight' 	=> $_POST['related_products_lheight'],
	'related_products_color' 	=> $_POST['color_picker_color-related_products'],
	// Colors
	'subtitle-line-color' 			=> $_POST['color_picker_color-subtitle-line'],
	'details-box-color' 			=> $_POST['color_picker_color-details-box'],
	'sale-box-1-color' 				=> $_POST['color_picker_color-sale-box-1'],
	'add-to-cart-button-color' 		=> $_POST['color_picker_color-add-to-cart-button'],
	'add-to-cart-button-hover-color'=> $_POST['color_picker_color-add-to-cart-button-hover'],
);

update_option( THEMEPREFIX . "_woocommerce_cuckoo" , $cuckoo_woocommerce );
?>
	<div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
<?php
}

if(isset($_REQUEST['restore'])){

	$cuckoo_woocommerce_restore = array(
	'single_page_title' 		=> $cuckoo_woocommerce['single_page_title'],
	'single_page_subtitle' 		=> $cuckoo_woocommerce['single_page_subtitle'],
	'related_products' 			=> $cuckoo_woocommerce['related_products'],
	'productThumbHover' 		=> $cuckoo_woocommerce['productThumbHover'], 
	'related_products_show' 	=> $cuckoo_woocommerce['related_products_show'], 
	'relatedEffects' 			=> $cuckoo_woocommerce['relatedEffects'], 
	'parallax' 					=> $cuckoo_woocommerce['parallax'],
	'img_url' 					=> $cuckoo_woocommerce['img_url'],
	'imgPosition' 				=> $cuckoo_woocommerce['imgPosition'],
	'imgRepeat' 				=> $cuckoo_woocommerce['imgRepeat'],
	'imgAttachment' 			=> $cuckoo_woocommerce['imgAttachment'],
	'parallax-speed' 			=> $cuckoo_woocommerce['parallax-speed'],
	'backgroundColor' 			=> $cuckoo_woocommerce['backgroundColor'],	
	'title_font' 				=> $theme_style['woocommerce_fonts']['title_font'], 
	'title_weight'			 	=> $theme_style['woocommerce_fonts']['title_weight'], 
	'title_style' 				=> $theme_style['woocommerce_fonts']['title_style'], 
	'title_size' 				=> $theme_style['woocommerce_fonts']['title_size'], 
	'title_lheight' 			=> $theme_style['woocommerce_fonts']['title_lheight'], 
	'title_color' 				=> $theme_style['woocommerce_fonts']['title_color'], 
	'subtitle_font' 			=> $theme_style['woocommerce_fonts']['subtitle_font'], 
	'subtitle_weight' 			=> $theme_style['woocommerce_fonts']['subtitle_weight'], 
	'subtitle_style' 			=> $theme_style['woocommerce_fonts']['subtitle_style'], 
	'subtitle_size' 			=> $theme_style['woocommerce_fonts']['subtitle_size'], 
	'subtitle_lheight' 			=> $theme_style['woocommerce_fonts']['subtitle_lheight'], 
	'subtitle_color' 			=> $theme_style['woocommerce_fonts']['subtitle_color'], 
	'product_title_font' 		=> $theme_style['woocommerce_fonts']['product_title_font'], 
	'product_title_weight' 		=> $theme_style['woocommerce_fonts']['product_title_weight'], 
	'product_title_style' 		=> $theme_style['woocommerce_fonts']['product_title_style'],
	'product_title_size' 		=> $theme_style['woocommerce_fonts']['product_title_size'], 
	'product_title_lheight' 	=> $theme_style['woocommerce_fonts']['product_title_lheight'], 
	'product_title_color' 		=> $theme_style['woocommerce_fonts']['product_title_color'], 
	'sale_box_font' 			=> $theme_style['woocommerce_fonts']['sale_box_font'], 
	'sale_box_weight' 			=> $theme_style['woocommerce_fonts']['sale_box_weight'], 
	'sale_box_style' 			=> $theme_style['woocommerce_fonts']['sale_box_style'], 
	'sale_box_size' 			=> $theme_style['woocommerce_fonts']['sale_box_size'], 
	'sale_box_lheight' 			=> $theme_style['woocommerce_fonts']['sale_box_lheight'], 
	'sale_box_color' 			=> $theme_style['woocommerce_fonts']['sale_box_color'], 
	'price_font' 				=> $theme_style['woocommerce_fonts']['price_font'], 
	'price_weight' 				=> $theme_style['woocommerce_fonts']['price_weight'], 
	'price_style' 				=> $theme_style['woocommerce_fonts']['price_style'], 
	'price_size' 				=> $theme_style['woocommerce_fonts']['price_size'], 
	'price_lheight' 			=> $theme_style['woocommerce_fonts']['price_lheight'],
	'price_color' 				=> $theme_style['woocommerce_fonts']['price_color'], 
	'regular_font' 				=> $theme_style['woocommerce_fonts']['regular_font'], 
	'regular_weight' 			=> $theme_style['woocommerce_fonts']['regular_weight'], 
	'regular_style' 			=> $theme_style['woocommerce_fonts']['regular_style'], 
	'regular_size' 				=> $theme_style['woocommerce_fonts']['regular_size'], 
	'regular_lheight' 			=> $theme_style['woocommerce_fonts']['regular_lheight'], 
	'regular_color' 			=> $theme_style['woocommerce_fonts']['regular_color'], 
	'add_to_cart_font' 			=> $theme_style['woocommerce_fonts']['add_to_cart_font'], 
	'add_to_cart_weight' 		=> $theme_style['woocommerce_fonts']['add_to_cart_weight'], 
	'add_to_cart_style' 		=> $theme_style['woocommerce_fonts']['add_to_cart_style'], 
	'add_to_cart_size' 			=> $theme_style['woocommerce_fonts']['add_to_cart_size'], 
	'add_to_cart_lheight' 		=> $theme_style['woocommerce_fonts']['add_to_cart_lheight'], 
	'add_to_cart_color' 		=> $theme_style['woocommerce_fonts']['add_to_cart_color'], 
	'related_products_font' 	=> $theme_style['woocommerce_fonts']['related_products_font'],
	'related_products_weight' 	=> $theme_style['woocommerce_fonts']['related_products_weight'], 
	'related_products_style' 	=> $theme_style['woocommerce_fonts']['related_products_style'], 
	'related_products_size' 	=> $theme_style['woocommerce_fonts']['related_products_size'], 
	'related_products_lheight' 	=> $theme_style['woocommerce_fonts']['related_products_lheight'], 
	'related_products_color' 	=> $theme_style['woocommerce_fonts']['related_products_color'], 
	'subtitle-line-color' 		=> $theme_style['woocommerce_fonts']['subtitle-line-color'], 
	'details-box-color' 		=> $theme_style['woocommerce_fonts']['details-box-color'], 
	'sale-box-1-color' 			=> $theme_style['woocommerce_fonts']['sale-box-1-color'], 
	'add-to-cart-button-color' 	=> $theme_style['woocommerce_fonts']['add-to-cart-button-color'], 
	'add-to-cart-button-hover-color' => $theme_style['woocommerce_fonts']['add-to-cart-button-hover-color']
	);

	update_option( THEMEPREFIX . "_woocommerce_cuckoo" , $cuckoo_woocommerce_restore );

	?>
		<div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
	<?php
}
?>
	<?php cuckoo_framework_head( __('WooCommerce', 'cuckoothemes') ); ?>
	<form id="formId" method="POST" action="">
		<div id="general_settings">
			<div class="general_title_active">
				<span class="float_left"><?php _e('Eshop Title & Subtitle', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Eshop Title', 'cuckoothemes'); ?>
						</div>
						<input type="text" name="single_page_title" size="60" value="<?php echo $cuckoo_woocommerce['single_page_title']; ?>" />
						<div class="desc_bottom">
							<?php _e("Enter a Title that will be displayed in main eShop page. If left blank, default title will be displayed.", 'cuckoothemes'); ?>
						</div>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Eshop Subtitle', 'cuckoothemes'); ?>
						</div>
						<input type="text" name="single_page_subtitle" size="60" value="<?php echo $cuckoo_woocommerce['single_page_subtitle']; ?>" />
						<div class="desc_bottom">
							<?php _e("Enter a Subtitle Title that will be displayed in main eShop page (optional).", 'cuckoothemes'); ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Related Products', 'cuckoothemes'); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Related Products', 'cuckoothemes'); ?>
						</div>
						<?php switch($cuckoo_woocommerce['related_products_show'])
						{
							case 'display' : ?>
								<select name="related_products_show">
									<option value="display"><?php _e('Display Related Products', 'cuckoothemes'); ?></option>
									<option value="hide"><?php _e('Hide Related Products', 'cuckoothemes'); ?></option>
								</select>
							<?php break;
							case 'hide' : ?>
								<select name="related_products_show">
									<option value="hide"><?php _e('Hide Related Products', 'cuckoothemes'); ?></option>
									<option value="display"><?php _e('Display Related Products', 'cuckoothemes'); ?></option>
								</select>
							<?php break;
							default : ?>
								<select name="related_products_show">
									<option value="display"><?php _e('Display Related Products', 'cuckoothemes'); ?></option>
									<option value="hide"><?php _e('Hide Related Products', 'cuckoothemes'); ?></option>
								</select>
							<?php break;
						} ?>
						<div class="desc_bottom">
							<?php _e('Related Products will be displayed below each product in a single product page.', 'cuckoothemes'); ?>
						</div>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Enter a Title for Related Products Unit', 'cuckoothemes'); ?>
						</div>
						<input type="text" name="related_products" size="60" value="<?php echo $cuckoo_woocommerce['related_products']; ?>" />
						<div class="desc_bottom">
							<?php _e('Leave it blank and Related Products Unit Title bar will not be displayed.', 'cuckoothemes'); ?>
						</div>
					</div>
					<div class="clear"></div>
					<div class="settings_left" style="float:none; padding-top:25px;">
						<div class="settings_left_full">
							<div class="settings_left_title"><?php _e("Choose Animation Effect",'cuckoothemes'); ?></div>
							<select name="relatedEffects" class="itemHiddenCelect testimEffects">
								<?php foreach($effect_lists_array as $k => $v){ ?>
									<?php if($cuckoo_woocommerce['relatedEffects'] == $k) { ?>
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
					<?php /* Background control */ ?>
					<div class="settings_left_title">
					<?php _e('Related Products Unit Background Settings', 'cuckoothemes'); ?>
					</div>
					<div class="desc_bottom" style="padding:10px 0 30px;">
						<?php _e("Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed. ", 'cuckoothemes'); ?>
					</div>
					<div id="background-settings-1" class="background-setting" style="border-top:0 none; padding-top:0; margin-top:0;">
						<div class="titleBackground">
							<b><?php _e('Background','cuckoothemes'); ?></b>
							<select id="parallax-effect-1" name="parallax-effect-1" class="background-select-parallax">
								<?php if($cuckoo_woocommerce['parallax'] == 1) :?>
								<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
								<option value="0"><?php _e('Default Background','cuckoothemes'); ?></option>
							<?php else: ?>
								<option value="0" selected><?php _e('Default Background','cuckoothemes'); ?></option>
								<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
							<?php endif; ?>
							</select>
						</div>
						<label for="upload_image-1">
							<input id="image_url_input-1" class="upload_image-1 upLaoding" style="width:82%;" type="text" size="36" name="upload_image1" value="<?php echo $cuckoo_woocommerce['img_url'] ?>" />
							<input id="uploadId-1" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
						</label>
						<div class="col-1 float_left" style="width:63%; padding-top:25px;">
							<div id="background-setting-position-1" class="radio_block parallax-settigs back-posi">
								<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
								<select class="radio-position-clone bposition" name="radio_position-1">
									<?php foreach($color_position as $k=>$v): ?>
										<?php if( $v == $cuckoo_woocommerce['imgPosition']  ) : ?>
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
									<?php if( $k == $cuckoo_woocommerce['imgRepeat'] ) : ?>
										<input type="radio" class="radio-repeat-clone" name="radio_repeat-1" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-repeat-clone" name="radio_repeat-1" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>													
							<div id="background-setting-attach-1" class="radio_block parallax-settigs back-attach">
								<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
								<?php foreach($attachament_img as $k=>$v): ?>
									<?php if( $k == $cuckoo_woocommerce['imgAttachment'] ) : ?>
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
								<input type="text" id="parallax-speed-1" class="parallax-speed" name="parallax-speed" value="<?php echo $cuckoo_woocommerce['parallax-speed']; ?>" />
							</div>
						</div>
						<div class="col-1 last float_right" style="width:33%; padding-top:25px;">
							<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
							<input type="text" id="color-1" value="<?php echo $back = empty($cuckoo_woocommerce['backgroundColor']) ? '#' : $cuckoo_woocommerce['backgroundColor']; ?>" class="colorInput" name="color_picker_color-1" style="background-color:<?php echo $cuckoo_woocommerce['backgroundColor']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-1" />
							<div id="color_picker_color-1" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="clear"></div>
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
								<?php _e('Product Thumbnail', 'cuckoothemes'); ?>
							</div>
							<select name="productThumbHover" class="itemHiddenCelect">
								<?php foreach($hoverEffects as $k => $v){ ?>
									<?php if($cuckoo_woocommerce['productThumbHover'] == $k) { ?>
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
			<section id="id_plain_text" class="no-bord" style="display:block;">
				<div class="general_title_active">
					<span class="float_left"><?php _e('Eshop Fonts', 'cuckoothemes'); ?></span>
					<input id="restore_font" class="active_input float_right" name='restore' style="border:1px solid #227399; color:white; " type="submit" value="<?php _e('Reset to Default Settings', 'cuckoothemes'); ?>" />
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="desc_bottom" style="padding:0;">
							<?php _e('CuckooBizz theme provides you with +500 custom fonts from Google.<br />
									All these theme fonts can be managed using CuckooBizz > Theme Fonts tab.<br />
									Here you can manage only the fonts that are used in Eshop only.<br />
									Click Reset to Default Settings button to restore default Eshop font settings.', 'cuckoothemes'); ?>
						</div>
						<div class="clear"></div>
					</div>
<!--- WooCommerce Title --->
					<div class="section_settings font_block">
						<div class="settings_left_title">
							<?php _e('WooCommerce Title', 'cuckoothemes'); ?>
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
									if ($v == $cuckoo_woocommerce['title_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['title_font']) 
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
								<select class="mini_select_first" name="title_weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_woocommerce['title_weight']) 
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
								<select class="mini_select" name="title_style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_woocommerce['title_style']) 
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
								<select class="mini_last_select" name="title_size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_woocommerce['title_size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="title_lheight" value="<?php echo $cuckoo_woocommerce['title_lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-title" value="<?php echo $back = empty($cuckoo_woocommerce['title_color']) ? '#' : $cuckoo_woocommerce['title_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-title" style="background-color:<?php echo $cuckoo_woocommerce['title_color']; ?> ; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-title" />
								<div id="color_picker_color-title" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>					
<!--  WooCommerce Subtitle -->
					<div class="section_settings font_block">
						<div class="settings_left_title">
							<?php _e(' WooCommerce Subtitle', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="subtitle_font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['subtitle_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['subtitle_font']) 
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
								<select class="mini_select_first" name="subtitle_weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_woocommerce['subtitle_weight']) 
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
								<select class="mini_select" name="subtitle_style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_woocommerce['subtitle_style']) 
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
								<select class="mini_last_select" name="subtitle_size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_woocommerce['subtitle_size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="subtitle_lheight" value="<?php echo $cuckoo_woocommerce['subtitle_lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-subtitle" value="<?php echo $back = empty($cuckoo_woocommerce['subtitle_color']) ? '#' : $cuckoo_woocommerce['subtitle_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-subtitle" style="background-color:<?php echo $cuckoo_woocommerce['subtitle_color']; ?> ; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-subtitle" />
								<div id="color_picker_color-subtitle" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>					
<!-- Product Title in a Single Product Page -->
					<div class="section_settings font_block">
						<div class="settings_left_title">
							<?php _e('Product Title in a Single Product Page', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="product_title_font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['product_title_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['product_title_font']) 
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
								<select class="mini_select_first" name="product_title_weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_woocommerce['product_title_weight']) 
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
								<select class="mini_select" name="product_title_style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_woocommerce['product_title_style']) 
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
								<select class="mini_last_select" name="product_title_size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_woocommerce['product_title_size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="product_title_lheight" value="<?php echo $cuckoo_woocommerce['product_title_lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-product_title" value="<?php echo $back = empty($cuckoo_woocommerce['product_title_color']) ? '#' : $cuckoo_woocommerce['product_title_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-product_title" style="background-color:<?php echo $cuckoo_woocommerce['product_title_color']; ?> ; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-product_title" />
								<div id="color_picker_color-product_title" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>					
<!-- Sale Box Font -->
					<div class="section_settings font_block">
						<div class="settings_left_title">
							<?php _e('Sale Box Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="sale_box_font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['sale_box_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['sale_box_font']) 
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
								<select class="mini_select_first" name="sale_box_weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_woocommerce['sale_box_weight']) 
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
								<select class="mini_select" name="sale_box_style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_woocommerce['sale_box_style']) 
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
								<select class="mini_last_select" name="sale_box_size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_woocommerce['sale_box_size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="sale_box_lheight" value="<?php echo $cuckoo_woocommerce['sale_box_lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-sale_box" value="<?php echo $back = empty($cuckoo_woocommerce['sale_box_color']) ? '#' : $cuckoo_woocommerce['sale_box_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-sale_box" style="background-color:<?php echo $cuckoo_woocommerce['sale_box_color']; ?> ; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-sale_box" />
								<div id="color_picker_color-sale_box" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>					
<!-- Sale Price Font -->
					<div class="section_settings font_block">
						<div class="settings_left_title">
							<?php _e('Sale Price Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="price_font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['price_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['price_font']) 
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
								<select class="mini_select_first" name="price_weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_woocommerce['price_weight']) 
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
								<select class="mini_select" name="price_style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_woocommerce['price_style']) 
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
								<select class="mini_last_select" name="price_size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_woocommerce['price_size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="price_lheight" value="<?php echo $cuckoo_woocommerce['price_lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-2" value="<?php echo $back = empty($cuckoo_woocommerce['price_color']) ? '#' : $cuckoo_woocommerce['price_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-2" style="background-color:<?php echo $cuckoo_woocommerce['price_color']; ?> ; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-2" />
								<div id="color_picker_color-2" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Regular Price Font -->
					<div class="section_settings font_block">
						<div class="settings_left_title">
							<?php _e('Regular Price Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="regular_font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['regular_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['regular_font']) 
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
								<select class="mini_select_first" name="regular_weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_woocommerce['regular_weight']) 
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
								<select class="mini_select" name="regular_style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_woocommerce['regular_style']) 
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
								<select class="mini_last_select" name="regular_size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_woocommerce['regular_size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="regular_lheight" value="<?php echo $cuckoo_woocommerce['regular_lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-3" value="<?php echo $back = empty($cuckoo_woocommerce['regular_color']) ? '#' : $cuckoo_woocommerce['regular_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-3" style="background-color:<?php echo $cuckoo_woocommerce['regular_color']; ?> ; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-3" />
								<div id="color_picker_color-3" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>					
<!-- Add to Cart Button Font -->
					<div class="section_settings font_block">
						<div class="settings_left_title">
							<?php _e('Add to Cart Button Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="add_to_cart_font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['add_to_cart_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['add_to_cart_font']) 
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
								<select class="mini_select_first" name="add_to_cart_weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_woocommerce['add_to_cart_weight']) 
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
								<select class="mini_select" name="add_to_cart_style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_woocommerce['add_to_cart_style']) 
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
								<select class="mini_last_select" name="add_to_cart_size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_woocommerce['add_to_cart_size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="add_to_cart_lheight" value="<?php echo $cuckoo_woocommerce['add_to_cart_lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-add_to_cart" value="<?php echo $back = empty($cuckoo_woocommerce['add_to_cart_color']) ? '#' : $cuckoo_woocommerce['add_to_cart_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-add_to_cart" style="background-color:<?php echo $cuckoo_woocommerce['add_to_cart_color']; ?> ; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-add_to_cart" />
								<div id="color_picker_color-add_to_cart" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>					
<!-- Related Products Unit Title Font -->
					<div class="section_settings font_block">
						<div class="settings_left_title">
							<?php _e('Related Products Unit Title Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="related_products_font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['related_products_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['related_products_font']) 
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
								<select class="mini_select_first" name="related_products_weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_woocommerce['related_products_weight']) 
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
								<select class="mini_select" name="related_products_style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_woocommerce['related_products_style']) 
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
								<select class="mini_last_select" name="related_products_size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_woocommerce['related_products_size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="related_products_lheight" value="<?php echo $cuckoo_woocommerce['related_products_lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-related_products" value="<?php echo $back = empty($cuckoo_woocommerce['related_products_color']) ? '#' : $cuckoo_woocommerce['related_products_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-related_products" style="background-color:<?php echo $cuckoo_woocommerce['related_products_color']; ?> ; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-related_products" />
								<div id="color_picker_color-related_products" class="colorPickerMain"></div>
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
					<span class="float_left"><?php _e('Eshop Elements Colors', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings" style="border-bottom:0;">
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Subtitle Line Color ', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-subtitle-line" value="<?php echo $back = empty($cuckoo_woocommerce['subtitle-line-color']) ? '#' : $cuckoo_woocommerce['subtitle-line-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-subtitle-line" style="background-color:<?php echo $cuckoo_woocommerce['subtitle-line-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-subtitle-line" />
								<div id="color_picker_color-subtitle-line" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Details Box Background Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-details-box" value="<?php echo $back = empty($cuckoo_woocommerce['details-box-color']) ? '#' : $cuckoo_woocommerce['details-box-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-details-box" style="background-color:<?php echo $cuckoo_woocommerce['details-box-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-details-box" />
								<div id="color_picker_color-details-box" class="colorPickerMain"></div>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Sale Box Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-sale-box-1" value="<?php echo $back = empty($cuckoo_woocommerce['sale-box-1-color']) ? '#' : $cuckoo_woocommerce['sale-box-1-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-sale-box-1" style="background-color:<?php echo $cuckoo_woocommerce['sale-box-1-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-sale-box-1" />
								<div id="color_picker_color-sale-box-1" class="colorPickerMain"></div>
							</div>	
						</div>
						<div style="width:100%; height:1px; border-bottom:1px solid #D6D6D6; clear:both; padding-top:29px;"></div>
						<div class="full-width">													
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color padding-plus">
									<?php _e('Add to Cart Button Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-add-to-cart-button" value="<?php echo $back = empty($cuckoo_woocommerce['add-to-cart-button-color']) ? '#' : $cuckoo_woocommerce['add-to-cart-button-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-add-to-cart-button" style="background-color:<?php echo $cuckoo_woocommerce['add-to-cart-button-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-add-to-cart-button" />
								<div id="color_picker_color-add-to-cart-button" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color padding-plus">
									<?php _e('Add to Cart Button Color on Hover', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-add-to-cart-button-hover" value="<?php echo $back = empty($cuckoo_woocommerce['add-to-cart-button-hover-color']) ? '#' : $cuckoo_woocommerce['add-to-cart-button-hover-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-add-to-cart-button-hover" style="background-color:<?php echo $cuckoo_woocommerce['add-to-cart-button-hover-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-add-to-cart-button-hover" />
								<div id="color_picker_color-add-to-cart-button-hover" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
			</section>
		</div>
		<p style="display:inline;">
			<input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" />
		</p>
		<?php cuckoo_framework_footer(); ?>
	</form>
</section>