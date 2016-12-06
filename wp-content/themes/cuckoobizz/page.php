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
** Name: Page
*/
$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
$other_sidebar = $sidebar['other_sidebar'] == 'No Sidebar' ? 0 : 1;
$class = $sidebar['other_sidebar'] == 'No Sidebar' ? 'single-post-no-aside' : 'single-post';
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

$slider = cuckoo_get_post_meta(get_the_ID(), "-slider-meta-box");

get_header(); 
/* Page header Slider */
if(isset($slider[0])) : echo do_shortcode(cuckoo_decode($slider[0]));  endif; ?>
<section id="main-container" class="<?php if($paralax == '1') : ?>parallax-background <?php endif; ?><?php echo $classSlider = $slider[0] ? 'header-with-slider' : 'header-no-slider' ; ?>" <?php echo $style; ?>>
	<?php /* Page header block: Title, subtitle */
	if(isset($slider[1]) != 1) :
		get_template_part( 'loop/total/template-header' );
	endif;
		
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); 
			
		if ( !post_password_required() ) : 
			
			/* Content */ ?>
			<section id="post-content" class="screen-large">
				<article id="content-main" class="<?php echo $class; ?>" role="main">
					<?php the_content(); ?>
				</article>
				<?php if($other_sidebar == 1) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>
				<div class="clear"></div>
			</section>
			<?php
			/* Comment template */
			comments_template("", true);
		
		else :
							
			/* If page have password need template */
			get_template_part( 'loop/alert/page-password' ); 
						
		endif;	
		
		endwhile;
	endif; ?>
</section>
<?php 
get_template_part( 'loop/total/socialmedia-landing' ); 
get_map_landing();
get_footer(); 

?>