<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://www.cuckoothemes.com
**************
*
*
*
** Name : Framework functions
*/
/* Head */
function cuckoo_framework_head($page_name)
{ ?>
	<header id="framework_title">
		<div class="theme_info">
			<span class="theme_icone_title"></span><span class="theme_color_title"><?php echo THEMENAME; ?><?php echo ' V'.THEMEVERSION; ?></span><span style="font-weight:normal; font-size:17px;"> | </span><?php echo $page_name; ?>
		</div>
		<div class="theme_version">
			CuckooThemes Framework V<?php echo FRAMEWORKVERSION; ?>
		</div>
	</header>	
<?php }
/* Footer  */
function cuckoo_framework_footer()
{ ?>
	<footer id="framework_footer">
		<div class="footer_txt">
			<?php _e("CuckooThemes Framework V".FRAMEWORKVERSION." Created by "); ?>
			<a href="http://www.cuckoothemes.com" title="CuckooThemes" target="_blank">CuckooThemes</a>
		</div>
		<div class="cuckoothemes_icone">
			<a href="http://www.cuckoothemes.com" title="CuckooThemes" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/admin/images/cuckoothemes-icone.png" alt="cuckoothemes" /></a>
		</div>
	</footer>
<?php }
?>