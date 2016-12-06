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
** Name file : All Team Member shortcodes
*/

class cuckoo_team_member_shortcodes {

	var $atts;
	
	public function __construct(){
	
		/* Single Team member shortcode */
		add_shortcode( 'team-member', array(&$this, 'team_member') );
		/* Team members shortcode */
		add_shortcode( 'team-members', array(&$this, 'team_members') );		
		/* Team members by Categories shortcode */
		add_shortcode( 'team-category', array(&$this, 'team_members_by_categories') );
		/* Team members SlideShow shortcode */
		add_shortcode( 'team-slider', array(&$this, 'slider') );		
		/* Team members SlideShow shortcode */
		add_shortcode( 'team-slider-2', array(&$this, 'members_slider') );		
		/* Team members SlideShow shortcode */
		add_shortcode( 'team-slider-3', array(&$this, 'members_by_cat_slider') );
		
	}


	public function team_member( $atts ){
		
		extract(shortcode_atts(array(
			'id'   			=> '',
			'link' 			=> 'true',
			'description' 	=> 'true',
			'socialmedia' 	=> 'true',
			'title' 		=> 'true',
			'thumbnail' 	=> 'true',
		), $atts));
		
		$topMagin = $link == 'true' ? '' : ' class="team-title-no-link no-thum-team"';
		$idElement = str_replace(' ', '', $id);
		$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
		//$output = '<div class="team-shortcode">';
			$team_args = array(
				'posts_per_page'    => '1',
				'page_id' 			=> $id,
				'post_type' 		=> 'team'
			);
			query_posts($team_args);
							
			if(have_posts()) :
				while ( have_posts() ) : the_post(); 
					$memberDesc = cuckoo_get_post_meta(get_the_ID(), "_member-desc");
					$socialFacebook = cuckoo_get_post_meta(get_the_ID(), "_social-facebook");
					$socialTwitter = cuckoo_get_post_meta(get_the_ID(), "_social-twitter"); 
					$socialGoogle = cuckoo_get_post_meta(get_the_ID(), "_social-google"); 
					$socialFlickr = cuckoo_get_post_meta(get_the_ID(), "_social-flickr"); 
					$socialPinterest = cuckoo_get_post_meta(get_the_ID(), "_social-pinterest"); 
					$socialDribble = cuckoo_get_post_meta(get_the_ID(), "_social-dribble"); 
					$socialInstagram = cuckoo_get_post_meta(get_the_ID(), "_social-instagram");
					$socialBehance = cuckoo_get_post_meta(get_the_ID(), "_social-behance"); 
					$socialYouTube = cuckoo_get_post_meta(get_the_ID(), "_social-youtube"); 
					$socialVimeo = cuckoo_get_post_meta(get_the_ID(), "_social-vimeo"); 
					$socialLinkedin = cuckoo_get_post_meta(get_the_ID(), "_social-linkedin"); 
					$socialEmail = cuckoo_get_post_meta(get_the_ID(), "_social-email"); 
					$socialRss = cuckoo_get_post_meta(get_the_ID(), "_social-rss"); 
					$memberName = cuckoo_get_post_meta(get_the_ID(), "_team-member-name");
					$memberOccupation = cuckoo_get_post_meta(get_the_ID(), "_team-member-occupation");
					$memberImage = cuckoo_get_post_meta(get_the_ID(), "_upload_image1");
					$margin = "";
					if($socialFacebook or $socialTwitter or $socialGoogle or $socialFlickr or $socialPinterest or $socialDribble or 
							$socialBehance or $socialYouTube or $socialVimeo or $socialLinkedin or $socialEmail or $socialRss) :
							$margin = " social-margin";
					endif;
					
					$output .= '<div class="team-member-shortcode">';
					$output .= '<div class="team_header short-team-single-'.$id.$sliderid.'">';
					if( $link == 'true' ):
						if ( $memberImage && $thumbnail == 'true' ) :
							$output .= '<div class="team_thumbnail_template">';
							$output .= '<a class="blog-thumb team-member-link" href="'. get_permalink() .'" title="'. $memberName .'">';
							$output .= '<img width="225" height="225" alt="'. $memberName .'" src="'. cuckoo_get_attachment_all_size($memberImage , 'blog-thumb') .'" />';
							$output .= '</a>';
							$output .= '</div>';
						endif;
						if($title == 'true'):
							$output .= '<div class="member-title">';
							$output .= '<h3'.$topMagin.'><a href="'. get_permalink() .'" title="'. $memberName .'" rel="bookmark">'. $memberName .'</a></h3>';
							$output .= '<div class="member-occupation">'. $memberOccupation .'</div>';
							$output .= '</div>';
						endif;
					else :
						if ( $memberImage && $thumbnail == 'true' ) :
							$output .= '<div class="team_thumbnail_template team-member-link">';
							$output .= '<img width="225" height="225" alt="'. $memberName .'" src="'. cuckoo_get_attachment_all_size($memberImage , 'blog-thumb') .'" />';
							$output .= '</div>';
						endif;
						if($title == 'true'):
							$output .= '<div class="member-title">';
							$output .= '<h3'.$topMagin.'>'. $memberName .'</h3>';
							$output .= '<div class="member-occupation">'. $memberOccupation .'</div>';
							$output .= '</div>';
						endif;
					endif;
					$output .= '</div>';
					$output .= '<div class="team-desc-bottom'. $margin .'">';
						if($socialmedia == 'true') :
							 if($socialFacebook):
								$output .= '<a class="facebook-small" target="_blank" href="'. $socialFacebook .'" title="Facebook"></a>';
							endif; 
							if($socialTwitter):
								$output .= '<a class="twitter-small" target="_blank" href="'. $socialTwitter .'" title="Twitter"></a>';
							endif;									
							if($socialGoogle):
								$output .= '<a class="google-small" target="_blank" href="'. $socialGoogle .'" title="Google+"></a>';
							endif;								
							if($socialFlickr):
								$output .= '<a class="flickr-small" target="_blank" href="'. $socialFlickr .'" title="Flickr"></a>';
							endif;								
							if($socialInstagram):
								$output .= '<a class="instagram-small" target="_blank" href="'. $socialInstagram .'" title="Instagram"></a>';
							endif;
							if($socialPinterest):
								$output .= '<a class="pinterest-small" target="_blank" href="'. $socialPinterest .'" title="Pinterest"></a>';
							endif;								
							if($socialDribble):
								$output .= '<a class="dribble-small" target="_blank" href="'. $socialDribble .'" title="Dribble"></a>';
							endif;								
							if($socialBehance):
								$output .= '<a class="behance-small" target="_blank" href="'. $socialBehance .'" title="Behance"></a>';
							endif;							
							if($socialYouTube):
								$output .= '<a class="youtube-small" target="_blank" href="'. $socialYouTube .'" title="YouTube"></a>';
							endif;								
							if($socialVimeo):
								$output .= '<a class="vimeo-small" target="_blank" href="'. $socialVimeo .'" title="Vimeo"></a>';
							endif;								
							if($socialLinkedin):
								$output .= '<a class="linkendin-small" target="_blank" href="'. $socialLinkedin .'" title="Linkedin"></a>';
							endif;								
							if($socialEmail):
								$output .= '<a class="email-small" href="mailto:'. $socialEmail .'" title="Email"></a>';
							endif;									
							if($socialRss):
								$output .= '<a class="rss-small" target="_blank" href="'. $socialRss .'" title="RSS"></a>';
							endif;
						endif;
						if($description == 'true'):
							$output .= '<div class="team-description">'. $memberDesc .'</div>';
						endif;
					$output .= '</div>';
					$output .= '</div>';
					$last = "";
				endwhile;
			 endif;
		$output .= '<script type="text/javascript">';
		$output .= '	jQuery(document).ready(function($){ ';
		$output .= "		$('body').cuckoobizz('blackWhiteEffectsUse', $('.team_header.short-team-single-".$idElement."').find('img'), '". $cuckoo_style['teamThumbHover'] ."'); ";
		$output .= '	}); ';
		$output .= '</script>';
		//$output .= '</div>';
		wp_reset_query();
		
		return $output;
	}

