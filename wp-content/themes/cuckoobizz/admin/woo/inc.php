<?php 
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/

 ########- Woocommerce -#########

/* Hooks */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_action('woocommerce_before_main_content', 'cuckoo_woo_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'cuckoo_woo_wrapper_end', 10);

/* Related */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);  
add_action( 'woocommerce_after_main_content', 'cuckoo_woo_related_products', 10);

/* Pagination */
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
add_action( 'woocommerce_after_main_content', 'woocommerce_pagination', 10);

/* Social Media Template */
add_action( 'woocommerce_after_main_content', 'cuckoo_social_tpl', 10);
/* Map */
add_action( 'woocommerce_after_main_content', 'get_map_landing', 10);

// Ensure cart contents update when products are added to the cart via AJAX
add_filter('add_to_cart_fragments', 'cuckoo_add_to_cart_fragment');

/* Add JS files */
add_action('wp_enqueue_scripts', 'cuckoo_woo_jquery');

/* Product title */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary','woocommerce_template_single_title', 5 );


function woocommerce_template_single_title(){ 
	$previous = get_previous_post();
	$next = get_next_post();
	$titleNext = $next == "" ? "" : $next->post_title;
	$titlePrew = $previous == "" ? "" : $previous->post_title;
	?>
	<h2 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h2>
	<?php if(is_product()){ ?>
		<div class="next-prev-product">
			<?php previous_post_link('%link', _x('<div class="prev-post-img" title="'.$titlePrew.'"></div>','', 'cuckoothemes')); ?>
			<?php next_post_link('%link', _x('<div class="next-post-img" title="'.$titleNext.'"></div>','', 'cuckoothemes')); ?>
		</div> 
	<?php }
}

function cuckoo_woo_related_products(){ 
	$cuckoo_woocommerce = get_option( THEMEPREFIX . "_woocommerce_cuckoo" );
	$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
	if(is_product()){ ?>
	<section id="related-products" class="clearfix related-posts<?php if($cuckoo_woocommerce['parallax'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_woocommerce['parallax'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_woocommerce['parallax-speed']; ?>"<?php endif; ?> <?php if($cuckoo_woocommerce['related_products'] == ''){ ?><?php } ?>>
		<?php if($cuckoo_woocommerce['related_products']) : ?>
			<h2 class="screen-large related"><?php echo $cuckoo_woocommerce['related_products']; ?></h2>
		<?php else : ?>
			<div style="padding-top:70px;"></div>
		<?php endif; ?>
		<?php  woocommerce_related_products( 100, 4 ); ?>
		<div class="post-navigation">
			<div title="<?php _e('Next', 'cuckoothemes'); ?>" class="next-blog-nav"></div>
			<div title="<?php _e('Previuos', 'cuckoothemes'); ?>" class="prev-blog-nav"></div>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('body').cuckoobizz('blogListHomepage', { 
					main: '#related-products div.related',
					mainUL: 'ul.products',
					effect: '<?php echo $cuckoo_woocommerce['relatedEffects']; ?>',
					around: '1',
					hoverEffect: '<?php echo $cuckoo_woocommerce['productThumbHover'] ?>'
				});
			});
		</script>
	</section>
	<?php
	}
}

