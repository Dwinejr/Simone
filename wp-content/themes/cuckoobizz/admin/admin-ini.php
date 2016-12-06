<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/

/* This is for join all functions  and page for settings */

/**************************** Main settings  ********************************/
// configs file
get_template_part( 'admin/configs' );
// functions
get_template_part( 'admin/admin-functions' );
// default file
get_template_part( 'admin/default' );
// themes hooks file
get_template_part( 'admin/admin-hooks' );
// navigation wallker
get_template_part( 'admin/walker-class' );
// framework functions
get_template_part( 'admin/framework-inc' );

/**************************** testimonials & works & team Class and settings  ********************************/
// testimonials && works Class
get_template_part( 'admin/works-testimonials-class' );
// taxonomy settings
get_template_part( 'admin/taxonomy' );
// testimonials settings
get_template_part( 'admin/testimonials' );
// works settings
get_template_part( 'admin/works' );
// Team settings
get_template_part( 'admin/team' );

/************************ shortcodes **********************************/
/** Video shortcodes */
	// simple video
	get_template_part( 'admin/shortcodes/video/video_shortcodes' );
	// video techical in widgets 
	get_template_part( 'admin/shortcodes/video/technical_video' );
/** Typography shortcodes */
get_template_part( 'admin/shortcodes/typography/typography_shortcodes' );
/** Text_box shortcodes */
get_template_part( 'admin/shortcodes/text box/text_box_shortcodes' );
/** Dividers shortcodes */
get_template_part( 'admin/shortcodes/dividers/dividers_shortcodes' );
/** Column shortcodes */
get_template_part( 'admin/shortcodes/column/column_shortcodes' );
/** Tab shortcodes */
get_template_part( 'admin/shortcodes/tab/tab_shortcodes' );
/** Toggle shortcodes */
get_template_part( 'admin/shortcodes/toggle/toggle_shortcodes' );
/** Map shortcodes */
get_template_part( 'admin/shortcodes/map/map_shortcodes' );
/** Button shortcodes */
get_template_part( 'admin/shortcodes/button/button_shortcodes' );
/** Social button shortcodes */
// Facebook button
get_template_part( 'admin/shortcodes/social-button/fb-box_shortcodes' );
// Twitter share button
get_template_part( 'admin/shortcodes/social-button/twitter-box_shortcodes' );
// Twitter follow button
get_template_part( 'admin/shortcodes/social-button/twitter-follow-box_shortcodes' );
// Google button 
get_template_part( 'admin/shortcodes/social-button/gplus_shortcodes' );	
// Social Box
get_template_part( 'admin/shortcodes/social-button/social-box_shortcodes' );	
// Pin It Create Button
get_template_part( 'admin/shortcodes/social-button/pinit_shortcodes' );
// Twitter Feed
get_template_part( 'admin/shortcodes/social-button/twitter' );
// Pin It Follow Button
get_template_part( 'admin/shortcodes/social-button/pinit-follow_shortcodes' );	
// Pin It Market Button
get_template_part( 'admin/shortcodes/social-button/pinit-market_shortcodes' );
// Linkedin Button
get_template_part( 'admin/shortcodes/social-button/linkedin' );
/** Accordion shortcodes */
get_template_part( 'admin/shortcodes/accordion/accordion' );
/** Slideshow shortcodes */
get_template_part( 'admin/shortcodes/slideshow/slideshow' );
/** Tables shortcodes */
get_template_part( 'admin/shortcodes/table/pricing' );
/** Percent Bars shortcodes */
get_template_part( 'admin/shortcodes/table/percent' );
/** Icon Box shortcode */
get_template_part( 'admin/shortcodes/table/icon-box' );
/** table shortcode */
get_template_part( 'admin/shortcodes/table/table' );
/** table shortcode */
get_template_part( 'admin/shortcodes/team-member' );
/** table shortcode */
get_template_part( 'admin/shortcodes/works' );

/******************************* Ajax ********************************************/
// ajax function
get_template_part( 'admin/ajax-inc' );

/******************************* Elements Types **********************************************/
get_template_part( 'admin/elemets/subtitle' );
get_template_part( 'admin/elemets/sidebar' );
get_template_part( 'admin/elemets/testimonials-excerpt-mod' );
get_template_part( 'admin/elemets/multiple_portfolio' );
get_template_part( 'admin/elemets/shortcode-to-title' );

/*********************************** woocommerce ***************************************/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	get_template_part( 'admin/woo/inc' );
}

/**************************** widgets register  ********************************/
// calendar widgets
get_template_part( 'admin/widget/calendar' );
// Video
get_template_part( 'admin/widget/video' );
// Map
get_template_part( 'admin/widget/map' );
// Twitter
get_template_part( 'admin/widget/twitter' );
// Facebook
get_template_part( 'admin/widget/facebook_box' );
?>