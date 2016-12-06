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
** Template Name: Blog with Widget Area
*/

$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
$blog = $sidebar['blog_sidebar'] == 'No Sidebar' ? 0 : 1;
$class = $sidebar['blog_sidebar'] == 'No Sidebar' ? 'blog-no-aside' : 'blog-with-aside';

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


get_header();
	/* Page header Slider */
	$slider = cuckoo_get_post_meta(get_the_ID(), "-slider-meta-box");
	if(isset($slider[0])) : echo do_shortcode(cuckoo_decode($slider[0]));  endif; ?>
	<section id="main-container" data-hovereffects-img="<?php echo $cuckoo_style['postsThumbHover']; ?>" data-hovereffects-class="thumb-post-list-225" class="<?php if($paralax == '1') : ?>parallax-background blog-template-4<?php else : ?>blog-template-4<?php endif; ?><?php if(isset($slider[1]) == 1) : echo $classSlider = $slider[0] ? ' header-with-slider' : ' header-no-slider' ; endif; ?>" <?php echo $style; ?>>
	<?php	
		/* Post header block: Title, subtitle */
		if(isset($slider[1]) != 1) :
			get_template_part( 'loop/total/template-header' );
		endif;

		if ( !post_password_required() ) :  ?>
			<section id="post-content" class="screen-large">
				<div class="item-top-line landing-page"></div>
				<?php // content Page
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						$content = get_the_content();
						if( $content != '' ) : ?>
							<section class="page-content-before">
								<?php the_content(); ?>
							</section>
						<?php endif;
					endwhile;
				endif;
				
				/* Post content block: content */
				?>
				<article id="blog-content-full-width"  class="<?php echo $class; ?> pad-null" role="main">
					<ul class="blog-list-option blog-full-width">
						<?php
						if ( get_query_var('paged') ) {
							$paged = get_query_var('paged');
						} else if ( get_query_var('page') ) {
							$paged = get_query_var('page');
						} else {
							$paged = 1;
						}

						$args= array(
							'paged' 		=> $paged,
							'post_types' 	=> 'post'
						);
						query_posts($args);
								
						if(have_posts()) :
							while ( have_posts() ) : the_post(); ?>
								<li id="post-<?php the_ID(); ?>" <?php post_class('blog-li-option list-full-width'); ?>>
									<?php get_template_part( "loop/post/header-list-option" ); ?>
									<div class="excerpt-post-li-option-225<?php if ( !has_post_thumbnail() ) : ?> no-thumb-post<?php endif; ?>">
										<?php the_excerpt(); ?>
										<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', 'cuckoothemes' ); ?></a></div>
									</div>
								</li>
							<?php endwhile; // End the loop. Whew. ?>
						<?php endif; ?>
					</ul>
				</article>
				<?php if($blog == 1) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>
				<div class="clear"></div>
			</section>
			<?php /* Load More button */
			get_template_part( 'loop/total/load-more' ); 
		else :	
				/* If page have password need template */
			get_template_part( 'loop/alert/page-password' ); 
							
		endif;	
			?>
			<script type="text/javascript">
				jQuery(document).ready(function($){
					$('body').cuckoobizz('blackWhiteEffectsUse', $('.thumb-post-list-225').find('img'), '<?php echo $cuckoo_style['postsThumbHover']; ?>');
				});
			</script>
	</section>
<?php get_template_part( 'loop/total/socialmedia-landing' ); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>