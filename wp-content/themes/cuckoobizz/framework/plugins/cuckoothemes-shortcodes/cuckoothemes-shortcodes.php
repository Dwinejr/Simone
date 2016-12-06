<?php
/*
Plugin Name: CuckooThemes Shortcodes
Plugin URI: http://cuckoothemes.com
Description: CuckooThemes Shortcodes Plugin
Author: CuckooThemes
Version: 1.0.0
Author URI: http://Cuckoothemes.com/
License: GPL 2.0, @see http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'CuckooShortcode' ) ) {

	/**
	 * Main CuckooThemes Shortcode Class
	 *
	 * Contains the main functions for CuckooThemes Shortcode, stores variables, and handles error messages
	 *
	 * @class CuckooShortcode
	 * @version	1.0.0
	 * @since 1.0
	 * @package	CuckooShortcode
	 * @author CuckooThemes
	 */
	class CuckooShortcode {
	
		/* @var string */
		public $version = '1.0.0';			
		
		/* @var string */
		public $lang = 'cuckooshortcodes-lang';		
		
		/* @var string */
		public $plugin_url;
		
		/*@var array */
		public $errors = array();
		
		/* CuckooShortcode Constructor. */
		public function __construct() {
			
			// Include required files
			$this->includes();

			// Installation
			register_activation_hook( __FILE__, array( $this, 'activate' ) );

			// Hooks
			add_action( 'init', array( $this, 'init' ));
			add_action( 'admin_menu', array( $this, 'admin_menus' ));
			
		}
		
		public function activate() {
		
			
		}
		
		public function init() {
		
			add_action( 'wp_enqueue_scripts', array( $this, 'load_map_scripts_in_outside' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'load_map_scripts_in_admin' ) );
			
		}
		
		/* Admin dashport navigation and pages */
		public function admin_menus() {
			global $cuckoo_mapPage;
			$cuckoo_mapPage = add_menu_page(  
				__( 'Map Shortcode', $this->lang),
				__( 'Map Shortcode', $this->lang), 
				'manage_options', 
				'cuckoo-shortcode',
				array(&$this, 'pageMap'),
				$this->plugin_url().'img/main-icon.png',
				55 
			);
		}
		
		public function pageMap() {
			
			include(dirname(__FILE__).'/admin/pages/map.php');
			
		}
		
		public function load_map_scripts_in_admin($hook){
		
			global $cuckoo_mapPage;
			
			if($hook != $cuckoo_mapPage){
				return;
			}
			// load styles
			wp_enqueue_media();
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_style( 'cuckooshortcode-admin', $this->plugin_url() . 'css/main_style.css' );
			// load scripts
			wp_enqueue_script('wp-color-picker');
			wp_enqueue_script( 'cuckooshortcode-admin', $this->plugin_url() . 'js/option.js', array('jquery') );
			// localize scripts
			wp_localize_script( 'cuckoo-map-ajax', 'cuckoo_map_vars', array(
				'map_settings_nonce' => wp_create_nonce('map_settings_nonce')
				)
			);
			
		}
		
		/* Register/queue frontend scripts. */
		public function load_map_scripts_in_outside() {
			
			wp_deregister_script( 'CuckooShortcode' );
			wp_register_script( 'CuckooShortcode', $this->plugin_url() . '/js/CuckooShortcode.js', array(), $this->version, true );
			wp_enqueue_script( 'CuckooShortcode' );
			
			wp_deregister_script( 'CuckooShortcode-google' );
			wp_register_script('CuckooShortcode-google', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false'); 
			wp_enqueue_script( 'CuckooShortcode-google' );
			
		}
		
		// Include required files
		public function includes() {
		
			if ( is_admin() ){
				$this->admin_includes();
			}
			
			include_once( 'shortcodes/map.class.php' );
			include_once( 'admin/option.class.php' );
		}
		
		public function admin_includes() {
			include_once( 'admin/init.class.php' );
		}
		
		/** Helper functions **/
		public function plugin_url() {
			/* If not for include in theme */
		//	if ( $this->plugin_url ){ 
		//		return $this->plugin_url;
		//	}
		//	return $this->plugin_url = untrailingslashit( plugins_url( '/', __FILE__ ) );
			
			/* This for Theme include */
			return get_template_directory_uri() . '/framework/plugins/cuckoothemes-shortcodes/';
		}
		
		
		
	}
	/**
	 * Init CuckooShortcode class
	 */
	$GLOBALS['cuckooshortcode'] = new CuckooShortcode();

} // class_exists check

include_once( 'shortcodes.php' );
?>