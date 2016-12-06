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
** Name: Template Header need to Testimonials, Team, Blog
*/
$subtitle = cuckoo_get_post_meta(get_the_ID(), "-subtitle-meta-box");
$slider = cuckoo_get_post_meta(get_the_ID(), "-slider-meta-box");

if(!empty($slider[0])) : ?>
	<header id="item-header" class="single-post-header">
		<div id="header-position-page" class="screen-large header-with-slider">
			<h1><?php the_title(); ?></h1>
			<?php if($subtitle) : ?>
			<div class="item-info-block">
				<h3><?php echo $subtitle; ?></h3>
			</div>
			<?php endif; ?>
		</div>
	</header>
<?php else : ?>
	<header id="item-header" class="single-post-header">
		<div id="header-position-page" class="screen-large">
			<h1><?php the_title(); ?></h1>
			<?php if($subtitle) : ?>
			<div class="item-info-block">
				<h3><?php echo $subtitle; ?></h3>
			</div>
			<?php endif; ?>
		</div>
	</header>
<?php endif; ?>
