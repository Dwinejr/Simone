<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
**************
*
*
*
** Name: Comment Count, socialMedia block 
*/
$comments_count = get_comments_number();
$cuckoo_social = get_option( THEMEPREFIX . "_social_settings" );
$singular = '';
$twitter_title = "'".the_title('', '', false)."'";
if(is_singular('post')):
	$singular = 'post';
elseif(is_singular('works')) :
	$singular = 'work';
endif;
?>
<section id="item-description" class="item-desc-bottom">
	<div class="header-social-media">
		<?php if($cuckoo_social['settings'][$singular][$singular.'-facebook'] or
				$cuckoo_social['settings'][$singular][$singular.'-linkedin'] or
				$cuckoo_social['settings'][$singular][$singular.'-twitter'] or
				$cuckoo_social['settings'][$singular][$singular.'-google'] or
				$cuckoo_social['settings'][$singular][$singular.'-pinterest']) : ?>
			<div class="social-item-block">
				<?php if($cuckoo_social['settings'][$singular][$singular.'-linkedin']) : ?>
					<div class="social-item-linkedin">
						<?php echo do_shortcode('[linkedin counter="right"]'); ?>
					</div>
				<?php endif; ?>			
				<?php if($cuckoo_social['settings'][$singular][$singular.'-facebook']) : ?>
					<div class="social-item-facebook">
						<?php echo do_shortcode('[fb appId="'. $cuckoo_social['settings'][$singular][$singular.'-facebook-id'].'" layout="button_count"]'); ?>
					</div>
				<?php endif; 
				if($cuckoo_social['settings'][$singular][$singular.'-twitter']) : ?>
					<div class="social-item-twitter">
						<?php echo do_shortcode('[twitter-share text="'. $cuckoo_social['settings'][$singular][$singular.'-twitter-share'].' '.$twitter_title.'" countbox="horizontal"]'); ?>
					</div>
				<?php endif;
				if($cuckoo_social['settings'][$singular][$singular.'-google']) : ?>
					<div class="social-item-google">
						<?php echo do_shortcode('[gplus]'); ?>
					</div>
				<?php endif;
				if($cuckoo_social['settings'][$singular][$singular.'-pinterest']) : ?>
					<div class="social-item-pinterest">
						<?php echo do_shortcode('[pin-create countbox="horizontal"]'); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="counts-position">
	<?php if( function_exists('cuckoo_love') ){
		global $cuckoo_love;
		echo $cuckoo_love->show_in_content(); 
	} ?>
	<?php if( !comments_open() && $comments_count == 0 ){ 
	/* If no have comment's and not open comment hide comment count class */
	}else{ ?>
		<div class="header-comment-count" title="<?php _e( "Comments" , 'cuckoothemes' ); ?>">
			<?php if($comments_count == 0): ?>
				<div class="no-comment-icone"></div>
				<span><?php echo $comments_count; ?></span>				
			<?php else : ?>
				<div class="header-comment-icone"></div>
				<span><?php echo $comments_count; ?></span>
			<?php endif; ?>
		</div>
		<div class="clear"></div>
	<?php } ?>
	</div>
</section>
