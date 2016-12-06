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
** Template Name: Related team
*/
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
if( $cuckoo_settings['related_team'] == "display" ) :
	$id = get_the_ID();
	$work_cat = wp_get_object_terms( $id, "team-categories");
	$types = array();
		foreach( $work_cat as $c ) :
			$types[] = $c->slug;
		endforeach;
		$type_to_show = implode(',', $types);
		$args =  array(
		'team-categories' 	=> $type_to_show,
		'post__not_in'		=> array($id),
		'orderby' 			=> 'rand',
		'showposts' 		=> '-1',
		'post_type' 		=> 'team'
		);
		$my_query = new wp_query($args);
		if($my_query->have_posts()):
		?>
		<section id="team-works" class="related-works-wrap clearfix<?php if($cuckoo_style['parallax-Rteam'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_style['parallax-Rteam'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_style['parallax-speed-Rteam']; ?>"<?php endif; ?>>
			<?php if($cuckoo_settings['related_team_title']) : ?>
				<h2 class="screen-large related"><?php cuckoo_echo_for_wpml(THEMENAME.' Related Team Unit', 'Title', $cuckoo_settings['related_team_title']); ?></h2>
			<?php endif; ?>
			<article class="related-content related_team screen-large" <?php if(!$cuckoo_settings['related_team_title']) : ?> style="padding-top:70px; margin-top:0" <?php endif; ?>>
				<ul class="team-wrapper-homepage">
					<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
					<li id="team-<?php the_ID(); ?>" <?php post_class('test-list'); ?>>
						<?php
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
						$margin = "";
						if($socialFacebook or $socialTwitter or $socialGoogle or $socialFlickr or $socialPinterest or $socialDribble or 
								$socialBehance or $socialYouTube or $socialVimeo or $socialLinkedin or $socialEmail or $socialRss) :
								$margin = " social-margin";
						endif;
						?>
						<div class="team_header">
							<?php if ( $memberImage ) : ?>
								<div class="team_thumbnail">
									<a class="blog-thumb team-member-link" href="<?php the_permalink(); ?>" title="<?php echo $memberName; ?>">
										<img width="240" height="240" alt="<?php echo $memberName; ?>" src="<?php echo cuckoo_get_attachment_all_size($memberImage , '240-size'); ?>" />
										<div class="border-img"></div>
									</a>
								</div>
							<?php endif; ?>
							<div class="member-title">
								<h3><a href="<?php the_permalink(); ?>" title="<?php echo $memberName; ?>" rel="bookmark"><?php echo $memberName; ?></a></h3>	
								<div class="member-occupation"><?php echo $memberOccupation; ?></div>
							</div>
						</div>
						<div class="team-desc-bottom<?php echo $margin; ?>">
							<?php if($socialFacebook): ?>
								<a class="facebook-small" target="_blank" href="http://facebook.com/<?php echo $socialFacebook; ?>" title="Facebook"></a>
							<?php endif; ?>
							<?php if($socialTwitter): ?>
								<a class="twitter-small" target="_blank" href="http://twitter.com/<?php echo $socialTwitter; ?>" title="Twitter"></a>
							<?php endif; ?>									
							<?php if($socialGoogle): ?>
								<a class="google-small" target="_blank" href="https://plus.google.com/<?php echo $socialGoogle; ?>" title="Google+"></a>
							<?php endif; ?>									
							<?php if($socialFlickr): ?>
								<a class="flickr-small" target="_blank" href="http://www.flickr.com/photos/<?php echo $socialFlickr; ?>" title="Flickr"></a>
							<?php endif; ?>	
							<?php if($socialInstagram): ?>
								<a class="instagram-small" target="_blank" href="<?php echo $socialInstagram; ?>" title="Instagram"></a>
							<?php endif; ?>	
							<?php if($socialPinterest): ?>
								<a class="pinterest-small" target="_blank" href="http://pinterest.com/<?php echo $socialPinterest; ?>" title="Pinterest"></a>
							<?php endif; ?>									
							<?php if($socialDribble): ?>
								<a class="dribble-small" target="_blank" href="http://dribble.com/<?php echo $socialDribble; ?>" title="Dribble"></a>
							<?php endif; ?>									
							<?php if($socialBehance): ?>
								<a class="behance-small" target="_blank" href="http://www.behance.net/<?php echo $socialBehance; ?>" title="Behance"></a>
							<?php endif; ?>									
							<?php if($socialYouTube): ?>
								<a class="youtube-small" target="_blank" href="http://www.youtube.com/<?php echo $socialYouTube; ?>" title="YouTube"></a>
							<?php endif; ?>									
							<?php if($socialVimeo): ?>
								<a class="vimeo-small" target="_blank" href="http://vimeo.com/<?php echo $socialVimeo; ?>" title="Vimeo"></a>
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
							<div class="team-description"><?php echo $memberDesc; ?></div>
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
			</article>
			<div class="post-navigation">
				<div title="<?php _e('Next', 'cuckoothemes'); ?>" class="next-blog-nav"></div>
				<div title="<?php _e('Previuos', 'cuckoothemes'); ?>" class="prev-blog-nav"></div>
			</div>
			<script type="text/javascript">
				jQuery(document).ready(function($){
					$('body').cuckoobizz('blogListHomepage', { 
						main: '#team-works',
						mainUL: 'ul.team-wrapper-homepage',
						effect: '<?php echo $cuckoo_settings['TeamElementsEffects']; ?>',
						around: '1',
						hoverEffect: '<?php echo $cuckoo_style['teamThumbHover']; ?>'
					});
				});
			</script>
		</section>
	<?php endif; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>