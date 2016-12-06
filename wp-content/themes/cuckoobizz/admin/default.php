<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 
/******************************************************************  Default settings  *****************************************/

//options names 
$builder 			= THEMEPREFIX . "_builder_settings";
$slider 			= THEMEPREFIX . "_slidershow_settings";
$footer 			= THEMEPREFIX . "_header_footer_settings";
$social 			= THEMEPREFIX . "_social_settings";
$general_settings 	= THEMEPREFIX . "_general_settings";
$gallery 			= THEMEPREFIX . "_gallery_settings";
$contact 			= THEMEPREFIX . "_contact_settings";
$fonts				= THEMEPREFIX . "_font_settings";
$color_styles		= THEMEPREFIX . "_style_settings";
$sidebar			= THEMEPREFIX . "_sidebars_settings";

// homepage builder

$builder_default = get_option($builder);
if(!$builder_default){
	$builder_default = array( 
	0 => array(
		1 => array( 
			'remove' 				=> 1, 
			'title' 				=> 'First Blog Unit',
			'subtitle' 				=> 'Blog Subtitle',
			'slug' 					=> 'first-blog-unit', 
			'source' 				=> 'Blog Posts',
			'backgroundColor' 		=> '#',
			'imgUrl' 				=> '',
			'imgAttachment' 		=> '',
			'imgRepeat' 			=> '',
			'imgPosition' 			=> '',
			'testimonialCount'		=> 1,
			'teamCount'				=> 4,
			'no_link_thumb_team'	=> '',
			'blogCount'				=> 4,
			'testimonialsSorting'	=> '',
			'testListsOpions'		=> '',
			'testimElementsEffects' => '',
			'teamSorting'			=> '',
			'teamElementsAround'	=> '',
			'teamElementsEffects'	=> '',
			'teamContent'			=> '',
			'teamExclude'			=> '',
			'teamExcludeElement'	=> '',
			'blogSorting'			=> 'rand',
			'blogElementsEffects'	=> 'elementsQuicklyLeft',
			'blogElementsAround'	=> 1,
			'blogListsOpions'		=> 'option-1',
			'postContent'			=> '',
			'blogExclude'			=> '',
			'blogExcludeElement'	=> '',
			'pageUrl'				=> '',
			'pageTitle'				=> '',
			'textBoxText'			=> '',
			'textBoxUrlTitle'		=> '',
			'textBoxUrl'			=> '',
			'socialMedia'			=> array('Facebook' => 0,
										'Twitter' => 0, 
										'Google' => 0, 
										'Flickr' => 0, 
										'Pinterest' => 0, 
										'Dribbble' => 0, 
										'Behance' => 0, 
										'Youtube' => 0, 
										'Vimeo' => 0, 
										'Linkedin' 	=> 0, 
										'Email' => 0, 
										'RSS' => 0 
										),
			'parallax' 				=> '',
			'parallax-speed' 		=> 10,
			'worksCount'			=> 4,
			'worksSorting'			=> '',
			'woks-lightbox'			=> '',
			'worksContent'			=> '',
			'worksExclude'			=> '',
			'worksExcludeElement'	=> '',
			'filterPosition'		=> '',
			'filterFirst'			=> '',
			'wooSource'        		=> '',
			'productContent'        => '',
			'categoriesContent'     => '',
			'productsCount' 		=> 4,
			'wooSorting' 			=> '',
			'wooOrder' 				=> '',
			'imageTopPadding' 		=> 30,
			'imageBottomPadding' 	=> 30,
			'imageText'				=> '',
			'linksWooFontSize'		=> '',
			'cart_show'				=> '',
			'mapHeight'				=> 400,
			'mapZoom'				=> 15,
			'mapAddressInput'		=> 'London',
			'slideShortcode'		=> '',
			'slideTopPadding'		=> 0,
			'slideBottomPadding'	=> 0
			)
		)
	);
	add_option( $builder , $builder_default);
}


//slideshow player default's
$slider_default = get_option($slider);
if(!$slider_default) :
	$elements = array( 'elements' => array( 
			0 => array( 1 => array( 'remove' => 1 , 'img' => get_template_directory_uri(). '/images/slideshow-default1.jpg', 'title' => 'CuckooBizz', 'slide_title' => 'CuckooBizz', 'slide_subtitle' => 'Fully Responsive<br>WordPress Theme', 'title_button_slides' => 'Theme Demo', 'url_button_slides' => 'http://www.demo.cuckoothemes.com/cuckootap', 'title_aling' => 'Left', 'font_color' => '#')),
			1 => array( 2 => array( 'remove' => 2 , 'img' => get_template_directory_uri(). '/images/slideshow-default2.jpg', 'title' => 'CuckooBizz', 'slide_title' => 'CuckooBizz', 'slide_subtitle' => 'Fully Responsive<br>WordPress Theme', 'title_button_slides' => 'Theme Demo', 'url_button_slides' => 'http://www.demo.cuckoothemes.com/cuckootap', 'title_aling' => 'Right', 'font_color' => '#'))
		));
	$settings = array( 'settings' => 
					array(	
						'nivo_effect' 				=> 'random', 
						'caption_effect' 			=> 'slide', 
						'slider_timeout' 			=> 6000, 
						'slider_hover' 				=> 'true', 
						'animationspeed' 			=> 1000 , 
						'box_rows' 					=> 4 , 
						'box_cols' 					=> 12,
						'overlay_lines_slideshow'	=> 1,
						'rev_alias' 				=> '',
						'layer_shortcode' 			=> '',
						'homepage_slider'			=> 'Nivo Slider',
						'parallax'					=> '',
						'background-image'			=> '',
						'background-position'		=> '',
						'background-repeat'			=> '',
						'background-attachment'		=> '',
						'parallax-speed'			=> '',
						'background-color'			=> '',
						'img-parallax'				=> '',
						'img-background-image'		=> '',
						'img-background-position'	=> '',
						'img-background-repeat'		=> '',
						'img-background-attachment'	=> '',
						'img-parallax-speed'		=> 10,
						'img-background-color'		=> '',
						'effects_FullScreen'		=> 'Fade',
						'FullScreen_transition_speed'=> 1000,
						'FullScreen_slide_interval'	=> 6000,
						'FullScreen_progress_bar'	=> 1,
						'image_full_title'			=> '',
						'image_full_subtitle' 		=> '',
						'title-parallax' 			=> '',
						'subtitle-parallax' 		=> '',
						'parallax-effect-image' 	=> '',
						'parallax-speed-logo' 		=> '',
						'img-logo-parallax' 		=> '',
						'background-position-a' 	=> '',
						'background-repeat-a' 		=> '',
						'background-attachment-a'	=> '',
						'aling_text' 				=> ''
					)
				);
	$slider_default = array_merge($elements, $settings);
	add_option( $slider , $slider_default);
