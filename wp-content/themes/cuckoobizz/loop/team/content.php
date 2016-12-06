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
** Name : team header
*/
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
$memberName = cuckoo_get_post_meta(get_the_ID(), "_team-member-name");
$memberOccupation = cuckoo_get_post_meta(get_the_ID(), "_team-member-occupation");
$memberImage = cuckoo_get_post_meta(get_the_ID(), "_upload_image1");
$memberDesc = cuckoo_get_post_meta(get_the_ID(), "_member-desc");
$socialFacebook = cuckoo_get_post_meta(get_the_ID(), "_social-facebook");
$socialTwitter = cuckoo_get_post_meta(get_the_ID(), "_social-twitter"); 
$socialGoogle = cuckoo_get_post_meta(get_the_ID(), "_social-google"); 
$socialFlickr = cuckoo_get_post_meta(get_the_ID(), "_social-flickr"); 
$socialInstagram = cuckoo_get_post_meta(get_the_ID(), "_social-instagram");
$socialPinterest = cuckoo_get_post_meta(get_the_ID(), "_social-pinterest"); 
$socialDribble = cuckoo_get_post_meta(get_the_ID(), "_social-dribble"); 
$socialBehance = cuckoo_get_post_meta(get_the_ID(), "_social-behance"); 
$socialYouTube = cuckoo_get_post_meta(get_the_ID(), "_social-youtube"); 
$socialVimeo = cuckoo_get_post_meta(get_the_ID(), "_social-vimeo"); 
$socialLinkedin = cuckoo_get_post_meta(get_the_ID(), "_social-linkedin"); 
$socialEmail = cuckoo_get_post_meta(get_the_ID(), "_social-email"); 
$socialRss = cuckoo_get_post_meta(get_the_ID(), "_social-rss"); 
$content = get_the_content();

$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
$team_sidebar = $sidebar['team_sidebar'] == 'No Sidebar' ? 0 : 1;
$class = $sidebar['team_sidebar'] == 'No Sidebar' ? 'single-post-no-aside' : 'single-post';
?>
<section id="post-content" class="screen-large">
	<article id="content-main" class="<?php echo $class; ?>" role="main">
		<div id="team-single-content" <?php if($content) : ?> style="margin-bottom: 25px;" <?php endif; ?>>
			<?php if($memberImage) : ?>
			<div class="team-logo">
				<div class="team-image">
					<img width="225" height="225" class="single-member-img" title="<?php echo $memberName; ?>" alt="<?php echo $memberName; ?>" src="<?php echo cuckoo_get_attachment_all_size($memberImage , 'blog-thumb'); ?>" />
					<div class="border-img"></div>
				</div>
			</div>
			<?php endif; ?>
			<div class="team-contest">
				<div class="team-desc-single">
					<?php echo $memberDesc; ?>
				</div>
				<?php if( $socialFacebook or $socialTwitter or $socialGoogle or $socialFlickr or $socialPinterest or
				$socialDribble or $socialBehance or $socialYouTube or $socialVimeo or $socialLinkedin or $socialEmail or $socialRss ): ?>
					<div class="team-folow">
						<?php if($socialFacebook): ?>
							<a class="facebook-small" target="_blank" href="<?php echo $socialFacebook; ?>" title="Facebook"></a>
						<?php endif; ?>
						<?php if($socialTwitter): ?>
							<a class="twitter-small" target="_blank" href="<?php echo $socialTwitter; ?>" title="Twitter"></a>
						<?php endif; ?>									
						<?php if($socialGoogle): ?>
							<a class="google-small" target="_blank" href="<?php echo $socialGoogle; ?>" title="Google+"></a>
						<?php endif; ?>									
						<?php if($socialFlickr): ?>
							<a class="flickr-small" target="_blank" href="<?php echo $socialFlickr; ?>" title="Flickr"></a>
						<?php endif; ?>									
						<?php if($socialInstagram): ?>
							<a class="instagram-small" target="_blank" href="<?php echo $socialInstagram; ?>" title="Instagram"></a>
						<?php endif; ?>	
						<?php if($socialPinterest): ?>
							<a class="pinterest-small" target="_blank" href="<?php echo $socialPinterest; ?>" title="Pinterest"></a>
						<?php endif; ?>									
						<?php if($socialDribble): ?>
							<a class="dribble-small" target="_blank" href="<?php echo $socialDribble; ?>" title="Dribble"></a>
						<?php endif; ?>									
						<?php if($socialBehance): ?>
							<a class="behance-small" target="_blank" href="<?php echo $socialBehance; ?>" title="Behance"></a>
						<?php endif; ?>									
						<?php if($socialYouTube): ?>
							<a class="youtube-small" target="_blank" href="<?php echo $socialYouTube; ?>" title="YouTube"></a>
						<?php endif; ?>									
						<?php if($socialVimeo): ?>
							<a class="vimeo-small" target="_blank" href="<?php echo $socialVimeo; ?>" title="Vimeo"></a>
						<?php endif; ?>									
						<?php if($socialLinkedin): ?>
							<a class="linkendin-small" target="_blank" href="<?php echo $socialLinkedin; ?>" title="Linkedin"></a>
						<?php endif; ?>									
						<?php if($socialEmail): ?>
							<a class="email-small" href="mailto:<?php echo $socialEmail; ?>" title="Email"></a>
						<?php endif; ?>									
						<?php if($socialRss): ?>
							<a class="rss-small" target="_blank" href="<?php echo $socialRss; ?>" title="RSS"></a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php if( $content ) : ?>
			<div class="team-main-content">
				<?php the_content(); ?>
			</div>
		<?php endif; ?>
	</article>
	<?php if($team_sidebar == 1) : ?>
		<?php get_sidebar('team'); ?>
	<?php endif; ?>
	<div class="clear"></div>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			var a = $('#team-single-content').find('img.single-member-img');
			$('body').cuckoobizz('blackWhiteEffectsUse', a, '<?php echo $cuckoo_style['teamThumbHover']; ?>');
		});
	</script>
</section>