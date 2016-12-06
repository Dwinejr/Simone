<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/

### all define for need theme

if(!define('THEMENAME', "CuckooBizz"))
define('THEMENAME', "CuckooBizz");

if(!define('THEMEPREFIX', "cuckoobizz"))
define('THEMEPREFIX', "cuckoobizz");

if(!define('NOTCHANGEELEMENT', "cuckoo"))
define('NOTCHANGEELEMENT', "cuckoo");

if(!define('THEMEFONT', "Arial"))
define('THEMEFONT', "Arial");

if(!define('THEMEICONE', get_template_directory_uri() .'/admin/icones/favicon.ico'))
define('THEMEICONE', get_template_directory_uri() .'/admin/icones/favicon.ico');

if(!define('LOGOATTACH', get_template_directory_uri() .'/images/logo-attachement.jpg'))
define('LOGOATTACH', get_template_directory_uri() .'/images/logo-attachement.jpg');

if(!define('THEMEVERSION', "1.3"))
define('THEMEVERSION', "1.3");

if(!define('FRAMEWORKVERSION', "2.0"))
define('FRAMEWORKVERSION', "2.0");

if(!define('FRAMEWORKCSS', get_template_directory_uri() .'/admin/css/admin.css'))
define('FRAMEWORKCSS', get_template_directory_uri() .'/admin/css/admin.css');

if(!define('FRAMEWORKJS', get_template_directory_uri() .'/admin/js/admin.js'))
define('FRAMEWORKJS', get_template_directory_uri() .'/admin/js/admin.js');

if(!define('THEMEURL', "http://www.cuckoothemes.com"))
define('THEMEURL', "http://www.cuckoothemes.com");

if(!define('CUCKOO_UPDATE_URL', "http://update.cuckoothemes.com"))
define('CUCKOO_UPDATE_URL', "http://update.cuckoothemes.com");

if(!define('TESTIMONIALWIDGEST', "testimonial_widgest_id")) // ?
define('TESTIMONIALWIDGEST', "testimonial_widgest_id"); // ?

if(!define('CALENDARWIDGEST', "calendar_widgest_id")) // ?
define('CALENDARWIDGEST', "calendar_widgest_id"); // ?

if(!define('CUCKOO_DEBUG', false))
define('CUCKOO_DEBUG', false);

// Add Site Favicon //
function site_favicon() {
	$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.$cuckoo_settings['favicon_url'].'" />';
}
add_action('wp_head', 'site_favicon');
// Add Admin Favicon //

function admin_favicon() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_template_directory_uri() .'/admin/icones/favicon.ico" />';
}
add_action('admin_head', 'admin_favicon');

// function to load scripts uploud images end CSS admin

function my_admin_scripts() { 
	$settings_jons = get_template_directory_uri() .'/admin/js/jquery.json-2.3.min.js';
	$clone_js = get_template_directory_uri() .'/admin/js/clone.js';
 
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', get_template_directory_uri() .'/admin/js/slider.js' , array('jquery','media-upload','thickbox','jquery-ui-sortable'), THEMEVERSION );
wp_enqueue_script('my-upload');

wp_enqueue_script("script_jonsss", $settings_jons , false, THEMEVERSION);
wp_enqueue_script("clone_js", $clone_js , false, THEMEVERSION);
wp_enqueue_script("script", FRAMEWORKJS , false, THEMEVERSION);
}

function works_jQuery(){
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', get_template_directory_uri() .'/admin/js/works.js' , array('jquery','media-upload','thickbox'), THEMEVERSION );
wp_enqueue_script('my-upload');
}

function my_admin_styles() {
wp_enqueue_style('thickbox');
wp_enqueue_style("functions", FRAMEWORKCSS , false, THEMEVERSION , "all");
wp_enqueue_style("Icones", get_template_directory_uri() .'/admin/css/icones.css' , false, THEMEVERSION , "all");
}

if (isset($_GET['page']) && $_GET['page']) { // if page inserting functions else delete
add_action('admin_print_scripts', 'my_admin_scripts'); // load own javascripts 
}

add_action('admin_print_scripts', 'works_jQuery'); // to woks need
add_action('admin_print_styles', 'my_admin_styles'); // CSS for all pages WP

function cuckoo_media_framework() {
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'cuckoo_media_framework' );

function cuckoothemes_framework(){
wp_register_script('framework-cuckoo', get_template_directory_uri() .'/admin/js/cuckoothemes.js' , array('jquery'), THEMEVERSION );
wp_enqueue_script('framework-cuckoo');
}

add_action('admin_print_scripts', 'cuckoothemes_framework');

$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );

/* Responsive files and Retina display */
function cuckoo_screen_styles(){
	wp_register_style('cuckoo-sceen-media', get_template_directory_uri().'/css/screens-media.css' , false, THEMEVERSION , "all");
	wp_enqueue_style( 'cuckoo-sceen-media' );
}
/* If responsive is actived load css script */
if($cuckoo_settings['responsive'] == 'Yes'){
	add_action('wp_enqueue_scripts', 'cuckoo_screen_styles');
}

/* Register IE css */
add_action( 'wp_print_styles', 'cuckoo_stylesheet_IE' );
function cuckoo_stylesheet_IE() {
    global $wp_styles;
	wp_enqueue_style('cuckoo_ie', get_template_directory_uri().'/css/ie.css' , array(), THEMEVERSION , "all");
    $wp_styles->add_data( 'cuckoo_ie', 'conditional', 'lte IE 8' );
}

