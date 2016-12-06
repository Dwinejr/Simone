<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 * Author: CuckooThemes
 * Create: 2012.12.17
 **************/

class CuckooLove {

    function __construct() 
    {	
        add_action('admin_menu', array(&$this, 'cuckoolove_menu'), 99);
        add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));
        add_filter('body_class', array(&$this, 'body_class'));
        add_action('publish_post', array(&$this, 'setup'));
        add_action('wp_ajax_cuckoo-love', array(&$this, 'ajax_callback'));
		add_action('wp_ajax_nopriv_cuckoo-love', array(&$this, 'ajax_callback'));
        add_shortcode('cuckoo_love', array(&$this, 'shortcode'));
	}

	function cuckoolove_menu()
	{
		add_menu_page( 'CukooLove' , 'CukooLove' , 'manage_options','cuckoolove', array(&$this, 'cuckoolove_admin_page') , '' , 51);
	}
	
	function cuckoolove_admin_page()
	{ 
		$cuckoo_settings = get_option( "cuckoolove_setting" );
		?>
		<section id="main_content">
		<?php
		if(isset($_REQUEST['all']))
		{

		$cuckoo_settings = array(
			'display_work' => esc_attr($_POST["display_work"]),
			'display_post' => esc_attr($_POST["display_post"])
		);
		update_option( "cuckoolove_setting" , $cuckoo_settings );

		?>
			<div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
		<?php
		}
		?>
			<?php $this->cuckoolove_admin_header('General Settings'); ?>
			<form id="formId" method="POST" action="">
				<div id="general_settings">
					<!-- Visible Only post types  ------------------------->
					<div class="general_title_active">
						<span class="float_left"><?php _e('CuckooLove Display Settings', 'cuckoothemes'); ?></span>
					</div>
					<div class="active_settings" style="display: block;">
						<div class="section_settings">
								<label class="checkbox_form" for="display_post">
									<input type="checkbox" name="display_post" id="display_post" value="1" <?php echo ($cuckoo_settings['display_post'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e('Display in Post', 'cuckoothemes'); ?><br />
								</label>
								<label class="checkbox_form" for="display_work">
									<input type="checkbox" name="display_work" id="display_work" value="1" <?php echo ($cuckoo_settings['display_work'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e('Display in Work', 'cuckoothemes'); ?>
								</label>
								<span style="padding-top:10px; display:block;">
									<?php _e("Check boxes above where do you want to add CuckooLove functionality.", 'cuckoothemes'); ?>
								</span>
							<div class="clear"></div>
						</div>
					</div>		
					<!-- Visible Only post types  ------------------------->
					<div class="general_title_active">
						<span class="float_left"><?php _e('Shortcode and Template Tag', 'cuckoothemes'); ?></span>
					</div>
					<div class="active_settings" style="display: block;">
						<div class="section_settings" style="border-bottom:0;">	
							<p>To use CuckooLove in your posts, works and pages, you can use the shortcode below:</p>
							<code>[cuckoo_love]</code>
							<p>To use CuckooLove manually in your theme template use the following PHP code:</p>
							<code><?php echo esc_attr("<?php if( function_exists('cuckoo_love') ) cuckoo_love(); ?>"); ?></code>
						</div>
					</div>
				</div>
				<p style="display:inline;">
					<input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" />
				</p>
				<?php $this->cuckoolove_admin_footer(); ?>
			</form>
		</section>
		<?php
	}
	
	function cuckoolove_admin_header($page_name = null){ ?>
		<header id="framework_title">
			<div class="theme_info">
				<span class="theme_icone_title"></span><span class="theme_color_title">CuckooLove V<?php echo LOVEVERSON; ?></span><?php echo $name = $page_name ? '<span style="font-weight:normal; font-size:17px;"> | </span>' .$page_name : ''; ?>
			</div>
		</header><?php
	}


	function cuckoolove_admin_footer(){ ?>
		<footer id="framework_footer">
			<div class="footer_txt">
				<?php _e("CuckooLove V". LOVEVERSON ."<br /> Created by "); ?>
				<a href="http://www.cuckoothemes.com" title="CuckooThemes" target="_blank">CuckooThemes</a>
			</div>
			<div class="cuckoothemes_icone">
				<a href="http://www.cuckoothemes.com" title="CuckooThemes" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/admin/images/cuckoothemes-icone.png" alt="cuckoothemes" /></a>
			</div>
		</footer>
	<?php  }
	
	function enqueue_scripts()
	{

		wp_register_style('cuckoo-love', get_template_directory_uri().'/cuckoolove/styles/style.css' , false, LOVEVERSON , "all");		
		wp_enqueue_style( 'cuckoo-love' );
		
		wp_enqueue_script( 'cuckoo-love', get_template_directory_uri() . '/cuckoolove/js/ajax.js', array('jquery') );
		wp_enqueue_script( 'jquery' );
		
		wp_localize_script('cuckoo-love', 'cuckoo', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        ));
        
		wp_localize_script( 'cuckoo-love', 'cuckoo_love', array('ajaxurl' => admin_url('admin-ajax.php')) );
	}
	
	function show_in_content()
	{		
	    $content = "";
		// Don't show on custom page templates
	    if(is_page_template()) return $content;
	    // Don't show on testimonials
	    if(get_post_type() == 'testimonials') return $content;	    
		// Don't show on team
	    if(get_post_type() == 'team') return $content;
		
		$settings = get_option( 'cuckoolove_setting' );
		if( !isset($settings['display_work']) ) $settings['display_work'] = '0';
		if( !isset($settings['display_post']) ) $settings['display_post'] = '0';
		
		if(is_singular('works') && $settings['display_work']) $content .= $this->do_likes();
		if(is_singular('post') && $settings['display_post']) $content .= $this->do_likes();
		
		return $content;
	}
	
	function setup( $post_id ) 
	{
		if(!is_numeric($post_id)) return;
	
		add_post_meta($post_id, '_cuckoo_love', '0', true);
	}
	
	function ajax_callback($post_id) 
	{

		$settings = get_option( 'cuckoolove_setting' );
		if( !isset($settings['display_work']) ) $settings['display_work'] = '0';
		if( !isset($settings['display_post']) ) $settings['display_post'] = '0';

		if( isset($_POST['likes_id']) ) {
		    // Click event. Get and Update Count
			$post_id = str_replace('cuckoo-love-', '', $_POST['likes_id']);
			echo $this->like_this($post_id, 'update');
		} else {
		    // AJAXing data in. Get Count
			$post_id = str_replace('cuckoo-love-', '', $_POST['post_id']);
			echo $this->like_this($post_id, 'get');
		}
		
		exit;
	}
	
	function like_this($post_id, $action = 'get') 
	{
		if(!is_numeric($post_id)) return;		
		
		switch($action) {
		
			case 'get':
				$likes = get_post_meta($post_id, '_cuckoo_love', true);
				if( !$likes ){
					$likes = 0;
					add_post_meta($post_id, '_cuckoo_love', $likes, true);
				}
				
				return '<span class="cuckoo-love-count">'. $likes .'</span>';
				break;
				
			case 'update':
				$likes = get_post_meta($post_id, '_cuckoo_love', true);
				if( isset($_COOKIE['cuckoo_love_'. $post_id]) ) return $likes;
				
				$likes++;
				update_post_meta($post_id, '_cuckoo_love', $likes);
				setcookie('cuckoo_love_'. $post_id, $post_id, time()*20, '/');
				
				return '<span class="cuckoo-love-count">'. $likes .'</span>';
				break;
		
		}
	}
	
	function shortcode( $atts )
	{
		extract( shortcode_atts( array(
		), $atts ) );
		
		return $this->do_likes();
	}
	
	function do_likes()
	{
		global $post;

        $options = get_option( 'cuckoolove_setting' );
		
		$output = $this->like_this($post->ID);
		
		$likes = get_post_meta($post->ID, '_cuckoo_love', true);
  
  		$class = 'cuckoo-love';
  		$title = $likes.__( ' Love It', 'cuckoothemes');
		if( isset($_COOKIE['cuckoo_love_'. $post->ID]) ){
			$class = 'cuckoo-love active';
			$title = __('You Love It!', 'cuckoothemes');
		}
		
		return '<a href="#" class="'. $class .'" id="cuckoo-love-'. $post->ID .'" title="'. $title .'">'. $output .'</a>';
	}
	
    function body_class($classes) {    
        $classes[] = 'ajax-cuckoo-love';
    	return $classes;
    }
	
}
global $cuckoo_love;
$cuckoo_love = new CuckooLove();

/*--- Constat's ---*/
if(!define('LOVEVERSON', "1.0"))
define('LOVEVERSON', "1.0");

/**
 * Template Tag
 */
function cuckoo_love()
{
	global $cuckoo_love;
    echo $cuckoo_love->do_likes(); 
	
}