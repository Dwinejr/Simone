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
** Template Name: Related works
*/
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
if( $cuckoo_settings['related_works'] == "display" ) :
	$id = get_the_ID();
	$work_cat = wp_get_object_terms( $id, "types");
	$types = array();
		foreach( $work_cat as $c ) :
			$types[] = $c->slug;
		endforeach;
		$type_to_show = implode(',', $types);
		$args =  array(
		'types' 			=> $type_to_show,
		'post__not_in'		=> array($id),
		'orderby' 			=> 'rand',
		'showposts' 		=> 4,
		'post_type' 		=> 'works'
		);
		$my_query = new wp_query($args);
		if($my_query->have_posts()):
		?>
		<section id="related-works" class="related-works-wrap clearfix<?php if($cuckoo_style['parallax-related-works'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_style['parallax-related-works'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_style['parallax-speed-related-works']; ?>"<?php endif; ?>>
			<?php if($cuckoo_settings['related_work_title']) : ?>
				<h2 class="screen-large related"><?php cuckoo_echo_for_wpml(THEMENAME.' Related Works Unit', 'Title', $cuckoo_settings['related_work_title']); ?></h2>
			<?php endif; ?>
			<article class="related-content screen-large" <?php if(!$cuckoo_settings['related_work_title']) : ?> style="padding-top:70px; margin-top:0" <?php endif; ?>>
				<?php 			
				if ( $my_query->have_posts() ):
				while ( $my_query->have_posts() ) : $my_query->the_post();
					$work_id = get_the_ID();
					$post_categories = wp_get_object_terms( $work_id, "types" );
					$video = cuckoo_get_post_meta(get_the_ID(), "_work_video");
					$gallerythumb = "";
					for( $i = 1; $i <= 10; $i++ )
					{
						$images_url_get = cuckoo_get_post_meta(get_the_ID(), "_upload_image".$i);
						$url = ( $images_url_get == "Image URL" ) ? "" : $images_url_get;
						if( $url ) {
							$gallerythumb .= 1;
						}		
					} ?>
					<a class="work-item-240" href="<?php echo get_permalink(); ?>" title="<?php echo cuckoo_max_trim(the_title('', '', false), 70); ?>">
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
				<?php endwhile; ?>
				<?php endif; ?>
				<div class="clear"></div>
			</article>
			<script type="text/javascript">
				jQuery(document).ready(function($){
					var a = $('#related-works').find('img');
					$('#related-works a.work-item-240 div.work-info').each( function() { $(this).hoverdir(); } );
					$('body').cuckoobizz('blackWhiteEffectsUse', a, '<?php echo $cuckoo_style['worksThumbHover']; ?>');
				});
			</script>
		</section>
	<?php endif; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>