function cuckoo_woo_wrapper_start() { 
	global $woocommerce;
	$cuckoo_woocommerce = get_option( THEMEPREFIX . "_woocommerce_cuckoo" );
	$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
	$cart_url = $woocommerce->cart->get_cart_url();
	$checkout_url = $woocommerce->cart->get_checkout_url();
	
	$myaccount_page_url = "";
	if ( $myaccount_page_id ) {
	  $myaccount_page_url = get_permalink( $myaccount_page_id );
	}
	
	$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );

	$backgroundColor 		= ( !empty($cuckoo_style['background-setting-page-color']) ? $cuckoo_style['background-setting-page-color'] != '#' ? 'background-color:'.$cuckoo_style['background-setting-page-color'].';' : '' : '' );
	$backgroundImage 		= ( !empty($cuckoo_style['background-page-image']) ? "background-image:url('".$cuckoo_style['background-page-image']."');" : '' );
	$backgroundPosition 	= ( !empty($cuckoo_style['background-position-page']) ? 'background-position:'.$cuckoo_style['background-position-page'].';' : '' );
	$backgroundAttachment 	= ( !empty($cuckoo_style['background-setting-attach-page']) ? 'background-attachment:'.$cuckoo_style['background-setting-attach-page'].';' : '' );
	$backgroundRepeat	 	= ( !empty($cuckoo_style['background-setting-reapet-page']) ? 'background-repeat:'.$cuckoo_style['background-setting-reapet-page'].';': '' );
	$parallaxSpeed			= ( !empty($cuckoo_style['parallax-speed-page']) ? $cuckoo_style['parallax-speed-page'] : 10 );
	$paralax 				= $cuckoo_style['parallax-page'];
	if( $backgroundColor && !$backgroundImage ) :
		$backgroundImage = 'background-image:none;';
	endif;
	if(!$backgroundImage or $backgroundImage == 'background-image:none;' ) :
		$backgroundPosition = ''; $backgroundAttachment = ''; $backgroundRepeat = '';
	endif;
	if($paralax == 1) :
		$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundRepeat . ' background-attachment:fixed" data-type="background" data-speed="'.$parallaxSpeed.'"';
	else :
		$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundPosition . $backgroundAttachment . $backgroundRepeat . '"';
	endif;
	
	$slider = cuckoo_get_post_meta(get_the_ID(), "-slider-meta-box");
	
	if(isset($slider[0])) : echo do_shortcode(cuckoo_decode($slider[0]));  endif;
?>
	<section id="main-container" class="woocommerce-cuckothemes<?php if(is_shop()) : ?> shop-cuckoo<?php endif; ?><?php if($paralax == '1') : ?> parallax-background<?php endif; ?>" <?php echo $style; ?>>
		<?php if(is_shop()){ ?>
		<header id="item-header" class="single-post-header">
			<div id="header-position-page" class="screen-large">
				<h1><?php echo $cuckoo_woocommerce['single_page_title']; ?></h1>
				<?php if($cuckoo_woocommerce['single_page_subtitle']) : ?>
				<div class="item-info-block">
					<h3><?php echo $cuckoo_woocommerce['single_page_subtitle']; ?></h3>
				</div>
				<?php endif; ?>
			</div>
		</header>
		<?php } ?>
		<div id="before-content-woo" class="screen-large<?php if(!is_shop()){ if(empty($slider[0])) : ?> not-header<?php endif; } ?>">
			<?php if(is_shop()){ ?><div class="line-of-woocommerce"></div><?php } ?>
			<div id="path-and-buy">
				<div class="container-woo-path screen-large">
					<?php  echo woocommerce_breadcrumb(); ?>
					<div class="cart-accuont">
						<a href="<?php echo $cart_url; ?>" title="<?php _e('Cart', 'cuckoothemes'); ?>"><span class="cart-show"></span><?php _e('Cart', 'cuckoothemes'); ?></a> | 
						<div class="total-cart"><?php _e('Total', 'cuckoothemes'); ?> <span><?php echo $woocommerce->cart->get_cart_total(); ?></span></div> | 
						<a href="<?php echo $myaccount_page_url; ?>" title="<?php _e('My Account', 'cuckoothemes'); ?>"><?php _e('My Account', 'cuckoothemes'); ?></a> | 
						<a href="<?php echo $checkout_url; ?>" title="<?php _e('Checkout', 'cuckoothemes'); ?>"><?php _e('Checkout', 'cuckoothemes'); ?></a>
					</div>
				</div>
			</div>
			<?php if(!is_shop()){ ?><div class="line-of-woocommerce"></div><?php } ?>
		<?php if(is_shop()){ ?>
			<article id="information-shop">
				<?php cuckoo_woocommerce_result_count(); ?>
				<?php woocommerce_catalog_ordering(); ?>
			</article>
		<?php } ?>
		</div>
		<article id="content-woo" role="main" class="<?php if(is_product()){ ?>screen-large cuckoo-single-element<?php }else{ ?>screen-large cuckoo-not-single-element<?php } ?>">
 <?php
}

