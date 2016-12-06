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
** Name: Related works
*/

$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
if( $cuckoo_settings['related_posts'] == "display" ) :
	$post_categories = wp_get_post_categories( get_the_ID() );
	$types = array();
		foreach($post_categories as $c) :  $cat = get_category( $c );
			$types[] = $cat->name;
		endforeach;

		$type_to_show = implode(',', $types);
		$args =  array(
		'category_name' 		=> $type_to_show,
		'post__not_in'			=> array($id),
		'orderby' 				=> 'rand',
		'posts_per_page' 		=> '-1',
		'ignore_sticky_posts'	=> 1
		);
		$my_query = new wp_query($args);
		if($my_query->have_posts()):
		?>
		<section id="related-works" class="clearfix related-posts<?php if($cuckoo_style['parallax-related-post'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_style['parallax-related-post'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_style['parallax-speed-related-post']; ?>"<?php endif; ?>>
			<?php if($cuckoo_settings['related_post_title']) : ?>
				<h2 class="screen-large related"><?php cuckoo_echo_for_wpml(THEMENAME.' Related Posts Unit', 'Title', $cuckoo_settings['related_post_title']); ?></h2>
			<?php endif; ?>
			<article class="blog-content screen-large" <?php if(!$cuckoo_settings['related_post_title']) : ?> style="padding-top:70px; margin-top:0" <?php endif; ?>>
				<ul class="blog-list-homepage">
				<?php 			
				if ( $my_query->have_posts() ):
				while ( $my_query->have_posts() ) : $my_query->the_post();	?>
					<li id="post-<?php the_ID(); ?>" <?php post_class('blog-li-home'); ?>>
						<?php get_template_part( "loop/post/blog-header" ); ?>
						<div class="blog-content-text">
							<?php the_excerpt(); ?>
							<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', 'cuckoothemes' ); ?></a></div>
						</div>
					</li>
				<?php endwhile; ?>
				<?php endif; ?>
				</ul>
			</article>
			<div class="post-navigation">
				<div title="<?php _e('Next', 'cuckoothemes'); ?>" class="next-blog-nav"></div>
				<div title="<?php _e('Previuos', 'cuckoothemes'); ?>" class="prev-blog-nav"></div>
			</div>
			<script type="text/javascript">
				jQuery(document).ready(function($){
					$('body').cuckoobizz('blogListHomepage', { 
						main: '#related-works',
						mainUL: 'ul.blog-list-homepage',
						effect: '<?php echo $cuckoo_settings['BlogElementsEffects']; ?>',
						around: '1',
						hoverEffect: '<?php echo $cuckoo_style['postsThumbHover'] ?>'
					});
				});
			</script>
		</section>
	<?php endif; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>