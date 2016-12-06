<?php 
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 **************/


class CustomPost {
	
	var $name;
	var $args = array();
	var $metaboxes = array();
	
	public function CustomPost($data, $args, $metabox=array())
	{
		$this->name = $data['type'];
		
		$default_args = array(
			'labels' => array(
				'name' 				=> $data['name'],
				'singular_name' 	=> $data['singular_name'],
				'add_new' 			=> 'Add New', 'cuckoothemes',
				'add_new_item' 		=> 'Add New '.$data['singular_name'],
				'edit_item' 		=> 'Edit '.$data['singular_name'],
				'new_item' 			=> 'New '.$data['singular_name'],
				'view_item' 		=> 'View '.$data['singular_name'],
				'search_items' 		=> 'Search '.$data['name'],
				'not_found' 		=> 'No '.strtolower($data['name']).' found',
				'not_found_in_trash'=> 'No '.strtolower($data['name']).' found in Trash', 
				'parent_item_colon' => '',
				'menu_name' 		=> $data['name']
			),
			'public' 				=> true,
			'capability_type' 		=> 'post',
			'supports'				=> array('title'),
			'has_archive' 			=> false,	
			'rewrite' 				=> array('slug' => $data['slug'], 'with_front' => false),
			'hierarchical' 			=> true
		);
		
		$this->args = $args + $default_args;
		
		add_action("init", array(&$this, "register"));
		if(!empty($metabox)) {
			$this->metaboxes = $metabox;
			$this->metabox();
		}
	}
	
	/*
	 * Registering the post type
	 */
	public function register()
	{
		register_post_type($this->name, $this->args);
	}
	
	/*
	 * Registering the metabox
	 */
	public function metabox()
	{
		add_action('add_meta_boxes', array(&$this, "register_metabox"));
		add_action('save_post', array(&$this, "save_metabox"));
	}
	
	/*
	 * Adding contents to the metaboxes
	 */
	public function register_metabox()
	{
		$i=1;
		foreach($this->metaboxes as $name => $data) {
			$fields = $data['fields'];
			$position = $data['position'];
			add_meta_box("metabox_{$this->name}_{$i}", $name, array(&$this, "render_metabox"), $this->name, $position, 'low', array("metabox" => $fields));
			$i++;
		}
	}
	
