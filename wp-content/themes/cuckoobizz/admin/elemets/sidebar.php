<?php

// widget register
function cuckoo_widgets_init() {

	// Area 1, located in the left position. Empty by default.
	register_sidebar( array(
		'name' => __( 'Main Sidebar', THEMENAME ),
		'id' => 'main-sidebar-area',
		'description' => '',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	$sidebarsss = get_option( THEMEPREFIX . "_sidebars_settings");
	foreach($sidebarsss['sidebars_elements'] as $keys=>$value) :
		if( $value != null ) :
			register_sidebar( array(
				'name' => $value,
				'id' => 'cuckoo-custom-sidebar-'. make_ID_in_text($value),
				'description' => '',
				'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				'after_widget' => '</li>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
				'type' => 'sidebar'
			) );
		endif;
	endforeach;
}
/** Register sidebars by running cuckoo_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'cuckoo_widgets_init' );

/* disable widgest */
function disable_all_widgets( $sidebars_widgets ) {

$sidebarsss = get_option( THEMEPREFIX . "_sidebars_settings");

foreach($sidebarsss['delete_sidebars'] as $keys=>$value) :
	if( $value != null ) :
		$sidebars_widgets['cuckoo-custom-sidebar-'. make_ID_in_text($value)] = false;
	endif;
endforeach;

return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'disable_all_widgets' );


//sidebar position settings
function cuckoo_sidebar_position()
{
	if( ! is_active_sidebar( 'main-sidebar-area' )) :
		echo $string = '<div id="main_conteiner">';
	else :
		echo $string = '<div id="main_conteiner" style="float:left; width:630px;">';
	endif;
	return;
}
//static sidebar position
function cuckoo_static_sidebar_position()
{
	$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
	$position = ( $sidebar['global_position'] == "left" ? 'sidebar-left-active' : 'sidebar-right-active' );
	echo $string = '<div id="main_conteiner" class="sidebar-show '.$position.'">';
	return;
}
/*
** Sidebar settings
*/
function cuckoo_sidebar()
{
	global $post;
	$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
	$names = wp_get_object_terms($post->ID, 'sidebar');
	$blog = $sidebar['blog_sidebar'];
	$other_page = $sidebar['other_sidebar'];
	$search_page = $sidebar['search_sidebar'];
	$works = $sidebar['works_sidebar'];
	$custom_name_get = "";
	if(!empty($names)) :
	  if(!is_wp_error( $names )) :
		foreach($names as $term) :
			$custom_name_get = $term->name ;	
		endforeach;
	  endif;
	endif;
	$custom_sidebar = ( $custom_name_get == null ? "Main Sidebar" : $custom_name_get );
	/**  Sidebar settings for search & archive **/
	if(is_search()) :
		switch( $search_page ) {
			case "Main Sidebar" :
				cuckoo_get_sidebar_all( $search_page );
				break;
			case "No Sidebar" :
				no_sidebar_content();
				break;
			default:
				cuckoo_get_sidebar_all( $search_page );
			break;
		}
	elseif( is_singular("works") or 
	is_tax( 'types' ) or
	is_page_template('template-portfolio-1columns.php') or 
	is_page_template('template-portfolio-2columns.php') or 
	is_page_template('template-portfolio-3columns.php') or 
	is_page_template('template-portfolio-by-type-1-columns.php') or 
	is_page_template('template-portfolio-by-type-2-columns.php') or 
	is_page_template('template-portfolio-by-type-3-columns.php') ) :
			if($custom_sidebar != "No Sidebar") :
				switch( $works ) {
					case "Main Sidebar" :
						if( $custom_sidebar == "Main Sidebar" ):
							cuckoo_get_sidebar_all( $works );
						else :
							cuckoo_get_sidebar_all( $custom_sidebar );
						endif;
					break;
					case "No Sidebar" :
						no_sidebar_content();
					break;
					default:
						if( $custom_sidebar == "Main Sidebar" ):
							cuckoo_get_sidebar_all( $works );
						else :
							cuckoo_get_sidebar_all( $custom_sidebar );
						endif;
					break;
				}
			else :
				no_sidebar_content();
			endif;
		/**  Sidebar settings for other pages  **/
	elseif( is_page_template('default') or 
	is_page_template('template-contact.php') or
	is_page_template('template-testimonial.php') ) :
			if($custom_sidebar != "No Sidebar") :
				switch( $other_page ) {
					case "Main Sidebar" :
						if( $custom_sidebar == "Main Sidebar" ):
							cuckoo_get_sidebar_all( $other_page );
						else :
							cuckoo_get_sidebar_all( $custom_sidebar );
						endif;
					break;
					case "No Sidebar" :
						no_sidebar_content();
					break;
					default:
						if( $custom_sidebar == "Main Sidebar" ):
							cuckoo_get_sidebar_all( $other_page );
						else :
							cuckoo_get_sidebar_all( $custom_sidebar );
						endif;
					break;
				}
			else :
				no_sidebar_content();
			endif;
	/**  Sidebar settings for Blog's  **/
	elseif( is_singular() or 
	is_home() or 
	is_archive() or 
	is_day() or 
	is_month() or 
	is_year() or 
	is_page_template('template-archives.php') or 
	is_page_template('template-blog.php')  ) :
		if(!is_home()) :
			if($custom_sidebar != "No Sidebar") :
				switch( $blog ) {
					case "Main Sidebar" :
						if( $custom_sidebar == "Main Sidebar" ):
							cuckoo_get_sidebar_all( $blog );
						else :
							cuckoo_get_sidebar_all( $custom_sidebar );
						endif;
					break;
					case "No Sidebar" :
						no_sidebar_content();
					break;
					default:
						if( $custom_sidebar == "Main Sidebar" ):
							cuckoo_get_sidebar_all( $blog );
						else :
							cuckoo_get_sidebar_all( $custom_sidebar );
						endif;
					break;
				}
			else :
				no_sidebar_content();
			endif;
		else :
			switch( $blog ) {
				case "Main Sidebar" :
					cuckoo_get_sidebar_all( $blog );
					break;
				case "No Sidebar" :
					no_sidebar_content();
					break;
				default:
					cuckoo_get_sidebar_all( $blog );
					break;
			}
		endif;
	endif;
}

function no_sidebar_content()
{ 
	if(current_user_can('manage_options')):
	?>
	</div>
		<div id="sidebars_conteiner_left">
			<div class="no_sidebars_content">
				<?php _e("Sidebars is disabled for this group of pages. Please check your Sidebar Settings." , THEMENAME); ?>
			</div>
		</div>
	<?php
	endif;
}

/** settings sidebar **/
function cuckoo_get_sidebar_all( $custom )
{
	if( $custom == "Main Sidebar" ) :
	?>
		</div>
			<div id="sidebars_conteiner_left">
				<?php if ( is_active_sidebar( 'main-sidebar-area' ) ) : ?>
					<ul class="bars_left">
						<?php dynamic_sidebar( 'main-sidebar-area' ); ?>
					</ul>
				<?php endif; ?>
			</div>
	<?php else : ?>
		</div>
			<div id="sidebars_conteiner_left">
				<?php if ( is_active_sidebar( 'cuckoo-custom-sidebar-'. make_ID_in_text($custom) ) ) : ?>
					<ul class="bars_left">
						<?php dynamic_sidebar( 'cuckoo-custom-sidebar-'. make_ID_in_text($custom) ); ?>
					</ul>
				<?php endif; ?>
			</div>
	<?php endif; ?>
<?php	
}

function cuckoo_term_sidebar_insert( $update, $insert, $delete )
{
/** update term **/
foreach($update as $k => $v) :
	if( $v != null ) :
		$id = get_term_by('name', $v , 'sidebar');
		wp_update_term( $id->term_id , 'sidebar');
	endif;
endforeach;

/** insert term **/
foreach($insert as $k => $v) :
	if( $v != null ) :
		wp_insert_term( $v , 'sidebar');
	endif;
endforeach;

/** delete term **/
foreach($delete as $k => $v) :
	if( $v != null ) :
		$id = get_term_by('name', $v , 'sidebar');
		wp_delete_term( $id->term_id , 'sidebar');
	endif;
endforeach;

}
?>