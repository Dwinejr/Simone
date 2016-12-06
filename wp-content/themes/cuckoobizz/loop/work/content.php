<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
**************
*
*
*
** Template Name: Works main content
*/

$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
$works = $sidebar['works_sidebar'] == 'No Sidebar' ? 0 : 1;
$class = $sidebar['works_sidebar'] == 'No Sidebar' ? 'single-post-no-aside' : 'single-post';
?>
<section id="post-content" class="screen-large single-work-content">
	<?php
	$content = get_the_content();
	if( $content != '' ) : ?>
		<article id="content-main" class="<?php echo $class; ?>" role="main">
			<?php the_content(); ?>
		</article>
	<?php endif; ?>
	<?php if($works == 1) : ?>
		<?php get_sidebar('works'); ?>
	<?php endif; ?>
	<div class="clear"></div>
</section>