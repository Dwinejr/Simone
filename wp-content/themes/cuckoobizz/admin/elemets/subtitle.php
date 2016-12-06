<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************
 *
 *
 *
 * Subtitle */
 
 
function subtitleDisplay($post) {
	
	$subtitle = get_post_meta($post->ID, NOTCHANGEELEMENT.'-subtitle-meta-box');
	wp_nonce_field('subtitle-item-'.$post->ID,'subtitle-nonce-field');
	$subtitleVal = ( empty($subtitle) ? "" : $subtitle[0] );
?>
	<input id="subtitle-<?php echo $post->ID; ?>" type="text" class="full-width-input" name="subtitle-item" value="<?php echo $subtitleVal; ?>" />
<?php 
}

function workLayoutSave($post_id) {

	  // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything
  	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
    	return $post_id;
	}
		
	// verify this came from our screen and with proper authorization.
	if ( empty($_POST) || !wp_verify_nonce($_POST['subtitle-nonce-field'], 'subtitle-item-'.$post_id) ){
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
	if (($post->post_type == 'page') or ($post->post_type == 'testimonials') or ($post->post_type == 'works') or ($post->post_type == 'team')) { 
		$work = $_POST['subtitle-item'];
		update_post_meta($post_id, NOTCHANGEELEMENT.'-subtitle-meta-box', $work);
        }
	return $work;
 
}

function workLayoutAddMeta() {
	add_meta_box( NOTCHANGEELEMENT.'-subtitle-meta-box', __('Subtitle', 'cuckoothemes'), 'subtitleDisplay', 'page', 'advanced', 'high');
	add_meta_box( NOTCHANGEELEMENT.'-subtitle-meta-box', __('Subtitle', 'cuckoothemes'), 'subtitleDisplay', 'testimonials', 'advanced', 'high');
	add_meta_box( NOTCHANGEELEMENT.'-subtitle-meta-box', __('Subtitle', 'cuckoothemes'), 'subtitleDisplay', 'works', 'advanced', 'high');
	add_meta_box( NOTCHANGEELEMENT.'-subtitle-meta-box', __('Subtitle', 'cuckoothemes'), 'subtitleDisplay', 'team', 'advanced', 'high');
}

add_action('add_meta_boxes', 'workLayoutAddMeta');
add_action('save_post', 'workLayoutSave');