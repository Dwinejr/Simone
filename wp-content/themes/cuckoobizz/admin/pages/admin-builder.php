<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
*/
$cuckoo_builder = get_option( THEMEPREFIX . "_builder_settings" );

/* woocommerce */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	$wooActive = 1;
	$template_list = array(
		'-- Select Source --',
		'Blog Posts',
		'Page',
		'Map',
		'Social Media',	
		'Slideshow',
		'Team',
		'Testimonials',	
		'Text Box',
		'Works Gallery',
		'WooCommerce',
		'HTML Text',
		'Woo Navigation Bar'
	);
}else{
	$wooActive = 0;
	$template_list = array(
		'-- Select Source --',
		'Blog Posts',
		'Page',
		'Map',
		'Social Media',	
		'Slideshow',
		'Team',	
		'Testimonials',	
		'Text Box',
		'Works Gallery',
		'HTML Text'
	);
}

sort($template_list);
$socialMediaFirst = array(
	'Facebook' 	=> 0, 
	'Twitter' 	=> 0, 
	'Google' 	=> 0, 
	'Flickr' 	=> 0, 
	'Instagram' => 0, 
	'Pinterest' => 0, 
	'Dribbble' 	=> 0, 
	'Behance' 	=> 0, 
	'YouTube' 	=> 0, 
	'Vimeo' 	=> 0, 
	'Linkedin' 	=> 0, 
	'Email' 	=> 0, 
	'RSS'		=> 0 
);

$wooDescAsc = array(
	'asc' => 'Ascending Order',
	'desc' => 'Descending Order',
);

