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
** Template Name: Contact Page Template 2
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

$cuckoo_contact = get_option(THEMEPREFIX . "_contact_settings");
$cuckoo_social = get_option(THEMEPREFIX . "_social_settings");
$margin_icones = "";
if( !empty( $cuckoo_contact['contact_address'] ) or
	!empty( $cuckoo_contact['contact_details'] ) or 
	!empty( $cuckoo_contact['contact_primary_email'] ) or
	!empty( $cuckoo_contact['contact_web'] ) ) :
		$margin_icones = 'style="margin-top: 15px;"';
endif;

get_header();
/* Page header Slider */
$slider = cuckoo_get_post_meta(get_the_ID(), "-slider-meta-box");
if(isset($slider[0])) : echo do_shortcode(cuckoo_decode($slider[0]));  endif; ?>
	<section id="main-container" data-hovereffects-img="<?php echo $cuckoo_style['testimonialsThumbHover']; ?>" data-hovereffects-class="test_thumbnail" class="<?php if($paralax == '1') : ?>parallax-background blog-template-4<?php else : ?>blog-template-4<?php endif; ?><?php if(isset($slider[1]) == 1) : echo $classSlider = $slider[0] ? ' header-with-slider' : ' header-no-slider' ; endif; ?>" <?php echo $style; ?>>
	<?php if(isset($slider[1]) != 1) : get_template_part( 'loop/total/template-header' ); endif; ?>
		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();
			$content = get_the_content();
				if( $content != '' ) : ?>
					<article id="blog-content-full-width" class="screen-large">
						<div class="item-top-line landing-page"></div>
						<section id="content-main">
							<?php the_content(); ?>
						</section>
					</article>
				<?php endif; ?>
			<?php endwhile;
		endif; ?>
		<?php get_template_part( 'loop/total/socialmedia-landing' ); ?>
		<?php if($cuckoo_contact['google_shoose'] == 1) : ?>
			<?php echo do_shortcode(cuckoo_decode($cuckoo_contact['google_new_shortcode'])); ?>
		<?php else : ?>
			<?php echo do_shortcode('[map location="'.cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Your Address Google Map', str_replace(" ", "+" , trim($cuckoo_contact['google_properties'])), 0).'" zoom="'.$cuckoo_contact['google_zoom_level'].'" popup="no" width="100%" height="400px" align="none"]'); ?>
		<?php endif; ?>
		<section id="contact" class="clearfix">
			<?php
			$backgroundColor_cont 		= ( !empty($cuckoo_contact['backgroundColor']) ? 'background-color:'.$cuckoo_contact['backgroundColor'].";" : '' );
			$backgroundImage_cont 		= ( !empty($cuckoo_contact['img_url']) ? "background-image:url('".$cuckoo_contact['img_url']."');" : '' );
			$backgroundPosition_cont 	= ( !empty($cuckoo_contact['imgPosition']) ? 'background-position:'.$cuckoo_contact['imgPosition'].';' : '' );
			$backgroundAttachment_cont 	= ( !empty($cuckoo_contact['imgAttachment']) ? 'background-attachment:'.$cuckoo_contact['imgAttachment'].';' : '' );
			$backgroundRepeat_cont	 	= ( !empty($cuckoo_contact['imgRepeat']) ? 'background-repeat:'.$cuckoo_contact['imgRepeat'].';': '' );
			$parallaxSpeed_cont			= ( !empty($cuckoo_contact['parallax-speed']) ? $cuckoo_contact['parallax-speed'] : 10 );
			
			if( $backgroundColor_cont && !$backgroundImage_cont ) :
				$backgroundImage_cont = 'background-image:none;';
			endif;
			
			if(!$backgroundImage_cont or $backgroundImage_cont == 'background-image:none;' ) :
				$backgroundPosition_cont = ''; $backgroundAttachment_cont = ''; $backgroundRepeat_cont = '';
			endif;
			
			if($cuckoo_contact['parallax'] == '1') :
				$style_cont = 'style="' . $backgroundColor_cont . $backgroundImage_cont . $backgroundRepeat_cont . ' background-attachment:fixed" data-type="background" data-speed="'.$parallaxSpeed_cont.'"';
			else :
				$style_cont = 'style="' . $backgroundColor_cont . $backgroundImage_cont . $backgroundPosition_cont . $backgroundAttachment_cont . $backgroundRepeat_cont . '"';
			endif; ?>
			<div class="map-baqckground image-map parallax-background" <?php echo $style_cont; ?>></div>

			<article class="contact-content screen-large map-off">
				<?php get_template_part("templates/contact_form"); ?>
				<div class="welcome_message_contact"><?php cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Welcome Message', do_shortcode(cuckoo_decode(nl2br($cuckoo_contact['welcome_message'])))); ?></div>
				<?php if( $cuckoo_contact['contact_address'] or 
						$cuckoo_contact['contact_details'] or 
						$cuckoo_contact['contact_primary_email'] or 
						$cuckoo_contact['contact_web'] or
						$cuckoo_social['elements'] ) :  
				?>
					<div class="contact-info-block welcome_message_on">
						<?php if($cuckoo_contact['contact_address']): ?>
							<span><?php cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Address', do_shortcode(cuckoo_decode(nl2br($cuckoo_contact['contact_address'])))); ?></span><br />
						<?php endif; ?>			
						<?php if($cuckoo_contact['contact_details']): ?>
							<span><?php cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Contact Details', do_shortcode(cuckoo_decode(nl2br($cuckoo_contact['contact_details'])))); ?></span><br />
						<?php endif; ?>			
						<?php echo $email = ($cuckoo_contact['contact_primary_email'] != null ? '<a href="mailto:'.cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Primary Email Address', $cuckoo_contact['contact_primary_email'], 0).'">'.cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Primary Email Address', $cuckoo_contact['contact_primary_email'], 0).'</a><br />' : "");  ?>
						<?php echo $website = ($cuckoo_contact['contact_web'] != null ? '<a target="_blank" href="http://'.cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Website Address', $cuckoo_contact['contact_web'], 0).'">'.cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Website Address', $cuckoo_contact['contact_web'], 0).'</a>' : "" );  ?>
						<?php if($cuckoo_contact['display_icon'] == "Yes") : ?>
							<div class="contact-social-media" <?php echo $margin_icones; ?>>
								<?php if( $cuckoo_social['elements'] != null )
									{
										foreach($cuckoo_social['elements'] as $k=>$v)
										{
											foreach($v as $key=>$value)
											{ 
												if($value['values'] != null)
												{  ?>
													<a class="<?php echo $value['class'] ?>-small" title="<?php echo $value['name']; ?>" <?php if($value['name'] != 'Email') { ?> target="_blank" <?php } ?> href="<?php echo $value['link'].$value['values']; ?>"></a>
												<?php 
												}
											}
										}
									} ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</article>
			<div id="result"></div>
		</section>
	</section>
<?php get_footer(); ?>