	public function team_members( $atts ){
		
		extract(shortcode_atts(array(
			'ids'  			=> '',
			'col' 			=> '4',
			'link'			=> 'true',
			'description' 	=> 'true',
			'socialmedia' 	=> 'true',
			'title' 		=> 'true',
			'thumbnail' 	=> 'true',
		), $atts));
		
		$topMagin = $link == 'true' ? '' : ' class="team-title-no-link no-thum-team"';
		$colClass = "";
		$count = 0;
		$id = str_replace(',', '', $ids);
		$id = str_replace(' ', '', $id);
		
		if($col == '4') :
			$colClass = " content-one-fourth";
		elseif($col == '3') :
			$colClass = " content-one-third";
		elseif($col == '2') :
			$colClass = " content-one-half";
		endif; 
		
		$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
		$output = '<div class="team-shortcode-content">';
			$team_args = array(
				'posts_per_page'    => '-1',
				'post__in' 			=> explode(",", $ids),
				'post_type' 		=> 'team',
				'orderby' 			=> 'post__in'
			);
			query_posts($team_args);
							
			if(have_posts()) :
				while ( have_posts() ) : the_post(); 
					$count++;
					$memberDesc = cuckoo_get_post_meta(get_the_ID(), "_member-desc");
					$socialFacebook = cuckoo_get_post_meta(get_the_ID(), "_social-facebook");
					$socialTwitter = cuckoo_get_post_meta(get_the_ID(), "_social-twitter"); 
					$socialGoogle = cuckoo_get_post_meta(get_the_ID(), "_social-google"); 
					$socialFlickr = cuckoo_get_post_meta(get_the_ID(), "_social-flickr"); 
					$socialPinterest = cuckoo_get_post_meta(get_the_ID(), "_social-pinterest"); 
					$socialDribble = cuckoo_get_post_meta(get_the_ID(), "_social-dribble"); 
					$socialInstagram = cuckoo_get_post_meta(get_the_ID(), "_social-instagram");
					$socialBehance = cuckoo_get_post_meta(get_the_ID(), "_social-behance"); 
					$socialYouTube = cuckoo_get_post_meta(get_the_ID(), "_social-youtube"); 
					$socialVimeo = cuckoo_get_post_meta(get_the_ID(), "_social-vimeo"); 
					$socialLinkedin = cuckoo_get_post_meta(get_the_ID(), "_social-linkedin"); 
					$socialEmail = cuckoo_get_post_meta(get_the_ID(), "_social-email"); 
					$socialRss = cuckoo_get_post_meta(get_the_ID(), "_social-rss"); 
					$memberName = cuckoo_get_post_meta(get_the_ID(), "_team-member-name");
					$memberOccupation = cuckoo_get_post_meta(get_the_ID(), "_team-member-occupation");
					$memberImage = cuckoo_get_post_meta(get_the_ID(), "_upload_image1");
					$margin = "";
					if($socialFacebook or $socialTwitter or $socialGoogle or $socialFlickr or $socialPinterest or $socialDribble or 
							$socialBehance or $socialYouTube or $socialVimeo or $socialLinkedin or $socialEmail or $socialRss) :
							$margin = " social-margin";
					endif;
					
					
					if( $col == '4' && $count == 4 ) :
						$last = ' last';
						$count = 0;
					elseif( $col == '3' && $count == 3 ) :
						$last = ' last';
						$count = 0;				
					elseif( $col == '2' && $count == 2 ) :
						$last = ' last';
						$count = 0;
					endif;
					
					
					
					$output .= '<div class="team-member-shortcode'.$colClass.$last.'">';
					$output .= '<div class="team_header short-team-'.$id.'">';
					if( $link == 'true' ):
						if ( $memberImage && $thumbnail == 'true' ) :
							$output .= '<div class="team_thumbnail_template">';
							$output .= '<a class="blog-thumb team-member-link" href="'. get_permalink() .'" title="'. $memberName .'">';
							$output .= '<img width="225" height="225" alt="'. $memberName .'" src="'. cuckoo_get_attachment_all_size($memberImage , 'blog-thumb') .'" />';
							$output .= '</a>';
							$output .= '</div>';
						endif;
						if($title == 'true'):
							$output .= '<div class="member-title">';
							$output .= '<h3'.$topMagin.'><a href="'. get_permalink() .'" title="'. $memberName .'" rel="bookmark">'. $memberName .'</a></h3>';
							$output .= '<div class="member-occupation">'. $memberOccupation .'</div>';
							$output .= '</div>';
						endif;
					else :
						if ( $memberImage && $thumbnail == 'true' ) :
							$output .= '<div class="team_thumbnail_template team-member-link">';
							$output .= '<img width="225" height="225" alt="'. $memberName .'" src="'. cuckoo_get_attachment_all_size($memberImage , 'blog-thumb') .'" />';
							$output .= '</div>';
						endif;
						if($title == 'true'):
							$output .= '<div class="member-title">';
							$output .= '<h3'.$topMagin.'>'. $memberName .'</h3>';
							$output .= '<div class="member-occupation">'. $memberOccupation .'</div>';
							$output .= '</div>';
						endif;
					endif;
					$output .= '</div>';
					$output .= '<div class="team-desc-bottom'. $margin .'">';
						if($socialmedia == 'true') :
							 if($socialFacebook):
								$output .= '<a class="facebook-small" target="_blank" href="'. $socialFacebook .'" title="Facebook"></a>';
							endif; 
							if($socialTwitter):
								$output .= '<a class="twitter-small" target="_blank" href="'. $socialTwitter .'" title="Twitter"></a>';
							endif;									
							if($socialGoogle):
								$output .= '<a class="google-small" target="_blank" href="'. $socialGoogle .'" title="Google+"></a>';
							endif;								
							if($socialFlickr):
								$output .= '<a class="flickr-small" target="_blank" href="'. $socialFlickr .'" title="Flickr"></a>';
							endif;								
							if($socialInstagram):
								$output .= '<a class="instagram-small" target="_blank" href="'. $socialInstagram .'" title="Instagram"></a>';
							endif;
							if($socialPinterest):
								$output .= '<a class="pinterest-small" target="_blank" href="'. $socialPinterest .'" title="Pinterest"></a>';
							endif;								
							if($socialDribble):
								$output .= '<a class="dribble-small" target="_blank" href="'. $socialDribble .'" title="Dribble"></a>';
							endif;								
							if($socialBehance):
								$output .= '<a class="behance-small" target="_blank" href="'. $socialBehance .'" title="Behance"></a>';
							endif;							
							if($socialYouTube):
								$output .= '<a class="youtube-small" target="_blank" href="'. $socialYouTube .'" title="YouTube"></a>';
							endif;								
							if($socialVimeo):
								$output .= '<a class="vimeo-small" target="_blank" href="'. $socialVimeo .'" title="Vimeo"></a>';
							endif;								
							if($socialLinkedin):
								$output .= '<a class="linkendin-small" target="_blank" href="'. $socialLinkedin .'" title="Linkedin"></a>';
							endif;								
							if($socialEmail):
								$output .= '<a class="email-small" href="mailto:'. $socialEmail .'" title="Email"></a>';
							endif;									
							if($socialRss):
								$output .= '<a class="rss-small" target="_blank" href="'. $socialRss .'" title="RSS"></a>';
							endif;
						endif;
						if($description == 'true'):
							$output .= '<div class="team-description">'. $memberDesc .'</div>';
						endif;
					$output .= '</div>';
					$output .= '</div>';
					$last = "";
				endwhile;
			 endif;
		$output .= '<script type="text/javascript">';
		$output .= '	jQuery(document).ready(function($){ ';
		$output .= "		$('body').cuckoobizz('blackWhiteEffectsUse', $('.team_header.short-team-".$id."').find('img'), '". $cuckoo_style['teamThumbHover'] ."'); ";
		$output .= '	}); ';
		$output .= '</script>';
		$output .= '</div>';
		wp_reset_query();
		
		return $output;
	}
	
