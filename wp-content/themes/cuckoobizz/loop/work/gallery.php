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
** Name: Work Gallery
*/
?>
<section id="work-gallery">
	<div id="gallery-container">
		<?php 
		$slider_elements = get_option( THEMEPREFIX . "_slidershow_settings"); 
		$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
		?>
		<script type="text/javascript">
			jQuery(window).load(function() {
				jQuery('#work-slides').nivoSlider({
					effect: '<?php echo $slider_elements['settings']['nivo_effect']; ?>',
					pauseOnHover: true,
					heightAuto: false,
					animSpeed: <?php echo $slider_elements['settings']['animationspeed']; ?>,
					pauseTime: <?php echo $slider_elements['settings']['slider_timeout']; ?>,
					boxCols: <?php echo $slider_elements['settings']['box_cols']; ?>, 
					boxRows: <?php echo $slider_elements['settings']['box_rows']; ?>,
					controlNav: true,
					directionNavHide: false,
					directionNav : false,
					afterLoad: function(){
						jQuery(".slidePreloadImg").fadeOut(800);
					}
				});
				
				/* Slideshow delete first element */
				var total = jQuery('#work-slides img').length;
				if( total <= 2 ){
					jQuery('.slideshow-content').find(".nivo-controlNav").css("display", "none");
					jQuery('#work-slides').data('nivoslider').stop();
					jQuery('.slideshow-content').addClass('one-img-gallery');
				}else{
					jQuery('#main-container').addClass('gallery-format-not-one');
				}
				
				jQuery('.cuckooLightbox-works').cuckoolightbox({
					title: 'outside'
				});
			});
		</script>
		<article class="slideshow-content">
			<div id="work-slides" class="work-nivo-slideshow">
			<?php for( $i = 1; $i <= 10; $i++ ) {
					$images_text = cuckoo_get_post_meta(get_the_ID(), "_upload_text".$i);
					$images_url = cuckoo_get_post_meta(get_the_ID(), "_upload_image".$i);
					$url = ( $images_url == "Image URL" ) ? "" : $images_url;
					$text = ( $images_text == "Add Title" ) ? "" : $images_text;
					if( $url != null ) : ?>
						<a class="cuckooLightbox-works" data-cuckoolightbox-class="cuckooLightbox-works" href="<?php echo cuckoo_get_attachment_all_size($url); ?>" title="<?php echo $text; ?>">
							<img alt="<?php echo $text; ?>" title="<?php echo $text; ?>" src="<?php echo cuckoo_get_attachment_all_size($url , 'work-gallery'); ?>">
						</a>
					<?php endif;	
				}
			?>
			</div>
			<div class="slidePreloadImg">
				<div class="img-loader"></div>
			</div>
		</article>
	</div>
</section>