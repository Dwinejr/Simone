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
** Name : Fullwidth Slider
*/
$slider_elements = get_option( THEMEPREFIX . "_slidershow_settings");

$slides = '';

foreach( $slider_elements['elements'] as $keys ){
	foreach( $keys as $key=>$slider ){
		if($slider['img'] != null ){
			$img = cuckoo_get_attachment_all_size( $slider['img'] , 'full');
			$align = $slider['title_aling'] ? $slider['title_aling'] : '';
			$color = $slider['font_color']  ? $slider['font_color'] != '#' ? 'style="color:'.$slider['font_color'].';"' : '' : '';
			$title = $slider['slide_title'] ? '<h2 class="slide-title '.$align.'" '.$color.'>'.cuckoo_echo_for_wpml(THEMENAME.' Homepage Slides #'.$key, 'Slide Title', preg_replace('/(\r\n|\n|\r)/','<br/>', $slider['slide_title']), 0).'</h2>' : '';
			$subtitle = $slider['slide_subtitle'] ?  '<div class="slide-subtitle '.$align.'" '.$color.'>'.cuckoo_echo_for_wpml(THEMENAME.' Homepage Slides #'.$key, 'Slide Subtitle', preg_replace('/(\r\n|\n|\r)/','<br/>', $slider['slide_subtitle']), 0).'</div>' : '';
			$button = $slider['url_button_slides'] ? '<div class="but"><a href="'.$slider['url_button_slides'].'" title="'.cuckoo_echo_for_wpml(THEMENAME.' Homepage Slides #'.$key, 'Slide Button Title', $slider['title_button_slides'], 0).'" class="slide-button '.$align.'">'.cuckoo_echo_for_wpml(THEMENAME.' Homepage Slides #'.$key, 'Slide Button Title', $slider['title_button_slides'],0).'</a></div>' : '';
			
			$slides .= "{ image : '".$img."', title : '". $title . $subtitle . $button ."' }," ;
		}
	}
}
?>
	<section id="fullscreen-homepage" class="entry">
		<style>
			html, body { height:100%; }
		</style>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				var heightAdminBar =  document.getElementById('wpadminbar') ? 28 : 0;
				
				$(".super-homepage").supersized({
					slide_interval          :   <?php echo $slider_elements['settings']['FullScreen_slide_interval']; ?>,		// Length between transitions
					transition              :   <?php echo $slider_elements['settings']['effects_FullScreen']; ?>, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	<?php echo $slider_elements['settings']['FullScreen_transition_speed']; ?>,		// Speed of transition
					slides 					:  	[<?php echo $slides; ?>],	   
					progress_bar			:	<?php echo $slider_elements['settings']['FullScreen_progress_bar']; ?>,			// Timer for each slide	
				});
				
				$(window).resize(function(){
					var widthMain = $("body").find('#footer-container').width();
					var heightTop = widthMain < 481 ? $('#header_wrapper').height() : 0;
					$(".super-homepage").height($(window).height() - heightAdminBar - heightTop );
				});
			});
		</script>
		<div id="supersized-container" class="super-homepage">
		
			<!--Arrow Navigation-->
			<a id="prevslide" class="load-item"></a>
			<a id="nextslide" class="load-item"></a>
			
			<?php if($slider_elements['settings']['FullScreen_progress_bar'] == 1){ ?>
			<!--Time Bar-->
			<div id="progress-back" class="load-item">
				<div id="progress-bar"></div>
			</div>
			<?php } ?>
			
			<!--Slide captions displayed here-->
			<div class="container message screen-large">
				<div id="slidecaption"></div>
			</div>
			
			<div id="supersized-loader" class="slidePreloadImg">
				<div class="img-loader"></div>
			</div>
				<!--Control Bar-->
			<div id="controls-wrapper" class="load-item">
				<div id="controls">

				</div>
			</div>
			
			
		</div>
		
	</section>