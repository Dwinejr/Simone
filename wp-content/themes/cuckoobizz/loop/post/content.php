<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
**************
*
*
*
** Name: Post main content
*/
$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
$blog = $sidebar['blog_sidebar'] == 'No Sidebar' ? 0 : 1;
$class = $sidebar['blog_sidebar'] == 'No Sidebar' ? 'single-post-no-aside' : 'single-post';
?>
<section id="post-content" class="screen-large">
	<article id="content-main" class="<?php echo $class; ?>" role="main">
		<?php the_content(); ?>
	</article>
	<?php if($blog == 1) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>
	<div class="clear"></div>
</section>