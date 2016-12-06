<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * URL http://cuckoothemes.com
 * Create 2013.08.30
 **************/
 
/*======= The main file intended only for header slider usage.  =======*/

class cuckoo_header_slider {
	
	var $post;
	var $post_id;
	
	public function __construct(){
		add_action('add_meta_boxes', array(&$this, "add_meta"));
		add_action('save_post', array(&$this, "save"));
	}
	
	public function display($post){
		$slider = get_post_meta($post->ID, NOTCHANGEELEMENT.'-slider-meta-box');
		wp_nonce_field('slider-item-'.$post->ID,'slider-nonce-field');
		$sliderVal = ( empty($slider) ? "" : $slider[0] ); 
		/* Show to Content */ ?>
		<div class="description_admin_normal"><?php _e('Enter Shortcode', 'cuckoothemes'); ?></div>
		<input id="slider-<?php echo $post->ID; ?>" type="text" class="full-width-input" name="slider-item" value="<?php echo $slidervalues = isset($sliderVal[0]) ? $sliderVal[0] : '' ; ?>" />
		<div class="description_admin_normal"><?php _e('Using one of 4 theme shortcodes you can add Revolution Slider, Layer Slider, Google Map and Vimeo or Youtube Video to the header of any Page, Post and even to any Custom Post in your site. Turn off a Title if necessary.', 'cuckoothemes'); ?></div>
		<label for="hideTitle-<?php echo $post->ID; ?>" style="margin:0 0 10px; color: #999999; display: inline-block;">
			<input id="hideTitle-<?php echo $post->ID; ?>" type="checkbox" name="cuckoo-hideTitle" value="1" <?php echo (isset($sliderVal[1]) == 1) ? 'checked="checked"' : ''; ?> /> <?php _e('Hide Title', 'cuckoothemes'); ?>
		</label>
		<?php 
	}
	
	public function add_meta(){
		add_meta_box( NOTCHANGEELEMENT.'-slider-meta-box', __('Header Settings', 'cuckoothemes'), array(&$this, "display"), 'page', 'side', 'high');
		add_meta_box( NOTCHANGEELEMENT.'-slider-meta-box', __('Header Settings', 'cuckoothemes'), array(&$this, "display"), 'post', 'side', 'high');
		add_meta_box( NOTCHANGEELEMENT.'-slider-meta-box', __('Header Settings', 'cuckoothemes'), array(&$this, "display"), 'testimonials', 'side', 'high');
		add_meta_box( NOTCHANGEELEMENT.'-slider-meta-box', __('Header Settings', 'cuckoothemes'), array(&$this, "display"), 'works', 'side', 'high');
		add_meta_box( NOTCHANGEELEMENT.'-slider-meta-box', __('Header Settings', 'cuckoothemes'), array(&$this, "display"), 'team', 'side', 'high');
		if(woo_active_cuckoo()) :
			add_meta_box( NOTCHANGEELEMENT.'-slider-meta-box', __('Header Settings', 'cuckoothemes'), array(&$this, "display"), 'product', 'side', 'high');
		endif;
	}
	
	public function save($post_id) {

		  // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
			return $post_id;
		}
			
		// verify this came from our screen and with proper authorization.
		if ( empty($_POST) || !wp_verify_nonce($_POST['slider-nonce-field'], 'slider-item-'.$post_id) ){
			return $post_id;
		}

		// Check permissions
		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ) )
				return ;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ) )
				return ;
		}
	 
		// OK, we're authenticated: we need to find and save the data
		$post = get_post($post_id);
		if (($post->post_type == 'page') or ($post->post_type == 'testimonials') or ($post->post_type == 'works') or ($post->post_type == 'team') or ($post->post_type == 'post') or ($post->post_type == 'product' && woo_active_cuckoo()) ) { 
			$slider = array( cuckoo_get_value($_POST['slider-item']), $_POST['cuckoo-hideTitle']  );
			update_post_meta($post_id, NOTCHANGEELEMENT.'-slider-meta-box', $slider);
			}
		
		return $slider;
	 
	}
}

$cuckoo_header_slider = new cuckoo_header_slider();

?>