<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
**************
*
*
*
** Name: Work Images or Video's position
*/
$getURL = "";
$video = cuckoo_get_post_meta(get_the_ID(), "_work_video");
$comments_count = wp_count_comments(get_the_ID());

for( $i = 1; $i <= 10; $i++ )
{
	$images_url = cuckoo_get_post_meta(get_the_ID(), "_upload_image".$i);
	$url = ( $images_url == "Image URL" ) ? "" : $images_url;
	if( $url != null ) : 
		$getURL .= $url;
	endif;	
}

if($getURL) :
	
	/* Nivo slideshow template */
	get_template_part( 'loop/work/gallery' ); 

elseif($video) :

	/* Video template */
	get_template_part( 'loop/work/video' );
	
else : ?>

	<div class="no-image-line screen-large"></div>

<?php endif;

	/* Comments, Social template */
	get_template_part( 'loop/total/comments-social-block' );
?>
