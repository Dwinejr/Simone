<?php

/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/

$data = array(
	"type" 			=> "testimonials",
	"name" 			=> "Testimonials",
	"singular_name" => "Testimonial",
	"slug" 			=> "testimonials"
);

/*
 * Post metabox (if any)
 */
$metabox = array(
	__("Testimonial Author", 'cuckoothemes') => array(
		"position" => "normal",
		"fields" => array(
			array ( 
				"name" => "Company",
				"desc" => "",
				"key" => "_company",
				"type" => "testimonials_input",
				"std" => ""
			)
		)
	),	
	__("Testimonial Details", 'cuckoothemes') => array(
		"position" => "normal",
		"fields" => array(
			array ( 
				"name" => "Details",
				"desc" => "",
				"key" => "_details",
				"type" => "testimonials_input",
				"std" => ""
			)
		)
	),	
	__("Add Image", 'cuckoothemes') => array(
		"position" => "normal",
		"fields" => array(
			array ( 
				"name" => "header block",
				"desc" => "Add any image to your testimonial. The recommended image size is 225x225<br /> pixels. Larger images will be resized automatically.",
				"key" => "_testimonial_image",
				"type" => "first-section-testimonial",
				"std" => ""
			),
			array ( 
				"name" => "Title input",
				"desc" => "Title",
				"key" => "_testimonial_image_title",
				"type" => "inputs-section-testimonial",
				"std" => ""
			),			
			array ( 
				"name" => "Url input",
				"desc" => "URL",
				"key" => "_testimonial_url_site",
				"type" => "inputs-section-testimonial",
				"std" => ""
			),			
			array ( 
				"name" => "Image Url input",
				"desc" => "Image URL",
				"key" => "_testimonial_image_url",
				"type" => "inputs-section-testimonial-url",
				"std" => "",
				"class" => "upload_input"
			)
		)
	)
);

/*
 * Labels + post type definition
 */
$args = array(
	'menu_position' => 35,
	'supports' => array('title', 'excerpt', 'page-attributes')
);

/*
 * Post type registration
 */
$post_type = new CustomPost($data, $args, $metabox);
?>