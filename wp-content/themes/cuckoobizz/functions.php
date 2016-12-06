<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/

 
// including framework
require_once ( get_template_directory() . '/admin/admin-ini.php');

// including styles
require_once ( get_template_directory() . '/style/style.php');

// including CuckooLove
require_once ( get_template_directory() . '/cuckoolove/cuckoo-love.php');

// plugin activation
require_once ( get_template_directory() . '/framework/class-tgm-plugin-activation.php');

// isseting content width
if ( ! isset( $content_width ) )
	$content_width = 960;

if(get_option('cuckoo_int_plugins', '0') == '0') {
	global $wpdb;
	$wpdb->query("UPDATE ". $wpdb->options ." SET option_value = 'a:0:{}' WHERE option_name = 'active_plugins';");
	$wpdb->query("UPDATE ". $wpdb->sitemeta ." SET meta_value = 'a:0:{}' WHERE meta_key = 'active_plugins';");
	update_option('cuckoo_int_plugins', '1');
}

if(get_option('cuckoo_int_plugins', '0') == '1') {

	/* Include RevSlider WP */

	$revslider = get_template_directory() . '/framework/plugins/revslider/revslider.php';
	include $revslider;

	// Activate the plugin if necessary

	if(get_option('cuckoo_revslider_activated', '0') == '0') {
		if(!class_exists('RevSliderAdmin')) {
			$revslider_admin_script = get_template_directory() . '/framework/plugins/revslider/revslider_admin.php';
			include $revslider_admin_script;
		}
		   // Run activation script
		$revslider_admin = new RevSliderAdmin($revslider);
		$revslider_admin->onActivate();

		// Save a flag that it is activated, so this won't run again
		update_option('cuckoo_revslider_activated', '1');
	}
	
	/* Include LayerSlider WP */

	$layerslider = get_template_directory() . '/framework/plugins/LayerSlider/layerslider.php';

	include $layerslider;
	
	$layerslider_last_version = get_option('cuckoo_layerslider_last_version', '1.0');

	// Activate the plugin if necessary
	if(get_option('cuckoo_layerslider_activated', '0') == '0') {
		// Run activation script
		layerslider_activation_scripts();

		// Save a flag that it is activated, so this won't run again
		update_option('cuckoo_layerslider_activated', '1');

		// Save the current version number of LayerSlider
		update_option('cuckoo_layerslider_last_version', $GLOBALS['lsPluginVersion']);

	// Do version check
	} else if(version_compare($GLOBALS['lsPluginVersion'], $layerslider_last_version, '>')) {
		// Run again activation scripts for possible adjustments
		layerslider_activation_scripts();

		// Update the version number
		update_option('cuckoo_layerslider_last_version', $GLOBALS['lsPluginVersion']);
	}
	
	/* Include Cuckoothemes Shortcode */
	$cuckooShortcodes = get_template_directory() . '/framework/plugins/cuckoothemes-shortcodes/cuckoothemes-shortcodes.php';
	include $cuckooShortcodes;
}

/*
** Main theme settup's
*/

paginate_links();

add_action( 'after_setup_theme', 'cuckoo_settup' );


add_theme_support('woocommerce');
define('WOOCOMMERCE_USE_CSS', false);

if ( ! function_exists( 'cuckoo_settup' ) ):

function cuckoo_settup() {

	// add default thumbnails size
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(300, 150, true);
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'mini-thumb', 60, 60, true );
		add_image_size( 'main-slideshow', 1224, 600, true );
		add_image_size( 'admin-slide-show', 225, 150, true );
		add_image_size( 'blog-thumb', 225, 225, true );
		add_image_size( '240-size', 240, 240, true );
		add_image_size( '480-size', 480, 240, true );
		add_image_size( '715-size', 715, 715, true );
		add_image_size( '715x500size', 715, 500, true );
		add_image_size( '715x250size', 715, 250, true );
		add_image_size( 'col-3', 305 , 225, true );
		add_image_size( 'col-2', 470 , 305, true );
		add_image_size( 'thumb-470', 470, 225, true );
		add_image_size( 'work-gallery', 960, 475, true);
}
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// add post formats
	add_theme_support( 'post-formats',  array( 'aside', 'gallery', 'image', 'link', 'quote', 'video', 'audio', 'status' ) );

	// add background
	add_theme_support( 'custom-background' );
	
	// Make theme available for translation
	// Translations can be filed in the /lang/ directory
	load_theme_textdomain( 'cuckoothemes', get_template_directory() . '/lang' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/lang/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in two locations.  
	register_nav_menus( array(  
		'primary' => __( 'Header Navigation', 'cuckoothemes' ),  
		'secondary' => __('Footer Navigation', 'cuckoothemes' ),
		'thirdary' => __('Top Right Navigation', 'cuckoothemes' ),
	) );
}
endif;

function cuckoo_images_name_muploader( $sizes ) {
	
	$new_sizes = array();
	
	$added_sizes = get_intermediate_image_sizes();
	
	// $added_sizes is an indexed array, therefore need to convert it
	// to associative array, using $value for $key and $value
	foreach( $added_sizes as $key => $value) {
		if($value != "post-thumbnail") :
			$val = "Cuckoo Custom Format ";
			$new_sizes[$value] = ucwords($val);
		endif;
	}
	
	// This preserves the labels in $sizes, and merges the two arrays
	$new_sizes = array_merge( $new_sizes, $sizes );
	
	return $new_sizes;
}
add_filter('image_size_names_choose', 'cuckoo_images_name_muploader', 11, 1);