endif;


//footer-header default's
$footer_default = get_option($footer);
if(!$footer_default) :

	$line1 = 'CuckooThemes | Copyright '.date('Y').' <a href="http://cuckoothemes.com">CuckooThemes.com</a>';
	$line2 = 'Powered by <a href="http://wordpress.org/">WordPress</a> | Created by <a href="http://cuckoothemes.com">CuckooThemes.com</a> ';
	$line3 = 'Check out <a href="http://themeforest.net/user/CuckooThemes/portfolio">CuckooThemes Portfolio </a>on ThemeForest';
	
	$footer_default = array(
		'logo_setting' 					=> 'Plain Text Logo',
		'plain_text_header'				=> 'CUCKOOBIZZ',
		'title_font'					=> 'Open Sans',
		'title_font_weight'				=> 'Bold',
		'title_font_style'				=> 'Normal',
		'title_font_size'				=> 20,
		'title_font_lheight'			=> 1.1,
		'title_font_color'				=> '#ffffff' ,
		'image_url' 					=> '',
		'image_title' 					=> '',
		'dropd_landing_opacity'			=> 90,
		'dropd_homepage_opacity'		=> 90,
		'background_homepage_opacity' 	=> 50,
		'background_landing_opacity' 	=> 50,
		'landing_logo_opacity' 			=> 95, 
		'background_logo_opacity' 		=> 95,
		'background_homepage' 			=> '#000000',
		'background-landing' 			=> '#000000',
		'background-logo_header' 		=> '#486db0',
		'landing-logo_header' 			=> '#486db0',
		'menu-dorp-color' 				=> '#ffffff',
		'land-menu-dorp-color' 			=> '#ffffff',
		'menus-font' 					=> 'Open Sans', 
		'menus-weight' 					=> 'Normal',
		'menus-style' 					=> 'Normal',
		'menus-size' 					=> 15,	
		'menus-lheight' 				=> 1.1,	
		'menus-color' 					=> '#e3e3e3',
		'menus-font-hover' 				=> 'Open Sans', 
		'menus-weight-hover' 			=> 'Normal',
		'menus-style-hover' 			=> 'Normal',
		'menus-size-hover' 				=> 15,	
		'menus-lheight-hover' 			=> 1.1,	
		'menus-color-hover' 			=> '#ffffff',
		'menus-dropdown-font'			=> 'Open Sans', 
		'menus-dropdown-weight' 		=> 'Normal',
		'menus-dropdown-style' 			=> 'Normal',
		'menus-dropdown-size' 			=> 14,	
		'menus-dropdown-lheight' 		=> 1.1,	
		'menus-dropdown-color' 			=> '#6b6f72',
		'menus-dropdown-font-hover' 	=> 'Open Sans', 
		'menus-dropdown-weight-hover' 	=> 'Normal',
		'menus-dropdown-style-hover' 	=> 'Normal',
		'menus-dropdown-size-hover' 	=> 14,
		'menus-dropdown-lheight-hover' 	=> 1.1,	
		'menus-dropdown-color-hover' 	=> '#486db0',
		'homepage-top-links-font' 		=> 'Open Sans', 
		'homepage-top-links-weight' 	=> 'Normal',
		'homepage-top-links-style' 		=> 'Normal',
		'homepage-top-links-size' 		=> 13,	
		'homepage-top-links-lheight' 	=> 1.1,	
		'homepage-top-links-color' 		=> '#c4c5c7',
		'landing-menus-font' 			=> 'Open Sans', 
		'landing-menus-weight' 			=> 'Normal',
		'landing-menus-style' 			=> 'Normal',
		'landing-menus-size' 			=> 15,	
		'landing-menus-lheight' 		=> 1.1,	
		'landing-menus-color' 			=> '#e3e3e3',
		'landing-menus-font-hover' 		=> 'Open Sans',
		'landing-menus-weight-hover' 	=> 'Normal',
		'landing-menus-style-hover' 	=> 'Normal',
		'landing-menus-size-hover' 		=> 15,	
		'landing-menus-lheight-hover' 	=> 1.1,	
		'landing-menus-color-hover' 	=> '#ffffff',
		'landing-menus-dropdown-font' 	=> 'Open Sans', 
		'landing-menus-dropdown-weight' => 'Normal',
		'landing-menus-dropdown-style' 	=> 'Normal',
		'landing-menus-dropdown-size' 	=> 14,	
		'landing-menus-dropdown-lheight'=> 1.1,	
		'landing-menus-dropdown-color' 	=> '#6b6f72',	
		'landing-menus-dropdown-font-hover' 	=> 'Open Sans', 
		'landing-menus-dropdown-weight-hover' 	=> 'Normal',
		'landing-menus-dropdown-style-hover' 	=> 'Normal',
		'landing-menus-dropdown-size-hover' 	=> 14,	
		'landing-menus-dropdown-lheight-hover' 	=> 1.1,	
		'landing-menus-dropdown-color-hover' 	=> '#486db0',
		'landing-top-links-font' 		=> 'Open Sans', 
		'landing-top-links-weight' 		=> 'Normal',
		'landing-top-links-style' 		=> 'Normal',
		'landing-top-links-size' 		=> 12,	
		'landing-top-links-lheight' 	=> 1.1,	
		'landing-top-links-color' 		=> '#c4c5c7',
		'display_menu_hover_effect' 	=> 1, 
		'parallax-footer' 				=> 2, 
		'parallax-speed-footer' 		=> 10,
		'footer-position' 				=> '', 
		'footer-image' 					=> '', 
		'footer-repeat' 				=> '', 
		'footer-attachment' 			=> '', 
		'footer-color-back' 			=> '#', 
		'line1' 						=> $line1,
		'line2' 						=> $line2,
		'line3' 						=> $line3,
		'footer-font-nav' 				=> 'Open Sans', 
		'footer-weight-nav' 			=> 'Normal',
		'footer-style-nav' 				=> 'Normal',
		'footer-size-nav' 				=> 15,
		'footer-lheight-nav' 			=> 1.5,	
		'footer-color-nav' 				=> '#486db0',	
		'footer-font-nav-hover' 		=> 'Open Sans', 
		'footer-weight-nav-hover' 		=> 'Normal',
		'footer-style-nav-hover' 		=> 'Normal',
		'footer-size-nav-hover' 		=> 15,	
		'footer-lheight-nav-hover' 		=> 1.5,	
		'footer-color-nav-hover' 		=> '#6b6f72',	
		'footer-font' 					=> 'Open Sans', 
		'footer-weight' 				=> 'Normal',
		'footer-style' 					=> 'Normal',
		'footer-size' 					=> 13,	
		'footer-lheight' 				=> 1.5,	
		'footer-color' 					=> '#6b6f72',
		'homepage_search_button' 		=> 'search-white-transparent',
		'display_search_home' 			=> 1,
		'landing_search_button' 		=> 'search-white-transparent',
		'display_search_landing' 		=> 1,
	);
	
	add_option( $footer , $footer_default);
	
