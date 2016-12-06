<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/

?>
	<section id="main_content">
		<?php cuckoo_framework_head( __('Our Themes', THEMENAME) ); ?>
		<div id="general_settings">
			<?php 
			if( $xml = cuckoo_themes() ) {
				$count = str_replace('.', '', $xml->latest);
				update_option( THEMENAME.'-our-themes' , $count );
				echo $xml->text; 
			} else { ?> 
				<div class="general_title_active">
					<span class="float_left"><?php _e('Sorry, Not Connection, Try Later' , THEMENAME); ?></span>
				</div>
			<?php }	?>
		</div>
		<?php cuckoo_framework_footer(); ?>
	</section>
	