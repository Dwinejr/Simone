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
** Name : team single
*/
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );

$backgroundColor 		= ( !empty($cuckoo_style['background-setting-team-color']) ? $cuckoo_style['background-setting-team-color'] != '#' ? 'background-color:'.$cuckoo_style['background-setting-team-color'].';' : '' : '' );
$backgroundImage 		= ( !empty($cuckoo_style['background-team-image']) ? "background-image:url('".$cuckoo_style['background-team-image']."');" : '' );
$backgroundPosition 	= ( !empty($cuckoo_style['background-position-team']) ? 'background-position:'.$cuckoo_style['background-position-team'].';' : '' );
$backgroundAttachment 	= ( !empty($cuckoo_style['background-setting-attach-team']) ? 'background-attachment:'.$cuckoo_style['background-setting-attach-team'].';' : '' );
$backgroundRepeat	 	= ( !empty($cuckoo_style['background-setting-reapet-team']) ? 'background-repeat:'.$cuckoo_style['background-setting-reapet-team'].';': '' );
$parallaxSpeed			= ( !empty($cuckoo_style['parallax-speed-team']) ? $cuckoo_style['parallax-speed-team'] : 10 );
$paralax 				= $cuckoo_style['parallax-team'];
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
<section id="main-container" class="<?php if($paralax == '1') : ?> parallax-background<?php endif; ?><?php if(isset($slider[1]) == 1) : echo $classSlider = $slider[1] != 1 ? ' header-with-slider' : ' header-no-slider' ; endif; ?>" <?php echo $style; ?>>

		<?php if(have_posts()) :
			while(have_posts()) : the_post(); 
				
				/* Testimonial header block: Title, subtitle */
				if(isset($slider[1]) != 1) : get_template_part( 'loop/team/single-header' ); endif;
				
				/* Testimonial content block: image, content, company */
				get_template_part( 'loop/team/content' ); 
				
				/* Comment template */
				comments_template("", true);
				
				/* Team related block */
				get_template_part( 'loop/team/related' );
			endwhile; 
		endif; ?>
	</section>
<?php get_template_part( 'loop/total/socialmedia-landing' ); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>