endif;

//social media default's
$social_default = get_option($social);
if( !$social_default['elements'][1] ) :

	$social_default = array(
		'elements' => array(
			'1' => array( '1' => array( 'id' => '1', 'name' => 'Facebook', 'class' => 'facebook', 'link' => '' , 'description' => 'Enter your Facebook URL.', 'values' => '' )),
			'2' => array( '2' => array( 'id' => '2' , 'name' => 'Twitter', 'class' => 'twitter', 'link' => '' , 'description' => 'Enter your Twitter URL.', 'values' => '' )),
			'3' => array( '3' => array( 'id' => '3', 'name' => 'Google+', 'class' => 'google' , 'link' => '' , 'description' => 'Enter your Google+ URL.', 'values' => '' )),
			'4' => array( '4' => array( 'id' => '4', 'name' => 'Flickr', 'class' => 'flickr' , 'link' => '' , 'description' => 'Enter your Flickr URL.', 'values' => '' )),
			'5' => array( '5' => array( 'id' => '5', 'name' => 'Instagram', 'class' => 'instagram' , 'link' => '' , 'description' => 'Enter your Instagram URL.', 'values' => '' )),
			'6' => array( '6' => array(  'id' => '6', 'name' => 'Pinterest', 'class' => 'pinterest' , 'link' => '' , 'description' => 'Enter your Pinterest URL.', 'values' => '' )),
			'7' => array( '7' => array( 'id' => '7', 'name' => 'Dribble', 'class' => 'dribble' , 'link' => '' , 'description' => 'Enter your Dribble URL.', 'values' => '' )),
			'8' => array( '8' => array( 'id' => '8', 'name' => 'Behance', 'class' => 'behance' , 'link' => '' , 'description' => 'Enter your Behance URL.', 'values' => '' )),
			'9' => array( '9' => array( 'id' => '9', 'name' => 'YouTube', 'class' => 'youtube' , 'link' => '' , 'description' => 'Enter your YouTube URL.', 'values' => '' )),
			'10' => array( '10' => array( 'id' => '10', 'name' => 'Vimeo', 'class' => 'vimeo' , 'link' => '' , 'description' => 'Enter your Vimeo URL.', 'values' => '' )),
			'11' => array( '11' => array( 'id' => '11', 'name' => 'Linkedin', 'class' => 'linkendin' , 'link' => '' , 'description' => 'Enter your Linkedin URL.', 'values' => '' )),
			'12' => array( '12' => array( 'id' => '12', 'name' => 'Email', 'class' => 'email' , 'link' => 'mailto:' , 'description' => 'Enter your contact Email Address.', 'values' => '' )),
			'13' => array( '13' => array( 'id' => '13', 'name' => 'RSS', 'class' => 'rss' , 'link' => '', 'description' => 'Enter the RSS feed URL.', 'values' => home_url( '/' )."feed/" ))
		),
		'settings' => array( 
			'post' => array(
				'post-linkedin' 		=> '',
				'post-facebook' 		=> '',
				'post-facebook-id' 		=> '',
				'post-twitter' 			=> '',
				'post-twitter-share' 	=> '',
				'post-google' 			=> '',
				'post-pinterest' 		=> '',
			), 
			'work' => array(
				'work-linkedin' 		=> '',
				'work-facebook' 		=> '',
				'work-facebook-id' 		=> '',
				'work-twitter' 			=> '',
				'work-twitter-share' 	=> '',
				'work-google' 			=> '',
				'work-pinterest' 		=> '',
			),
			'another' => array(
				'display_media_search' => 1
			),
			'background' => array(
				'background-social-image' 			=> '', 
				'background-position-social' 		=> '',
				'background-setting-attach-social'	=> '', 
				'background-setting-reapet-social'	=> '', 
				'background-setting-social-color'	=> '#4569a8',
				'parallax-social' 					=> 2, 
				'parallax-speed-social' 			=> 10,
		)
		)
	);

	add_option( $social , $social_default);
