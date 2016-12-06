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
** Name: sidebars area
*/
$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
$blog = $sidebar['blog_sidebar'] == 'Main Sidebar' ? 'main-sidebar-area' : 'cuckoo-custom-sidebar-'. make_ID_in_text($sidebar['blog_sidebar']);
?>
<?php if(woo_active_cuckoo()) : ?>
	<?php if(is_shop() or is_product()) : ?>
		<?php return false; ?>
	<?php endif; ?>
<?php endif; ?>

<?php if ( is_active_sidebar( $blog ) ) : ?>
<aside id="main-sidebars" class="<?php echo $sidebar['global_position']; ?>-sidebar"> 
	<ul class="main-sidebar">
		<?php dynamic_sidebar( $blog ); ?>
	</ul>
</aside>
<?php endif; ?>