// add google analistics 
if( ! function_exists( 'cuckoo_add_googleanalytics' )) :
function cuckoo_add_googleanalytics() 
{ 
	$settings = get_option( THEMEPREFIX . "_general_settings");
	echo cuckoo_decode($settings['tracking_code']);
}
endif;
add_action('wp_footer', 'cuckoo_add_googleanalytics');

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 */
function page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'page_menu_args' );


/**
 * Returns a "Continue Reading" link for excerpts and length 
 * All for excerpts
 */

function cuckoo_excerpt_length( $length ) {
	return 150;
}
add_filter( 'excerpt_length', 'cuckoo_excerpt_length', 999 );


function cuckoo_auto_excerpt_more( $more ) {
	
	return  ' &hellip;'; /*. cuckoo_continue_reading_link(); */
}
add_filter( 'excerpt_more', 'cuckoo_auto_excerpt_more' );

function cuckoo_excerpt_testimonials($more) 
{	
	global $post;
	return $post->post_excerpt;
}

/*
** END excerpts
*/

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css.
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'remove_gallery_css' );

if ( ! function_exists( 'cuckoo_comment' ) ) :

function cuckoo_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix screen-large">
			<div class="comment-column-1">
				<?php echo get_avatar( $comment, 60 ); ?>
			</div>
			<div class="comment-column-2">
				<div class="about-comment">
						<?php printf( __( '%s on ', 'cuckoothemes' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _e( 'Your comment is awaiting moderation.', 'cuckoothemes' ); ?></em>
						<br />
					<?php endif; ?>

					<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
							/* translators: 1: date, 2: time */
							printf( __( '%1$s at %2$s', 'cuckoothemes' ), get_comment_date(),  get_comment_time() ); ?></a><?php _e(' said:', 'cuckoothemes');?> <?php edit_comment_link( __( '[Edit]', 'cuckoothemes' ), ' ' );
						?>
					</div>
				</div>
			</div>
			<div class="comment-column-3">
				<?php comment_text(); ?>
			</div>
			<div class="comment-column-4">
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
			</div>
		</div>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p class="clearfix screen-large pin"><?php _e( 'Pingback:', 'cuckoothemes' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'cuckoothemes'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/*
function cuckoo_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'cuckoo_remove_recent_comments_style' );
*/

if ( ! function_exists( 'cuckoo_posted_on' ) ) :
function cuckoo_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'cuckoothemes' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_month_link(get_the_time('Y'), get_the_time('m')),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'cuckoothemes' ), get_the_author() ),
			get_the_author()
		)
	);
	_e(' in ', 'cuckoothemes');
	$categories = get_the_category();
	$seperator = ', ';
	$output = '';
	if($categories){
		foreach($categories as $category) {
			$output .= '<a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" , 'cuckoothemes'), $category->name ) ) . '">'.$category->cat_name.'</a>'.$seperator;
		}
	echo trim($output, $seperator);
	}
}
endif;


if ( ! function_exists( 'twentyten_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 */
function twentyten_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'cuckoothemes' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'cuckoothemes' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'cuckoothemes' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter',10,3);

/**
 * Filter to replace the [caption] shortcode text with HTML5 compliant code
 *
 * @return text HTML content describing embedded figure
 **/
function my_img_caption_shortcode_filter($val, $attr, $content = null)
{
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> '',
		'width'	=> '',
		'caption' => ''
	), $attr));
	
	if ( 1 > (int) $width || empty($caption) )
		return $val;

	$capid = '';
	if ( $id ) {
		$id = esc_attr($id);
		$capid = 'id="figcaption_'. $id . '" ';
		$id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
	}

	return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: '
	. ($width) . 'px">' . do_shortcode( $content ) . '<figcaption ' . $capid 
	. 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
}
 
function get_map_landing(){
	$cuckoo_contact = get_option(THEMEPREFIX . "_contact_settings"); 
	$cuckoo_footer = get_option( THEMEPREFIX . "_header_footer_settings");
	
	if( $cuckoo_contact['DisplayinLanding'] == 1 ){
		get_template_part("templates/map");
	}
	if(!empty($cuckoo_footer['superfoter'])) :
		$my_id = url_to_postid($cuckoo_footer['superfoter']);
		$my_page = get_post($my_id);
		$page_content = $my_page->post_content;
		$page_content = apply_filters('the_content', $page_content);
		$page_content = str_replace(']]>', ']]>', $page_content);
		
		if($page_content) : ?>
			<article id="main-super-footer" class="clearfix<?php if($cuckoo_footer['parallax-super-page'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_footer['parallax-super-page'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_footer['parallax-speed-super-page']; ?>"<?php endif; ?>>
				<div class="page-content superfoter-content screen-large">
					<?php echo $page_content; ?>
				</div>
			</article>
		<?php endif; 
	endif; 
}

add_action( 'comment_form_top', 'cuckoo_comment_before' );

function cuckoo_comment_before() {
	echo '<div class="respond-position screen-large"><div class="respond-arrow"></div>';
}

add_action( 'comment_form', 'cuckoo_comment_after' );

function cuckoo_comment_after() {
	echo '</div>';
}

/*Remove empty paragraph tags from the_content*/
function removeEmptyParagraphs($content) {

    $content = str_replace("<p></p>","",$content);
    return $content;
}

add_filter('the_content', 'removeEmptyParagraphs', 99999);

?>