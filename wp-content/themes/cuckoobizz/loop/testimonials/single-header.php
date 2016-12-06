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
** Name: Testimonials Header
*/
$subtitle = cuckoo_get_post_meta(get_the_ID(), "-subtitle-meta-box");
$previous = get_previous_post();
$next = get_next_post();
$titleNext = $next == "" ? "" : $next->post_title;
$titlePrew = $previous == "" ? "" : $previous->post_title;
$slider = cuckoo_get_post_meta(get_the_ID(), "-slider-meta-box");
?>
<header id="item-header" class="single-post-header">
	<div id="header-position-team" class="screen-large<?php if(!empty($slider[0])) : echo ' header-with-slider'; endif; ?>">
		<h1><?php the_title(); ?></h1>
		<div class="item-info-block">
			<h3><?php echo $subtitle; ?></h3>
		</div>
		<?php previous_post_link('%link', _x('<div class="prev-post-img" title="'.$titlePrew.'"></div>','', 'cuckoothemes')); ?>
		<?php next_post_link('%link', _x('<div class="next-post-img" title="'.$titleNext.'"></div>','', 'cuckoothemes')); ?>
	</div>
</header>