endif;


// general settings default's
$default_settings = get_option($general_settings);
if( !$default_settings ) :

	$default_settings = array(
		'responsive' 			=> 'Yes' ,
		'smooth' 				=> 1 ,
		'related_works' 		=> 'display' ,
		'related_work_title'	=> 'RELATED WORKS' ,
		'related_posts' 		=> 'display' ,
		'BlogElementsEffects'	=> 'elementsQuicklyLeft',
		'related_post_title' 	=> 'RELATED POSTS' ,
		'related_team'			=> 'display' ,
		'TeamElementsEffects' 	=> 'elementsQuicklyLeft',
		'related_team_title'	=> 'TEAM MEMBERS' ,
		'favicon_url' 			=> THEMEICONE,
		'tracking_code' 		=> ''
		
	);

	add_option( $general_settings , $default_settings);

endif;


// Color settings default's
$default_color_styles = get_option($color_styles);
if( !$default_color_styles ) :

	$default_color_styles = array (
		'subtitle-static' => '#ffffff',
		'subtitle-hover' => '#486db0', 
		'subtitle-visited' => '#',
		'underline-static' => '#486db0', 
		'underline-hover' => '#', 
		'underline-visited' => '#', 
		'another-hover' => '#486db0', 
		'another-visited' => '#', 
		'theme-primary-color' => '#486db0', 
		'theme-secondary-1-color' => '#000000', 
		'contact-fields-color' => '#ffffff',
		'selected-color' => '#486db0', 
		'land-menu-dorp-color' => '',
		'all-button-color' => '#6b6f72', 
		'map-button-color' => '#486db0', 
		'reply-button-color' => '#B7B7B7', 
		'first-comment-color' => '#eeeeee', 
		'children-comment-color' => '#fbfbfb', 
		'reply-block-color' => '#e3e3e3', 
		'subtitle-line-color' => '',
		'comment-line-color' => '#d2d2d2', 
		'home-subtitle-line-color' => '#e3e3e3', 
		'landing-subtitle-line-color' => '#e3e3e3', 
		'all-lines-color' => '#d2d2d2',
		'selected-font-color' => '#ffffff', 
		'display_one_px_effect' => '',
		'related-works-position' => '',
		'related-works-image' => '',
		'related-works-repeat' => '',
		'related-works-attachment' => '', 
		'related-works-color' => '#fbfbfb', 
		'related-posts-position' => '',
		'related-posts-image' => '',
		'related-posts-repeat' => '',
		'related-posts-attachment' => '', 
		'related-posts-color' => '#fbfbfb', 
		'parallax' => 2,
		'parallax-speed' => 10,
		'parallax-related-works' => 2, 
		'parallax-speed-related-works' => 10, 
		'parallax-related-post' => 2,
		'parallax-speed-related-post' => 10, 
		'menu-dorp-color' => '#', 
		'background_homepage' => '#', 
		'background-landing' => '#', 
		'worksThumbHoverColor' => '#486db0', 
		'testimonialsBack' => '#ffffff', 
		'testimonialsBorder' => '#ffffff', 
		'worksThumbHoverColorOpacity' => 80, 
		'postsThumbHover' => 'WhiteBlack-Hover-Coloring', 
		'worksThumbHover' => 'WhiteBlack-Hover-Coloring', 
		'teamThumbHover' => 'WhiteBlack-Hover-Coloring', 
		'testimonialsThumbHover' => 'WhiteBlack-Hover-Coloring', 
		'background-posts-image' => '',
		'background-position-post' => '',
		'background-setting-attach-post' => '', 
		'background-setting-reapet-post' => '',
		'background-setting-posts-color' => '#', 
		'parallax-post' => 2,
		'parallax-speed-post' => 10, 
		'background-work-image' => '',
		'background-position-work' => '',
		'background-setting-attach-work' => '',
		'background-setting-reapet-work' => '',
		'background-setting-work-color' => '#', 
		'parallax-work' => 2,
		'parallax-speed-work' => 10, 
		'background-page-image' => '',
		'background-position-page' => '',
		'background-setting-attach-page' => '',
		'background-setting-reapet-page' => '',
		'background-setting-page-color' => '#', 
		'parallax-page' => 2,
		'parallax-speed-page' => 10, 
		'background-search-image' => '',
		'background-position-search' => '',
		'background-setting-attach-search' => '',
		'background-setting-reapet-search' => '',
		'background-setting-search-color' => '#', 
		'parallax-search' => 2,
		'parallax-speed-search' => 10, 
		'background-team-image' => '',
		'background-position-team' => '',
		'background-setting-attach-team' => '',
		'background-setting-reapet-team' => '',
		'background-setting-team-color' => '#', 
		'parallax-team' => 2,
		'parallax-speed-team' => 10, 
		'background-Rteam-image' => '',
		'background-position-Rteam' => '',
		'background-setting-attach-Rteam' => '',
		'background-setting-reapet-Rteam' => '',
		'background-setting-Rteam-color' => '#e6e6e6', 
		'parallax-Rteam' => 2, 
		'parallax-speed-Rteam' => 10, 
		'background-testimonial-image' => '',
		'background-position-testimonial' => '',
		'background-setting-attach-testimonial' => '',
		'background-setting-reapet-testimonial' => '',
		'background-setting-testimonial-color' => '#', 
		'parallax-testimonial' => 2, 
		'parallax-speed-testimonial' => 10, 
		'tag-background-static' => '#486db0', 
		'tag-background-hover' => '#6b6f72', 
	);

	add_option( $color_styles , $default_color_styles);

