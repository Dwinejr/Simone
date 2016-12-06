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
** Name: Archives
*/
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
$blog = $sidebar['blog_sidebar'] == 'No Sidebar' ? 0 : 1;
$class = $sidebar['blog_sidebar'] == 'No Sidebar' ? 'blog-no-aside' : 'blog-with-aside';

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

get_header(); ?>
<section id="main-container" data-hovereffects-img="<?php echo $cuckoo_style['testimonialsThumbHover']; ?>" data-hovereffects-class="test_thumbnail" class="<?php if($paralax == '1') : ?>parallax-background blog-template-4<?php else : ?>blog-template-4<?php endif; ?>" <?php echo $style; ?>>
	<header id="item-header" class="single-post-header">
		<div id="header-position-page" class="screen-large">
			<h1>
				<?php if(is_tax( 'types' )):
					_e('Works Archive', 'cuckoothemes'); 
				else :
					_e('Blog Post Archives', 'cuckoothemes'); 
				endif; ?>
			</h1>
			<div class="item-info-block">
				<h3>
					<?php if ( is_day() ) : ?>
						<?php printf( __( 'Daily Archives: %s', 'cuckoothemes' ), get_the_date() ); ?>
					<?php elseif ( is_month() ) : ?>
						<?php printf( __( 'Monthly Archives: %s', 'cuckoothemes' ), get_the_date('F Y') ); ?>
					<?php elseif ( is_year() ) : ?>
						<?php printf( __( 'Yearly Archives: %s', 'cuckoothemes' ), get_the_date('Y') ); ?>
					<?php elseif ( is_tax( 'types' ) ) : ?>
						<?php printf( __( 'Archives of &ldquo;%s&rdquo; Type', 'cuckoothemes' ), '' . single_cat_title( '', false ). '' ); ?>
					<?php endif; ?>
				</h3>
			</div>
		</div>
	</header>
	
	<?php rewind_posts(); ?>
	<?php if(is_tax( 'types' )) : ?>
		<article id="archive-list-item" class="<?php if(is_tax('types')) : ?>work-content screen-large<?php else: ?>item-list-main blog-content-blog screen-large-blog<?php endif; ?>">
		
			<div id="main-container-portfolio-landing" class="clerfix-isotope screen-large-portfolio">
			<div class="item-top-line landing-page"></div>
			<?php 
				$cat = get_term_by('name', single_cat_title('',false), 'types'); 
				$args_works =  array(
					'types' 			=> $cat->slug,
					'posts_per_page' 	=> '-1',
					'post_type' 		=> 'works'
				);
			query_posts($args_works); ?>
		
			<?php if(have_posts()) :
				while ( have_posts() ) : the_post();
					$work_id = get_the_ID();
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($work_id), 'full' );
					$urlThumb = $thumb['0'];
					$post_categories = wp_get_object_terms( $work_id, "types" );
					$cats ="element ";
					foreach($post_categories as $cat) {
						$cats .= $cat->slug.' ';
					} ?>
					<a class="<?php echo $cats; ?> work-item-240" href="<?php echo get_permalink(); ?>" title="<?php echo cuckoo_max_trim(the_title('', '', false), 70); ?>">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( '240-size', array( 'title' => '', 'class' => 'item-group-0' ) ); ?>
						<?php else : ?>
							<div class="no-thumbnail-225"></div>
						<?php endif; ?>
						<div class="work-info">
							<div class="work-contur">
								<span class="single-container">
									<span class="cells">
									<h4 class="work-thumb-title"><?php echo cuckoo_max_trim(the_title('', '', false), 70);  ?></h4>
									<?php $categories = wp_get_object_terms( $work_id, "types" );
										$ca ="";
										foreach($categories as $c) {
										$ca .= '<span class="work-type">'. $c->name .'</span>';
										}
										echo $ca;
									?>
									</span>
									<span class="item-background"></span>
								</span>
							</div>
						</div>
						<div class="border-img"></div>
					</a>
			<?php endwhile; // End the loop. Whew. ?>
			</div>
			<script type="text/javascript">
				jQuery(document).ready(function($){
					// hover 
					$('#archive-list-item a.element div.work-info').each( function() { $(this).hoverdir(); } );
				
					var a = $('#archive-list-item').find('img');
					$('body').cuckoobizz('blackWhiteEffectsUse', a, '<?php echo $cuckoo_style['worksThumbHover']; ?>');
				});
			</script>
			<?php endif; ?>
		</article>
	<?php else : ?>
		<section id="post-content" class="padding-bottom-20 screen-large">
			<div class="item-top-line landing-page"></div>
			<article id="blog-content-full-width" class="<?php echo $class; ?>" role="main">
				<ul id="category-list-item" class="blog-list-option blog-full-width">
					<?php if(have_posts()) :
						while ( have_posts() ) : the_post(); ?>
							<li id="post-<?php the_ID(); ?>" <?php post_class('blog-li-option list-full-width'); ?>>
								<?php get_template_part( "loop/post/header-list-option" ); ?>
								<div class="excerpt-post-li-option-225<?php if ( !has_post_thumbnail() ) : ?> no-thumb-post<?php endif; ?>">
									<?php the_excerpt(); ?>
									<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', 'cuckoothemes' ); ?></a></div>
								</div>
							</li>
						<?php endwhile; // End the loop. Whew. ?>
					<?php endif; ?>
				</ul>
				<script type="text/javascript">
					jQuery(document).ready(function($){
						$('body').cuckoobizz('blackWhiteEffectsUse', $('.thumb-post-list-225').find('img'), '<?php echo $cuckoo_style['postsThumbHover']; ?>');
					});
				</script>
			</article>
			<?php if($blog == 1) : ?>
				<?php get_sidebar('search'); ?>
			<?php endif; ?>
			<div class="clear"></div>
		</section>
		<?php get_template_part( 'loop/total/load-more' ); ?>
	<?php endif; ?>
</section>
<?php rewind_posts(); ?>
<?php get_template_part( 'loop/total/socialmedia-landing' ); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>