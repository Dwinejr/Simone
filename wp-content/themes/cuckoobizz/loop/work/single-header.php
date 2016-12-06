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
** Name: Single Work Header
*/
$previous = get_previous_post();
$next = get_next_post();
$titleNext = $next == "" ? "" : $next->post_title;
$titlePrew = $previous == "" ? "" : $previous->post_title;
$getURL = "";
$video = cuckoo_get_post_meta(get_the_ID(), "_work_video");
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
$subtitle = cuckoo_get_post_meta(get_the_ID(), "-subtitle-meta-box");
$slider = cuckoo_get_post_meta(get_the_ID(), "-slider-meta-box");

for( $i = 1; $i <= 10; $i++ )
{
	$images_url = cuckoo_get_post_meta(get_the_ID(), "_upload_image".$i);
	$url = ( $images_url == "Image URL" ) ? "" : $images_url;
	if( $url != null ) : 
		$getURL .= $url;
	endif;	
}

$categories = wp_get_object_terms( get_the_ID() , "types" );
$ca ="";
foreach($categories as $c) {
	$ca .= '<a title="'. $c->name .'" class="type-list-works" href="'.get_term_link($c->slug, 'types').'" >'. $c->name .'</a>';
}
?>

<header id="item-header" class="single-post-header">
	<div id="header-position" class="screen-large<?php if(!empty($slider[0])) : echo ' header-with-slider'; endif; ?>">
		<h1><?php the_title(); ?></h1>
		<div class="item-info-block">
			<h3><?php echo $subtitle; ?></h3>
		</div>
		<?php previous_post_link('%link', _x('<div class="prev-post-img" title="'.$titlePrew.'"></div>','', 'cuckoothemes')); ?>
		<?php next_post_link('%link', _x('<div class="next-post-img" title="'.$titleNext.'"></div>','', 'cuckoothemes')); ?>
	</div>
</header>
<?php if($ca != null): ?>
	<div class="works-types screen-large"><?php echo $ca; ?></div>
<?php endif; ?>