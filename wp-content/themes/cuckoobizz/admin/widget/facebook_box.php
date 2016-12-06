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
** Name : Facebook widget
*/

class cuckoo_facebook_widget extends WP_Widget {
 		
	function cuckoo_facebook_widget() {
        parent::WP_Widget( false, $name = 'Cuckoo | Facebook Fan Box', 
		array("description" =>  'Cuckoo Facebook Fan Box widget connects your Facebook fan page to your WordPress Blog.') 
		);	
    }

	
	/**
	 * @see WP_Widget::widget()
	 */
	function widget( $args, $instance ) {
		extract( $args );
		
		$username = !empty($instance["username"]) ? $instance["username"] : '';
		$app_id = !empty($instance["app_id"]) ? $instance["app_id"] : '';
		$border_color = !empty($instance["border_color"]) ? $instance["border_color"] : '#E2E2E3';
		$background = !empty($instance["background"]) ? $instance["background"] : '#ffffff';
		$show_faces = $instance["show_faces"] == "1" ? "true" : "false";
		$show_stream = $instance["show_stream"] == "1" ? "true" : "false";
		$show_header = $instance["show_header"] == "1" ? "true" : "false";
		echo '<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId='.$appId.'";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, \'script\', \'facebook-jssdk\'));</script>';

		echo $before_widget;

		if ( $instance["title"] )
			echo $before_title . $instance["title"] . $after_title;
		 ?>
            <div class="fb-like-box" style="background-color:<?php echo $background; ?>;"
            	data-href="http://www.facebook.com/<?php echo $username; ?>"
            	data-show-faces="<?php echo $show_faces; ?>" 
            	data-stream="<?php echo $show_stream; ?>" 
            	data-header="<?php echo $show_header; ?>"
            	data-border-color="<?php echo $border_color; ?>"></div>
		<?php 
		
		echo $after_widget;
	}

	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['app_id'] = strip_tags( $new_instance['app_id'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['border_color'] = strip_tags( $new_instance['border_color'] );
		$instance['background'] = strip_tags( $new_instance['background'] );
		
		$instance['show_faces'] = (bool)$new_instance['show_faces'];
		$instance['show_stream'] = (bool)$new_instance['show_stream'];
		$instance['show_header'] = (bool)$new_instance['show_header'];

		return $instance;
	}
	
	/**
	 * @see WP_Widget::form()
	 */	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		'app_id' => '',
		'username' => '',
		'height' => '300',
		'show_faces' => 'true',
		'show_stream' => 'false',
		'show_header' => 'true',
        'border_color' => '#E2E2E3',
		'background' => ''
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', THEMENAME) ?> :</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'app_id' ); ?>"><?php _e('App Id', THEMENAME) ?> :</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'app_id' ); ?>" name="<?php echo $this->get_field_name( 'app_id' ); ?>" value="<?php echo $instance['app_id']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Username', THEMENAME) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
		</p>
        <p>
            <label for="<?php echo $this->get_field_id( 'border_color' ); ?>"><?php _e('Border color', THEMENAME) ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'border_color' ); ?>" name="<?php echo $this->get_field_name( 'border_color' ); ?>" value="<?php echo $instance['border_color']; ?>" />
        </p>        
		<p>
            <label for="<?php echo $this->get_field_id( 'background' ); ?>"><?php _e('Background color', THEMENAME) ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'background' ); ?>" name="<?php echo $this->get_field_name( 'background' ); ?>" value="<?php echo $instance['background']; ?>" />
        </p>
		<p>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show_faces' ); ?>" name="<?php echo $this->get_field_name( 'show_faces' ); ?>" value="1" <?php echo ($instance['show_faces'] == "true" ? "checked='checked'" : ""); ?> />
			<label for="<?php echo $this->get_field_id( 'show_faces' ); ?>"><?php _e(' Show Faces', THEMENAME) ?></label>
		<br />
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show_stream' ); ?>" name="<?php echo $this->get_field_name( 'show_stream' ); ?>" value="1" <?php echo ($instance['show_stream'] == "true" ? "checked='checked'" : ""); ?> />
			<label for="<?php echo $this->get_field_id( 'show_stream' ); ?>"><?php _e(' Show Stream', THEMENAME) ?></label>
		<br />
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show_header' ); ?>" name="<?php echo $this->get_field_name( 'show_header' ); ?>" value="1" <?php echo ($instance['show_header'] == "true" ? "checked='checked'" : ""); ?> />
			<label for="<?php echo $this->get_field_id( 'show_header' ); ?>"><?php _e(' Show Header', THEMENAME) ?></label>
		</p>
		
	<?php
	}
 }
 // register Cuckoo widget
add_action('widgets_init', create_function('', 'return register_widget("cuckoo_facebook_widget");'));
?>