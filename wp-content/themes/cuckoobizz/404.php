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
** Name: Not Found
*/
get_header(); ?>
<article id="error_page">
	<section id="error_main">
		<div class="error_page">
			<div class="error_page_title"><?php _e('404', 'cuckoothemes'); ?></div>
			<p class="error-text"><?php _e( 'Page not Found.<br /> Apologies, but the page you requested could<br /> not be found. Perhaps searching will help.', 'cuckoothemes' ); ?></p>
			<?php echo cuckoo_search_form_404(); ?>
		</div>
	</section>
</article>
<?php get_footer(); ?>