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
** Name : Map widgest
*/
class map_only_widgest extends WP_Widget {
    function map_only_widgest() {
        parent::WP_Widget(false, $name = 'Cuckoo | Google Map', 
		array("description" =>  'Using Cuckoo Google Map widget you can add Google map to any widgetized area. Enter address, set height of the map unit element, and choose zoom level.')
		);	
    }

	/** @see WP_Widget::widget */
    function widget($args, $instance) {
        extract( $args );
		$title = ($instance["title"]);
        $location = empty($instance["location"]) ? 'london' : $instance["location"];
		$height = empty($instance["height"]) ? '200px' : $instance["height"];
		$zoom = empty($instance["zoom"]) ? '15' : $instance["zoom"];
	
       ?>
		<?php echo $before_widget; ?>
		<?php
		if($title != null) :
			echo $before_title;
			echo $title; 
			echo $after_title;
		endif;
		?>
			<section class="map_widget_content">
				<?php echo do_shortcode('[map_widget location="'.$location.'" zoom="'.$zoom.'" popup="yes" height="'.$height.'"]'); ?>
			</section>
		<?php echo $after_widget; ?>
        <?php
    }
	
	    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }
	
	    /** @see WP_Widget::form */
    function form($instance) {
		$title = isset($instance["title"]) ? esc_attr($instance["title"]) : '' ;
        $location = isset($instance["location"]) ? esc_attr($instance["location"]) : '';
		$height = isset($instance["height"]) ? esc_attr($instance["height"]) : '';
		$zoom = isset($instance["zoom"]) ? esc_attr($instance["zoom"]) : '';
		
        ?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', THEMENAME); ?> :<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('location'); ?>"><?php _e('Location', THEMENAME); ?> (<small>Example: London</small>) :<input class="widefat" id="<?php echo $this->get_field_id('location'); ?>" name="<?php echo $this->get_field_name('location'); ?>" type="text" value="<?php echo $location; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height', THEMENAME); ?> (<small>Example: 120px or 20% or 100em</small>) :<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('zoom'); ?>"><?php _e('Zoom', THEMENAME); ?> (<small>1-22</small>) :<input class="widefat" id="<?php echo $this->get_field_id('zoom'); ?>" name="<?php echo $this->get_field_name('zoom'); ?>" type="text" value="<?php echo $zoom; ?>" /></label></p>
        <?php 
    }

}

// register Cuckoo widget
add_action('widgets_init', create_function('', 'return register_widget("map_only_widgest");'));
?>