	public function slider($atts){
		
		extract(shortcode_atts(array(
			'ids'  			=> '',
			'sliderid' 		=> '1',
			'description' 	=> 'true',
			'socialmedia' 	=> 'true',
			'title' 		=> 'true',
			'thumbnail' 	=> 'true',
			'carousel' 		=> '1',
			'effect' 		=> '1',
			'link'			=> 'true'
		), $atts));
		
		$ef = $effect-1;
		$effects = array( 'elementsQuicklyLeft', 'elementOpacity', 'default' );
		$id = str_replace(',', '', $ids);
		$id = str_replace(' ', '', $id);
		$topMagin = $thumbnail != 'true' ? $link == 'true' ? ' class="no-thum-team"' : ' class="team-title-no-link no-thum-team"' : '';
		$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
		$output = '<article id="team-slider-'.$id.$sliderid.'" class="team-srt-content">';
		$output .= '<article class="team-content-shorcode screen-large">';
		$output .= '<ul class="team-wrapper-homepage">';
			$team_args = array(
				'posts_per_page'    => '-1',
				'post__in' 			=> explode(",", $ids),
				'post_type' 		=> 'team',
				'orderby' 			=> 'post__in'
			);
			query_posts($team_args);
							
			if(have_posts()) :
				while ( have_posts() ) : the_post(); 
					$memberDesc = cuckoo_get_post_meta(get_the_ID(), "_member-desc");
					$socialFacebook = cuckoo_get_post_meta(get_the_ID(), "_social-facebook");
					$socialTwitter = cuckoo_get_post_meta(get_the_ID(), "_social-twitter"); 
					$socialGoogle = cuckoo_get_post_meta(get_the_ID(), "_social-google"); 
					$socialFlickr = cuckoo_get_post_meta(get_the_ID(), "_social-flickr"); 
					$socialPinterest = cuckoo_get_post_meta(get_the_ID(), "_social-pinterest"); 
					$socialDribble = cuckoo_get_post_meta(get_the_ID(), "_social-dribble"); 
					$socialInstagram = cuckoo_get_post_meta(get_the_ID(), "_social-instagram");
					$socialBehance = cuckoo_get_post_meta(get_the_ID(), "_social-behance"); 
					$socialYouTube = cuckoo_get_post_meta(get_the_ID(), "_social-youtube"); 
					$socialVimeo = cuckoo_get_post_meta(get_the_ID(), "_social-vimeo"); 
					$socialLinkedin = cuckoo_get_post_meta(get_the_ID(), "_social-linkedin"); 
					$socialEmail = cuckoo_get_post_meta(get_the_ID(), "_social-email"); 
					$socialRss = cuckoo_get_post_meta(get_the_ID(), "_social-rss"); 
					$memberName = cuckoo_get_post_meta(get_the_ID(), "_team-member-name");
					$memberOccupation = cuckoo_get_post_meta(get_the_ID(), "_team-member-occupation");
					$memberImage = cuckoo_get_post_meta(get_the_ID(), "_upload_image1");
					$margin = "";
					if($socialFacebook or $socialTwitter or $socialGoogle or $socialFlickr or $socialPinterest or $socialDribble or 
							$socialBehance or $socialYouTube or $socialVimeo or $socialLinkedin or $socialEmail or $socialRss) :
							$margin = " social-margin";
					endif;
					
					
					$output .= '<li id="team-'.get_the_ID().'" class="team-member-shortcode test-list">';
					$output .= '<div class="team_header short-team-slider-'.$id.$sliderid.'">';
					if( $link == 'true' ):
						if ( $memberImage && $thumbnail == 'true' ) :
							$output .= '<div class="team_thumbnail_template">';
							$output .= '<a class="blog-thumb team-member-link" href="'. get_permalink() .'" title="'. $memberName .'">';
							$output .= '<img width="225" height="225" alt="'. $memberName .'" src="'. cuckoo_get_attachment_all_size($memberImage , 'blog-thumb') .'" />';
							$output .= '</a>';
							$output .= '</div>';
						endif;
						if($title == 'true'):
							$output .= '<div class="member-title">';
							$output .= '<h3'.$topMagin.'><a href="'. get_permalink() .'" title="'. $memberName .'" rel="bookmark">'. $memberName .'</a></h3>';
							$output .= '<div class="member-occupation">'. $memberOccupation .'</div>';
							$output .= '</div>';
						endif;
					else :
						if ( $memberImage && $thumbnail == 'true' ) :
							$output .= '<div class="team_thumbnail_template team-member-link">';
							$output .= '<img width="225" height="225" alt="'. $memberName .'" src="'. cuckoo_get_attachment_all_size($memberImage , 'blog-thumb') .'" />';
							$output .= '</div>';
						endif;
						if($title == 'true'):
							$output .= '<div class="member-title">';
							$output .= '<h3'.$topMagin.'>'. $memberName .'</h3>';
							$output .= '<div class="member-occupation">'. $memberOccupation .'</div>';
							$output .= '</div>';
						endif;
					endif;
					$output .= '</div>';
					$output .= '<div class="team-desc-bottom'. $margin .'">';
						if($socialmedia == 'true') :
							 if($socialFacebook):
								$output .= '<a class="facebook-small" target="_blank" href="'. $socialFacebook .'" title="Facebook"></a>';
							endif; 
							if($socialTwitter):
								$output .= '<a class="twitter-small" target="_blank" href="'. $socialTwitter .'" title="Twitter"></a>';
							endif;									
							if($socialGoogle):
								$output .= '<a class="google-small" target="_blank" href="'. $socialGoogle .'" title="Google+"></a>';
							endif;								
							if($socialFlickr):
								$output .= '<a class="flickr-small" target="_blank" href="'. $socialFlickr .'" title="Flickr"></a>';
							endif;								
							if($socialInstagram):
								$output .= '<a class="instagram-small" target="_blank" href="'. $socialInstagram .'" title="Instagram"></a>';
							endif;
							if($socialPinterest):
								$output .= '<a class="pinterest-small" target="_blank" href="'. $socialPinterest .'" title="Pinterest"></a>';
							endif;								
							if($socialDribble):
								$output .= '<a class="dribble-small" target="_blank" href="'. $socialDribble .'" title="Dribble"></a>';
							endif;								
							if($socialBehance):
								$output .= '<a class="behance-small" target="_blank" href="'. $socialBehance .'" title="Behance"></a>';
							endif;							
							if($socialYouTube):
								$output .= '<a class="youtube-small" target="_blank" href="'. $socialYouTube .'" title="YouTube"></a>';
							endif;								
							if($socialVimeo):
								$output .= '<a class="vimeo-small" target="_blank" href="'. $socialVimeo .'" title="Vimeo"></a>';
							endif;								
							if($socialLinkedin):
								$output .= '<a class="linkendin-small" target="_blank" href="'. $socialLinkedin .'" title="Linkedin"></a>';
							endif;								
							if($socialEmail):
								$output .= '<a class="email-small" href="mailto:'. $socialEmail .'" title="Email"></a>';
							endif;									
							if($socialRss):
								$output .= '<a class="rss-small" target="_blank" href="'. $socialRss .'" title="RSS"></a>';
							endif;
						endif;
						if($description == 'true'):
							$output .= '<div class="team-description">'. $memberDesc .'</div>';
						endif;
					$output .= '</div>';
				$output .= '</li>';
			endwhile;
		endif;
		$output .= '</ul>';
		$output .= '</article>';
		$output .= '<div class="post-navigation shrt-team">';
		$output .= '<div title="'. __('Next', 'cuckoothemes') .'" class="next-blog-nav"></div>';
		$output .= '<div title="'. __('Previous', 'cuckoothemes') .'" class="prev-blog-nav"></div>';
		$output .= '</div>';
		$output .= '<script type="text/javascript">';
		$output .= '	jQuery(document).ready(function($){ ';
		$output .= "		$('body').cuckoobizz('blogListHomepage', { ";
		$output .= "			main: '#team-slider-".$id.$sliderid."',";
		$output .= "			mainUL: 'ul.team-wrapper-homepage',";
		$output .= "			effect: '".$effects[$ef]."',";
		$output .= "			around: '".$carousel."',";
		$output .= "			hoverEffect: '".$cuckoo_style['teamThumbHover']."'";
		$output .= "		});";
		$output .= '	}); ';
		$output .= '</script>';
		$output .= '</article>';
		
		wp_reset_query();
		
		return $output;
	}
	
