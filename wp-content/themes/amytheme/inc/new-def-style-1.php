<?php
/*
* Theme Name: AMY Theme - Creative Multi-Purpose WordPress Theme
* Theme Author: Andrey Boyadzhiev - http://themes.cray.bg
*
* Version: 1.0 
*/
?>
<?php
global $ab_amy_settings, $product, $as_hfx, $ab_tf_post_custom_url;
$linktofull = '...';
if(has_post_thumbnail()){
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 340,450, ), true );
$srcf = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', true );
}else{
	$src[0] = get_template_directory_uri().'/images/empty.png';
	$srcf[0] =get_template_directory_uri().'/images/empty.png';
}
if($ab_amy_settings['amy-slider-hoverfx'] == 'newstyle1'){
	$fxclass = 'effect-sadie';
}else if($ab_amy_settings['amy-slider-hoverfx'] == 'newstyle2'){
	$fxclass = 'effect-ruby';
}else{
	$fxclass = 'effect-dexter';
}?>


<figure class="<?php echo $fxclass;?>">

					<img src="<?php echo $src[0]; ?>" class="clean-img"/> 
					<figcaption><?php 
			if(apply_filters ('the_title', get_the_title()) !='') {?>
				<h2 class="content-title" ><a href="<?php if($ab_tf_post_custom_url !=''){echo $ab_tf_post_custom_url;}else{ the_permalink(); }?>"><?php the_title(); ?></a></h2><?php
			};?>
            	  <div class="hideifneed"><p><?php
				if(get_the_excerpt() !="" && get_the_excerpt() !=" " ){
					echo substr( get_the_excerpt(),0,$ab_amy_settings['amy-slider-excerpt']).$linktofull.' <br><br>';
					?>
						<a href="<?php if($ab_tf_post_custom_url !=''){echo $ab_tf_post_custom_url;}else{ the_permalink(); }?>">
						<strong><?php echo $ab_amy_settings['tr-slider-readmore'];?></strong></a>
            
				</p><?php
                }?>
              
                </div>
					</figcaption>			
				</figure>