function cuckoo_style(){
	wp_deregister_style('cuckoowoostyle');
	wp_register_style('cuckoowoostyle', get_template_directory_uri().'/admin/woo/css/style.css' , false, THEMEVERSION , "all");
	wp_enqueue_style( 'cuckoowoostyle' );
	
	wp_deregister_style('BlackAndWhite');
	wp_register_style('BlackAndWhite', get_template_directory_uri().'/css/BlackAndWhite.css' , false, THEMEVERSION , "all");
	wp_enqueue_style( 'BlackAndWhite' );
	
	wp_deregister_style('supersized');
	wp_register_style('supersized', get_template_directory_uri().'/css/supersized.css' , false, THEMEVERSION , "all");
	wp_enqueue_style( 'supersized' );	
	
	wp_deregister_style('cuckoo-lightbox');
	wp_register_style('cuckoo-lightbox', get_template_directory_uri().'/css/cuckoo-lightbox.css' , false, THEMEVERSION , "all");
	wp_enqueue_style( 'cuckoo-lightbox' );
}

add_action('wp_enqueue_scripts', 'cuckoo_style');

/* Jquery option */
function cuckoo_scripts() {
	if (!is_admin()) {
	wp_reset_query();
    wp_enqueue_script( 'jquery', false, array(), false, true);

    wp_deregister_script( 'theme_settings' );
    wp_register_script('theme_settings', get_template_directory_uri() . '/js/theme_settings.js', array(), false, true);
	wp_enqueue_script( 'theme_settings' );    
	
	wp_deregister_script( 'easing_jquery' );
    wp_register_script('easing_jquery', get_template_directory_uri() . '/js/jquery.easing.v.1.3.js', array(), false, true);
	wp_enqueue_script( 'easing_jquery' );	
	
	wp_deregister_script( 'nivo_slider' );
    wp_register_script('nivo_slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array(), false, true);
	wp_enqueue_script( 'nivo_slider' );	
	
	wp_deregister_script( 'nicescroll' );
    wp_register_script('nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.js', array(), false, true);
	wp_enqueue_script( 'nicescroll' );	
	
	wp_deregister_script( 'isotope' );
    wp_register_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), false, true);
	wp_enqueue_script( 'isotope' );	
	
	wp_deregister_script( 'cuckoo-scroll' );
    wp_register_script('cuckoo-scroll', get_template_directory_uri() . '/js/jquery.cuckoo-scroll.js', array(), false, true);
	wp_enqueue_script( 'cuckoo-scroll' );	
	
	wp_deregister_script( 'masonry' );
    wp_register_script('masonry', get_template_directory_uri() . '/js/jquery.masonry.js', array(), false, true);
	wp_enqueue_script( 'masonry' );	
	
	wp_deregister_script( 'BlackAndWhite' );
    wp_register_script('BlackAndWhite', get_template_directory_uri() . '/js/jQuery.BlackAndWhite.js', array(), false, true);
	wp_enqueue_script( 'BlackAndWhite' );	
	
	wp_deregister_script( 'hoverdir' );
    wp_register_script('hoverdir', get_template_directory_uri() . '/js/jquery.hoverdir.js', array(), false, true);
	wp_enqueue_script( 'hoverdir' );	
	
	wp_deregister_script( 'jQueryRotate' );
    wp_register_script('jQueryRotate', get_template_directory_uri() . '/js/jQueryRotate.2.2.js', array(), false, true);
	wp_enqueue_script( 'jQueryRotate' );	
	
	wp_deregister_script( 'supersized' );
    wp_register_script('supersized', get_template_directory_uri() . '/js/supersized.3.2.7.min.js', array(), true);
	wp_enqueue_script( 'supersized' );	
	
	wp_deregister_script( 'cuckoo-lightbox' );
    wp_register_script('cuckoo-lightbox', get_template_directory_uri() . '/js/jquery.cuckoo-lightbox.js', array(), false, true);
	wp_enqueue_script( 'cuckoo-lightbox' );
	}
}
add_action('init', 'cuckoo_scripts');


add_action('admin_print_scripts', 'load_theme_scripts');
function load_theme_scripts() {
    wp_enqueue_style( 'farbtastic' );
    wp_enqueue_script( 'farbtastic' );
}


add_action('init', 'myStartSession', 1);
function myStartSession() {
    if(session_id()=='') {
		session_name("cuckooform");
        session_start();
    }
}

function footer_ajax(){
	global $wp_query, $post;
 	$max = $wp_query->max_num_pages;
 	$paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
	$posttypes = get_post_type( $post->ID );
	wp_register_script('cuckoothemes-ajax' , get_template_directory_uri() . '/js/ajax.js', 'jquery', '1.0');
	wp_enqueue_script('cuckoothemes-ajax');
	wp_localize_script('cuckoothemes-ajax',
	'cuckoo_ajax', 
	array(
		'startPage' => $paged, 
		'maxPages' => $max, 
		'nextLink' => next_posts($max, false), 
		'posttypes' => $posttypes
		)
	);
}
add_action( 'wp_footer', 'footer_ajax', 1);
?>