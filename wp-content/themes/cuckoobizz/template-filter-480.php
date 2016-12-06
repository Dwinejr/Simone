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
** Template Name: Portfolio 2 Columns
*/

$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
$cuckoo_gallery = get_option( THEMEPREFIX . "_gallery_settings" );

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
$slider = cuckoo_get_post_meta(get_the_ID(), "-slider-meta-box");
if(isset($slider[0])) : echo do_shortcode(cuckoo_decode($slider[0]));  endif; ?>
<section id="main-container" class="<?php if($paralax == '1') : ?>parallax-background blog-template-4<?php else : ?>blog-template-4<?php endif; ?><?php if(isset($slider[1]) == 1) : echo $classSlider = $slider[0] ? ' header-with-slider' : ' header-no-slider' ; endif; ?>" <?php echo $style; ?>>
	<?php
		/* Porfolio header block: Title */
		if(isset($slider[1]) != 1) : get_template_part( 'loop/total/template-header' ); endif;
		
		if ( !post_password_required() ) : ?>
		
		
					<article class="work-content screen-large">
						<?php 
						$multiple_settings_meta = cuckoo_get_post_meta(get_the_ID(), "-multiple-settings");
						$default_types = get_terms('types');
						$default = array();
						foreach($default_types as $type):
							$default[] = $type->slug;
						endforeach;
						$multiple_settings = !empty($multiple_settings_meta) ? $multiple_settings_meta : array( 'use' => 0,'show' => 1, 'types' => $default , 'types-all' => 0 ) ;
						$multipleTypes = implode(",", $multiple_settings['types']);
						$types = $multiple_settings['use'] == 1 ? $multipleTypes : cuckoo_list_taxha( 'types',  $cuckoo_gallery['exclude_portfilio'] ) ;
						
						$args_works =  array(
						'types' 			=> $types,
						'orderby' 			=> $cuckoo_gallery['portfolio_sort'],
						'posts_per_page' 	=> '-1',
						'post_type' 		=> 'works'
						);
						query_posts($args_works);
						
						if ( have_posts() ):
							if ( $multiple_settings['show'] == 1): ?>
						<div class="works-top-line landing-page"></div>
						<ul id="main-container-filters" data-option-key="filter" class="item-info-list landing-works-galery">
							<?php
							$terms = get_terms("types" , array( 'exclude' => $cuckoo_gallery['exclude_portfilio']));
							$count = count($terms);
							$names = "";
							$slug = "";
							$alone = "";
							if($cuckoo_gallery['portfolio'] != 0) :
								$alone = get_term( $cuckoo_gallery['portfolio'], 'types' );
							endif;
							if ( $count > 0 ) : 
								if( $multiple_settings['use'] == 1 ) : 
									$multiple_settings_count = count($multiple_settings['types']);
									if($multiple_settings_count > 1) : ?>
										<li><a title="<?php _e('Show All', 'cuckoothemes'); ?>" class="type-list <?php echo ( $cuckoo_gallery['portfolio'] == 0 ) ?  "selected" :  "";  ?>" href="#" data-filter="*"><?php _e('Show All', 'cuckoothemes'); ?></a></li>
									<?php endif; ?>
								<?php else : ?>
									<li><a title="<?php _e('Show All', 'cuckoothemes'); ?>" class="type-list <?php echo ( $cuckoo_gallery['portfolio'] == 0 ) ?  "selected" :  "";  ?>" href="#" data-filter="*"><?php _e('Show All', 'cuckoothemes'); ?></a></li>
								<?php endif; ?>
								<?php
								if ( have_posts() ):
									while ( have_posts() ) : the_post();
										$wo_id = get_the_ID();
										$work_cat = wp_get_object_terms( $wo_id, "types" );
											foreach($work_cat as $cat) :
											$names .= $cat->name.",";
											$slug .=  $cat->slug.",";
											endforeach;
									endwhile;
									$slug_array = array_unique(explode(",",$slug));
									$names_array = array_unique(explode(",",$names));
									if( $multiple_settings['use'] == 1 ) : 
										foreach( $multiple_settings['types'] as $k=>$v ) : 
											if( $v != null ) : 
												$name = get_term_by('slug', $v, 'types');
												if($multiple_settings_count > 1) : ?>
													<li><a title="<?php echo $name->name; ?>" class="type-list" href="#" data-filter=".<?php echo $v; ?>"><?php echo $name->name; ?></a></li>
												<?php else : ?>
													<li class="type-list"><?php echo $name->name; ?></li>
												<?php endif;
											endif;
										endforeach;
									else :
										foreach( $names_array as $k=>$v ) : 
											if( $v != null ) : 
											?>
											<li><a title="<?php echo $v; ?>" class="type-list <?php echo  ($alone != null) ? $alone->name == $v  ? "selected" : "" : ""; ?>" href="#" data-filter=".<?php echo $slug_array[$k]; ?>"><?php echo $v; ?></a></li>
											<?php 
											endif;
										endforeach;
									endif;
								endif; ?>
							</ul>
							<?php else : ?>
								<div class="multiple-no-filter"></div>
							<?php endif; ?>
						<?php endif; ?>
						<div id="main-container-portfolio-landing" class="clerfix-isotope screen-large">
						<?php while ( have_posts() ) : the_post();
							$work_id = get_the_ID();
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($work_id), 'full' );
							$urlThumb = $thumb['0'];
							$post_categories = wp_get_object_terms( $work_id, "types" );
							$cats ="element ";
							foreach($post_categories as $cat) {
								$cats .= $cat->slug.' ';
							} ?>
									<a class="<?php echo $cats; ?> work-item-480" href="<?php echo get_permalink(); ?>" title="<?php echo cuckoo_max_trim(the_title('', '', false), 70); ?>">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail( '480-size', array( 'title' => '', 'class' => 'item-group-0' ) ); ?>
										<?php else : ?>
											<div class="no-thumbnail-470"></div>
										<?php endif; ?>
										<div class="work-info">
											<div class="work-contur">
												<div class="single-container">
													<div class="cells">
													<h4 class="work-thumb-title"><?php echo cuckoo_max_trim(the_title('', '', false), 70);  ?></h4>
													<?php $categories = wp_get_object_terms( $work_id, "types" );
														$ca ="";
														foreach($categories as $c) {
														$ca .= '<span class="work-type">'. $c->name .'</span>';
														}
														echo $ca;
													?>
													</div>
													<span class="item-background"></span>
												</div>
											</div>
										</div>
										<div class="border-img"></div>
									</a>
						<?php endwhile; ?>
						<?php else: ?>
							<?php get_template_part("loop/alert/no-works"); ?>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
						</div>
					</article>
					<script type="text/javascript">
						jQuery(document).ready(function($){
							
							if(document.getElementById('main-container-filters')){
								var starter = $("#main-container-filters a.selected").attr('data-filter');
								var $container = $('#main-container-portfolio-landing');
								$container.isotope({ filter: starter });
							}
							
							$('#main-container-filters a').click(function(){
							var selector = $(this).attr('data-filter');
								if ( !$(this).hasClass('selected') ) {
									$(this).parents('#main-container-filters').find('.selected').removeClass('selected');
									$(this).addClass('selected');
								}
								$container.isotope({
									filter: selector			
										});	
								return false;
							});
							
							// hover 
							$('#main-container-portfolio-landing a.element div.work-info').each( function() { $(this).hoverdir(); } );
							
							var a = $('#main-container').find('img');
							$('body').cuckoobizz('blackWhiteEffectsUse', a, '<?php echo $cuckoo_style['worksThumbHover']; ?>');
						
						});
					</script>
		<?php else :
									
			/* If page have password need template */
			get_template_part( 'loop/alert/page-password' ); 
								
		endif;	?>
</section>
<?php get_template_part( 'loop/total/socialmedia-landing' ); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>