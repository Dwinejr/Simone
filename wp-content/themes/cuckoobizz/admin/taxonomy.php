<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 **************/

############################ Work ############################
$taxonomy = array(
	"type" 			=> "types",
	"name" 			=> "Types",
	"singular_name" => "Type",
	"slug" 			=> "types",
	"post_type"		=> "works"
);

$labels = array(
	'name' => _x( $taxonomy['name'], 'taxonomy general name' ),
	'singular_name' => _x( $taxonomy['singular_name'], 'taxonomy singular name' ),
	'search_items' =>  'Search '.$taxonomy['name'],
	'popular_items' => 'Popular '.$taxonomy['name'],
	'all_items' => 'All '.$taxonomy['name'],
	'parent_item' => null,
	'parent_item_colon' => null,
	'edit_item' => 'Edit '.$taxonomy['singular_name'] , 
	'update_item' => 'Update '.$taxonomy['singular_name'] ,
	'add_new_item' => 'Add New '.$taxonomy['singular_name'] ,
	'new_item_name' => 'New '.$taxonomy['singular_name'].' Name' ,
	'separate_items_with_commas' => 'Separate '.strtolower($taxonomy['name']).' with commas',
	'add_or_remove_items' => 'Add or remove '.strtolower($taxonomy['name']),
	'choose_from_most_used' => 'Choose from the most used '.strtolower($taxonomy['name']) ,
	'menu_name' => $taxonomy['name']
); 

if (!taxonomy_exists($taxonomy['type'])) {
	register_taxonomy($taxonomy['type'], $taxonomy['post_type'], array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => $taxonomy['slug'] )
	));
	wp_insert_term('Types', 'types',   array( 'description'=> 'This type is a part of the theme system. Do not delete this type.' , 'slug' => 'type'));
}


######################### Team ##########################
$taxonomyTeam = array(
	"type" 			=> "team-categories",
	"name" 			=> "Categories",
	"singular_name" => "Categories",
	"slug" 			=> "team-categories",
	"post_type"		=> "team"
);

$labelsTeam = array(
	'name' => _x( $taxonomyTeam['name'], 'taxonomy general name' ),
	'singular_name' => _x( $taxonomyTeam['singular_name'], 'taxonomy singular name' ),
	'search_items' =>  'Search '.$taxonomyTeam['name'],
	'popular_items' => 'Popular '.$taxonomyTeam['name'],
	'all_items' => 'All '.$taxonomyTeam['name'],
	'parent_item' => null,
	'parent_item_colon' => null,
	'edit_item' => 'Edit '.$taxonomyTeam['singular_name'] , 
	'update_item' => 'Update '.$taxonomyTeam['singular_name'] ,
	'add_new_item' => 'Add New '.$taxonomyTeam['singular_name'] ,
	'new_item_name' => 'New '.$taxonomyTeam['singular_name'].' Name' ,
	'separate_items_with_commas' => 'Separate '.strtolower($taxonomyTeam['name']).' with commas',
	'add_or_remove_items' => 'Add or remove '.strtolower($taxonomyTeam['name']),
	'choose_from_most_used' => 'Choose from the most used '.strtolower($taxonomyTeam['name']) ,
	'menu_name' => $taxonomyTeam['name']
); 

if (!taxonomy_exists($taxonomyTeam['type'])) {
	register_taxonomy($taxonomyTeam['type'], $taxonomyTeam['post_type'], array(
		'hierarchical' => true,
		'labels' => $labelsTeam,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => $taxonomyTeam['slug'] )
	));
}

?>