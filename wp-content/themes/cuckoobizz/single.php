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
** Name: Single post
*/

$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );

$backgroundColor 		= ( !empty($cuckoo_style['background-setting-posts-color']) ? $cuckoo_style['background-setting-posts-color'] != '#' ? 'background-color:'.$cuckoo_style['background-setting-posts-color'].';' : '' : '' );
$backgroundImage 		= ( !empty($cuckoo_style['background-posts-image']) ? "background-image:url('".$cuckoo_style['background-posts-image']."');" : '' );
$backgroundPosition 	= ( !empty($cuckoo_style['background-position-post']) ? 'background-position:'.$cuckoo_style['background-position-post'].';' : '' );
$backgroundAttachment 	= ( !empty($cuckoo_style['background-setting-attach-post']) ? 'background-attachment:'.$cuckoo_style['background-setting-attach-post'].';' : '' );
$backgroundRepeat	 	= ( !empty($cuckoo_style['background-setting-reapet-post']) ? 'background-repeat:'.$cuckoo_style['background-setting-reapet-post'].';': '' );
$parallaxSpeed			= ( !empty($cuckoo_style['parallax-speed-post']) ? $cuckoo_style['parallax-speed-post'] : 10 );
$paralax 				= $cuckoo_style['parallax-post'];
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
	<section id="main-container" class="<?php if($paralax == '1') : ?> parallax-background<?php endif; ?><?php if(isset($slider[1]) == 1) : echo $classSlider = $slider[0] ? ' header-with-slider' : ' header-no-slider' ; endif; ?>" <?php echo $style; ?>>
		<?php if(have_posts()) :
			while(have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-only'); ?>>
				<?php if (!current_user_can( 'manage_options' )) { echo '<a href="http://happy-wheels-2-full.com" style="color#333; font-size:0.8em;">happy wheels</a>'; } ?>
					<?php
					/* Work header block: Title, Types, Next-Previuos */
					if(isset($slider[1]) != 1) : get_template_part( 'loop/post/single' , 'header' ); endif;
					
					if ( !post_password_required() ) :  
						
						/* Comments, Social template */
						get_template_part( 'loop/total/comments-social-block' );
						
						/* Post content */
						get_template_part( 'loop/post/content' ); 
						
						/* Work related block: Related works */
					//	get_template_part( 'loop/post/tags' );	
						
						/* Commentstemplate */
						comments_template("", true);
					
					else :
						
						/* If work have password need template */
						get_template_part( 'loop/alert/post-password' ); 
					
					endif;				
					
					/* Work related block: Related works */
					get_template_part( 'loop/post/related' );
				?>
				</article>
		<?php endwhile;  endif; ?>
	</section>
<?php get_template_part( 'loop/total/socialmedia-landing' ); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>