endif;


// gallery default's
$default_gallery = get_option($gallery);
if( !$default_gallery ) :

	$default_gallery = array(
		'portfolio' => 0,
		'exclude_name' => '',
		'exclude' => '',
		'port_exclude_name' => '',
		'exclude_portfilio' => '',
		'portfolio_sort' => 'rand', 
		'by_type_sort' => 'rand', 
		'homepage-static-font' => 'Open Sans', 
		'homepage-static-weight' => 'Normal', 
		'homepage-static-style' => 'Normal', 
		'homepage-static-size' => 14, 
		'homepage-static-lheight' => 1.1, 
		'homepage-static-color' => '#6b6f72', 
		'homepage-hover-font' => 'Open Sans', 
		'homepage-hover-weight' => 'Normal', 
		'homepage-hover-style' => 'Normal', 
		'homepage-hover-size' => 14, 
		'homepage-hover-lheight' => 1.1, 
		'homepage-hover-color' => '#ffffff', 
		'homepage-background-color' => '#486db0',
		'landing-static-font' => 'Open Sans', 
		'landing-static-weight' => 'Normal', 
		'landing-static-style' => 'Normal', 
		'landing-static-size' => 14, 
		'landing-static-lheight' => 1.1, 
		'landing-static-color' => '#6b6f72', 
		'landing-hover-font' => 'Open Sans', 
		'landing-hover-weight' => 'Normal', 
		'landing-hover-style' => 'Normal', 
		'landing-hover-size' => 14, 
		'landing-hover-lheight' => 1.1, 
		'landing-hover-color' => '#ffffff', 
		'landing-background-color' => '#486db0', 
	);

	add_option( $gallery , $default_gallery);

endif;


// contact default's
$default_contact = get_option($contact);
if( !$default_contact ) :
	$default_contact = array(
		'displayInHomepage' => 1,
		'DisplayinLanding' => 1,
		'contact_title' => 'Contact',
		'contact_address' => '',
		'contact_details' => '',
		'welcome_message' => '',
		'contact_primary_email' => '', 
		'contact_form_email' => '',
		'contact_web' => 'www.cuckoothemes.com', 
		'display_icon' => 'Yes',
		'google_properties' => 'london', 
		'google_zoom_level' => 15, 
		'parallax' => 0, 
		'img_url' => '',
		'imgPosition' => '', 
		'imgRepeat' => '',
		'imgAttachment' => '',
		'parallax-speed' => 10, 
		'backgroundColor' => '#e6e6e6',
		'map_show' => 1, 
	);
add_option( $contact , $default_contact);
endif;






// font default's

