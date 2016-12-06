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
 * Testimonials excerpt modification to textarea  */
 
function lead_meta_box() {
    add_meta_box( 'postexcerpt', 'Testimonial', 'post_excerpt_meta_boxs', 'testimonials', 'normal', 'core' );
}
add_action( 'admin_menu', 'lead_meta_box' );

function post_excerpt_meta_boxs($post) {
?>
<label class="screen-reader-text" for="excerpt"><?php _e('Excerpt', 'cuckoothemes') ?></label><textarea rows="5" cols="40" name="excerpt" tabindex="6" style="height:200px; width: 100%;" id="excerpt"><?php echo $post->post_excerpt ?></textarea>
<?php
}

add_filter('post_excerpt_meta_boxs','my_excerpt_box', 1, 2);

function my_excerpt_box($post) { ?>
<label class="screen-reader-text" for="excerpt"><?php _e('Excerpt', 'cuckoothemes') ?></label><textarea rows="5" cols="40" name="excerpt" tabindex="6" style="height:200px; width: 100%;" id="excerpt"><?php echo $post->post_excerpt ?></textarea><?php
}