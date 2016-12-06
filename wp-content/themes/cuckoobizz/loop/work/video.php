<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
**************
*
*
*
** Template Name: Work Video
*/
$video = cuckoo_get_post_meta(get_the_ID(), "_work_video");
?>
<section id="work-video">
	<div id="video-content">
		<?php if ( is_youtube( $video ) ) : ?>
			<?php echo do_shortcode('[video_techical id="' . $video . '" width="100%" height="100%"]'); ?>
		<?php endif; ?>
		<?php if ( is_vimeo( $video ) ) : ?>
			<?php echo do_shortcode('[video_techical id="' . $video . '" width="100%" height="100%"]'); ?>
		<?php endif; ?>
	</div>
</section>	