$default_fonts = get_option($fonts);
if( !$default_fonts ) :

	$default_fonts = array (
		'slideshow-title-font' => 'Open Sans',
		'slideshow-title-weight' => 'Bold', 
		'slideshow-title-style' => 'Normal',
		'slideshow-title-size' => 90,
		'slideshow-title-lheight' => 1.1, 
		'slideshow-title-color' => '#ffffff',
		'slideshow-subtitle-font' => 'Open Sans', 
		'slideshow-subtitle-weight' => 'Bold', 
		'slideshow-subtitle-style' => 'Normal',
		'slideshow-subtitle-size' => 50, 
		'slideshow-subtitle-lheight' => 1.1, 
		'slideshow-subtitle-color' => '#ffffff', 
		'pwp-title-font' => 'Open Sans', 
		'pwp-title-weight' => 'Bold', 
		'pwp-title-style' => 'Normal', 
		'pwp-title-size' => 70, 
		'pwp-title-lheight' => 0.9, 
		'pwp-title-color' => '#486db0', 
		'page-title-font' => 'Open Sans', 
		'page-title-weight' => 'Bold', 
		'page-title-style' => 'Normal', 
		'page-title-size' => 70, 
		'page-title-lheight' => 0.9,
		'page-title-color' => '#486db0', 
		'pwp-subtitle-font' => 'Open Sans', 
		'pwp-subtitle-weight' => 'Bold', 
		'pwp-subtitle-style' => 'Normal', 
		'pwp-subtitle-size' => 30, 
		'pwp-subtitle-lheight' => 0.9,
		'pwp-subtitle-color' => '#6b6f72', 
		'page-unit-title-font' => 'Open Sans', 
		'page-unit-title-weight' => 'Bold', 
		'page-unit-title-style' => 'Normal', 
		'page-unit-title-size' => 70, 
		'page-unit-title-lheight' => 0.9, 
		'page-unit-title-color' => '#486db0', 
		'page-unit-subtitle-font' => 'Open Sans', 
		'page-unit-subtitle-weight' => 'Bold', 
		'page-unit-subtitle-style' => 'Normal', 
		'page-unit-subtitle-size' => 30, 
		'page-unit-subtitle-lheight' => 0.9, 
		'page-unit-subtitle-color' => '#6b6f72', 
		'text-box-testimonials-font' => 'Open Sans', 
		'text-box-testimonials-weight' => 'Bold', 
		'text-box-testimonials-style' => 'Normal', 
		'text-box-testimonials-size' => 40, 
		'text-box-testimonials-lheight' => 1.1, 
		'text-box-testimonials-color' => '#6b6f72', 
		'text-box-testimonials1-font' => 'Open Sans', 
		'text-box-testimonials1-weight' => 'Bold', 
		'text-box-testimonials1-style' => 'Normal', 
		'text-box-testimonials1-size' => 40, 
		'text-box-testimonials1-lheight' => '1.1', 
		'text-box-testimonials1-color' => '#6b6f72', 
		'testimonial-content-font' => 'Open Sans', 
		'testimonial-content-weight' => 'Normal', 
		'testimonial-content-style' => 'Normal', 
		'testimonial-content-size' => 14, 
		'testimonial-content-lheight' => 1.5,
		'testimonial-content-color' => '#6b6f72',
		'testimonial-author-font' => 'Open Sans', 
		'testimonial-author-weight' => 'Bold', 
		'testimonial-author-style' => 'Normal', 
		'testimonial-author-size' => 14, 
		'testimonial-author-lheight' => 1.1, 
		'testimonial-author-color' => '#486db0', 
		'testimonial-details-font' => 'Open Sans', 
		'testimonial-details-weight' => 'Normal', 
		'testimonial-details-style' => 'Normal', 
		'testimonial-details-size' => 13, 
		'testimonial-details-lheight' => 1.5,
		'testimonial-details-color' => '#6b6f72', 
		'testimonial-template-content-font' => 'Open Sans', 
		'testimonial-template-content-weight' => 'Bold', 
		'testimonial-template-content-style' => 'Normal', 
		'testimonial-template-content-size' => 20, 
		'testimonial-template-content-lheight' => 1.5, 
		'testimonial-template-content-color' => '#6b6f72', 
		'testimonial-template-author-font' => 'Open Sans', 
		'testimonial-template-author-weight' => 'Bold', 
		'testimonial-template-author-style' => 'Normal', 
		'testimonial-template-author-size' => 14, 
		'testimonial-template-author-lheight' => 1.5,
		'testimonial-template-author-color' => '#486db0', 
		'testimonial-template-details-font' => 'Open Sans', 
		'testimonial-template-details-weight' => 'Normal',
		'testimonial-template-details-style' => 'Normal',
		'testimonial-template-details-size' => 13,
		'testimonial-template-details-lheight' => 1.5,
		'testimonial-template-details-color' => '#6b6f72',
		'button-font' => 'Open Sans', 
		'button-weight' => 'Normal', 
		'button-style' => 'Normal', 
		'button-size' => 14, 
		'button-lheight' => 0.9, 
		'button-color' => '#ffffff', 
		'body-font' => 'Open Sans', 
		'body-weight' => 'Normal', 
		'body-style' => 'Normal', 
		'body-size' => 14, 
		'body-lheight' => 1.5, 
		'body-color' => '#6b6f72', 
		'details-font' => 'Open Sans', 
		'details-weight' => 'Normal', 
		'details-style' => 'Normal', 
		'details-size' => 12, 
		'details-lheight' => 1.5, 
		'details-color' => '#6b6f72', 
		'alerts-font' => 'Open Sans', 
		'alerts-weight' => 'Normal', 
		'alerts-style' => 'Normal', 
		'alerts-size' => 14, 
		'alerts-lheight' => 1.5,
		'alerts-color' => '#ffffff', 
		'ptl-title-font' => 'Open Sans', 
		'ptl-title-weight' => 'Bold', 
		'ptl-title-style' => 'Normal', 
		'ptl-title-size' => 20,
		'ptl-title-lheight' => 1.1, 
		'ptl-title-color' => '#6b6f72', 
		'ptl-team-title-font' => 'Open Sans', 
		'ptl-team-title-weight' => 'Bold',
		'ptl-team-title-style' => 'Normal', 
		'ptl-team-title-size' => 20, 
		'ptl-team-title-lheight' => 1.1, 
		'ptl-team-title-color' => '#486db0', 
		'occupation-font' => 'Open Sans', 
		'occupation-weight' => 'Bold', 
		'occupation-style' => 'Normal', 
		'occupation-size' => 14, 
		'occupation-lheight' => 1.5, 
		'occupation-color' => '#6b6f72', 
		'tt-content-font' => 'Open Sans', 
		'tt-content-weight' => 'Bold', 
		'tt-content-style' => 'Normal', 
		'tt-content-size' => 20, 
		'tt-content-lheight' => 1.5, 
		'tt-content-color' => '#6b6f72', 
		'workl-title-font' => 'Open Sans', 
		'workl-title-weight' => 'Bold', 
		'workl-title-style' => 'Normal', 
		'workl-title-size' => 20, 
		'workl-title-lheight' => 1.2, 
		'workl-title-color' => '#ffffff', 
		'workl-subtitle-font' => 'Open Sans', 
		'workl-subtitle-weight' => 'Normal', 
		'workl-subtitle-style' => 'Normal', 
		'workl-subtitle-size' => 14,
		'workl-subtitle-lheight' => 1.2, 
		'workl-subtitle-color' => '#ffffff', 
		'comment-font' => 'Open Sans', 
		'comment-weight' => 'Bold', 
		'comment-style' => 'Normal', 
		'comment-size' => 24, 
		'comment-lheight' => 1.2, 
		'comment-color' => '#6b6f72', 
		'reply-font' => 'Open Sans', 
		'reply-weight' => 'Bold', 
		'reply-style' => 'Normal', 
		'reply-size' => 20, 
		'reply-lheight' => 1.2, 
		'reply-color' => '#6b6f72', 
		'h1-font' => 'Open Sans',
		'h1-weight' => 'Bold', 
		'h1-style' => 'Normal', 
		'h1-size' => 35, 
		'h1-lheight' => 1.2, 
		'h1-color' => '#6b6f72', 
		'h2-font' => 'Open Sans', 
		'h2-weight' => 'Bold', 
		'h2-style' => 'Normal', 
		'h2-size' => 25, 
		'h2-lheight' => 1.2, 
		'h2-color' => '#6b6f72', 
		'h3-font' => 'Open Sans', 
		'h3-weight' => 'Bold', 
		'h3-style' => 'Normal', 
		'h3-size' => 20, 
		'h3-lheight' => 1.2, 
		'h3-color' => '#6b6f72', 
		'h4-font' => 'Open Sans', 
		'h4-weight' => 'Bold', 
		'h4-style' => 'Normal', 
		'h4-size' => 17, 
		'h4-lheight' => 1.2, 
		'h4-color' => '#6b6f72', 
		'h5-font' => 'Open Sans', 
		'h5-weight' => 'Bold', 
		'h5-style' => 'Normal', 
		'h5-size' => 14, 
		'h5-lheight' => 1.2, 
		'h5-color' => '#6b6f72', 
		'lightbox-font' => 'Open Sans', 
		'lightbox-weight' => 'Normal', 
		'lightbox-style' => 'Normal', 
		'lightbox-size' => 14, 
		'lightbox-lheight' => 1.2, 
		'lightbox-color' => '#ffffff', 
		'widgest-title-font' => 'Open Sans', 
		'widgest-title-weight' => 'Bold', 
		'widgest-title-style' => 'Normal', 
		'widgest-title-size' => 20,
		'widgest-title-lheight' => 0.9, 
		'widgest-title-color' => '#6b6f72',
		'tag-widgets-font' => 'Open Sans', 
		'tag-widgets-weight' => 'Normal', 
		'tag-widgets-style' => 'Normal', 
		'tag-widgets-size' => 13,
		'tag-widgets-lheight' => 1.5, 
		'tag-widgets-color' => '#ffffff', 
		'related-posts-font' => 'Open Sans', 
		'related-posts-weight' => 'Bold', 
		'related-posts-style' => 'Normal', 
		'related-posts-size' => 24, 
		'related-posts-lheight' => 1.1, 
		'related-posts-color' => '#6b6f72', 
		'related-works-font' => 'Open Sans',
		'related-works-weight' => 'Bold', 
		'related-works-style' => 'Normal', 
		'related-works-size' => '24', 
		'related-works-lheight' => '1.1', 
		'related-works-color' => '#6b6f72', 
		'related-team-font' => 'Open Sans', 
		'related-team-weight' => 'Bold', 
		'related-team-style' => 'Normal', 
		'related-team-size' => 24, 
		'related-team-lheight' => 1.1, 
		'related-team-color' => '#6b6f72', 
		'single-post-details-font' => 'Open Sans', 
		'single-post-details-weight' => 'Normal', 
		'single-post-details-style' => 'Normal', 
		'single-post-details-size' => 13, 
		'single-post-details-lheight' => 1.5, 
		'single-post-details-color' => '#6b6f72', 
		'comments-font' => 'Open Sans', 
		'comments-weight' => 'Normal', 
		'comments-style' => 'Normal', 
		'comments-size' => 12, 
		'comments-lheight' => 1.5, 
		'comments-color' => '#6b6f72', 
		'contact-last-col-font' => 'Open Sans', 
		'contact-last-col-weight' => 'Normal', 
		'contact-last-col-style' => 'Normal', 
		'contact-last-col-size' => 14, 
		'contact-last-col-lheight' => 1.5, 
		'contact-last-col-color' => '#6b6f72', 
		'links-last-col-font' => 'Open Sans', 
		'links-last-col-weight' => 'Normal', 
		'links-last-col-style' => 'Normal', 
		'links-last-col-size' => 14, 
		'links-last-col-lheight' => 1.5, 
		'links-last-col-color' => '#486db0', 
		'links-hover-last-col-font' => 'Open Sans', 
		'links-hover-last-col-weight' => 'Normal', 
		'links-hover-last-col-style' => 'Normal', 
		'links-hover-last-col-size' => 14, 
		'links-hover-last-col-lheight' => 1.5, 
		'links-hover-last-col-color' => '#486db0', 
		'contact-custom-font' => 'Open Sans', 
		'contact-custom-weight' => 'Normal', 
		'contact-custom-style' => 'Normal', 
		'contact-custom-size' => 14, 
		'contact-custom-lheight' => 1.5, 
		'contact-custom-color' => '#6b6f72', 
		'contact-links-custom-font' => 'Open Sans', 
		'contact-links-custom-weight' => 'Normal', 
		'contact-links-custom-style' => 'Normal', 
		'contact-links-custom-size' => 14, 
		'contact-links-custom-lheight' => 1.5, 
		'contact-links-custom-color' => '#486db0', 
		'contact-cuctom-links-hover-font' => 'Open Sans', 
		'contact-cuctom-links-hover-weight' => 'Normal', 
		'contact-cuctom-links-hover-style' => 'Normal', 
		'contact-cuctom-links-hover-size' => 14, 
		'contact-cuctom-links-hover-lheight' => 1.5, 
		'contact-cuctom-links-hover-color' => '#486db0' 
	);

	add_option( $fonts , $default_fonts);

