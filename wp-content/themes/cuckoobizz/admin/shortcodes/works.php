<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* URL http://cuckoothemes.com
 * Create 2013.09.02
**************
*
*
*
** Name file : All Works shortcodes
*/

class cuckoo_works_shortcodes {

	var $atts;
	
	public function __construct(){
	
		/* Single Work shortcode */
		add_shortcode( 'works', array(&$this, 'works') );
		/* Works by Types shortcode */
		add_shortcode( 'works-type', array(&$this, 'works_by_types') );		
		/* Works Slider shortcode */
		add_shortcode( 'works-slider', array(&$this, 'works_slider') );
		/* Works by Types SlideShow shortcode */
		add_shortcode( 'works-type-slider', array(&$this, 'works_slider_type') );		
		/* Single Work SlideShow gallery shortcode */
		add_shortcode( 'work-slider', array(&$this, 'work_slider') );
	}
	
	private function inc($count){
		
		switch($count){
			case 1 :
				$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
				$count = $cuckoo_style['worksThumbHover'];
			break;
		}
		
		return $count;
	}
	
	public function works( $atts ){
		
		extract(shortcode_atts(array(
			'ids'   => '',
		), $atts));

		$args_works =  array(
		'posts_per_page'    => '-1',
		'post__in' 			=> explode(",", $ids),
		'post_type' 		=> 'works',
		'orderby' 			=> 'post__in'
		);
		query_posts($args_works);
		
		if ( have_posts() ):
			$output .= '<div class="single-work-shortcode clearfix">';
			while ( have_posts() ) : the_post();
				$work_id = get_the_ID();
				$post_categories = wp_get_object_terms( $work_id, "types" );
				$id = str_replace(',', '', $ids);
				$idElement = str_replace(' ', '', $id);
				$cats ='element-shortcode-'.$idElement.' ';
				
				foreach($post_categories as $cat) {
					$cats .= $cat->slug.' ';
				}
				$output .='<a class="'.$cats.' work-item-240" href="'.get_permalink().'" title="'.cuckoo_max_trim(the_title('', '', false), 70).'">';
					if ( has_post_thumbnail() ) :
						$output .=	get_the_post_thumbnail($work_id, '240-size');
					else :
						$output .='<div class="no-thumbnail-225"></div>';
					endif;
					
					$output .='<div class="work-info">';
						$output .='<div class="work-contur">';
							$output .='<div class="single-container">';
								$output .='<div class="cells">';
								$output .='<h4 class="work-thumb-title">'.cuckoo_max_trim(the_title('', '', false), 70).'</h4>';
								$categories = wp_get_object_terms( $work_id, "types" );
								$ca ="";
								foreach($categories as $c) {
									$ca .= '<span class="work-type">'. $c->name .'</span>';
								}
								$output .= $ca;
								$output .='</div>';
								$output .='<span class="item-background"></span>';
							$output .='</div>';
						$output .='</div>'; 
					$output .='</div>';
					$output .='<div class="border-img"></div>';
				$output .='</a>';
			endwhile;
			$output .='<script type="text/javascript">';
			$output .='jQuery(document).ready(function($){';
			$output .="$('.single-work-shortcode a.element-shortcode-".$idElement." div.work-info').each( function() { $(this).hoverdir(); } );";
			$output .="var a = $('.single-work-shortcode a.element-shortcode-".$idElement."').find('img');";
			$output .="$('body').cuckoobizz('blackWhiteEffectsUse', a, '".$this->inc(1)."');";
			$output .='});';
			$output .='</script>';
			$output .='</div>';
		endif;
		wp_reset_query();
		
		return $output;
	}	
	
	public function works_by_types( $atts ){
		
		extract(shortcode_atts(array(
			'type'   => '',
		), $atts));
		
		$term = get_term_by('name', $type ,'types');
		$args_works =  array(
		'posts_per_page'    => '-1',
		'types' 			=> $term->slug,
		'post_type' 		=> 'works',
		);
		query_posts($args_works);
		
		if ( have_posts() ):
			$output .= '<div class="works-by-types-shortcode clearfix">';
			while ( have_posts() ) : the_post();
				$work_id = get_the_ID();
				$post_categories = wp_get_object_terms( $work_id, "types" );
				$id = str_replace(',', '', $type);
				$idElement = str_replace(' ', '', $id);
				$cats ='element-shortcode-'.$idElement.' ';
				
				foreach($post_categories as $cat) {
					$cats .= $cat->slug.' ';
				}
				$output .='<a class="'.$cats.' work-item-240" href="'.get_permalink().'" title="'.cuckoo_max_trim(the_title('', '', false), 70).'">';
					if ( has_post_thumbnail() ) :
						$output .=	get_the_post_thumbnail($work_id, '240-size');
					else :
						$output .='<div class="no-thumbnail-225"></div>';
					endif;
					
					$output .='<div class="work-info">';
						$output .='<div class="work-contur">';
							$output .='<div class="single-container">';
								$output .='<div class="cells">';
								$output .='<h4 class="work-thumb-title">'.cuckoo_max_trim(the_title('', '', false), 70).'</h4>';
								$categories = wp_get_object_terms( $work_id, "types" );
								$ca ="";
								foreach($categories as $c) {
									$ca .= '<span class="work-type">'. $c->name .'</span>';
								}
								$output .= $ca;
								$output .='</div>';
								$output .='<span class="item-background"></span>';
							$output .='</div>';
						$output .='</div>'; 
					$output .='</div>';
				$output .='</a>';
			endwhile;
			$output .='<script type="text/javascript">';
			$output .='jQuery(document).ready(function($){';
			$output .="$('.works-by-types-shortcode a.element-shortcode-".$idElement." div.work-info').each( function() { $(this).hoverdir(); } );";
			$output .="var a = $('.works-by-types-shortcode a.element-shortcode-".$idElement."').find('img');";
			$output .="$('body').cuckoobizz('blackWhiteEffectsUse', a, '".$this->inc(1)."');";
			$output .='});';
			$output .='</script>';
			$output .='</div>';
		endif;
		wp_reset_query();
		
		return $output;
	}
	