	public function team_members_by_categories( $atts ){
		
		extract(shortcode_atts(array(
			'category'  	=> '',
			'col' 			=> '4',
			'link'			=> 'true',
			'count'			=> '-1',
		), $atts));
		
		$topMagin = $link == 'true' ? '' : ' class="team-title-no-link no-thum-team"';
		$colClass = "";
		$countColumns = 0;
		$id = str_replace(',', '', $category.$link.$col);
		$id = str_replace(' ', '', $id);
		
		if($col == '4') :
			$colClass = " content-one-fourth";
		elseif($col == '3') :
			$colClass = " content-one-third";
		elseif($col == '2') :
			$colClass = " content-one-half";
		endif; 
		
		$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
		$slug = get_term_by('name', $category ,'team-categories');
		
		$output = '<div class="team-shortcode-content">';
			$team_args = array(
				'team-categories' 	=> $slug->slug,
				'posts_per_page'    => $count,
				'post_type' 		=> 'team',
				'orderby'			=> 'menu_order date'
			);
			query_posts($team_args);
							
			if(have_posts()) :
				while ( have_posts() ) : the_post(); 
					$countColumns++;
					$memberDesc = cuckoo_get_post_meta(get_the_ID(), "_member-desc");
					$socialFacebook = cuckoo_get_post_meta(get_the_ID(), "_social-facebook");
					$socialTwitter = cuckoo_get_post_meta(get_the_ID(), "_social-twitter"); 
					$socialGoogle = cuckoo_get_post_meta(get_the_ID(), "_social-google"); 
					$socialFlickr = cuckoo_get_post_meta(get_the_ID(), "_social-flickr"); 
					$socialPinterest = cuckoo_get_post_meta(get_the_ID(), "_social-pinterest"); 
					$socialDribble = cuckoo_get_post_meta(get_the_ID(), "_social-dribble"); 
					$socialInstagram = cuckoo_get_post_meta(get_the_ID(), "_social-instagram");
					$socialBehance = cuckoo_get_post_meta(get_the_ID(), "_social-behance"); 
					$socialYouTube = cuckoo_get_post_meta(get_the_ID(), "_social-youtube"); 
					$socialVimeo = cuckoo_get_post_meta(get_the_ID(), "_social-vimeo"); 
					$socialLinkedin = cuckoo_get_post_meta(get_the_ID(), "_social-linkedin"); 
					$socialEmail = cuckoo_get_post_meta(get_the_ID(), "_social-email"); 
					$socialRss = cuckoo_get_post_meta(get_the_ID(), "_social-rss"); 
					$memberName = cuckoo_get_post_meta(get_the_ID(), "_team-member-name");
					$memberOccupation = cuckoo_get_post_meta(get_the_ID(), "_team-member-occupation");
					$memberImage = cuckoo_get_post_meta(get_the_ID(), "_upload_image1");
					$margin = "";
					if($socialFacebook or $socialTwitter or $socialGoogle or $socialFlickr or $socialPinterest or $socialDribble or 
							$socialBehance or $socialYouTube or $socialVimeo or $socialLinkedin or $socialEmail or $socialRss) :
							$margin = " social-margin";
					endif;
					
					
					if( $col == '4' && $countColumns == 4 ) :
						$last = ' last';
						$countColumns = 0;
					elseif( $col == '3' && $countColumns == 3 ) :
						$last = ' last';
						$countColumns = 0;				
					elseif( $col == '2' && $countColumns == 2 ) :
						$last = ' last';
						$countColumns = 0;
					endif;
					
					$output .= '<div class="team-member-shortcode'.$colClass.$last.'">';
					$output .= '<div class="team_header short-team-by-cat-'.$id.'">';
					if( $link == 'true' ):
						if ( $memberImage ) :
							$output .= '<div class="team_thumbnail_template">';
							$output .= '<a class="blog-thumb team-member-link" href="'. get_permalink() .'" title="'. $memberName .'">';
							$output .= '<img width="225" height="225" alt="'. $memberName .'" src="'. cuckoo_get_attachment_all_size($memberImage , 'blog-thumb') .'" />';
							$output .= '</a>';
							$output .= '</div>';
						endif;
						$output .= '<div class="member-title">';
						$output .= '<h3><a href="'. get_permalink() .'" title="'. $memberName .'" rel="bookmark">'. $memberName .'</a></h3>';
						$output .= '<div class="member-occupation">'. $memberOccupation .'</div>';
						$output .= '</div>';
					else :
						if ( $memberImage ) :
							$output .= '<div class="team_thumbnail_template team-member-link">';
							$output .= '<img width="225" height="225" alt="'. $memberName .'" src="'. cuckoo_get_attachment_all_size($memberImage , 'blog-thumb') .'" />';
							$output .= '</div>';
						endif;
						$output .= '<div class="member-title">';
						$output .= '<h3'.$topMagin.'>'. $memberName .'</h3>';
						$output .= '<div class="member-occupation">'. $memberOccupation .'</div>';
						$output .= '</div>';
					endif;
					$output .= '</div>';
					$output .= '<div class="team-desc-bottom'. $margin .'">';
							 if($socialFacebook):
								$output .= '<a class="facebook-small" target="_blank" href="'. $socialFacebook .'" title="Facebook"></a>';
							endif; 
							if($socialTwitter):
								$output .= '<a class="twitter-small" target="_blank" href="'. $socialTwitter .'" title="Twitter"></a>';
							endif;									
							if($socialGoogle):
								$output .= '<a class="google-small" target="_blank" href="'. $socialGoogle .'" title="Google+"></a>';
							endif;								
							if($socialFlickr):
								$output .= '<a class="flickr-small" target="_blank" href="'. $socialFlickr .'" title="Flickr"></a>';
							endif;								
							if($socialInstagram):
								$output .= '<a class="instagram-small" target="_blank" href="'. $socialInstagram .'" title="Instagram"></a>';
							endif;
							if($socialPinterest):
								$output .= '<a class="pinterest-small" target="_blank" href="'. $socialPinterest .'" title="Pinterest"></a>';
							endif;								
							if($socialDribble):
								$output .= '<a class="dribble-small" target="_blank" href="'. $socialDribble .'" title="Dribble"></a>';
							endif;								
							if($socialBehance):
								$output .= '<a class="behance-small" target="_blank" href="'. $socialBehance .'" title="Behance"></a>';
							endif;							
							if($socialYouTube):
								$output .= '<a class="youtube-small" target="_blank" href="'. $socialYouTube .'" title="YouTube"></a>';
							endif;								
							if($socialVimeo):
								$output .= '<a class="vimeo-small" target="_blank" href="'. $socialVimeo .'" title="Vimeo"></a>';
							endif;								
							if($socialLinkedin):
								$output .= '<a class="linkendin-small" target="_blank" href="'. $socialLinkedin .'" title="Linkedin"></a>';
							endif;								
							if($socialEmail):
								$output .= '<a class="email-small" href="mailto:'. $socialEmail .'" title="Email"></a>';
							endif;									
							if($socialRss):
								$output .= '<a class="rss-small" target="_blank" href="'. $socialRss .'" title="RSS"></a>';
							endif;
							$output .= '<div class="team-description">'. $memberDesc .'</div>';
						$output .= '</div>';
					$output .= '</div>';
					$last = "";
				endwhile;
			 endif;
		$output .= '<script type="text/javascript">';
		$output .= '	jQuery(document).ready(function($){ ';
		$output .= "		$('body').cuckoobizz('blackWhiteEffectsUse', $('.team_header.short-team-by-cat-".$id."').find('img'), '". $cuckoo_style['teamThumbHover'] ."'); ";
		$output .= '	}); ';
		$output .= '</script>';
		$output .= '</div>';
		wp_reset_query();
		
		return $output;
	}
	