	/*
	 * Rendering a metabox
	 */
	public function render_metabox()
	{
		$args = func_get_args();
		$fields = $args[1]["args"]["metabox"]; ?>
		<div class="new_elements">
		<?php
			foreach($fields as $field) {
				$value = "";
				$key = "";
				$field_key = ( empty($field["key"]) ? "" : NOTCHANGEELEMENT . $field["key"] );
				$post_id = (isset($_GET['post'])) ? $_GET['post'] : 0 ;
				$value = get_post_meta($post_id, $key,  true);
				switch($field["type"])
				{
					case "textarea_desc" :
					?>
					<section>
						<div class="<?php echo $this->name; ?>_items items_left">
								<label class="item_title" for="<?php echo $field_key; ?>">
									<?php echo $field["name"]; ?>
								</label>
								<textarea id="<?php echo $field_key; ?>" name="<?php echo $field_key; ?>" ><?php  echo $value[$field_key][0]; ?></textarea>
								<div class="bottom_desc"><?php echo $field["desc"]; ?></div>
						</div>
					<?php	
						break;
					case "text_client" :
					?>
						<div class="<?php echo $this->name; ?>_items items_right">
							<label class="item_title" for="<?php echo $field_key; ?>"><?php echo $field["name"]; ?></label>
							<input id="<?php echo $field_key; ?>" type="text" value="<?php echo $value[$field_key][0]; ?>" name="<?php echo $field_key; ?>" />
							<div class="bottom_desc"><?php echo esc_attr($field["desc"]); ?></div>
						</div>
					</section>
					<div class="clear"></div>
					<?php
					break;					
					case "text_only" :
					?>
						<div class="<?php echo $this->name; ?>_text">
							<label class="item_title" for="<?php echo $field_key; ?>"><?php echo $field["name"]; ?></label>
							<div class="bottom_desc_all"><?php echo $field["desc"]; ?></div>
						</div>
					<?php
					break;					
					case "testimonials_input" :
					?>
						<div class="<?php echo $this->name; ?>_text">
							<input id="<?php echo $field_key; ?>" style="width:100%;" type="text" value="<?php echo esc_attr($value[$field_key][0]); ?>" name="<?php echo $field_key; ?>" />
						</div>
					<?php
					break;						
					case "image_text_left" :
					?>
					<section>
						<div class="<?php echo $this->name; ?>_items items_left uploud_images_works" id="<?php echo $field_key; ?>">
							<input type="text" class="uploud_work_text"  size="10" name="<?php echo $field_key; ?>" value="<?php echo $value[$field_key][0]; ?>" /><br />
					<?php
					break;					
					case "image_left" :
					?>
							<label class="bottom-elemets" for="<?php echo $field_key; ?>">
								<input id="image_url_input<?php echo $field_key; ?>" class="<?php echo $field_key; ?>" type="text" size="10" name="<?php echo $field_key; ?>" value="<?php echo $value[$field_key][0]; ?>" />
								<input id="uploadId<?php echo $field_key; ?>" class="upload_button_new button-admin" style="margin:0 0 0 3%!important;" type="button" value="Upload Image" />
							</label>
						</div>
					<?php
					break;
					case "image_text_right" :
					?>
						<div class="<?php echo $this->name; ?>_items items_right uploud_images_works" id="<?php echo $field_key; ?>">
							<input type="text" size="10" class="uploud_work_text" name="<?php echo $field_key; ?>" value="<?php echo $value[$field_key][0]; ?>" /><br />
					<?php
					break;					
					case "image_right" :
					?>
							<label class="bottom-elemets" for="<?php echo $field_key; ?>">
								<input id="image_url_input<?php echo $field_key; ?>" class="<?php echo $field_key; ?>" type="text" size="10" name="<?php echo $field_key; ?>" value="<?php echo $value[$field_key][0]; ?>" />
								<input id="uploadId<?php echo $field_key; ?>" class="upload_button_new button-admin" style="margin:0 0 0 3%!important;" type="button" value="Upload Image" />
							</label>
						</div>
					</section>
					<div class="clear"></div>
					<?php
					break;
					case "video" :
					?>
					<section style="border-bottom:none; box-shadow:none;">
						<div class="<?php echo $this->name; ?>_items items_left">
							<label class="item_title" for="<?php echo $field_key; ?>"><?php echo $field["name"]; ?></label>
							<input id="<?php echo $field_key; ?>" style="position:relative; top:-5px;" type="text" value="<?php echo $value[$field_key][0]; ?>" name="<?php echo $field_key; ?>" />
						</div>
						<div class="<?php echo $this->name; ?>_items items_right">
							<div class="left_desc" style="width: 360px;"><?php echo $field["desc"]; ?></div>
						</div>
					</section>
					<div class="clear"></div>
					<?php
					break;
					case "first-section-testimonial" :
					?>
					<section style="border-bottom:none; box-shadow:none; float:none;">
						<header class="header">
							<span class="button-area alignleft">
								<label for="<?php echo $field_key; ?>">
									<input id="uploadId<?php echo $field_key; ?>" class="upload_button_new button-admin" style="width:100px; float:none;" type="button" value="Upload Image" />
								</label>
								<input id="<?php echo $field_key; ?>" class="remove_block_testimonial button-remove-area" type="button" value="Delete Image"/>
							</span>
							<span class="alignleft" style="margin-left:20px;"><?php echo $field["desc"]; ?></span>
						</header>
					</section>
					<?php
					break;
					case "inputs-section-testimonial" :
					?>
						<label for="<?php echo $field_key; ?>_img_url" class="testimonial_input_element">
							<span class="element-title-show"><?php echo $field["desc"]; ?></span>
							<input id="<?php echo $field_key; ?>_img_url" class="title-element margin-no" type="text" value="<?php echo $value[$field_key][0]; ?>" name="<?php echo $field_key; ?>" />
						</label>
					<?php
					break;
					case "inputs-section-testimonial-url" :
					?>
						<label for="<?php echo $field_key; ?>" class="testimonial_input_element">
							<span class="element-title-show"><?php echo $field["desc"]; ?></span>
							<input id="image_url_inputcuckoo_testimonial_image" class="title-element margin-no <?php echo $field["class"]; ?>" type="text" value="<?php echo $value[$field_key][0]; ?>" name="<?php echo $field_key; ?>" />
						</label>
					<?php
					break;
					case "team-member":
					?>
						<label for="<?php echo $field_key; ?>-member-name" class="left-position">
							<span class="title-item"><?php echo $field["name"]; ?></span>
							<input id="<?php echo $field_key; ?>-member-name" class="itemInputText" type="text" value="<?php echo $value[$field_key][0]; ?>" name="<?php echo $field_key; ?>" />
							<div class="desc-item"><?php echo $field["desc"]; ?></div>
						</label>
					<?php
					break;
					case "team-image":
					?>
						<label for="<?php echo $field_key; ?>" class="full-width-item">
							<span class="title-item"><?php echo $field["name"]; ?></span>
							<input id="image_url_input<?php echo $field_key; ?>" class="upload_image<?php echo $field_key; ?> inputWidth" type="text" name="<?php echo $field_key; ?>" value="<?php echo $value[$field_key][0]; ?>" />
							<input id="uploadId<?php echo $field_key; ?>" class="upload_button_new button-admin img-button" type="button" value="Upload" />
							<div class="desc-item"><?php echo $field["desc"]; ?></div>
						</label>
						<div class="clear"></div>
					<?php
					break;
					case "member-desc":
					?>
						<label for="<?php echo $field_key; ?>" class="full-width-item">
							<span class="title-item"><?php echo $field["name"]; ?></span>
							<textarea id="<?php echo $field_key; ?>" class="member-desc" name="<?php echo $field_key; ?>" ><?php  echo $value[$field_key][0]; ?></textarea>
							<div class="desc-item"><?php echo $field["desc"]; ?></div>
						</label>
						<div class="clear"></div>
					<?php
					break;
					case "member-social":
					?>
						<div class="social_section" id="<?php echo $field_key; ?>">
							<b style="width:15%; top:0;"><?php echo $field["name"]; ?></b>
							<input type="text" style="width:55%; top:0;" id="<?php echo $field_key; ?>" name="<?php echo $field_key; ?>" value="<?php echo $value[$field_key][0]; ?>" />
							<span style="width: 22%; top:0;"><?php echo $field["desc"]; ?></span>
						</div>
					<?php
					break;
					case "title" :
					?>
						<span class="title-main"><?php echo $field["name"]; ?></span>
					<?php
					break;
				}
			} ?>
		</div>
	<?php 		
	}
	
	/*
	 * Saving the contents of the metaboxes
	 */
	public function save_metabox()
	{
		if(!empty($_POST)) {
			global $post_id;
			global $post_type;
			
			if($post_type == $this->name) {
				$metaboxes = $this->metaboxes;
				foreach($metaboxes as $name => $fields) {
					foreach($fields['fields'] as $field) {
						$key = NOTCHANGEELEMENT . $field['key'];
						$value = $_POST[$key];
						update_post_meta($post_id, $key, $value);
					}
				}
			}
		}
	}
	
}

?>