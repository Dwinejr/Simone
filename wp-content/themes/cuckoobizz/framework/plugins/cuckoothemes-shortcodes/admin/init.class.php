<?php
/*
 * @class CuckooShortcodes_admin_pages
 * @version	1.0.0
 * @since 1.0
 * @package	CuckooShortcode
 * @author CuckooThemes
*/

if ( ! class_exists( 'CuckooShortcodes_admin_pages' ) ) {

	class CuckooShortcodes_admin_pages extends CuckooShortcode {
		
		/*@var array */
		public $errors = array();
		
		/* Constructor. */
		public function __construct() {
			
		}
		
		public function header($string){
		
			$string = $string ? '<span style="font-weight:normal; font-size:17px;"> | </span>' . $string : '';
			
			echo $output = ' 
				<header id="framework_title">
					<div class="theme_info">
						<span class="theme_icone_title"></span><span class="theme_color_title">CuckooThemes Shortcodes</span>'. $string .'
					</div>
				</header>';
		}
		
		public function footer(){
			
			echo $output = '<footer id="framework_footer">
				<div class="footer_txt">CuckooThemes Shortcodes V'. $this->version .'<br /> Created by 
					<a href="http://www.cuckoothemes.com" title="CuckooThemes" target="_blank">CuckooThemes</a>
				</div>
				<div class="cuckoothemes_icone">
					<a href="http://www.cuckoothemes.com" title="CuckooThemes" target="_blank"><img src="'.$this->plugin_url().'/img/cuckoothemes-icone.png" alt="cuckoothemes" /></a>
				</div>
			</footer>';
		
		}
		
		public function cuckoo_option( $option_name, $var_array='', $request='' ){
			
			$option = get_option($option_name);
			if(isset($_REQUEST[$request]) && !empty($var_array)){
				$option = $var_array;
				update_option( $option_name , $option );
				echo $output = '<div id="save_upadate" class="updated">'. _x( 'New settings saved!', $this->lang ) .'</div>';
			}
			return $option;
		}
		
		public function element_title( $string, $rel="", $addClass="", $addTitle="" ) {
			
			echo $output = '			
			<div class="general_title_active">
				<span class="float_left">'. _x( $string, $this->lang ) .'</span>
				<span class="float_right"><span rel="'.$rel.'" class="'.$addClass.'">'.$addTitle.'</span></span>
			</div>';
			
		}
		
		/* Save button */
		public function save_button( $title, $name, $id ){
		
			echo $output = '
				<p style="display:inline;">
					<input class="active_input" id="'.$id.'" name="'.$name.'" style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="'.$title.'" />
				</p>';
		
		}
		
		/* Sections block in array */
		public function section_title_in_array( $id, $title, $shortcode ){
		
			$input = "<input class='regular-text-cuckoo' type='text' value='".$shortcode."' name='shortcode' readonly='readonly'>";
	
			echo $output = '
				<div class="drag-container-title">
					<span class="float_right">
						<input id="expand-item-'.$id.'" class="expand_button" style="float:left;" type="button" value="Expand" />
						<input id="remove-item-'.$id.'" class="shortcode_remove" style="float:left;" type="button" value="Delete" />
					</span>
					<div class="title_container_main">
						<div id="unit-title-item-'.$id.'" class="title-item">'.$title.'</div>
						<div id="shortcode-'.$id.'" class="map-shortcode">'.$input.'</div>
					</div>
				</div>';
		}
		
		public function section_input_column_1( $title, $id, $value, $description=null, $last=false, $class='colmarginBottom' ){
			
			$lastClass = $last == true ? ' last' : '';
			
			$description = $description ? '<div class="desc_bottom" style="padding-top:15px;">'. _x( $description, $this->lang ) .'</div>' : '';
			
			echo $output = '
				<div class="col-1'.$lastClass.' '.$class.'">
					<span class="itemHiddenTitle">'. _x( $title, $this->lang ) .'</span>
					<input type="text" id="'. $id .'" class="with20margin" name="'. $id .'" value="'. $value .'"/>
					'. $description .'
				</div>';
		}		
		
		public function section_input_column_4( $title, $id, $value, $description=null, $last=false, $class='colmarginBottom' ){
			
			$lastClass = $last == true ? ' last' : '';
			
			$description = $description ? '<div class="desc_bottom" style="padding-top:15px;">'. _x( $description, $this->lang ) .'</div>' : '';
			
			echo $output = '
				<div class="col-4'.$lastClass.' '.$class.'">
					<span class="itemHiddenTitle">'. _x( $title, $this->lang ) .'</span>
					<input type="text" id="'. $id .'" class="with20margin" name="'. $id .'" value="'. $value .'"/>
					'. $description .'
				</div>';
		}		
		
		public function section_img( $title, $id, $value, $description=null, $class='colmarginBottom' ){
			
			$description = $description ? '<div class="desc_bottom" style="padding-top:15px;">'. _x( $description, $this->lang ) .'</div>' : '';
			
			echo $output = '
				<div class="full-width-element '.$class.'">
					<span class="itemHiddenTitle">'. _x( $title, $this->lang ) .'</span>
					<label for="upload_image'.$id.'">
						<input id="image_url_input'.$id.'" class="upload_image upLaoding" style="width:82%;" type="text" size="36" name="'.$id.'" value="'.$value.'" />
						<input id="uploadId'.$id.'" class="upload_button_new button_short" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
					</label>
					'. $description .'
				</div>';
		}
		
		public function section_title( $title, $addClass = '', $addTitle = '', $rel = '' ){
			
			echo $output = '<div class="section-title-collapse"><h3>'.$title.'</h3><span rel="'.$rel.'" class="'.$addClass.'">'.$addTitle.'</span></div>';
		
		}
		
		public function not_active_input($title, $value){
			echo $output = "<div class='not_active_input'><b>". _x( $title, $this->lang ) ."</b><input id='shortcode' class='regular-text-cuckoo' type='text' value='".$value."' name='shortcode' readonly='readonly'></div>";
		}
		
		public function section_start(){
		
			echo $output = '<div class="section-collapse"><div class="current-element close" title="Open"></div><div class="close-elements">';
			
		}
		
		public function color_input($title, $id, $value, $default){
		
			echo $output = '<div class="pick-cuckoo"><b>'. _x( $title, $this->lang ) .'</b><input type="text" value="'.$value.'" name="'.$id.'" id="'.$id.'" class="wp-color-picker-field" data-default-color="'.$default.'" /></div>';
		}
		
		public function section_end(){
		
			echo $output = '</div></div>';
			
		}
		
		public function section_texteare_full( $title, $id, $value, $description=null, $class='colmarginBottom' ){
			
			$description = $description ? '<div class="desc_bottom" style="padding-top:15px;">'. _x( $description, $this->lang ) .'</div>' : '';
			
			echo $output = '
				<div class="full-width-element '.$class.'">
					<span class="itemHiddenTitle">'. _x( $title, $this->lang ) .'</span>
					<textarea id="'. $id .'" class="with20margin" name="'. $id .'">'. $value .'</textarea>
					'. $description .'
				</div>';
		}
		
		public function section_select( $title, $id, $value, $description=null, $last=false, $option = array(), $class='colmarginBottom'){
		
			$opt = new CuckooShortcodes_option();
			
			$lastClass = $last == true ? ' last' : '';
			
			$description = $description ? '<div class="desc_bottom" style="padding-top:15px;">'. _x( $description, $this->lang ) .'</div>' : '';
			
			$output = '
				<div class="col-1'.$lastClass.' '.$class.'">
					<span class="itemHiddenTitle">'. _x( $title, $this->lang ) .'</span>
					<select id="'. $id .'" class="with20margin" name="'. $id .'">';
					foreach($option as $k=>$v) :
						if($value == $v) :
							$output .= '<option value="'.$v.'" selected>'.$opt->converVal($v).'</option>';
						else :
							$output .= '<option value="'.$v.'">'.$opt->converVal($v).'</option>';
						endif;
					endforeach;
			$output .= '</select>
					'. $description .'
				</div>';
				
				
			echo $output;
		}
		
		public function hidden_input($name, $value, $arrayItemName='', $class=""){
			
			$value_return = '';
			
			if(is_array($value)) :
			
				foreach($value as $k=>$v):
					$value_return .= $arrayItemName.'-'.$k.',';
				endforeach;
				
			else :
				$value_return = $value;
			endif;
			
			echo $output = '<input type="hidden" class="'.$class.'" value="'.$value_return.'" name="'.$name.'" />';
		}
		
	}
	
}
?>