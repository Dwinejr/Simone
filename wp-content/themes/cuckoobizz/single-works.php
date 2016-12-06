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
** Name: Single Work
*/

$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );

$backgroundColor 		= ( !empty($cuckoo_style['background-setting-work-color']) ? $cuckoo_style['background-setting-work-color'] != '#' ? 'background-color:'.$cuckoo_style['background-setting-work-color'].';' : '' : '' );
$backgroundImage 		= ( !empty($cuckoo_style['background-work-image']) ? "background-image:url('".$cuckoo_style['background-work-image']."');" : '' );
$backgroundPosition 	= ( !empty($cuckoo_style['background-position-work']) ? 'background-position:'.$cuckoo_style['background-position-work'].';' : '' );
$backgroundAttachment 	= ( !empty($cuckoo_style['background-setting-attach-work']) ? 'background-attachment:'.$cuckoo_style['background-setting-attach-work'].';' : '' );
$backgroundRepeat	 	= ( !empty($cuckoo_style['background-setting-reapet-work']) ? 'background-repeat:'.$cuckoo_style['background-setting-reapet-work'].';': '' );
$parallaxSpeed			= ( !empty($cuckoo_style['parallax-speed-work']) ? $cuckoo_style['parallax-speed-work'] : 10 );
$paralax 				= $cuckoo_style['parallax-work'];
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

$getURL = "";
$doubleclass = "";
$video = cuckoo_get_post_meta(get_the_ID(), "_work_video");

for( $i = 1; $i <= 10; $i++ )
{
	$images_url = cuckoo_get_post_meta(get_the_ID(), "_upload_image".$i);
	$url = ( $images_url == "Image URL" ) ? "" : $images_url;
	if( $url != null ) : 
		$getURL .= $url;
	endif;	
}

if(empty($getURL) && empty($video)) :
	$doubleclass = " single-works-header";
endif;

get_header();
/* Page header Slider */
$slider = cuckoo_get_post_meta(get_the_ID(), "-slider-meta-box");
if(isset($slider[0])) : echo do_shortcode(cuckoo_decode($slider[0]));  endif; ?>
	<section id="main-container" class="<?php if($paralax == '1') : ?> parallax-background<?php endif; ?><?php if(isset($slider[1]) == 1) : echo $classSlider = $slider[0] ? ' in_single_works header-with-slider'.$doubleclass : ' header-no-slider'.$doubleclass ; endif; ?>" <?php echo $style; ?>>
		<?php if(have_posts()) :
			while(have_posts()) : the_post(); 
				
				/* Work header block: Title, Types, Next-Previuos */
				if(isset($slider[1]) != 1) : get_template_part( 'loop/work/single' , 'header' ); endif;  
				
				if ( !post_password_required() ) : 
				
					/* Work gallery block: Nivo slideshow or video */
					get_template_part( 'loop/work/image', 'position' ); 
					
					/* Work content */
					get_template_part( 'loop/work/content' ); 
					
					comments_template("", true);
				
				else :
					
					/* If work have password need template */
					get_template_part( 'loop/alert/work-password' ); 
				
				endif;
			
				/* Work related block: Related works */
				get_template_part( 'loop/work/related' );
				
			endwhile; 
		endif; ?>
	</section>
<?php get_template_part( 'loop/total/socialmedia-landing' ); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>