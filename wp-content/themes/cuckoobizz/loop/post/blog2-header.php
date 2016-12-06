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
** Name : Post header
*/

$format = get_post_format(); 
if ( false === $format ) :
	$format = 'standard';
endif; 
			
?>
	<div class="post_header">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post_thumbnail_blog2">
				<a class="blog-thumb" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'cuckoothemes' ), the_title_attribute( 'echo=0' ) ); ?>">
					<?php echo the_post_thumbnail( 'col-3' ,array( 'title' => the_title('', '', false) ) ); ?> 
					<div class="border-img"></div>
				</a>
			</div>
		<?php endif; ?>
		<div class="post-title">
			<h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'cuckoothemes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<div class="format-blog">
				<div title="<?php echo ucwords($format); ?>" class="single-<?php echo $format; ?>"></div>
			</div>
			<div class="about_post">
				<?php cuckoo_posted_on(); ?> | <?php comments_popup_link(__('No Comments', 'cuckoothemes'), __('1 Comment','cuckoothemes'), __('% Comments','cuckoothemes')); ?>
			</div>	
		</div>
	</div>