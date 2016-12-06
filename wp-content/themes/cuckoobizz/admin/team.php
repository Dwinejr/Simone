<?php

/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/

$data = array(
	"type" 			=> "team",
	"name" 			=> "Team",
	"singular_name" => "Team Member",
	"slug" 			=> "team"
);

/*
 * Post metabox (if any)
 */
$metabox = array(
	__("Team Member Details", 'cuckoothemes') => array(
		"position" => "normal",
		"fields" => array(
			array (
				"name" 	=> "Member's Name",
				"desc" 	=> "Enter Team Member's name.",
				"key" 	=> "_team-member-name",
				"type" 	=> "team-member"
			),
			array (
				"name" => "Member's Occupation",
				"desc" => "Enter Team Member's occupation.",
				"key" => "_team-member-occupation",
				"type" => "team-member",
				"class" => "last"
			),
			array (
				"name" => "Add Team Member's Thumbnail",
				"desc" => "Recommended image size is 225 x 225 pixels. Larger or smaller images will be resized.",
				"key" => "_upload_image1",
				"type" => "team-image"
			),
			array(
				"name" => "Description",
				"desc" => "Enter a brief Team Member description. It will be displayed in a Homepage Team Unit and in a Team Page Template.",
				"key" => "_member-desc",
				"type" => "member-desc"
			),
			array(
				"name" => "Add Social Media",
				"type" => "title"
			),
			array(
				"name" => "Facebook",
				"desc" => "Enter Facebook URL.",
				"key" => "_social-facebook",
				"type" => "member-social"
			),
			array(
				"name" => "Twitter",
				"desc" => "Enter Twitter URL.",
				"key" => "_social-twitter",
				"type" => "member-social"
			),
			array(
				"name" => "Google+",
				"desc" => "Enter Google+ URL.",
				"key" => "_social-google",
				"type" => "member-social"
			),
			array(
				"name" => "Flickr",
				"desc" => "Enter Flickr URL.",
				"key" => "_social-flickr",
				"type" => "member-social"
			),array(
				"name" => "Instagram",
				"desc" => "Enter Instagram URL.",
				"key" => "_social-instagram",
				"type" => "member-social"
			),
			array(
				"name" => "Pinterest",
				"desc" => "Enter Pinterest URL.",
				"key" => "_social-pinterest",
				"type" => "member-social"
			),
			array(
				"name" => "Dribble",
				"desc" => "Enter Dribble URL.",
				"key" => "_social-dribble",
				"type" => "member-social"
			),
			array(
				"name" => "Behance",
				"desc" => "Enter Behance URL.",
				"key" => "_social-behance",
				"type" => "member-social"
			),
			array(
				"name" => "YouTube",
				"desc" => "Enter YouTube URL.",
				"key" => "_social-youtube",
				"type" => "member-social"
			),
			array(
				"name" => "Vimeo",
				"desc" => "Enter Vimeo URL.",
				"key" => "_social-vimeo",
				"type" => "member-social"
			),
			array(
				"name" => "Linkedin",
				"desc" => "Enter Linkedin URL.",
				"key" => "_social-linkedin",
				"type" => "member-social"
			),
			array(
				"name" => "Email",
				"desc" => "Enter contact Email Address.",
				"key" => "_social-email",
				"type" => "member-social"
			),
			array(
				"name" => "RSS",
				"desc" => "Enter the RSS feed URL.",
				"key" => "_social-rss",
				"type" => "member-social"
			)
		)
	)
);

/*
 * Labels + post type definition
 */
$args = array(
	'menu_position' => 35,
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