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
** Template Name: Blog 4 Columns Template
*/

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


get_header(); 
	/* Page header Slider */
	$slider = cuckoo_get_post_meta(get_the_ID(), "-slider-meta-box");
	if(isset($slider[0])) : echo do_shortcode(cuckoo_decode($slider[0]));  endif; ?>
	<section id="main-container" data-hovereffects-img="<?php echo $cuckoo_style['postsThumbHover']; ?>" data-hovereffects-class="post_header" class="<?php if($paralax == '1') : ?>parallax-background blog-template-4<?php else : ?>blog-template-4<?php endif; ?><?php if(isset($slider[1]) == 1) : echo $classSlider = $slider[0] ? ' header-with-slider' : ' header-no-slider' ; endif; ?>" <?php echo $style; ?>>
	<?php	
		/* Post header block: Title, subtitle */
		if(isset($slider[1]) != 1) :
			get_template_part( 'loop/total/template-header' );
		endif;
		
		if ( !post_password_required() ) :  ?>
		<article id="blog-content-full-width" class="screen-large pad-null">
			<div class="item-top-line landing-page"></div>
			<?php // content Page
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					$content = get_the_content();
					if( $content != '' ) : ?>
						<section id="content-main" class="page-content-before">
							<?php the_content(); ?>
						</section>
					<?php endif; ?>
				<?php endwhile;
			endif;
			
			/* Post content block: content */
			?>
			<article class="blog-content-blog item-list-main screen-large-blog many-items">
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
						<article id="post-<?php the_ID(); ?>" <?php post_class('blog-list cuckoo-list'); ?>>
							<?php get_template_part( "loop/post/blog-header" ); ?>
							<div class="blog-content-text">
								<?php
								global $more;
									$more = 0;   ?>
								<?php  the_excerpt(); ?>
								<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', 'cuckoothemes' ); ?></a></div> 
							</div>
						</article>
					<?php endwhile; // End the loop. Whew. ?>
				<?php endif; ?>
				<?php // wp_reset_query(); ?>
			</article>				
		</article>				
			<?php 
			/* Load More button */
			get_template_part( 'loop/total/load-more' ); 
			
		else :
							
			/* If page have password need template */
			get_template_part( 'loop/alert/page-password' ); 
						
		endif;	
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('body').cuckoobizz('blackWhiteEffectsUse', $('.post_header').find('img'), '<?php echo $cuckoo_style['postsThumbHover']; ?>');
			});
		</script>
	</section>
<?php get_template_part( 'loop/total/socialmedia-landing' ); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>