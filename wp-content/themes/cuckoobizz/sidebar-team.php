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
$team_sidebar = $sidebar['team_sidebar'] == 'Main Sidebar' ? 'main-sidebar-area' : 'cuckoo-custom-sidebar-'. make_ID_in_text($sidebar['team_sidebar']);
?>
<?php if ( is_active_sidebar( $team_sidebar ) ) : ?>
<aside id="main-sidebars" class="<?php echo $sidebar['global_position']; ?>-sidebar"> 
	<ul class="main-sidebar">
		<?php dynamic_sidebar( $team_sidebar ); ?>
	</ul>
</aside>
<?php endif; ?>