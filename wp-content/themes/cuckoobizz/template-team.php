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
** Template Name: Team Template 
*/

$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );

$backgroundColor 		= ( !empty($cuckoo_style['background-setting-page-color']) ? $cuckoo_style['background-setting-page-color'] != '#' ? 'background-color:'.$cuckoo_style['background-setting-page-color'].';' : '' : '' );
$backgroundImage 		= ( !empty($cuckoo_style['background-page-image']) ? "background-image:url('".$cuckoo_style['background-page-image']."');" : '' );
$backgroundPosition 	= ( !empty($cuckoo_style['background-position-page']) ? 'background-position:'.$cuckoo_style['background-position-page'].';' : '' );
$backgroundAttachment 	= ( !empty($cuckoo_style['background-setting-attach-page']) ? 'background-attachment:'.$cuckoo_style['background-setting-attach-page'].';' : '' );
$backgroundRepeat	 	= ( !empty($cuckoo_style['background-setting-reapet-page']) ? 'background-repeat:'.$cuckoo_style['background-setting-reapet-page'].';': '' );
$parallaxSpeed			= ( !empty($cuckoo_style['parallax-speed-page']) ? $cuckoo_style['parallax-speed-page'] : 10 );
$paralax 				= $cuckoo_style['parallax-page'];
if( $backgroundColor && !$backgroundImage ) :
	$backgroundImage = 'background-image:none;';
endif;
if(!$backgroundImage or $backgroundImage == 'background-image:none;' ) :
	$backgroundPosition = ''; $backgroundAttachment = ''; $backgroundRepeat = '';
endif;
if($paralax == 1) :
	$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundRepeat . ' background-attachment:fixed" data-type="background" data-speed="'.$parallaxSpeed.'"';
else :
	$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundPosition . $backgroundAttachment . $backgroundRepeat . '"';
endif;


get_header();
	/* Page header Slider */
	$slider = cuckoo_get_post_meta(get_the_ID(), "-slider-meta-box");
	if(isset($slider[0])) : echo do_shortcode(cuckoo_decode($slider[0]));  endif; ?>
	<section id="main-container" data-hovereffects-img="<?php echo $cuckoo_style['teamThumbHover']; ?>" data-hovereffects-class="team_header" class="<?php if($paralax == '1') : ?>parallax-background blog-template-4<?php else : ?>blog-template-4<?php endif; ?><?php if(isset($slider[1]) == 1) : echo $classSlider = $slider[0] ? ' header-with-slider' : ' header-no-slider' ; endif; ?>" <?php echo $style; ?>>
	<?php	
		/* Team header block: Title, subtitle */
		if(isset($slider[1]) != 1) : get_template_part( 'loop/total/template-header' ); endif;
		
		if ( !post_password_required() ) : ?>
		<article id="blog-content-full-width" class="screen-large pad-null">
			<div class="item-top-line landing-page"></div>
			<?php // content Page
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					$content = get_the_content();
					if( $content != '' ) : ?>
						<section id="content-main" class="page-content-before">
							<?php the_content(); ?>
						</section>
					<?php endif; ?>
				<?php endwhile;
			endif;
		
			/* Team content block: image, content, description, name, occupation  */
			?>
			<ul class="team-content-team item-list-main screen-large-blog team-template-ul clearfix">
				<?php 
				if ( get_query_var('paged') ) {
					$paged = get_query_var('paged');
				} else if ( get_query_var('page') ) {
					$paged = get_query_var('page');
				} else {
					$paged = 1;
				}
				$team_args = array(
					'paged' 			=> $paged,
					'post_type' 		=> 'team',
					'orderby'			=> 'menu_order date'
				);
				query_posts($team_args);
								
				if(have_posts()) :
					while ( have_posts() ) : the_post(); 
						$memberDesc = cuckoo_get_post_meta(get_the_ID(), "_member-desc");
						$socialFacebook = cuckoo_get_post_meta(get_the_ID(), "_social-facebook");
						$socialTwitter = cuckoo_get_post_meta(get_the_ID(), "_social-twitter"); 
						$socialGoogle = cuckoo_get_post_meta(get_the_ID(), "_social-google"); 
						$socialFlickr = cuckoo_get_post_meta(get_the_ID(), "_social-flickr"); 
						$socialPinterest = cuckoo_get_post_meta(get_the_ID(), "_social-pinterest"); 
						$socialDribble = cuckoo_get_post_meta(get_the_ID(), "_social-dribble"); 
						$socialInstagram = cuckoo_get_post_meta(get_the_ID(), "_social-instagram");
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
						<li id="team-<?php the_ID(); ?>" <?php post_class('test-list-template cuckoo-list'); ?>>
							<?php get_template_part( "loop/team/list-header-template" ); ?>
							<div class="team-desc-bottom<?php echo $margin; ?>">
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
								<div class="team-description"><?php echo $memberDesc; ?></div>
							</div>
						</li>
					<?php endwhile; // End the loop. Whew. ?>
				<?php endif; ?>
			</ul>
			<script type="text/javascript">
				jQuery(document).ready(function($){
					$('body').cuckoobizz('blackWhiteEffectsUse', $('.team_header').find('img'), '<?php echo $cuckoo_style['teamThumbHover']; ?>');
				});
			</script>
		</article>
			<?php
			/* Load More button */
			get_template_part( 'loop/total/load-more' ); 
		
		else :
							
			/* If page have password need template */
			get_template_part( 'loop/alert/page-password' ); 
						
		endif;	
		?>
	</section>
<?php get_template_part( 'loop/total/socialmedia-landing' ); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>