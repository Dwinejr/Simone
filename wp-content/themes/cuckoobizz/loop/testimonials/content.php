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
** Name: Single testimonials
*/
?>
<?php
$excerpt = get_the_excerpt();
$company = cuckoo_get_post_meta(get_the_ID(), "_company");
$details = cuckoo_get_post_meta(get_the_ID(), "_details");
$image_url = cuckoo_get_post_meta(get_the_ID(), "_testimonial_image_url");
$image_title = cuckoo_get_post_meta(get_the_ID(), "_testimonial_image_title");
$site_url = cuckoo_get_post_meta(get_the_ID(), "_testimonial_url_site");
$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
$testimonials_sidebar = $sidebar['testimonials_sidebar'] == 'No Sidebar' ? 0 : 1;
$class = $sidebar['testimonials_sidebar'] == 'No Sidebar' ? 'single-post-no-aside' : 'single-post';
if( $excerpt != '' )
	$excerpts = cuckoo_excerpt_testimonials( $excerpt );
?>
<section id="post-content" class="screen-large">
	<article id="content-main" class="<?php echo $class; ?>" role="main">
		<div id="testimonials-content">
			<?php if($excerpt) : ?>
				<div class="testimonials-excerpt"><?php echo $excerpt; ?></div>
			<?php endif; ?>
			<?php if($company) : ?>
				<div class="testimonials-company">
					<?php if( $image_url ): ?>
						<div class="testimonials-thumb">
						<?php if($UrlTest): ?>
							<a title="<?php echo $image_title; ?>" href="<?php echo $UrlTest; ?>"><img width="60" height="60" src="<?php echo cuckoo_get_attachment_all_size($image_url , 'mini-thumb'); ?>" title="<?php echo $image_title; ?>" /></a>
						<?php else : ?>
							<img width="60" height="60" src="<?php echo cuckoo_get_attachment_all_size($image_url , 'mini-thumb'); ?>" title="<?php echo $image_title; ?>" />
						<?php endif; ?>
						</div>
					<?php endif; ?>
					<span class="text-test" <?php if( $image_url ){ ?> style="text-align:left;"<?php } ?>>
						<?php echo $company; ?>
						<?php if($details): ?>
							<div class="test-details">
								<?php echo $details; ?>
							</div>
						<?php endif; ?>
					</span>
				</div>
			<?php endif; ?>
		</div>
	</article>
	<?php if($testimonials_sidebar == 1) : ?>
		<?php get_sidebar('testimonials'); ?>
	<?php endif; ?>
	<div class="clear"></div>
</section>