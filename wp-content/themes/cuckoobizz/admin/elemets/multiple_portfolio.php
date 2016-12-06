<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * URL http://cuckoothemes.com
 * Create 2013.11.02
 **************/
 
if ( ! class_exists( 'cuckoo_multiple_portfolio_settings' ) ) :

	class cuckoo_multiple_portfolio_settings {
		
		var $post;
		var $post_id;
		
		public function __construct(){
			add_action('add_meta_boxes', array(&$this, 'add_meta'));
			add_action('save_post', array(&$this, 'save'));
		}
		
		public function display($post){
			
			$multiple_settings = get_post_meta($post->ID, NOTCHANGEELEMENT.'-multiple-settings');
			wp_nonce_field('cuckoo-multiple-'.$post->ID,'cuckoo-multiple-nonce');
			// Get all types in array
			$types = get_terms('types');
			$default = array();
			foreach($types as $type):
				$default[] = $type->slug;
			endforeach;
			$multiple = ( empty($multiple_settings) ? array( 'use' => 0,'show' => 1, 'types' => $default , 'types-all' => 1 ) : $multiple_settings[0] ); 
			// Get all types in array
			$types = get_terms('types');
			?>
			<label for="cuckoo-portfolio-use-<?php echo $post->ID; ?>" style="margin:15px 0 10px; color: #999999; display: block;">
				<input class="show-types-multiple-use" id="cuckoo-portfolio-use-<?php echo $post->ID; ?>" type="checkbox" name="cuckoo-portfolio-use" value="1" <?php echo (isset($multiple['use']) == 1) ? 'checked="checked"' : ''; ?> /> <?php _e('Activate Multiple Portfolio', 'cuckoothemes'); ?>
			</label>
			<label for="cuckoo-portfolio-display-<?php echo $post->ID; ?>" style="margin:15px 0; color: #999999; display: block;">
				<input class="show-types-multiple" id="cuckoo-portfolio-display-<?php echo $post->ID; ?>" type="checkbox" name="cuckoo-portfolio-display" value="1" <?php echo (isset($multiple['show']) == 1) ? 'checked="checked"' : ''; ?> /> <?php _e('Display Work Types Filter', 'cuckoothemes'); ?>
			</label>
			<article id="portfolio-types">
				<div class="multiple-title"><?php _e('Work Types' , 'cuckoothemes'); ?></div>
				<div id="cuckoo-types-container">
					<label for="portfolio-types-all" style="margin:10px 0; display: block;">
						<input class="multiple-types-all" id="portfolio-types-all" type="checkbox" name="portfolio-types-all" value="1" <?php echo $checked = $multiple['types-all'] == 1 ? 'checked="checked"' : ''; ?> /> <?php echo _e('All Types', 'cuckoothemes') ?>
					</label>
					<?php foreach($types as $type): ?>
						<label for="portfolio-type-<?php echo $type->slug; ?>" style="margin:10px 0; color: #999999; display: block;">
							<input class="multiple-types" id="portfolio-type-<?php echo $type->slug; ?>" type="checkbox" name="portfolio-type-<?php echo $type->slug; ?>" value="<?php echo $type->slug; ?>" <?php echo $checked = $this->findType($type->slug,$multiple['types']) == 1 ? 'checked="checked"' : ''; ?> /> <?php echo $type->name; ?>
						</label>
					<?php endforeach; ?>
				</div>
				<input type="hidden" name="portfolio-types" value="<?php echo $this->listType($multiple['types']) ?>" />
			</article>
			<?php 
		}
		
		public function findType($type, $array = array()){
			
			$output = 0;
			$type = trim($type);
			if (in_array($type, $array)) {
				$output = 1;
			}
			
			return $output;
		}
		
		public function listType($array){
		
			$output = '';
			
			if(is_array($array)) :
				
				foreach($array as $array) :
					if(!empty($array)) :
						$output .= $array.',';
					endif;
				endforeach;
				
			endif;
			
			return $output;
			
		}
		
		public function add_meta(){
			add_meta_box( NOTCHANGEELEMENT.'-multiple-settings', __('Multiple Portfolio', 'cuckoothemes'), array(&$this, 'display'), 'page', 'side', 'core');
		}
		
		public function save($post_id) {

			  // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything
			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
				return $post_id;
			}
				
			// verify this came from our screen and with proper authorization.
			if ( empty($_POST) || !wp_verify_nonce($_POST['cuckoo-multiple-nonce'], 'cuckoo-multiple-'.$post_id) ){
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
			if ( $post->post_type == 'page' ) { 
				$types_array = explode(',', substr($_POST['portfolio-types'], 0, -1));
				$multiple = array( 'use' => $_POST['cuckoo-portfolio-use'], 'show' => $_POST['cuckoo-portfolio-display'], 'types' => $types_array , 'types-all' => $_POST['portfolio-types-all'] );
				update_post_meta($post_id, NOTCHANGEELEMENT.'-multiple-settings', $multiple);
			}
			
			return $multiple;
		 
		}
	}

endif;

$cuckoo_multiple_portfolio_settings = new cuckoo_multiple_portfolio_settings(); 

?>