<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
*
*
** Name: Search
*/
$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
$search_sidebar = $sidebar['search_sidebar'] == 'No Sidebar' ? 0 : 1;
$class = $sidebar['search_sidebar'] == 'No Sidebar' ? 'single-post-no-aside' : 'single-post';
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );

$backgroundColor 		= ( !empty($cuckoo_style['background-setting-search-color']) ? $cuckoo_style['background-setting-search-color'] != '#' ? 'background-color:'.$cuckoo_style['background-setting-search-color'].';' : '' : '' );
$backgroundImage 		= ( !empty($cuckoo_style['background-search-image']) ? "background-image:url('".$cuckoo_style['background-search-image']."');" : '' );
$backgroundPosition 	= ( !empty($cuckoo_style['background-position-search']) ? 'background-position:'.$cuckoo_style['background-position-search'].';' : '' );
$backgroundAttachment 	= ( !empty($cuckoo_style['background-setting-attach-search']) ? 'background-attachment:'.$cuckoo_style['background-setting-attach-search'].';' : '' );
$backgroundRepeat	 	= ( !empty($cuckoo_style['background-setting-reapet-search']) ? 'background-repeat:'.$cuckoo_style['background-setting-reapet-search'].';': '' );
$parallaxSpeed			= ( !empty($cuckoo_style['parallax-speed-search']) ? $cuckoo_style['parallax-speed-search'] : 10 );
$paralax 				= $cuckoo_style['parallax-search'];
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


$seperator = ' , ';
$output ;
get_header(); ?>
<section id="main-container" <?php if($paralax == '1') : ?> class="parallax-background" <?php endif; echo $style; ?>>
	<header id="item-header" class="single-post-header">
		<div id="header-position" class="screen-large">
			<h1><?php _e('Search Results', 'cuckoothemes'); ?></h1>
			<div class="item-info-block">
				<h3><?php printf( __( 'Search Results for: &ldquo;%s&rdquo;', 'cuckoothemes' ), '' . get_search_query() . '' ); ?></h3>
			</div>
		</div>
	</header>
	<section id="post-content" class="screen-large search-content-main">
		<article id="content-main" class="search-content <?php echo $class; ?>" role="main">
		<?php if(have_posts()) :
			while ( have_posts() ) : the_post(); ?>
				<?php $get_post_types = get_post(get_the_ID()); ?>
				<article id="item-<?php the_ID(); ?>" <?php post_class('search-list cuckoo-list'); ?>>
					<h2 class="search-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'cuckoothemes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<div class="search-content-text">
						<?php if($get_post_types->post_type == 'works') : 
							$categories = wp_get_object_terms( get_the_ID(), "types" ); ?>
							<div class="item-elements"> 
								<?php _e('Posted in ', 'cuckoothemes');
								foreach($categories as $cat) : 
									$output .= '<a class="" href="'. get_tag_link($cat->term_id). '">'. $cat->name .'</a>'. $seperator ;
									endforeach;
								echo trim($output, $seperator); ?>
							</div>
						<?php endif; ?>
						<?php if($get_post_types->post_type == 'post') : ?>
							<?php 
							$format = get_post_format();
							if ( false === $format ) $format = 'standard'; 
							?>
							<div class="item-elements-post">
								<div class="format-blog">
									<div title="<?php echo ucwords($format); ?>" class="single-<?php echo $format; ?>"></div>
								</div>
								<?php cuckoo_posted_on(); ?> | <?php comments_popup_link(__('No Comments', 'cuckoothemes'), __('1 Comment','cuckoothemes'), __('% Comments','cuckoothemes')); ?>
							</div>
						<?php endif; ?>
						<?php if($get_post_types->post_type != 'product') : ?>
							<?php the_excerpt(); ?>
						<?php endif; ?>
						<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', 'cuckoothemes' ); ?></a></div>
					</div>
				</article>
			<?php endwhile; // End the loop. Whew. ?>
		<?php else: ?>
			<?php get_template_part( 'loop/alert/no-search' ); ?>
		<?php endif; ?>
		</article>
		<?php if($search_sidebar == 1) : ?>
			<?php get_sidebar('search'); ?>
		<?php endif; ?>
		<div class="clear"></div>
	</section>
	<?php /* Load More button */ ?>
	<?php get_template_part( 'loop/total/load-more' ); ?>
</section>
<?php get_template_part( 'loop/total/socialmedia-landing' ); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>