if ( ! function_exists( 'woocommerce_breadcrumb' ) ) {

	/**
	 * Output the WooCommerce Breadcrumb
	 *
	 * @access public
	 * @return void
	 */
	function woocommerce_breadcrumb( $args = array() ) {

		$defaults = apply_filters( 'woocommerce_breadcrumb_defaults', array(
			'delimiter'   => ' | ',
			'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
			'wrap_after'  => '</nav>',
			'before'      => '',
			'after'       => '',
			'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
		) );

		$args = wp_parse_args( $args, $defaults );

		woocommerce_get_template( 'shop/breadcrumb.php', $args );
	}
}

function cuckoo_woo_wrapper_end() { 
$cuckoo_woocommerce = get_option( THEMEPREFIX . "_woocommerce_cuckoo" );
?>
		</article>
		<?php if(is_shop()) : ?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('body').cuckoobizz('blackWhiteEffectsUse', $('li.product').find('img'), '<?php echo $cuckoo_woocommerce['productThumbHover']; ?>');
			});
		</script>
		<?php endif; ?>
	</section>
<?php
}

function cuckoo_social_tpl(){
	get_template_part( 'loop/total/socialmedia-landing' ); 
}

function cuckoo_add_to_cart_fragment( $fragments ) {
global $woocommerce;
ob_start();
?>
<div class="total-cart"><?php _e('Total', 'cuckoothemes'); ?> <span><?php echo $woocommerce->cart->get_cart_total(); ?></span></div>
<?php
$fragments['div.total-cart'] = ob_get_clean();
return $fragments;
}

/* Pagination */
function woocommerce_pagination() {
	global $wp_rewrite, $wp_query;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	if($wp_query->max_num_pages > 1 ){
	echo '<div id="pagination-woo">';
	echo '<div class="testimonials-shadow"></div>';
	echo '<div class="pagination-container screen-large">';
    $pagination = array(
        'base' => @add_query_arg('page','%#%'),
        'format' => '?paged=%#%',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => __('Previous','cuckoothemes'),
        'next_text' => __('Next','cuckoothemes'),
		'end_size'     => 2,
		'mid_size'     => 4,
        'show_all' => false,
        'type' => 'array'
    );
    if ( $wp_rewrite->using_permalinks() )
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
    if ( !empty( $wp_query->query_vars['s'] ) )
            $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
    $pages = paginate_links( $pagination );
    echo '<div class="pagination-content">';
    if ( $current == 1) echo '<span class="disabled prev">'.__('Previous', 'cuckoothemes').'</span>';
	foreach ($pages as $page) :
		echo $page;
    endforeach;
    if ( $current == $wp_query->max_num_pages ) echo '<span class="disabled next">'.__('Next', 'cuckoothemes').'</span>';
    echo '</div>';
	echo '</div>';
	echo '</div>';
	}
}

function cuckoo_woo_jquery(){
	wp_enqueue_script('cuckoo-woo-jquery', get_template_directory_uri() .'/admin/woo/js/jquery.woo.js', array('jquery'));
	wp_enqueue_script('cuckoo-woo-jquery');
}

