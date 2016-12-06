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
** Name: sidebar Works area
*/
$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
$search_sidebar = $sidebar['search_sidebar'] == 'Main Sidebar' ? 'main-sidebar-area' : 'cuckoo-custom-sidebar-'. make_ID_in_text($sidebar['search_sidebar']);
?>
<?php if ( is_active_sidebar( $search_sidebar ) ) : ?>
<aside id="main-sidebars" class="<?php echo $sidebar['global_position']; ?>-sidebar"> 
	<ul class="main-sidebar">
		<?php dynamic_sidebar( $search_sidebar ); ?>
	</ul>
</aside>
<?php endif; ?>