	public function works_slider( $atts ){
	
		extract(shortcode_atts(array(
			'workids'    	=> '',
			'id'   			=> '1',
			'link'   		=> 'false',
			'controlnav' 	=> 'false',
			'align' 		=> 'center',
			'directionnav' 	=> 'false',
			'pausetime' 	=> '6000',
			'effect' 		=> 'random',
			'title' 		=> 'true'
		), $atts));
		
		$args_works =  array(
		'posts_per_page'    => '-1',
		'post__in' 			=> explode(",", $workids),
		'post_type' 		=> 'works',
		'orderby' 			=> 'post__in'
		);
		query_posts($args_works);
		
		if ( have_posts() ):
			$idhard = str_replace(',', '', $workids);
			$idElement = str_replace(' ', '', $idhard);
			$output .= '[slide id="'.$id.$idElement.'" controlnav="'.$controlnav.'" align="'.$align.'" directionnav="'.$directionnav.'" pausetime="'.$pausetime.'" effect="'.$effect.'"]';
			while ( have_posts() ) : the_post();
				if ( has_post_thumbnail() ) :
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'work-gallery', true);
					$titileCaption = $link == 'true' ? "<a class='slide-link' href='".get_permalink()."'>".the_title('', '', false)."</a>" : the_title('', '', false);
					$tst = $title == 'true' ? 'title="'.$titileCaption.'"' : '';
					$output .= '[slideimg '.$tst.' url="'.$image_url[0].'" imgtitle="'.the_title('', '', false).'"]';
				endif;
			endwhile;
			$output .= '[/slide]';
		endif;
		
		wp_reset_query();
		
		return do_shortcode($output);
	}	
	
	public function works_slider_type( $atts ){
	
		extract(shortcode_atts(array(
			'type'    	=> '',
			'id'   			=> '1',
			'link'   		=> 'false',
			'controlnav' 	=> 'false',
			'align' 		=> 'center',
			'directionnav' 	=> 'false',
			'pausetime' 	=> '6000',
			'effect' 		=> 'random',
			'title' 		=> 'true'
		), $atts));
		
		$term = get_term_by('name', $type ,'types');
		$args_works =  array(
		'posts_per_page'    => '-1',
		'types' 			=> $term->slug,
		'post_type' 		=> 'works',
		);
		query_posts($args_works);
		
		if ( have_posts() ):
			$idhard = str_replace(',', '', $type);
			$idElement = str_replace(' ', '', $idhard);
			$output .= '[slide id="short-by-type-'.$id.$idElement.'" controlnav="'.$controlnav.'" align="'.$align.'" directionnav="'.$directionnav.'" pausetime="'.$pausetime.'" effect="'.$effect.'"]';
			while ( have_posts() ) : the_post();
				if ( has_post_thumbnail() ) :
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'work-gallery', true);
					$titileCaption = $link == 'true' ? "<a class='slide-link' href='".get_permalink()."'>".the_title('', '', false)."</a>" : the_title('', '', false);
					$tst = $title == 'true' ? 'title="'.$titileCaption.'"' : '';
					$output .= '[slideimg '.$tst.' url="'.$image_url[0].'" imgtitle="'.the_title('', '', false).'"]';
				endif;
			endwhile;
			$output .= '[/slide]';
		endif;
		
		wp_reset_query();
		
		return do_shortcode($output);
	}
	
	public function work_slider( $atts ){
	
		extract(shortcode_atts(array(
			'workid'    	=> '',
			'id'   			=> '1',
			'controlnav' 	=> 'false',
			'align' 		=> 'center',
			'directionnav' 	=> 'false',
			'pausetime' 	=> '6000',
			'effect' 		=> 'random'
		), $atts));
		
		$args_works =  array(
		'posts_per_page'    => '1',
		'page_id' 			=> $workid,
		'post_type' 		=> 'works',
		);
		query_posts($args_works);
		
		if ( have_posts() ):
			$idhard = str_replace(',', '', $workid);
			$idElement = str_replace(' ', '', $idhard);
			$output .= '[slide id="single-work-gallery-'.$id.$idElement.'" controlnav="'.$controlnav.'" align="'.$align.'" directionnav="'.$directionnav.'" pausetime="'.$pausetime.'" effect="'.$effect.'"]';
			while ( have_posts() ) : the_post();
				for( $i = 1; $i <= 10; $i++ ) {
					$images_url = cuckoo_get_post_meta(get_the_ID(), "_upload_image".$i);
					$images_text = cuckoo_get_post_meta(get_the_ID(), "_upload_text".$i);
					$text = ( $images_text == "Add Title" ) ? "" : $images_text;
					$url = ( $images_url == "Image URL" ) ? "" : $images_url;
					if( $url != null ) :
						$getUrlImg = cuckoo_get_attachment_all_size($url , 'work-gallery');
						$output .= '[slideimg url="'.$getUrlImg.'" imgtitle="'.$text.'"]';
					endif;	
				}
			endwhile;
			$output .= '[/slide]';
		endif;
		
		wp_reset_query();
		
		return do_shortcode($output);
	}
}

$cuckoo_works_shortcodes = new cuckoo_works_shortcodes();
?>