/* Settings Woocommerce in to framework default */
$cuckoo_woocommerce = get_option( THEMEPREFIX . "_woocommerce_cuckoo" );
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
if(!$cuckoo_woocommerce){
	$cuckoo_woocommerce = array(
	'single_page_title' => 'CUCKOOBIZZ ESHOP', 
	'single_page_subtitle' => 'WELCOME TO THE ESHOP DEMO', 
	'related_products' => 'RELATED PRODUCTS', 
	'productThumbHover' => 'Coloring-Opacity', 
	'related_products_show' => 'display', 
	'relatedEffects' => 'elementsQuicklyLeft', 
	'parallax' => 0,
	'img_url' => '',
	'imgPosition' => '',
	'imgRepeat' => '',
	'imgAttachment' => '',
	'parallax-speed' => 10, 
	'backgroundColor' => '#fbfbfb', 
	'title_font' => 'Open Sans', 
	'title_weight' => 'Bold', 
	'title_style' => 'Normal', 
	'title_size' => 70, 
	'title_lheight' => 0.9, 
	'title_color' => '#486db0', 
	'subtitle_font' => 'Open Sans', 
	'subtitle_weight' => 'Bold', 
	'subtitle_style' => 'Normal', 
	'subtitle_size' => 30, 
	'subtitle_lheight' => 0.9, 
	'subtitle_color' => '#6b6f72', 
	'product_title_font' => 'Open Sans', 
	'product_title_weight' => 'Bold', 
	'product_title_style' => 'Normal',
	'product_title_size' => 30, 
	'product_title_lheight' => 1.1, 
	'product_title_color' => '#6b6f72', 
	'sale_box_font' => 'Open Sans', 
	'sale_box_weight' => 'Normal', 
	'sale_box_style' => 'Normal', 
	'sale_box_size' => 14, 
	'sale_box_lheight' => 1.1, 
	'sale_box_color' => '#ffffff', 
	'price_font' => 'Open Sans', 
	'price_weight' => 'Bold', 
	'price_style' => 'Normal', 
	'price_size' => 30, 
	'price_lheight' => 1.1,
	'price_color' => '#486db0', 
	'regular_font' => '', 
	'regular_weight' => 'Bold', 
	'regular_style' => 'Normal', 
	'regular_size' => 20, 
	'regular_lheight' => 1.1, 
	'regular_color' => '#6b6f72', 
	'add_to_cart_font' => 'Open Sans', 
	'add_to_cart_weight' => 'Normal', 
	'add_to_cart_style' => 'Normal', 
	'add_to_cart_size' => 14, 
	'add_to_cart_lheight' => 1.1, 
	'add_to_cart_color' => '#ffffff', 
	'related_products_font' => '',
	'related_products_weight' => 'Bold', 
	'related_products_style' => 'Normal', 
	'related_products_size' => 24, 
	'related_products_lheight' => 1.1, 
	'related_products_color' => '#6b6f72', 
	'subtitle-line-color' => '#e9e9e9', 
	'details-box-color' => '#f5f5f5', 
	'sale-box-1-color' => '#486db0', 
	'add-to-cart-button-color' => '#6b6f72', 
	'add-to-cart-button-hover-color' => '#486db0'
);
	add_option(  THEMEPREFIX . "_woocommerce_cuckoo" , $cuckoo_woocommerce);
}

/**
* List all products.
*
*/
function woocommerce_list_products( $atts ){
global $woocommerce_loop;
 
extract( shortcode_atts( array(
	'per_page' => '12',
	'columns' => '4',
	'orderby' => 'title',
	'order' => 'asc'
	), $atts ) );
 
	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'ignore_sticky_posts' => 1,
		'orderby' => $orderby,
		'order' => $order,
		'posts_per_page' => $per_page,
		'meta_query' => array(
			array(
			'key' => '_visibility',
			'value' => array('catalog', 'visible'),
			'compare' => 'IN'
			),
			array(
			'key' => '_price',
			'value' => 0,
			'compare' => '>',
			'type' => 'NUMERIC'
			)
		)
	);
	 
	ob_start();
	 
	$products = new WP_Query( $args );
	 
	$woocommerce_loop['columns'] = $columns;
	 
	if ( $products->have_posts() ) : ?>
	 
		<ul class="products">
		 
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
			 
			<?php woocommerce_get_template_part( 'content', 'product' ); ?>
			 
			<?php endwhile; // end of the loop. ?>
		 
		</ul>
	 
	<?php endif;
	 
	wp_reset_query();
	 
return ob_get_clean();
}
add_shortcode('list_products', 'woocommerce_list_products');

/**
* Result Count
*
* Shows text: Showing x - x of x results
*
* @author WooThemes
* @package WooCommerce/Templates
* @version 2.0.0
*/

function woocommerce_result_count(){ // this is wrong for this theme
	return;
}

function cuckoo_woocommerce_result_count(){
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	global $woocommerce, $wp_query;

	if ( ! woocommerce_products_will_display() )
	return;
	?>
	<p class="woocommerce-result-count">
		<?php
		$paged = max( 1, $wp_query->get( 'paged' ) );
		$per_page = $wp_query->get( 'posts_per_page' );
		$total = $wp_query->found_posts;
		$first = ( $per_page * $paged ) - $per_page + 1;
		$last = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

		if ( 1 == $total ) {
		_e( 'Showing the single result', 'woocommerce' );
		} elseif ( $total <= $per_page ) {
		printf( __( 'Showing all %d results', 'woocommerce' ), $total );
		} else {
		printf( _x( 'Showing %1$d-%2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'woocommerce' ), $first, $last, $total );
		}
		?>
	</p>
<?php } ?>