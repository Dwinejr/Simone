<?php

/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/

$data = array(
	"type" 			=> "works",
	"name" 			=> "Works",
	"singular_name" => "Work",
	"slug" 			=> "works"
);

/*
 * Post metabox (if any)
 */
$metabox = array(
	__("Project Content", 'cuckoothemes') => array(
		"position" => "normal",
		"fields" => array(
			array ( 
				"name" => "Add Images",
				"desc" => "You can add up to 10 images in the following sequence. All Images will be displayed in internal project gallery.",
				"key" => "_only_text_about_images",
				"type" => "text_only",
				"std" => ""
			),
			// ten images settings
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_text1",
				"type" => "image_text_left",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_image1",
				"type" => "image_left",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_text2",
				"type" => "image_text_right",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_image2",
				"type" => "image_right",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_text3",
				"type" => "image_text_left",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_image3",
				"type" => "image_left",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_text4",
				"type" => "image_text_right",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_image4",
				"type" => "image_right",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_text5",
				"type" => "image_text_left",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_image5",
				"type" => "image_left",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_text6",
				"type" => "image_text_right",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_image6",
				"type" => "image_right",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_text7",
				"type" => "image_text_left",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_image7",
				"type" => "image_left",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_text8",
				"type" => "image_text_right",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_image8",
				"type" => "image_right",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_text9",
				"type" => "image_text_left",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_image9",
				"type" => "image_left",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_text10",
				"type" => "image_text_right",
				"std" => ""
			),
			array ( 
				"name" => "",
				"desc" => "",
				"key" => "_upload_image10",
				"type" => "image_right",
				"std" => ""
			),
			array ( 
				"name" => "Add Video",
				"desc" => "If your project contains video, enter Youtube or Vimeo video URL here. Video Unit will remove Image Unit or Images Gallery.",
				"key" => "_work_video",
				"type" => "video",
				"std" => ""
			)
		)
	)
);

/*
 * Labels + post type definition
 */
$args = array(
	'menu_position' => 30,
	'supports' => array('title', 
	'editor', 
	'thumbnail', 
	'page-attributes', 
	'author',
	'comments'
	)
);

/*
 * Post type registration
 */
$post_type = new CustomPost($data, $args ,$metabox);
?>