$sortableWoo = array(
	'title' => 'Title',
	'name' => 'Name',
	'date' => 'Date',
	'rand' => 'Random'
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
$sorting_array = array(
	'rand' 		=> 'Random',
	'date'		=> 'By Date',
	'title'		=> 'By Title',
	'modified'	=> 'By Last Modified Date',
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

$blog_list_array = array(
	'option-1' => 'option 1', 
	'option-2' => 'option 2', 
	'option-3' => 'option 3', 
);

$test_list_array = array(
	'option-1' => 'option 1', 
	'option-2' => 'option 2'
);
?>

<section id="main_content">
<?php

if(isset($_REQUEST['all']))
{
/* all names settings */
	$r = 1;
	$ItemsAll = array();
	$elements = array();
	$social_array = array();
	$items_array = explode(',', substr($_POST['items'], 0, -1));
	foreach($items_array as $key=>$item){

		$items = substr($item,5);
		if($items != '')
		$ItemsAll[$key] = $items;
		$keys = $key+$r;
		
		// wpml
		if( function_exists('icl_register_string') ) :
			icl_register_string(THEMENAME.' Homepage Builder unit #'.$items, 'Title', $_POST["title-".$items]);
			icl_register_string(THEMENAME.' Homepage Builder unit #'.$items, 'Subtitle', $_POST["subtitle-".$items]);
			icl_register_string(THEMENAME.' Homepage Builder unit #'.$items, 'Text Box unit text', unit_title_scan($_POST['textBox-text-'.$items]));
			icl_register_string(THEMENAME.' Homepage Builder unit #'.$items, 'Text Box unit button title', unit_title_scan($_POST['textBoxUrlTitle-'.$items]));
			icl_register_string(THEMENAME.' Homepage Builder unit #'.$items, 'HTML unit text', cuckoo_get_value( $_POST["imageText-".$items] ));
		endif;
		
		$elements_insert = array( $keys => array( 
		'remove' 				=> $keys , 
		'title' 				=> unit_title_scan($_POST["title-".$items]),
		'subtitle' 				=> esc_attr($_POST["subtitle-".$items]),
		'slug' 					=> $slug = ( esc_attr($_POST["slug-".$items]) == null ? make_ID_in_text( esc_attr($_POST["title-".$items]) ) : esc_attr($_POST["slug-".$items]) ),
		'source' 				=> esc_attr($_POST["unit-source-".$items]),
		'backgroundColor' 		=> $backgoundColorHere = esc_attr($_POST["color_picker_color-".$items]) == "#" ? "" : esc_attr($_POST["color_picker_color-".$items]),
		'imgUrl' 				=> esc_attr($_POST["upload_image".$items]),
		'imgAttachment' 		=> esc_attr($_POST["radio_attachment-".$items]),
		'imgRepeat' 			=> esc_attr($_POST["radio_repeat-".$items]),
		'imgPosition' 			=> esc_attr($_POST["radio_position-".$items]),
		'testimonialCount'		=> $testimonialCount = esc_attr($_POST["testimonialCount-".$items]) == null ? 1 : esc_attr($_POST["testimonialCount-".$items]),
		'teamCount'				=> $teamCount = esc_attr($_POST["teamCount-".$items]) == null ? 4 : esc_attr($_POST["teamCount-".$items]),
		'no_link_thumb_team'	=> esc_attr($_POST["no_link_thumb_team-".$items]),
		'blogCount'				=> $blogCount = esc_attr($_POST["blogCount-".$items]) == null ? 4 : esc_attr($_POST["blogCount-".$items]),
		'testimonialsSorting'	=> esc_attr($_POST["testimonialsSorting-".$items]),
		'testListsOpions'		=> esc_attr($_POST["testListsOpions-".$items]),
		'testimElementsEffects' => esc_attr($_POST["testimElementsEffects-".$items]),
		'teamSorting'			=> esc_attr($_POST["teamSorting-".$items]),
		'teamElementsAround'	=> esc_attr($_POST["teamElementsAround-".$items]),
		'teamElementsEffects'	=> esc_attr($_POST["teamElementsEffects-".$items]),
		'teamContent'			=> esc_attr($_POST["teamContent-".$items]),
		'teamExclude'			=> cuckoo_exclude_from_categories($_POST["teamExclude-".$items] , 'team-categories'),
		'teamExcludeElement'	=> esc_attr($_POST["teamExclude-".$items]),
		'blogSorting'			=> esc_attr($_POST["blogSorting-".$items]),
		'blogElementsEffects'	=> esc_attr($_POST["blogElementsEffects-".$items]),
		'blogElementsAround'	=> esc_attr($_POST["blogElementsAround-".$items]),
		'blogListsOpions'		=> esc_attr($_POST["blogListsOpions-".$items]),
		'postContent'			=> esc_attr($_POST["postContent-".$items]),
		'blogExclude'			=> cuckoo_exclude_from_categories($_POST['blogExclude-'.$items] , 'category'),
		'blogExcludeElement'	=> esc_attr($_POST['blogExclude-'.$items]),
		'pageUrl'				=> esc_attr($_POST['pageUrl-'.$items]),
		'pageTitle'				=> unit_title_scan($_POST['title-display-'.$items]),
		'textBoxText'			=> unit_title_scan($_POST['textBox-text-'.$items]),
		'textBoxUrlTitle'		=> unit_title_scan($_POST['textBoxUrlTitle-'.$items]),
		'textBoxUrl'			=> esc_attr($_POST['textBoxUrl-'.$items]),
		'socialMedia'			=> array('Facebook' => esc_attr($_POST["social-".$items."-Facebook"]),
										'Twitter' 	=> esc_attr($_POST["social-".$items."-Twitter"]),
										'Google' 	=> esc_attr($_POST["social-".$items."-Google"]),
										'Flickr' 	=> esc_attr($_POST["social-".$items."-Flickr"]),
										'Instagram' => esc_attr($_POST["social-".$items."-Instagram"]),
										'Pinterest' => esc_attr($_POST["social-".$items."-Pinterest"]),
										'Dribbble' 	=> esc_attr($_POST["social-".$items."-Dribbble"]),
										'Behance' 	=> esc_attr($_POST["social-".$items."-Behance"]),
										'YouTube' 	=> esc_attr($_POST["social-".$items."-YouTube"]),
										'Vimeo' 	=> esc_attr($_POST["social-".$items."-Vimeo"]),
										'Linkedin' 	=> esc_attr($_POST["social-".$items."-Linkedin"]),
										'Email' 	=> esc_attr($_POST["social-".$items."-Email"]),
										'RSS' 		=> esc_attr($_POST["social-".$items."-RSS"])
								),
		'parallax' 				=> esc_attr($_POST['parallax-effect-'.$items]), 
		'parallax-speed' 		=> $speed = ( esc_attr($_POST['parallax-speed-'.$items]) == '' ? 10 : esc_attr($_POST['parallax-speed-'.$items])),
		'worksCount'			=> $worksCount = esc_attr($_POST["worksCount-".$items]) == null ? 4 : esc_attr($_POST["worksCount-".$items]),
		'worksSorting'			=> esc_attr($_POST["worksSorting-".$items]),
		'woks-lightbox'			=> esc_attr($_POST["woks-lightbox-".$items]),
		'worksContent'			=> esc_attr($_POST["worksContent-".$items]),
		'worksExclude'			=> cuckoo_exclude_from_categories($_POST['worksExclude-'.$items] , 'types'),
		'worksExcludeElement'	=> esc_attr($_POST['worksExclude-'.$items]),
		'filterPosition'		=> esc_attr($_POST['filterPosition-'.$items]),
		'filterFirst'			=> esc_attr($_POST['filterFirst-'.$items]),
		'wooSourcePosition'     => esc_attr($_POST["wooSourcePosition-".$items]),
		'wooSource'        		=> esc_attr($_POST["wooSource-".$items]),
		'productContent'        => esc_attr($_POST["productContent-".$items]),
		'categoriesContent'     => esc_attr($_POST["categoriesContent-".$items]),
		'productsCount' 		=> $productsCount = esc_attr($_POST["productsCount-".$items]) == null ? 4 : esc_attr($_POST["productsCount-".$items]),
		'wooSorting' 			=> esc_attr($_POST["wooSorting-".$items]),
		'wooOrder' 				=> esc_attr($_POST["wooOrder-".$items]),
		'wooElementsEffects' 	=> esc_attr($_POST["wooElementsEffects-".$items]),
		'wooEllemenAround' 		=> esc_attr($_POST["wooEllemenAround-".$items]),
		'imageTopPadding' 		=> $imageTopPadding = esc_attr($_POST["imageTopPadding-".$items]) == null ? 30 : esc_attr($_POST["imageTopPadding-".$items]),
		'imageBottomPadding' 	=> $imageBottomPadding = esc_attr($_POST["imageBottomPadding-".$items]) == null ? 30 : esc_attr($_POST["imageBottomPadding-".$items]),
		'imageText'				=> cuckoo_get_value( $_POST["imageText-".$items] ),
		'linksWooFontSize'		=> esc_attr( $_POST["linksWooFontSize-".$items] ),
		'cart_show'				=> esc_attr($_POST["cart_show-".$items]),
		'mapHeight'				=> $mapH = esc_attr($_POST["mapHeight-".$items]) ? esc_attr($_POST["mapHeight-".$items]) : 400,
		'mapZoom'				=> $mapZ = esc_attr($_POST["mapZoom-".$items]) ? esc_attr($_POST["mapZoom-".$items]) : 15,
		'mapAddressInput'		=> $mapAd = esc_attr($_POST["mapAddressInput-".$items])? esc_attr($_POST["mapAddressInput-".$items]) : 'London',
		'slideShortcode'		=> esc_attr($_POST["slideShortcode-".$items]),
		'slideTopPadding'		=> $padT = esc_attr($_POST["slideTopPadding-".$items]) ? esc_attr($_POST["slideTopPadding-".$items]) : 0 ,
		'slideBottomPadding'	=> $padB = esc_attr($_POST["slideBottomPadding-".$items]) ? esc_attr($_POST["slideBottomPadding-".$items]) : 0
		));
		
		if( empty($elements_insert[$keys]['title']) ){
		
			unset($elements_insert[$keys]);
			if( function_exists('icl_unregister_string') ) :
				icl_unregister_string(THEMENAME.' Homepage Builder unit #'.$items, 'Title');
				icl_unregister_string(THEMENAME.' Homepage Builder unit #'.$items, 'Subtitle');
				icl_unregister_string(THEMENAME.' Homepage Builder unit #'.$items, 'Text Box unit text');
				icl_unregister_string(THEMENAME.' Homepage Builder unit #'.$items, 'Text Box unit button title');
				icl_unregister_string(THEMENAME.' Homepage Builder unit #'.$items, 'HTML unit text');
			endif;
		}
		array_push($elements, $elements_insert);
		
	}
	ksort($elements);
	$cuckoo_builder = $elements;
	update_option( THEMEPREFIX . "_builder_settings", $cuckoo_builder );
	
	?>  
   <div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
<?php
}
?>
	<?php cuckoo_framework_head( __('Homepage Builder', 'cuckoothemes') ); ?>
	<script type="text/javascript">
		document.onselectstart = function () { return false; }
	</script>
	<form id="bilder_homepage" method="POST" action="">
		<div id="general_settings">
			<?php /* Builder */ ?>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Build Your Homepage', 'cuckoothemes'); ?></span>
				<span class="float_right">
					<input id="add_elements" class="builder" rel=".section" style="font-size:11px; font-weight:normal; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; " type="button" value="Add Unit" />
				</span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="desc_bottom" style="padding:20px 0;">
					<?php _e("Using ".THEMENAME." WordPress Theme Homepage Builder you can build custom homepage layout. Add as many homepage units to your homepage as you want, they are unlimited. Drag any homepage unit to arrange the sequence as you wish. It is easy as 1-2-3!<br/><br/>
						To Add New Homepage Unit click Add Unit button and a new unit below all units will appear.<br /> 
						To change any floating unit position drag selected unit up or down by using Drag button.<br /> 
						If you want you can add a Custom Background Image or set Custom Color for this unit.<br /> 
						To delete unit click Delete button and then click Save button. ", 'cuckoothemes'); ?>
				</div>
				<div id="section_block" class="builder-container">
					<?php	$builderArray = empty($cuckoo_builder[0]) ? array(0=>array(0)) : $cuckoo_builder ; 
						foreach($builderArray as $keys=>$val)
						{
							foreach($val as $keys=>$values)
							{
								if(is_numeric($keys))
								{
								?>
									<div class="section" id="item-<?php echo $keys; ?>">
										<div class="drag-container-title">
											<span class="float_right">
												<div class="section_change" style="top:0; float:right;"></div>
												<input id="expand-item-<?php echo $keys; ?>" class="expand_button" style="float:left;" type="button" value="Expand" />
												<input id="remove-item-<?php echo $keys; ?>" class="remove_button" style="float:left;" type="button" value="Delete" />
											</span>
											<div class="float_left">
												<div id="unit-title-item-<?php echo $keys; ?>" class="title-item">
													<?php if( empty($values['title']) ) {
														_e("Unit Title",'cuckoothemes');
													}else{
														echo $values['title']; 
													} ?>
												</div>
											</div>
										</div>
										<div class="drag-container">
											<div class="col-1" style="padding-bottom:20px;">
												<span class="itemTitle"><?php _e("Unit Title",'cuckoothemes'); ?></span>
												<input type="text" id="unit-title-id-<?php echo $keys; ?>" style="width: 50%; margin-right:2%;" class="unit-title-input itemInput" name="title-<?php echo $keys; ?>" value="<?php if( empty($values['title']) ) { _e("Unit Title",'cuckoothemes'); }else{	echo $values['title']; } ?>"/>
												<input type="checkbox" class="socialMediaLists titlecheck social-1" id="title-display-<?php echo $keys; ?>" name="title-display-<?php echo $keys; ?>" value="1" <?php echo ($values['pageTitle'] == 1) ? 'checked="checked"' : ''; ?> />
												<label class="displ-label" for="title-display-<?php echo $keys; ?>">Hide Title</label>
											</div>											
											<div id="unit-subtitle-<?php echo $keys; ?>" class="col-1 last builder-visible-elements" style="padding-bottom:20px;">
												<span class="itemTitle"><?php _e("Unit Subtitle",'cuckoothemes'); ?></span>
												<input type="text" id="unit-subtitle-id-<?php echo $keys; ?>" class="unit-subtitle-input itemInput" name="subtitle-<?php echo $keys; ?>" value="<?php if( empty($values['title']) ) { _e("Unit Title",'cuckoothemes'); }else{	echo $values['subtitle']; } ?>"/>
											</div>
											<div class="col-1">
												<span class="itemTitle"><?php _e("Unit Slug",'cuckoothemes'); ?></span>
												<input type="text" id="unit-slug-id-<?php echo $keys; ?>" class="unit-slug-input itemInput" name="slug-<?php echo $keys; ?>" value="<?php echo $slug_to_echo = ( $values['slug'] == null ? make_ID_in_text( $values['title'] ) : $values['slug'] ); ?>"/>
											</div>								
											<div class="col-1 last">
												<span class="itemTitle"><?php _e("Unit Source",'cuckoothemes'); ?></span>
												<select name="unit-source-<?php echo $keys; ?>" id="unit-source-<?php echo $keys; ?>" class="unit-source-select itemInput">
													<?php foreach($template_list as $k => $v){ ?>
														<?php if($values['source'] == $v) { ?>
															<option value="<?php echo $v; ?>" selected><?php echo $v; ?></option>
														<?php } else { ?>
															<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
														<?php } ?>
													<?php } ?>
												</select>
											</div>				
											<?php /* hidden object's */ ?>
											<!-- Testimonials -->
											<div id="testimonials-<?php echo $keys; ?>" class="setting-box testimonials-clone builder-visible-elements">	
												<div class="col-1" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Testimonials Display Option",'cuckoothemes'); ?></span>
													<select name="testListsOpions-<?php echo $keys; ?>" id="testListsOpions-<?php echo $keys; ?>" class="itemHiddenCelect testOpt">
														<?php foreach($test_list_array as $k => $v){ ?>
															<?php if($values['testListsOpions'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
												<div class="col-1 last"  style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Enter Number of Testimonials to Display",'cuckoothemes'); ?></span>
													<input type="text" id="testimonialCount-<?php echo $keys; ?>" class="itemCountInput" name="testimonialCount-<?php echo $keys; ?>" value="<?php echo $values['testimonialCount']; ?>"/>
												</div>
												<div class="col-1" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Animation Effect",'cuckoothemes'); ?></span>
													<select name="testimElementsEffects-<?php echo $keys; ?>" class="itemHiddenCelect testimEffects">
														<?php foreach($effect_lists_array as $k => $v){ ?>
															<?php if($values['testimElementsEffects'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>	
												<div class="col-1 last"  style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Sorting",'cuckoothemes'); ?></span>
													<select name="testimonialsSorting-<?php echo $keys; ?>" class="itemHiddenCelect sort">
														<?php foreach($sorting_array as $k => $v){ ?>
															<?php if($values['testimonialsSorting'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
											</div>
											<!-- Team -->
											<div id="team-<?php echo $keys; ?>" class="setting-box team-clone builder-visible-elements">
												<?php 
													$terms = get_terms("team-categories");
													$count = count($terms);
												if( $count != 0 ):
												?>
												<div class="col-1" style="padding-bottom:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Team Unit Content",'cuckoothemes'); ?></span>
													<?php
														wp_dropdown_categories( array(
															'class' 			=> 'itemHiddenCelect members-cat-select',
															'name' 				=> 'teamContent-'.$keys, 
															'show_option_all'	=> 'All Categories',
															'taxonomy'			=> 'team-categories',
															'selected'			=> 	$values['teamContent']
														));	
													?>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Choose Team Member Categories to be displayed in Homepage Team Unit.", 'cuckoothemes'); ?>
													</div>
												</div>
												<div class="col-1 last" style="padding-bottom:25px;">
													<span class="itemHiddenTitle"><?php _e("Exclude Team Member Categories",'cuckoothemes'); ?></span>
													<input type="text" id="teamExclude-<?php echo $keys; ?>" class="itemInputText team-exclude" name="teamExclude-<?php echo $keys; ?>" value="<?php echo $values['teamExcludeElement']; ?>"/>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Enter a comma-separated list of Team Member Categories that you want to exclude from displaying in Homepage Team Unit. Example: Developers, Designers.", 'cuckoothemes'); ?>
													</div>
												</div>
												<?php endif; ?>
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Enter Number of Team Members to Display",'cuckoothemes'); ?></span>
													<input type="text" id="teamCount-<?php echo $keys; ?>" class="itemCountInput" name="teamCount-<?php echo $keys; ?>" value="<?php echo $values['teamCount']; ?>"/>
												</div>								
												<div class="col-1 last">
													<span class="itemHiddenTitle"><?php _e("Choose Sorting",'cuckoothemes'); ?></span>
													<select name="teamSorting-<?php echo $keys; ?>" class="itemHiddenCelect teamSort">
														<?php foreach($sorting_array as $k => $v){ ?>
															<?php if($values['teamSorting'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
												<div class="col-1" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Carousel Effect",'cuckoothemes'); ?></span>
													<select name="teamElementsAround-<?php echo $keys; ?>" class="itemHiddenCelect teamAround">
														<?php foreach($yes_no_array as $k => $v){ ?>
															<?php if($values['teamElementsAround'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>												
												<div class="col-1 last" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Animation Effect",'cuckoothemes'); ?></span>
													<select name="teamElementsEffects-<?php echo $keys; ?>" class="itemHiddenCelect teamEffects">
														<?php foreach($effect_lists_array as $k => $v){ ?>
															<?php if($values['teamElementsEffects'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
												<div class="col-1" style="padding-top:25px;">
													<input type="checkbox" class="titlecheck team-checkbox social-1" id="no_link_thumb_team-<?php echo $keys; ?>" name="no_link_thumb_team-<?php echo $keys; ?>" value="1" <?php echo ($values['no_link_thumb_team'] == 1) ? 'checked="checked"' : ''; ?> />
													<label class="team-no-label" style="color:#999999;" for="no_link_thumb_team-<?php echo $keys; ?>"> Remove Team Member URL</label>
												</div>
											</div>
											<!-- Blog posts -->
											<div id="blog-post-<?php echo $keys; ?>"  class="setting-box blog-clone builder-visible-elements">												
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Choose Blog Posts Unit Content",'cuckoothemes'); ?></span>
													<?php
														wp_dropdown_categories( array(
															'class' 			=> 'itemHiddenCelect blogSelect',
															'name' 				=> 'postContent-'.$keys, 
															'show_option_all'	=> 'All Categories',
															'selected'			=> 	$values['postContent']
														));	
													?>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Choose Posts Category to be displayed in Homepage Blog Posts Unit.", 'cuckoothemes'); ?>
													</div>
												</div>
												<div class="col-1 last">
													<span class="itemHiddenTitle"><?php _e("Exclude Posts Categories",'cuckoothemes'); ?></span>
													<input type="text" id="blogExclude-<?php echo $keys; ?>" class="itemInputText" name="blogExclude-<?php echo $keys; ?>" value="<?php echo $values['blogExcludeElement']; ?>"/>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Enter a comma-separated list of Posts Categories that you want to exclude from displaying in Homepage Blog Posts Unit. Example: Category1, Category2, Category3", 'cuckoothemes'); ?>
													</div>
												</div>
												<div class="col-1" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Enter Number of Posts to Display",'cuckoothemes'); ?></span>
													<input type="text" id="blogCount-<?php echo $keys; ?>" class="itemCountInput" name="blogCount-<?php echo $keys; ?>" value="<?php echo $values['blogCount']; ?>"/>
												</div>								
												<div class="col-1 last" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Sorting",'cuckoothemes'); ?></span>
													<select name="blogSorting-<?php echo $keys; ?>" class="itemHiddenCelect blogSort">
														<?php foreach($sorting_array as $k => $v){ ?>
															<?php if($values['blogSorting'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>	
												<div class="col-1" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Blog Display Option",'cuckoothemes'); ?></span>
													<select name="blogListsOpions-<?php echo $keys; ?>" id="blogListsOpions-<?php echo $keys; ?>" class="itemHiddenCelect blogOpt">
														<?php foreach($blog_list_array as $k => $v){ ?>
															<?php if($values['blogListsOpions'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
												<div id="blogElementsAround-<?php echo $keys; ?>" class="col-1 last" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Carousel Effect",'cuckoothemes'); ?></span>
													<select name="blogElementsAround-<?php echo $keys; ?>" class="itemHiddenCelect blogAround">
														<?php foreach($yes_no_array as $k => $v){ ?>
															<?php if($values['blogElementsAround'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>												
												<div id="blogElementsEffects-<?php echo $keys; ?>" class="col-1" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Animation Effect",'cuckoothemes'); ?></span>
													<select name="blogElementsEffects-<?php echo $keys; ?>" class="itemHiddenCelect blogEffects">
														<?php foreach($effect_lists_array as $k => $v){ ?>
															<?php if($values['blogElementsEffects'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
											</div>
											<!-- Works posts -->
											<div id="works-post-<?php echo $keys; ?>"  class="setting-box blog-clone works-unit-setings builder-visible-elements">											
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Choose Works Gallery Unit Content",'cuckoothemes'); ?></span>
													<?php
														wp_dropdown_categories( array(
															'class' 			=> 'itemHiddenCelect types-select',
															'name' 				=> 'worksContent-'.$keys, 
															'show_option_all'	=> 'All Types',
															'taxonomy'			=> 'types',
															'selected'			=> 	$values['worksContent']
														));	
													?>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Choose Work Types to be displayed in Homepage Works Gallery Unit.", 'cuckoothemes'); ?>
													</div>
												</div>
												<div class="col-1 last">
													<span class="itemHiddenTitle"><?php _e("Exclude Works Types",'cuckoothemes'); ?></span>
													<input type="text" id="worksExclude-<?php echo $keys; ?>" class="itemInputText works-exclude" name="worksExclude-<?php echo $keys; ?>" value="<?php echo $values['worksExcludeElement']; ?>"/>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Enter a comma-separated list of Work Types that you want to exclude from displaying in Homepage Works Gallery Unit. Example: Type1, Type2, Type3.", 'cuckoothemes'); ?>
													</div>
												</div>
												<div class="col-1" style="padding-top:25px;">
													<input type="checkbox" class="titlecheck social-1" id="woks-lightbox-<?php echo $keys; ?>" name="woks-lightbox-<?php echo $keys; ?>" value="1" <?php echo ($values['woks-lightbox'] == 1) ? 'checked="checked"' : ''; ?> />
													<label class="woks-label" for="woks-lightbox-<?php echo $keys; ?>">Show work in LightBox</label>
												</div>
												<div class="col-1 last" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Enter Number of Works to Display",'cuckoothemes'); ?></span>
													<input type="text" id="worksCount-<?php echo $keys; ?>" class="itemCountInput" name="worksCount-<?php echo $keys; ?>" value="<?php echo $values['worksCount']; ?>"/>
												</div>								
												<div class="col-1" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Sorting",'cuckoothemes'); ?></span>
													<select name="worksSorting-<?php echo $keys; ?>" class="itemHiddenCelect sorting-select">
														<?php foreach($sorting_array as $k => $v){ ?>
															<?php if($values['worksSorting'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
												<div class="col-1 last" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Show Works Gallery Filler",'cuckoothemes'); ?></span>
													<select name="filterPosition-<?php echo $keys; ?>" id="filterPosition-<?php echo $keys; ?>" class="itemHiddenCelect filterPos">
														<?php foreach($yes_no_array as $k => $v){ ?>
															<?php if($values['filterPosition'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>	
												<div id="worksDefault-<?php echo $keys; ?>" class="col-1 last" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e('Choose Default Works Gallery Unit Content', 'cuckoothemes'); ?></span>
													<?php	
													 wp_dropdown_categories( array(
														'class' 			=> 'itemHiddenCelect firstFilter',
														'name' 				=> 'filterFirst-'.$keys, 
														'show_option_all'	=> 'All Types of Works',
														'taxonomy'			=> 'types',
														'selected'			=> 	$values['filterFirst']
													));					 				 
													 ?>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e('Choose Type of Works to be displayed in Works Gallery Unit by default.', 'cuckoothemes'); ?>
													</div>
												</div>												
											</div>
											<!-- Page -->
											<div id="page-source-<?php echo $keys; ?>" class="setting-box page-clone builder-visible-elements">
												<div class="desc_bottom itemInputText" style="padding-top:0; padding-bottom: 20px;">
														<?php _e("Page content will be displayed on a Homepage in Page Unit. Enter Page URL. Example: http://www.cuckoothemes.com/page. Important! Only parent site pages content will be displayed.", 'cuckoothemes'); ?>
												</div>
												<input type="text" id="pageUrl-<?php echo $keys; ?>" class="itemInputText" name="pageUrl-<?php echo $keys; ?>" value="<?php echo $values['pageUrl']; ?>"/>
											</div>
											<!-- Text Box -->
											<div id="text-box-<?php echo $keys; ?>" class="setting-box text-box-clone builder-visible-elements">
												<div class="col-1" style="width:70%;">
													<span class="itemHiddenTitle"><?php _e("Enter Your Text" , 'cuckoothemes'); ?></span>
													<textarea id="textBox-text-<?php echo $keys; ?>" class="itemTextarea" name="textBox-text-<?php echo $keys; ?>"><?php echo $values['textBoxText']; ?></textarea>
												</div>								
												<div class="col-1 last" style="width:25%;">
													<span class="itemHiddenTitle"><?php _e("Enter Button Title", 'cuckoothemes'); ?></span>
													<input type="text" style="margin:0;" id="textBoxUrlTitle-<?php echo $keys; ?>" class="itemInputText urlTitle" name="textBoxUrlTitle-<?php echo $keys; ?>" value="<?php echo $values['textBoxUrlTitle']; ?>"/>
													<span class="itemHiddenTitle" style="padding-top:19px;"><?php _e("Enter Button URL", 'cuckoothemes'); ?></span>
													<input type="text" style="margin:0;" id="textBoxUrl-<?php echo $keys; ?>" class="itemInputText urlBox" name="textBoxUrl-<?php echo $keys; ?>" value="<?php echo $values['textBoxUrl']; ?>"/>
												</div>
											</div>
											<!-- Social Media -->
											<div id="socialMedia-<?php echo $keys; ?>" class="setting-box socialMedia-clone builder-visible-elements">
												<span class="itemHiddenTitle"><?php _e("Choose Social Media Icons to Display" , 'cuckoothemes'); ?></span>
												<ul class="socialMediaList">
													<?php $socArray = !empty( $values['socialMedia'] ) ? $values['socialMedia'] : $socialMediaFirst; ?>
													<?php foreach($socArray as $k=>$v): ?>
														<li>
															<input type="checkbox" class="socialMediaLists social-<?php echo $k; ?>" name="social-<?php echo $keys; ?>-<?php echo $k; ?>" value="1" <?php echo ($v == 1) ? 'checked="checked"' : ''; ?> /> <?php echo $showValues = $k == 'Google' ? $k."+" : $k ; ?>
														</li>
													<?php endforeach; ?>
												</ul>
											</div>
											<!-- Woocommerce -->
											<div id="woocommerce-<?php echo $keys; ?>"  class="setting-box woocommerce-clone works-unit-setings builder-visible-elements">
												<div class="col-1" style="padding-right:300px;">
													<span class="itemHiddenTitle"><?php _e("Choose Unit Display Uptions",'cuckoothemes'); ?></span>
													<select id="wooSourcePosition-<?php echo $keys; ?>" name="wooSourcePosition-<?php echo $keys; ?>" class="itemHiddenCelect wooSourcePosition">
														<?php if($values['wooSourcePosition'] == 'Masonry') { ?>
															<option value="Masonry" selected="selected">Masonry Style</option>
															<option value="Carousel">Carousel Style</option>
														<?php } else { ?>
															<option value="Masonry">Masonry Style</option>
															<option value="Carousel" selected="selected">Carousel Style</option>
														<?php } ?>
													</select>
												</div>												
												<div class="col-1"  style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose WooCommerce Unit Content",'cuckoothemes'); ?></span>
														<select id="wooSource-<?php echo $keys; ?>" name="wooSource-<?php echo $keys; ?>" class="itemHiddenCelect wooSource">
															<?php if($values['wooSource'] == 'Products') { ?>
																<option value="Products" selected>Products</option>
																<option value="Categories">Categories</option>
															<?php } else { ?>
																<option value="Categories" selected>Categories</option>
																<option value="Products">Products</option>
															<?php } ?>
													</select>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Choose between Products or Categories to be displayed in Homepage WooCommerce Unit.", 'cuckoothemes'); ?>
													</div>
												</div>
												<div class="col-1 last product-source"  style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Product Category",'cuckoothemes'); ?></span>
													<?php
														wp_dropdown_categories( array(
															'class' 			=> 'itemHiddenCelect product-source-select',
															'name' 				=> 'productContent-'.$keys,
															'show_option_all'	=> 'All Categories',
															'taxonomy'			=> 'product_cat',
															'selected'			=> 	$values['productContent']
														));	
													?>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Choose Product Category to be displayed in Homepage WooCommerce Unit.", 'cuckoothemes'); ?>
													</div>
												</div>
												<div class="col-1" style="padding-top:25px;">
													<input type="checkbox" class="socialMediaLists titlecheck social-1" id="cart_show-<?php echo $keys; ?>" name="cart_show-<?php echo $keys; ?>" value="1" <?php echo ($values['cart_show'] == 1) ? 'checked="checked"' : ''; ?> />
													<label for="cart_show-<?php echo $keys; ?>"> Display Woo Navigation Bar</label>
												</div>
												<div class="col-1 last" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Enter Number of Products/Categories to Display",'cuckoothemes'); ?></span>
													<input type="text" id="productsCount-<?php echo $keys; ?>" class="itemCountInput" name="productsCount-<?php echo $keys; ?>" value="<?php echo $values['productsCount']; ?>"/>
												</div>								
												<div class="col-1" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Sorting",'cuckoothemes'); ?></span>
													<select name="wooSorting-<?php echo $keys; ?>" class="itemHiddenCelect sorting-select">
														<?php foreach($sortableWoo as $k => $v){ ?>
															<?php if($values['wooSorting'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>												
												<div class="col-1 last" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Display Order",'cuckoothemes'); ?></span>
													<select name="wooOrder-<?php echo $keys; ?>" class="itemHiddenCelect order-select">
														<?php foreach($wooDescAsc as $k => $v){ ?>
															<?php if($values['wooOrder'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
												<div class="col-1 wooElementAr" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Carousel Effect",'cuckoothemes'); ?></span>
													<select name="wooEllemenAround-<?php echo $keys; ?>" class="itemHiddenCelect wooEllemenAround">
														<?php foreach($yes_no_array as $k => $v){ ?>
															<?php if($values['wooEllemenAround'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>												
												<div class="col-1 last wooElementEff" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Animation Effect",'cuckoothemes'); ?></span>
													<select name="wooElementsEffects-<?php echo $keys; ?>" class="itemHiddenCelect wooElementsEffects">
														<?php foreach($effect_lists_array as $k => $v){ ?>
															<?php if($values['wooElementsEffects'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
											</div>
											<!-- HTML text -->
											<div id="image-source-<?php echo $keys; ?>" class="setting-box image-clone builder-visible-elements">
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Top Padding in Pixels",'cuckoothemes'); ?></span>
													<input type="text" id="imageTopPadding-<?php echo $keys; ?>" class="itemCountInput topPaddingHTML" name="imageTopPadding-<?php echo $keys; ?>" value="<?php echo $values['imageTopPadding']; ?>"/>
												</div>												
												<div class="col-1 last">
													<span class="itemHiddenTitle"><?php _e("Bottom Padding in Pixels",'cuckoothemes'); ?></span>
													<input type="text" id="imageBottomPadding-<?php echo $keys; ?>" class="itemCountInput bottomPaddingHTML" name="imageBottomPadding-<?php echo $keys; ?>" value="<?php echo $values['imageBottomPadding']; ?>"/>
												</div>
												<div class="itemInputText" style="padding-top:25px; float: left;">
													<span class="itemHiddenTitle"><?php _e("HTML Text",'cuckoothemes'); ?></span>
													<textarea id="imageText-<?php echo $keys; ?>" class="itemTextarea HTMLuntitTextarea" name="imageText-<?php echo $keys; ?>"><?php echo esc_attr( $values['imageText'] ); ?></textarea>
												</div>
											</div>											
											<!-- woocommerce links -->
											<div id="woocommerce-links-<?php echo $keys; ?>" class="setting-box woo-links-clone builder-visible-elements">
												<div class="col-1 last" style="padding:0!important;">
													<span class="itemHiddenTitle" style="display:inline-block!important; width: 60px; padding:0 10px 0 0!important;"><?php _e("Font Size",'cuckoothemes'); ?></span>
													<input type="text" id="linksWooFontSize-<?php echo $keys; ?>" class="itemCountInput" name="linksWooFontSize-<?php echo $keys; ?>" value="<?php echo $values['linksWooFontSize']; ?>"/>
												</div>
											</div>
											<!-- Map -->
											<div id="google-map-<?php echo $keys; ?>" class="setting-box google-map-clone builder-visible-elements">
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Enter Map address", 'cuckoothemes'); ?></span>
													<input type="text" style="margin:0;" id="mapAddressInput-<?php echo $keys; ?>" class="itemInputText mapAddress" name="mapAddressInput-<?php echo $keys; ?>" value="<?php echo $values['mapAddressInput']; ?>"/>
												</div>
												<div class="col-1 last">
													<span class="itemHiddenTitle"><?php _e("Map Zoom",'cuckoothemes'); ?></span>
													<input type="text" id="mapZoom-<?php echo $keys; ?>" class="itemCountInput mapZoomClass" name="mapZoom-<?php echo $keys; ?>" value="<?php echo $values['mapZoom']; ?>"/>
												</div>												
												<div class="col-1" style="padding-top:20px;">
													<span class="itemHiddenTitle"><?php _e("Map Height",'cuckoothemes'); ?></span>
													<input type="text" id="mapHeight-<?php echo $keys; ?>" class="itemCountInput mapHeightClass" name="mapHeight-<?php echo $keys; ?>" value="<?php echo $values['mapHeight']; ?>"/>
												</div>
											</div>											
											<!-- Slideshow -->
											<div id="slideshow-bilder-<?php echo $keys; ?>" class="setting-box slideshow-clone builder-visible-elements">
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Enter Revolution or LayerSlider Shortcode", 'cuckoothemes'); ?></span>
													<input type="text" style="margin:0;" id="slideShortcode-<?php echo $keys; ?>" class="itemInputText slideShortcodeInput" name="slideShortcode-<?php echo $keys; ?>" value="<?php echo $values['slideShortcode']; ?>"/>
												</div>
												<div class="col-1" style="padding-top:20px;">
													<span class="itemHiddenTitle"><?php _e("Top Padding in Pixels",'cuckoothemes'); ?></span>
													<input type="text" id="slideTopPadding-<?php echo $keys; ?>" class="itemCountInput slideTopPadding" name="slideTopPadding-<?php echo $keys; ?>" value="<?php echo $values['slideTopPadding']; ?>"/>
												</div>												
												<div class="col-1 last" style="padding-top:20px;">
													<span class="itemHiddenTitle"><?php _e("Bottom Padding in Pixels",'cuckoothemes'); ?></span>
													<input type="text" id="slideBottomPadding-<?php echo $keys; ?>" class="itemCountInput slideBottomPadding" name="slideBottomPadding-<?php echo $keys; ?>" value="<?php echo $values['slideBottomPadding']; ?>"/>
												</div>
											</div>
											<?php /* Background control */ ?>
											<div id="background-settings-<?php echo $keys; ?>" class="background-setting builder-visible-elements">
												<div class="titleBackground">
													<b><?php _e('Background','cuckoothemes'); ?></b>
													<select id="parallax-effect-<?php echo $keys; ?>" name="parallax-effect-<?php echo $keys; ?>" class="background-select-parallax">
														<?php if($values['parallax'] == '1') :?>
															<option value="1" selected><?php _e('Parallax Background','cuckoothemes'); ?></option>
															<option value="2"><?php _e('Default Background','cuckoothemes'); ?></option>
														<?php else: ?>
															<option value="2" selected><?php _e('Default Background','cuckoothemes'); ?></option>
															<option value="1"><?php _e('Parallax Background','cuckoothemes'); ?></option>
														<?php endif; ?>
													</select>
												</div>
												<label for="upload_image<?php echo $keys; ?>">
													<input id="image_url_input<?php echo $keys; ?>" class="upload_image<?php echo $keys; ?> upLaoding" style="width:82%;" type="text" size="36" name="upload_image<?php echo $keys; ?>" value="<?php echo $values['imgUrl']; ?>" />
													<input id="uploadId<?php echo $keys; ?>" class="upload_button_new button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
												</label>
												<div class="col-1" style="width:63%; padding-top:35px;">
													<div id="background-setting-position-<?php echo $keys; ?>" class="radio_block parallax-settigs back-posi">
														<b style="padding-right:15px;"><?php _e('Position' , 'cuckoothemes'); ?></b>
														<select class="radio-position-clone bposition" name="radio_position-<?php echo $keys; ?>">
														<?php foreach($color_position as $k=>$v): ?>
															<?php if( $v == $values['imgPosition'] ) : ?>
																<option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option>
															<?php else : ?>
																<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
															<?php endif; ?>
														<?php endforeach; ?>
														</select>
													</div>
													<div id="background-setting-reapet-<?php echo $keys; ?>" class="radio_block parallax-settigs back-repeat">
														<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , 'cuckoothemes'); ?></b>
														<?php foreach($repeat_img as $k=>$v): ?>
															<?php if( $k == $values['imgRepeat'] ) : ?>
																<input type="radio" class="radio-repeat-clone" name="radio_repeat-<?php echo $keys; ?>" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
															<?php else : ?>
																<input type="radio" class="radio-repeat-clone" name="radio_repeat-<?php echo $keys; ?>" value="<?php echo $k; ?>" /><?php echo $v; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</div>													
													<div id="background-setting-attach-<?php echo $keys; ?>" class="radio_block parallax-settigs back-attach">
														<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , 'cuckoothemes'); ?></b>
														<?php foreach($attachament_img as $k=>$v): ?>
															<?php if( $k == $values['imgAttachment'] ) : ?>
																<input type="radio" class="radio-attachment-clone" name="radio_attachment-<?php echo $keys; ?>" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
															<?php else : ?>
																<input type="radio" class="radio-attachment-clone" name="radio_attachment-<?php echo $keys; ?>" value="<?php echo $k; ?>" /><?php echo $v; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</div>
													<div id="background-setting-speed-<?php echo $keys; ?>" class="radio_block parallax-settigs back-speed" style="padding:15px 0 0;">
														<label for="parallax-speed-<?php echo $keys; ?>"> 
															<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', 'cuckoothemes'); ?></b>
														</label>
														<input type="text" id="parallax-speed-<?php echo $keys; ?>" class="parallax-speed" name="parallax-speed-<?php echo $keys; ?>" value="<?php echo $values['parallax-speed']; ?>" />
													</div>
												</div>
												<div class="col-1 last" style="width:33%; padding-top:25px;">
													<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , 'cuckoothemes'); ?></b>
													<input type="text" id="color-<?php echo $keys; ?>" value="<?php echo $back = empty($values['backgroundColor']) ? '#' : $values['backgroundColor']; ?>" class="colorInput" name="color_picker_color-<?php echo $keys; ?>" style="background-color:<?php echo $values['backgroundColor']; ?>" />
													<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-<?php echo $keys; ?>" />
													<div id="color_picker_color-<?php echo $keys; ?>" class="colorPickerMain"></div>
												</div>
											</div>
											<div class="clear"></div>
										</div>
									</div>
								<?php
								}
							}
						} ?>
					<input type="hidden" value="<?php foreach($builderArray as $keys=>$val) {  foreach($val as $keys=>$values) { echo "item-".$keys.","; } } ?>" name="items" />
				<?php  ?>
				<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){ ?>
					<input type="hidden" value="true" name="woocommerce-active-builder"/>
				<?php }else{ ?>
					<input type="hidden" value="false" name="woocommerce-active-builder"/>
				<?php } ?>
				</div>
			</div>	
			<div class="buttom_unit">
				<span class="float_right">
					<input id="add_elements-2" class="builder" rel=".section" style="font-size:11px; font-weight:normal; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; " type="button" value="Add Unit" />
				</span>
			</div>
		</div>
		<p style="display:inline">
			<input type="submit" name="all" value="Save" class="builder-input-all" style="margin-right:20px; position:relative; width:100px; height:30px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " /> 
		</p>
		<?php cuckoo_framework_footer(); ?>
	</form>
</section>