endif;

// sidebar default's
$default_sidebar = get_option($sidebar);
if( $default_sidebar['global_position'] == null ) :

	$default_sidebar = array(
		'global_position' => 'right',
		'custom_sidebars' => array ('Main Sidebar', 'No Sidebar'),
		'sidebars_elements' => array (''),
		'delete_sidebars' => array (''),
		'blog_sidebar' => 'Main Sidebar', 
		'works_sidebar' => 'Main Sidebar', 
		'other_sidebar' => 'Main Sidebar', 
		'search_sidebar' => 'Main Sidebar', 
		'team_sidebar' => 'Main Sidebar', 
		'testimonials_sidebar' => 'Main Sidebar'
	);

	add_option( $sidebar , $default_sidebar);

endif;

/* Themes Update Count */
$update_count = get_option(THEMENAME.'-our-themes');
if(!$update_count) {
	add_option( THEMENAME.'-our-themes' , '1');
}

//wpml
if (in_array( 'sitepress-multilingual-cms/sitepress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
	/* Builder values */
	$builder_wpml = get_option($builder);
	if(!empty($builder_wpml)){
		foreach( $builder_wpml as $keys ){
			foreach( $keys as $key=>$content ){
			
				if( function_exists('icl_register_string') ) :
					icl_register_string(THEMENAME.' Homepage Builder unit #'.$key, 'Title', $content['title']);
					icl_register_string(THEMENAME.' Homepage Builder unit #'.$key, 'Subtitle', $content['subtitle']);
					icl_register_string(THEMENAME.' Homepage Builder unit #'.$key, 'Text Box unit text', unit_title_scan($content['textBoxText']));
					icl_register_string(THEMENAME.' Homepage Builder unit #'.$key, 'Text Box unit button title', unit_title_scan($content['textBoxUrlTitle']));
					icl_register_string(THEMENAME.' Homepage Builder unit #'.$key, 'HTML unit text', cuckoo_get_value( $content['imageText'] ));
				endif;
			
			}
		}
	}
	
	/* Contact values */
	$contact_wpml = get_option($contact);
	if( function_exists('icl_register_string') ) :
		icl_register_string(THEMENAME.' Contact Information', 'Contact Unit Title', $contact_wpml['contact_title']);
		icl_register_string(THEMENAME.' Contact Information', 'Address', $contact_wpml['contact_address']);
		icl_register_string(THEMENAME.' Contact Information', 'Contact Details', $contact_wpml['contact_details']);
		icl_register_string(THEMENAME.' Contact Information', 'Primary Email Address',  $contact_wpml['contact_primary_email']);
		icl_register_string(THEMENAME.' Contact Information', 'Contact Form Email Address', $contact_wpml['contact_form_email'] );
		icl_register_string(THEMENAME.' Contact Information', 'Website Address', $contact_wpml['contact_web'] );
		icl_register_string(THEMENAME.' Contact Information', 'Welcome Message', $contact_wpml['welcome_message'] );
		icl_register_string(THEMENAME.' Contact Information', 'Your Address Google Map', $contact_wpml['google_properties'] );
	endif;
	
	/* General values */
	$general_settings_wpml = get_option($general_settings);
	if( function_exists('icl_register_string') ) :
		icl_register_string( THEMENAME.' Related Works Unit', 'Title', $general_settings_wpml['related_work_title'] );
		icl_register_string( THEMENAME.' Related Posts Unit', 'Title', $general_settings_wpml['related_post_title'] );
		icl_register_string( THEMENAME.' Related Team Unit', 'Title', $general_settings_wpml['related_team_title'] );
	endif;
	
	/* Header & Footer values */
	$footer_wpml = get_option($footer);
	if( function_exists('icl_register_string') ) :
		icl_register_string(THEMENAME.' Header & Footer', 'Plain Text Logo Title', $footer_wpml['plain_text_header'] );
		icl_register_string(THEMENAME.' Header & Footer', 'Image Logo Title', $footer_wpml['image_title'] );
		icl_register_string(THEMENAME.' Header & Footer', 'Line 1', $footer_wpml['line1'] );
		icl_register_string(THEMENAME.' Header & Footer', 'Line 2', $footer_wpml['line2'] );
		icl_register_string(THEMENAME.' Header & Footer', 'Line 3', $footer_wpml['line3'] );
	endif;
	
	/* Slider values */
	$slider_wpml = get_option($slider);
	
	foreach( $slider_wpml['elements'] as $keys ){
		foreach( $keys as $key=>$slider ){
			if($slider['img'] != null ){
				if( function_exists('icl_register_string') ) :
					icl_register_string(THEMENAME.' Homepage Slides #'.$key, 'Image Title', $slider['title']);
					icl_register_string(THEMENAME.' Homepage Slides #'.$key, 'Slide Title', $slider['slide_title']);
					icl_register_string(THEMENAME.' Homepage Slides #'.$key, 'Slide Subtitle', $slider['slide_subtitle']);
					icl_register_string(THEMENAME.' Homepage Slides #'.$key, 'Slide Button Title',$slider['title_button_slides']);
				endif;
			}
		}
	}
	if( function_exists('icl_register_string') ) :
		icl_register_string(THEMENAME.' Homepage FullScreen Image', 'Title', $slider_wpml['settings']['image_full_title']);
		icl_register_string(THEMENAME.' Homepage FullScreen Image', 'Subtitle', $slider_wpml['settings']['image_full_subtitle']);
	endif;
}
?>