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
** Name : Video widgets
*/
class video_widgets extends WP_Widget {
    function video_widgets() {
        parent::WP_Widget(false, $name = 'Cuckoo | Video', array("description" =>  'Cuckoo Video widget dispalys any Youtube or Vimeo video. All you have to do is to add video URL.') );	
    }

	/** @see WP_Widget::widget */
    function widget($args, $instance) {	
        extract( $args );
		$title = $instance["title"];
		$video = $instance["url"];
		$text = $instance["text"];
			
	
       ?>
		<?php echo $before_widget; ?>
		<?php
		if($title != null){
			echo $before_title;
			echo $title; 
			echo $after_title;
		}
		if( $video ) :
			?>
			<?php if ( is_youtube( $video ) ) : ?>
				<div class="youtube_video_widgest">
					<?php echo do_shortcode('[video_techical id="' . $video . '" width="100%" height="250px"]'); ?>
				</div>
				<?php endif; ?>
				<?php if ( is_vimeo( $video ) ) : ?>
				<div class="vimeo_video_widgest">
					<?php echo do_shortcode('[video_techical class="content_images_shadow_small_medium" id="' . $video . '" width="100%" height="250px"]'); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php if( $text ) : ?>
			<p style="padding-top:20px;"><?php echo nl2br($text); ?></p>
		<?php endif; ?>
		<?php echo $after_widget; ?>
        <?php
    }
	
	    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }
	
	    /** @see WP_Widget::form */
    function form($instance) {				
        $title = isset($instance["title"]) ? esc_attr($instance["title"]) : "";
        $url = isset($instance["url"]) ? esc_attr($instance["url"]) : "";
        $text = isset($instance["text"]) ? esc_attr($instance["text"]) : "";
		
        ?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', THEMENAME); ?> :<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Video URL', THEMENAME); ?> :<input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', THEMENAME); ?> :<textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea></label></p>
			
		<?php 
    }

}

// register Cuckoo widget
add_action('widgets_init', create_function('', 'return register_widget("video_widgets");'));
?>