<?php
/**
 * @package WordPress
 * @subpackage cuckoothemes
 * @since cuckoothemes 1.0
 * URL http://cuckoothemes.com
 *
 *
 * name : footer
 */
	$cuckoo_footer = get_option( THEMEPREFIX . "_header_footer_settings");
 ?>
		<footer id="main-footer" class="wrapper<?php if($cuckoo_footer['parallax-footer'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_footer['parallax-footer'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_footer['parallax-speed-footer']; ?>"<?php endif; ?>>
			<div id="footer-container" class="screen-large">
				<?php if(  wp_nav_menu( array( 'theme_location' => 'secondary'  ,  'fallback_cb' => '', 'echo' => '0' ) ) ) : ?>
					<nav class="footer-nav">
						<?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'secondary' ,  'fallback_cb' => '' ,  'depth' => 1 ) ); ?>
					</nav>
				<?php endif; ?>
				<div class="footer-text-block">
				<?php if(!empty($cuckoo_footer['line1']) or !empty($cuckoo_footer['line2']) or !empty($cuckoo_footer['line3'])) : ?>
					<div class="footer-text">
						<span class="footer-txt-line"><?php cuckoo_echo_for_wpml(THEMENAME.' Header & Footer', 'Line 1', cuckoo_decode($cuckoo_footer['line1'])); ?></span>
						<span class="footer-txt-line"><?php cuckoo_echo_for_wpml(THEMENAME.' Header & Footer', 'Line 2', cuckoo_decode($cuckoo_footer['line2'])); ?></span>
						<span class="footer-txt-line"><?php cuckoo_echo_for_wpml(THEMENAME.' Header & Footer', 'Line 3', cuckoo_decode($cuckoo_footer['line3'])); ?></span>
					</div>
				<?php endif; ?>
				<div title="<?php _e('Back to Top', 'cuckoothemes'); ?>" class="back_to_top"></div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>