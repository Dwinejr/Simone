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
** Template Name: Testimonials Template
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
	<section id="main-container" data-hovereffects-img="<?php echo $cuckoo_style['testimonialsThumbHover']; ?>" data-hovereffects-class="test_thumbnail" class="<?php if($paralax == '1') : ?>parallax-background blog-template-4<?php else : ?>blog-template-4<?php endif; ?><?php if(isset($slider[1]) == 1) : echo $classSlider = $slider[0] ? ' header-with-slider' : ' header-no-slider' ; endif; ?>" <?php echo $style; ?>>
	<?php	
		/* Testimonial header block: Title, subtitle */
		if(isset($slider[1]) != 1) : get_template_part( 'loop/total/template-header' ); endif;
		
		if ( !post_password_required() ) : ?>
			<article id="blog-content-full-width" class="screen-large">
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
				
				/* Testimonial content block: image, content, company */
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				
				$args =  array( 
				'paged' 	=> $paged,
				'post_type' => 'testimonials',
				'orderby'	=> 'menu_order date'
				); ?>
				
				<ul class="test-content-template item-list-main screen-large-blog template-testimonials clearfix">
				<?php query_posts( $args ); 
				if ( have_posts() ) while ( have_posts() ) : the_post(); 
					$company = cuckoo_get_post_meta(get_the_ID(), "_company");
					$details = cuckoo_get_post_meta(get_the_ID(), "_details");
					$image_url = cuckoo_get_post_meta(get_the_ID(), "_testimonial_image_url");
					$image_title = cuckoo_get_post_meta(get_the_ID(), "_testimonial_image_title");
					$site_url = cuckoo_get_post_meta(get_the_ID(), "_testimonial_url_site");
					$excerpt = get_the_excerpt();
					$excerpt = cuckoo_excerpt_testimonials( $excerpt ); ?>
					<li id="testimonial-<?php the_ID(); ?>" <?php post_class('test-list-template cuckoo-list'); ?>>
						<?php if ( $image_url ) : ?>
							<div class="test_thumbnail">
								<?php if($site_url) : ?>
									<a class="test-thumb" target="_blank" href="<?php echo $site_url; ?>" title="<?php echo $image_title; ?>">
										<img title="<?php echo $image_title; ?>" src="<?php echo cuckoo_get_attachment_all_size($image_url , 'blog-thumb'); ?>" alt="<?php echo $image_title; ?>" />
										<div class="border-img"></div>
									</a>
								<?php else : ?>
									<img title="<?php echo $image_title; ?>" src="<?php echo cuckoo_get_attachment_all_size($image_url , 'blog-thumb'); ?>" alt="<?php echo $image_title; ?>" />
									<div class="border-img"></div>
								<?php endif ?>
							</div>
						<?php endif; ?>
						<div class="test-title-template-page">
							<div class="testimonial-excerpt">
								<?php echo $excerpt; ?>
							</div>
						</div>
						<div class="testimonials-company test-page-templ">
						<div class="testimonials-opt-2-test"><?php echo $company; ?></div>
						<?php if($details): ?>
							<div class="test-details">
								<?php echo $details; ?>
							</div>
						<?php endif; ?>
						</div>
					</li>
				<?php endwhile; ?>
				</ul>
				<script type="text/javascript">
					jQuery(document).ready(function($){
						$('body').cuckoobizz('blackWhiteEffectsUse', $('.test_thumbnail').find('img'), '<?php echo $cuckoo_style['teamThumbHover']; ?>');
					});
				</script>
			</article>
			<?php
			/* Load More button */
			get_template_part( 'loop/total/load-more' ); 
			
		else :
							
			/* If page have password need template */
			get_template_part( 'loop/alert/page-password' ); 
						
		endif;	
		?>
	</section>
<?php get_template_part( 'loop/total/socialmedia-landing' ); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>