	public function members_slider( $atts ){
	
		extract(shortcode_atts(array(
			'memberids'    	=> '',
			'id'   			=> '1',
			'link'   		=> 'false',
			'controlnav' 	=> 'false',
			'align' 		=> 'center',
			'directionnav' 	=> 'false',
			'pausetime' 	=> '6000',
			'effect' 		=> 'random',
			'title' 		=> 'true',
			'radius' 		=> '0',
		), $atts));
		
		$args_works =  array(
		'posts_per_page'    => '-1',
		'post__in' 			=> explode(",", $memberids),
		'post_type' 		=> 'team',
		'orderby' 			=> 'post__in'
		);
		query_posts($args_works);
		
		if ( have_posts() ):
			$idhard = str_replace(',', '', $memberids);
			$idElement = str_replace(' ', '', $idhard);
			$output .= '[slide id="members-slider-'.$id.$idElement.'" radius="'.$radius.'" controlnav="'.$controlnav.'" align="'.$align.'" directionnav="'.$directionnav.'" pausetime="'.$pausetime.'" effect="'.$effect.'"]';
			while ( have_posts() ) : the_post();
				$memberName = cuckoo_get_post_meta(get_the_ID(), "_team-member-name");
				$memberOccupation = cuckoo_get_post_meta(get_the_ID(), "_team-member-occupation");
				$memberImage = cuckoo_get_post_meta(get_the_ID(), "_upload_image1");
				if ( $memberImage ) :
					$image_url = cuckoo_get_attachment_all_size($memberImage , '715-size');
					$oc = $memberOccupation ? "<span class='memberOccupation'>".$memberOccupation."</span>" : '';
					$titileCaption = $link == 'true' ? "<a class='slide-link memb' href='".get_permalink()."'>".$memberName."</a>".$oc : "<span class='memb'>".$memberName."</span>".$oc;
					$tst = $title == 'true' ? 'title="'.$titileCaption.'"' : '';
					$output .= '[slideimg '.$tst.' url="'.$image_url.'" imgtitle="'.$memberName.'"]';
				endif;
			endwhile;
			$output .= '[/slide]';
		endif;
		
		wp_reset_query();
		
		return do_shortcode($output);
	}
	
