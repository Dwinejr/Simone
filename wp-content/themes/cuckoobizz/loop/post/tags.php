<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
**************
*
*
*
** Name: Post Tag
*/

$posttags = get_the_tags();
$seperator = ' / ';
$output = "" ;
if(!empty($posttags)): ?>
	<section id="post-tags" class="post-tags-desc screen-large">
		<div class="tags-logo" title="<?php _e('Tags', 'cuckoothemes'); ?>"></div>
		<div class="post-tags-list">
		<?php if ($posttags) :
				foreach($posttags as $tag) : 
					$output .= '<a class="tags_post" href="'. get_tag_link($tag->term_id). '">'. $tag->name .'</a>'. $seperator ;
				endforeach;
			echo trim($output, $seperator);
		endif; ?>
		</div>
	</section>
<?php endif; ?>