	public function members_by_cat_slider( $atts ){
	
		extract(shortcode_atts(array(
			'category'    	=> '',
			'id'   			=> '1',
			'link'   		=> 'false',
			'controlnav' 	=> 'false',
			'align' 		=> 'center',
			'directionnav' 	=> 'false',
			'pausetime' 	=> '6000',
			'effect' 		=> 'random',
			'title' 		=> 'true',
			'count' 		=> '-1',
			'radius'		=> '0'
		), $atts));
		
		$slug = get_term_by('name', $category ,'team-categories');
		
		$team_args = array(
				'team-categories' 	=> $slug->slug,
				'posts_per_page'    => $count,
				'post_type' 		=> 'team',
				'orderby'			=> 'menu_order date'
			);
		query_posts($team_args);
		
		if ( have_posts() ):
			$idhard = str_replace(',', '', $category);
			$idElement = str_replace(' ', '', $idhard);
			$output .= '[slide id="members-slider-by-cat-'.$id.$idElement.'" radius="'.$radius.'" controlnav="'.$controlnav.'" align="'.$align.'" directionnav="'.$directionnav.'" pausetime="'.$pausetime.'" effect="'.$effect.'"]';
			while ( have_posts() ) : the_post();
				$memberName = cuckoo_get_post_meta(get_the_ID(), "_team-member-name");
				$memberOccupation = cuckoo_get_post_meta(get_the_ID(), "_team-member-occupation");
				$memberImage = cuckoo_get_post_meta(get_the_ID(), "_upload_image1");
				if ( $memberImage ) :
					$image_url = cuckoo_get_attachment_all_size($memberImage , '715-size');
					$oc = $memberOccupation ? "<span class='memberOccupation'>".$memberOccupation."</span>" : '';
					$titileCaption = $link == 'true' ? "<a class='slide-link memb' href='".get_permalink()."'>".$memberName."</a>".$oc : "<span class='memb'>".$memberName."</span>".$oc;
					$tst = $title == 'true' ? 'title="'.$titileCaption.'"' : '';
					$output .= '[slideimg '.$tst.' url="'.$image_url.'" imgtitle="'.$memberName.'"]';
				endif;
			endwhile;
			$output .= '[/slide]';
		endif;
		
		wp_reset_query();
		
		return do_shortcode($output);
	}
}

$cuckoo_team_member_shortcodes = new cuckoo_team_member_shortcodes();
?>