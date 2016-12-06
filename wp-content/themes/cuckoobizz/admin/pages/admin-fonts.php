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
** Name : Font's
*/
global $theme_style;
$google_array = google_font();
$flatIt_array = flatIt_font();
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
/* Styles Font's */
$font_style = array(
	'Normal' 	=> 'Normal',
	'Italic' 	=> 'Italic'
);
/* Weight Font's */
$font_weight = array(
	'200' 	=> '200',
	'300' 	=> '300',
	'400' 	=> '400',
	'500' 	=> '500',
	'600' 	=> '600',
	'700'	=> '700',
	'800'	=> '800',
	'900'	=> '900',
);
?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$(".section_settings").change(function () {
				var family = $(this).find("select.font_select option:selected").val();
				var fontSize = $(this).find("select.mini_last_select option:selected").val();
				var fontWeight = $(this).find("select.mini_select_first option:selected").val();
				var fontStyle = $(this).find("select.mini_select option:selected").val();
				var fontLine = $(this).find("input.mini_select-input").val();
				var fontColor = $(this).find("input.mini_select-input-color").val();
				var familyShow = family;
				
				$("head").append('<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='+familyShow+':200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic">');
				$(this).find(".font_preview").css('font-family', familyShow+" , sans-serif");
				$(this).find(".font_preview").css('font-style', fontStyle);
				$(this).find(".font_preview").css('font-weight', fontWeight);
				$(this).find(".font_preview").css('color', fontColor);
				if( fontSize > 0 ){
					$(this).find(".font_preview").css('font-size', fontSize+"px");
				}else{
					$(this).find(".font_preview").css('font-size', "12px");
				}				
				if( fontLine > 0 ){
					$(this).find(".font_preview").css('line-height', fontLine);
				}else{
					$(this).find(".font_preview").css('line-height', "1.3");
				}
			}).trigger('change');
			$("#restore_font").click(function(){
				var answer = confirm('Do you really want to reset all fonts settings?');
				return answer;
			});
			$(".selectPicker").click(function(){
				var color = $(this).parent().find('.mini_select-input-color').val();
				$(this).parent().parent().parent().find(".font_preview").css('color', color);
			});
		});
	</script>
	<section id="main_content">
	<?php
	if(isset($_REQUEST['all']))
	{
	/* all names settings */

	$cuckoo_font = array( 
	/* Slideshow main title */
	'slideshow-title-font' 			=> esc_attr( $_POST['slideshow-title-font'] ) , 
	'slideshow-title-weight' 		=> esc_attr( $_POST['slideshow-title-weight'] ) ,
	'slideshow-title-style' 		=> esc_attr( $_POST['slideshow-title-style'] ) ,
	'slideshow-title-size' 			=> $size = (esc_attr( $_POST['slideshow-title-size'] ) == "" ? '100' : esc_attr( $_POST['slideshow-title-size'] )) ,	
	'slideshow-title-lheight' 		=> esc_attr( $_POST['slideshow-title-lheight'] ) ,	
	'slideshow-title-color' 		=> esc_attr( $_POST['color_picker_color-1'] ) ,	
	
	/* Slideshow Subtitle */
	'slideshow-subtitle-font' 		=> esc_attr( $_POST['slideshow-subtitle-font'] ) , 
	'slideshow-subtitle-weight' 	=> esc_attr( $_POST['slideshow-subtitle-weight'] ) ,
	'slideshow-subtitle-style' 		=> esc_attr( $_POST['slideshow-subtitle-style'] ) ,
	'slideshow-subtitle-size' 		=> $size = (esc_attr( $_POST['slideshow-subtitle-size'] ) == "" ? '62' : esc_attr( $_POST['slideshow-subtitle-size'] )) ,	
	'slideshow-subtitle-lheight' 	=> esc_attr( $_POST['slideshow-subtitle-lheight'] ) ,	
	'slideshow-subtitle-color' 		=> esc_attr( $_POST['color_picker_color-2'] ) ,		
	
	/* Post, Work Title */
	'pwp-title-font' 				=> esc_attr( $_POST['pwp-title-font'] ) , 
	'pwp-title-weight' 				=> esc_attr( $_POST['pwp-title-weight'] ) ,
	'pwp-title-style' 				=> esc_attr( $_POST['pwp-title-style'] ) ,
	'pwp-title-size' 				=> $size = (esc_attr( $_POST['pwp-title-size'] ) == "" ? '100' : esc_attr( $_POST['pwp-title-size'] )) ,	
	'pwp-title-lheight' 			=> esc_attr( $_POST['pwp-title-lheight'] ) ,	
	'pwp-title-color' 				=> esc_attr( $_POST['color_picker_color-3'] ) ,		
	
	/* Page Title */
	'page-title-font' 				=> esc_attr( $_POST['page-title-font'] ) , 
	'page-title-weight' 			=> esc_attr( $_POST['page-title-weight'] ) ,
	'page-title-style' 				=> esc_attr( $_POST['page-title-style'] ) ,
	'page-title-size' 				=> $size = (esc_attr( $_POST['page-title-size'] ) == "" ? '100' : esc_attr( $_POST['page-title-size'] )) ,	
	'page-title-lheight' 			=> esc_attr( $_POST['page-title-lheight'] ) ,	
	'page-title-color' 				=> esc_attr( $_POST['color_picker_color-page'] ) ,		
	
	/* Post, Work & Page Subtitle */
	'pwp-subtitle-font' 			=> esc_attr( $_POST['pwp-subtitle-font'] ) , 
	'pwp-subtitle-weight' 			=> esc_attr( $_POST['pwp-subtitle-weight'] ) ,
	'pwp-subtitle-style' 			=> esc_attr( $_POST['pwp-subtitle-style'] ) ,
	'pwp-subtitle-size' 			=> $size = (esc_attr( $_POST['pwp-subtitle-size'] ) == "" ? '23' : esc_attr( $_POST['pwp-subtitle-size'] )) ,	
	'pwp-subtitle-lheight' 			=> esc_attr( $_POST['pwp-subtitle-lheight'] ) ,	
	'pwp-subtitle-color' 			=> esc_attr( $_POST['color_picker_color-4'] ) ,	
	
	/*  Page Title */
	'page-unit-title-font' 			=> esc_attr( $_POST['page-unit-title-font'] ) , 
	'page-unit-title-weight' 		=> esc_attr( $_POST['page-unit-title-weight'] ) ,
	'page-unit-title-style' 		=> esc_attr( $_POST['page-unit-title-style'] ) ,
	'page-unit-title-size' 			=> $size = (esc_attr( $_POST['page-unit-title-size'] ) == "" ? '27' : esc_attr( $_POST['page-unit-title-size'] )) ,	
	'page-unit-title-lheight' 		=> esc_attr( $_POST['page-unit-title-lheight'] ) ,	
	'page-unit-title-color' 		=> esc_attr( $_POST['color_picker_color-5'] ) ,		
	
	/*  Page Title */
	'page-unit-subtitle-font' 		=> esc_attr( $_POST['page-unit-subtitle-font'] ) , 
	'page-unit-subtitle-weight' 	=> esc_attr( $_POST['page-unit-subtitle-weight'] ) ,
	'page-unit-subtitle-style' 		=> esc_attr( $_POST['page-unit-subtitle-style'] ) ,
	'page-unit-subtitle-size' 		=> $size = (esc_attr( $_POST['page-unit-subtitle-size'] ) == "" ? '27' : esc_attr( $_POST['page-unit-subtitle-size'] )) ,	
	'page-unit-subtitle-lheight' 	=> esc_attr( $_POST['page-unit-subtitle-lheight'] ) ,	
	'page-unit-subtitle-color' 		=> esc_attr( $_POST['color_picker_color-38'] ) ,		
	
	/* Text Box */
	'text-box-testimonials-font' 	=> esc_attr( $_POST['text-box-testimonials-font'] ) , 
	'text-box-testimonials-weight' 	=> esc_attr( $_POST['text-box-testimonials-weight'] ) ,
	'text-box-testimonials-style' 	=> esc_attr( $_POST['text-box-testimonials-style'] ) ,
	'text-box-testimonials-size' 	=> $size = (esc_attr( $_POST['text-box-testimonials-size'] ) == "" ? '62' : esc_attr( $_POST['text-box-testimonials-size'] )) ,	
	'text-box-testimonials-lheight' => esc_attr( $_POST['text-box-testimonials-lheight'] ) ,	
	'text-box-testimonials-color' 	=> esc_attr( $_POST['color_picker_color-6'] ) ,	
	
	/* Testimonial Unit Option 1 */
	'text-box-testimonials1-font' 	=> esc_attr( $_POST['text-box-testimonials1-font'] ) , 
	'text-box-testimonials1-weight' => esc_attr( $_POST['text-box-testimonials1-weight'] ) ,
	'text-box-testimonials1-style' 	=> esc_attr( $_POST['text-box-testimonials1-style'] ) ,
	'text-box-testimonials1-size' 	=> $size = (esc_attr( $_POST['text-box-testimonials1-size'] ) == "" ? '62' : esc_attr( $_POST['text-box-testimonials1-size'] )) ,	
	'text-box-testimonials1-lheight' => esc_attr( $_POST['text-box-testimonials1-lheight'] ) ,	
	'text-box-testimonials1-color' 	=> esc_attr( $_POST['color_picker_color-testimonials1'] ) ,			
	
	/* Testimonial content */
	'testimonial-content-font' 		=> esc_attr( $_POST['testimonial-content-font'] ) , 
	'testimonial-content-weight' 	=> esc_attr( $_POST['testimonial-content-weight'] ) ,
	'testimonial-content-style' 		=> esc_attr( $_POST['testimonial-content-style'] ) ,
	'testimonial-content-size' 		=> $size = (esc_attr( $_POST['testimonial-content-size'] ) == "" ? '23' : esc_attr( $_POST['testimonial-content-size'] )) ,	
	'testimonial-content-lheight'	=> esc_attr( $_POST['testimonial-content-lheight'] ) ,	
	'testimonial-content-color' 		=> esc_attr( $_POST['color_picker_color-content'] ) ,	
	
	/* Testimonial Author */
	'testimonial-author-font' 		=> esc_attr( $_POST['testimonial-author-font'] ) , 
	'testimonial-author-weight' 	=> esc_attr( $_POST['testimonial-author-weight'] ) ,
	'testimonial-author-style' 		=> esc_attr( $_POST['testimonial-author-style'] ) ,
	'testimonial-author-size' 		=> $size = (esc_attr( $_POST['testimonial-author-size'] ) == "" ? '23' : esc_attr( $_POST['testimonial-author-size'] )) ,	
	'testimonial-author-lheight'	=> esc_attr( $_POST['testimonial-author-lheight'] ) ,	
	'testimonial-author-color' 		=> esc_attr( $_POST['color_picker_color-7'] ) ,		
	
	/* Testimonial details */
	'testimonial-details-font' 		=> esc_attr( $_POST['testimonial-details-font'] ) , 
	'testimonial-details-weight' 	=> esc_attr( $_POST['testimonial-details-weight'] ) ,
	'testimonial-details-style' 	=> esc_attr( $_POST['testimonial-details-style'] ) ,
	'testimonial-details-size' 		=> $size = (esc_attr( $_POST['testimonial-details-size'] ) == "" ? '23' : esc_attr( $_POST['testimonial-details-size'] )) ,	
	'testimonial-details-lheight'	=> esc_attr( $_POST['testimonial-details-lheight'] ) ,	
	'testimonial-details-color' 	=> esc_attr( $_POST['color_picker_color-details'] ) ,	
	
	/* Testimonial template content */
	'testimonial-template-content-font' 	=> esc_attr( $_POST['testimonial-template-content-font'] ) , 
	'testimonial-template-content-weight' 	=> esc_attr( $_POST['testimonial-template-content-weight'] ) ,
	'testimonial-template-content-style' 	=> esc_attr( $_POST['testimonial-template-content-style'] ) ,
	'testimonial-template-content-size' 	=> $size = (esc_attr( $_POST['testimonial-template-content-size'] ) == "" ? '23' : esc_attr( $_POST['testimonial-template-content-size'] )) ,	
	'testimonial-template-content-lheight'	=> esc_attr( $_POST['testimonial-template-content-lheight'] ) ,	
	'testimonial-template-content-color' 	=> esc_attr( $_POST['color_picker_color-template-content'] ) ,	
	
	/* Testimonial template Author */
	'testimonial-template-author-font' 		=> esc_attr( $_POST['testimonial-template-author-font'] ) , 
	'testimonial-template-author-weight' 	=> esc_attr( $_POST['testimonial-template-author-weight'] ) ,
	'testimonial-template-author-style' 	=> esc_attr( $_POST['testimonial-template-author-style'] ) ,
	'testimonial-template-author-size' 		=> $size = (esc_attr( $_POST['testimonial-template-author-size'] ) == "" ? '23' : esc_attr( $_POST['testimonial-template-author-size'] )) ,	
	'testimonial-template-author-lheight'	=> esc_attr( $_POST['testimonial-template-author-lheight'] ) ,	
	'testimonial-template-author-color' 	=> esc_attr( $_POST['color_picker_color-template-author'] ) ,	
	
	/* Testimonial template Details */
	'testimonial-template-details-font' 	=> esc_attr( $_POST['testimonial-template-details-font'] ) , 
	'testimonial-template-details-weight' 	=> esc_attr( $_POST['testimonial-template-details-weight'] ) ,
	'testimonial-template-details-style' 	=> esc_attr( $_POST['testimonial-template-details-style'] ) ,
	'testimonial-template-details-size' 	=> $size = (esc_attr( $_POST['testimonial-template-details-size'] ) == "" ? '23' : esc_attr( $_POST['testimonial-template-details-size'] )) ,	
	'testimonial-template-details-lheight'	=> esc_attr( $_POST['testimonial-template-details-lheight'] ) ,	
	'testimonial-template-details-color' 	=> esc_attr( $_POST['color_picker_color-template-details'] ) ,
	
	/* Button Title */
	'button-font' 					=> esc_attr( $_POST['button-font'] ) , 
	'button-weight' 				=> esc_attr( $_POST['button-weight'] ) ,
	'button-style' 					=> esc_attr( $_POST['button-style'] ) ,
	'button-size' 					=> $size = (esc_attr( $_POST['button-size'] ) == "" ? '23' : esc_attr( $_POST['button-size'] )) ,	
	'button-lheight' 				=> esc_attr( $_POST['button-lheight'] ) ,	
	'button-color' 					=> esc_attr( $_POST['color_picker_color-9'] ) ,		
	
	/* Body Font */
	'body-font' 					=> esc_attr( $_POST['body-font'] ) , 
	'body-weight' 					=> esc_attr( $_POST['body-weight'] ) ,
	'body-style' 					=> esc_attr( $_POST['body-style'] ) ,
	'body-size' 					=> $size = (esc_attr( $_POST['body-size'] ) == "" ? '12' : esc_attr( $_POST['body-size'] )) ,	
	'body-lheight' 					=> esc_attr( $_POST['body-lheight'] ) ,	
	'body-color' 					=> esc_attr( $_POST['color_picker_color-10'] ) ,	
	
	/* Details Font */
	'details-font' 					=> esc_attr( $_POST['details-font'] ) , 
	'details-weight' 				=> esc_attr( $_POST['details-weight'] ) ,
	'details-style' 				=> esc_attr( $_POST['details-style'] ) ,
	'details-size' 					=> $size = (esc_attr( $_POST['details-size'] ) == "" ? '11' : esc_attr( $_POST['details-size'] )) ,	
	'details-lheight' 				=> esc_attr( $_POST['details-lheight'] ) ,	
	'details-color' 				=> esc_attr( $_POST['color_picker_color-11'] ) ,		
	
	/* Alerts Font */
	'alerts-font' 					=> esc_attr( $_POST['alerts-font'] ) , 
	'alerts-weight' 				=> esc_attr( $_POST['alerts-weight'] ) ,
	'alerts-style' 					=> esc_attr( $_POST['alerts-style'] ) ,
	'alerts-size' 					=> esc_attr( $_POST['alerts-size'] ) ,	
	'alerts-lheight' 				=> esc_attr( $_POST['alerts-lheight'] ) ,	
	'alerts-color' 					=> esc_attr( $_POST['color_picker_color-12'] ) ,	
	
	/* Post List Title Font */
	'ptl-title-font' 				=> esc_attr( $_POST['ptl-title-font'] ) , 
	'ptl-title-weight' 				=> esc_attr( $_POST['ptl-title-weight'] ) ,
	'ptl-title-style' 				=> esc_attr( $_POST['ptl-title-style'] ) ,
	'ptl-title-size' 				=> $size = (esc_attr( $_POST['ptl-title-size'] ) == "" ? '23' : esc_attr( $_POST['ptl-title-size'] )) ,	
	'ptl-title-lheight' 			=> esc_attr( $_POST['ptl-title-lheight'] ) ,	
	'ptl-title-color' 				=> esc_attr( $_POST['color_picker_color-13'] ) ,	
	
	/* Team List Title Font */
	'ptl-team-title-font' 			=> esc_attr( $_POST['ptl-team-title-font'] ) , 
	'ptl-team-title-weight' 		=> esc_attr( $_POST['ptl-team-title-weight'] ) ,
	'ptl-team-title-style' 			=> esc_attr( $_POST['ptl-team-title-style'] ) ,
	'ptl-team-title-size' 			=> $size = (esc_attr( $_POST['ptl-team-title-size'] ) == "" ? '17' : esc_attr( $_POST['ptl-team-title-size'] )) ,	
	'ptl-team-title-lheight' 		=> esc_attr( $_POST['ptl-team-title-lheight'] ) ,	
	'ptl-team-title-color' 			=> esc_attr( $_POST['color_picker_color-37'] ) ,	
	
	/* Team List Occupation */
	'occupation-font' 				=> esc_attr( $_POST['occupation-font'] ) , 
	'occupation-weight' 			=> esc_attr( $_POST['occupation-weight'] ) ,
	'occupation-style' 				=> esc_attr( $_POST['occupation-style'] ) ,
	'occupation-size' 				=> $size = (esc_attr( $_POST['occupation-size'] ) == "" ? '20' : esc_attr( $_POST['occupation-size'] )) ,	
	'occupation-lheight' 			=> esc_attr( $_POST['occupation-lheight'] ) ,	
	'occupation-color' 				=> esc_attr( $_POST['color_picker_color-14'] ) ,	
	
	/* Team & Testimonial content text */
	'tt-content-font' 				=> esc_attr( $_POST['tt-content-font'] ) , 
	'tt-content-weight' 			=> esc_attr( $_POST['tt-content-weight'] ) ,
	'tt-content-style' 				=> esc_attr( $_POST['tt-content-style'] ) ,
	'tt-content-size' 				=> $size = (esc_attr( $_POST['tt-content-size'] ) == "" ? '27' : esc_attr( $_POST['tt-content-size'] )) ,	
	'tt-content-lheight' 			=> esc_attr( $_POST['tt-content-lheight'] ) ,	
	'tt-content-color' 				=> esc_attr( $_POST['color_picker_color-15'] ) ,	
	
	/* Work List title */
	'workl-title-font' 				=> esc_attr( $_POST['workl-title-font'] ) , 
	'workl-title-weight' 			=> esc_attr( $_POST['workl-title-weight'] ) ,
	'workl-title-style' 			=> esc_attr( $_POST['workl-title-style'] ) ,
	'workl-title-size' 				=> $size = (esc_attr( $_POST['workl-title-size'] ) == "" ? '23' : esc_attr( $_POST['workl-title-size'] )) ,	
	'workl-title-lheight' 			=> esc_attr( $_POST['workl-title-lheight'] ) ,	
	'workl-title-color' 			=> esc_attr( $_POST['color_picker_color-17'] ) ,	
	
	/* Work List subtitle */
	'workl-subtitle-font' 			=> esc_attr( $_POST['workl-subtitle-font'] ) , 
	'workl-subtitle-weight' 		=> esc_attr( $_POST['workl-subtitle-weight'] ) ,
	'workl-subtitle-style' 			=> esc_attr( $_POST['workl-subtitle-style'] ) ,
	'workl-subtitle-size' 			=> $size = (esc_attr( $_POST['workl-subtitle-size'] ) == "" ? '20' : esc_attr( $_POST['workl-subtitle-size'] )) ,	
	'workl-subtitle-lheight' 		=> esc_attr( $_POST['workl-subtitle-lheight'] ) ,	
	'workl-subtitle-color' 			=> esc_attr( $_POST['color_picker_color-18'] ) ,	
	
	/* Comment Title */
	'comment-font' 					=> esc_attr( $_POST['comment-font'] ) , 
	'comment-weight' 				=> esc_attr( $_POST['comment-weight'] ) ,
	'comment-style' 				=> esc_attr( $_POST['comment-style'] ) ,
	'comment-size' 					=> $size = (esc_attr( $_POST['comment-size'] ) == "" ? '32' : esc_attr( $_POST['comment-size'] )) ,	
	'comment-lheight' 				=> esc_attr( $_POST['comment-lheight'] ) ,	
	'comment-color' 				=> esc_attr( $_POST['color_picker_color-19'] ) ,	
	
	/* Leave a Reply */
	'reply-font' 					=> esc_attr( $_POST['reply-font'] ) , 
	'reply-weight' 					=> esc_attr( $_POST['reply-weight'] ) ,
	'reply-style' 					=> esc_attr( $_POST['reply-style'] ) ,
	'reply-size' 					=> $size = (esc_attr( $_POST['reply-size'] ) == "" ? '27' : esc_attr( $_POST['reply-size'] )) ,	
	'reply-lheight' 				=> esc_attr( $_POST['reply-lheight'] ) ,	
	'reply-color' 					=> esc_attr( $_POST['color_picker_color-20'] ) ,	
	
	/* H1 */
	'h1-font' 						=> esc_attr( $_POST['h1-font'] ) , 
	'h1-weight' 					=> esc_attr( $_POST['h1-weight'] ) ,
	'h1-style' 						=> esc_attr( $_POST['h1-style'] ) ,
	'h1-size' 						=> $size = (esc_attr( $_POST['h1-size'] ) == "" ? '62' : esc_attr( $_POST['h1-size'] )) ,	
	'h1-lheight' 					=> esc_attr( $_POST['h1-lheight'] ) ,	
	'h1-color' 						=> esc_attr( $_POST['color_picker_color-21'] ) ,	
	
	/* H2 */
	'h2-font' 						=> esc_attr( $_POST['h2-font'] ) , 
	'h2-weight' 					=> esc_attr( $_POST['h2-weight'] ) ,
	'h2-style' 						=> esc_attr( $_POST['h2-style'] ) ,
	'h2-size' 						=> $size = (esc_attr( $_POST['h2-size'] ) == "" ? '32' : esc_attr( $_POST['h2-size'] )) ,	
	'h2-lheight' 					=> esc_attr( $_POST['h2-lheight'] ) ,	
	'h2-color' 						=> esc_attr( $_POST['color_picker_color-22'] ) ,	
	
	/* H3 */
	'h3-font' 						=> esc_attr( $_POST['h3-font'] ) , 
	'h3-weight' 					=> esc_attr( $_POST['h3-weight'] ) ,
	'h3-style' 						=> esc_attr( $_POST['h3-style'] ) ,
	'h3-size' 						=> $size = (esc_attr( $_POST['h3-size'] ) == "" ? '27' : esc_attr( $_POST['h3-size'] )) ,	
	'h3-lheight' 					=> esc_attr( $_POST['h3-lheight'] ) ,	
	'h3-color' 						=> esc_attr( $_POST['color_picker_color-23'] ) ,	
	
	/* H4 */
	'h4-font' 						=> esc_attr( $_POST['h4-font'] ) , 
	'h4-weight' 					=> esc_attr( $_POST['h4-weight'] ) ,
	'h4-style' 						=> esc_attr( $_POST['h4-style'] ) ,
	'h4-size' 						=> $size = (esc_attr( $_POST['h4-size'] ) == "" ? '23' : esc_attr( $_POST['h4-size'] )) ,	
	'h4-lheight' 					=> esc_attr( $_POST['h4-lheight'] ) ,	
	'h4-color' 						=> esc_attr( $_POST['color_picker_color-24'] ) ,	
	
	/* H5 */
	'h5-font' 						=> esc_attr( $_POST['h5-font'] ) , 
	'h5-weight' 					=> esc_attr( $_POST['h5-weight'] ) ,
	'h5-style' 						=> esc_attr( $_POST['h5-style'] ) ,
	'h5-size' 						=> $size = (esc_attr( $_POST['h5-size'] ) == "" ? '20' : esc_attr( $_POST['h5-size'] )) ,	
	'h5-lheight' 					=> esc_attr( $_POST['h5-lheight'] ) ,	
	'h5-color' 						=> esc_attr( $_POST['color_picker_color-25'] ) ,	
	
	/* LightBox title */
	'lightbox-font' 				=> esc_attr( $_POST['lightbox-font'] ) , 
	'lightbox-weight' 				=> esc_attr( $_POST['lightbox-weight'] ) ,
	'lightbox-style' 				=> esc_attr( $_POST['lightbox-style'] ) ,
	'lightbox-size' 				=> $size = (esc_attr( $_POST['lightbox-size'] ) == "" ? '12' : esc_attr( $_POST['lightbox-size'] )) ,	
	'lightbox-lheight' 				=> esc_attr( $_POST['lightbox-lheight'] ) ,	
	'lightbox-color' 				=> esc_attr( $_POST['color_picker_color-26'] ) ,	
	
	/* Widget title */
	'widgest-title-font' 			=> esc_attr( $_POST['widgest-title-font'] ) , 
	'widgest-title-weight' 			=> esc_attr( $_POST['widgest-title-weight'] ) ,
	'widgest-title-style' 			=> esc_attr( $_POST['widgest-title-style'] ) ,
	'widgest-title-size' 			=> $size = (esc_attr( $_POST['widgest-title-size'] ) == "" ? '12' : esc_attr( $_POST['widgest-title-size'] )) ,	
	'widgest-title-lheight' 		=> esc_attr( $_POST['widgest-title-lheight'] ) ,	
	'widgest-title-color' 			=> esc_attr( $_POST['color_picker_color-widgest-title'] ) ,	
	
	/* Widget Tag */
	'tag-widgets-font' 				=> esc_attr( $_POST['tag-widgets-font'] ) , 
	'tag-widgets-weight' 			=> esc_attr( $_POST['tag-widgets-weight'] ) ,
	'tag-widgets-style' 			=> esc_attr( $_POST['tag-widgets-style'] ) ,
	'tag-widgets-size' 				=> $size = (esc_attr( $_POST['tag-widgets-size'] ) == "" ? '12' : esc_attr( $_POST['tag-widgets-size'] )) ,	
	'tag-widgets-lheight' 			=> esc_attr( $_POST['tag-widgets-lheight'] ) ,	
	'tag-widgets-color' 			=> esc_attr( $_POST['color_picker_color-tag-widgets'] ) ,
	
	/* Related Posts title */
	'related-posts-font' 			=> esc_attr( $_POST['related-posts-font'] ) , 
	'related-posts-weight' 			=> esc_attr( $_POST['related-posts-weight'] ) ,
	'related-posts-style' 			=> esc_attr( $_POST['related-posts-style'] ) ,
	'related-posts-size' 			=> $size = (esc_attr( $_POST['related-posts-size'] ) == "" ? '12' : esc_attr( $_POST['related-posts-size'] )) ,	
	'related-posts-lheight' 		=> esc_attr( $_POST['related-posts-lheight'] ) ,	
	'related-posts-color' 			=> esc_attr( $_POST['color_picker_color-related-posts'] ) ,	
	
	/* Related Works title */
	'related-works-font' 			=> esc_attr( $_POST['related-works-font'] ) , 
	'related-works-weight' 			=> esc_attr( $_POST['related-works-weight'] ) ,
	'related-works-style' 			=> esc_attr( $_POST['related-works-style'] ) ,
	'related-works-size' 			=> $size = (esc_attr( $_POST['related-works-size'] ) == "" ? '12' : esc_attr( $_POST['related-works-size'] )) ,	
	'related-works-lheight' 		=> esc_attr( $_POST['related-works-lheight'] ) ,	
	'related-works-color' 			=> esc_attr( $_POST['color_picker_color-related-works'] ) ,	
	
	/* Related Team Members Title */
	'related-team-font' 			=> esc_attr( $_POST['related-team-font'] ) , 
	'related-team-weight' 			=> esc_attr( $_POST['related-team-weight'] ) ,
	'related-team-style' 			=> esc_attr( $_POST['related-team-style'] ) ,
	'related-team-size' 			=> $size = (esc_attr( $_POST['related-team-size'] ) == "" ? '12' : esc_attr( $_POST['related-team-size'] )) ,	
	'related-team-lheight' 			=> esc_attr( $_POST['related-team-lheight'] ) ,	
	'related-team-color' 			=> esc_attr( $_POST['color_picker_color-related-team'] ) ,	
	
	/* Single post Page Details */
	'single-post-details-font' 		=> esc_attr( $_POST['single-post-details-font'] ) , 
	'single-post-details-weight' 	=> esc_attr( $_POST['single-post-details-weight'] ) ,
	'single-post-details-style' 	=> esc_attr( $_POST['single-post-details-style'] ) ,
	'single-post-details-size' 		=> $size = (esc_attr( $_POST['single-post-details-size'] ) == "" ? '12' : esc_attr( $_POST['single-post-details-size'] )) ,	
	'single-post-details-lheight' 	=> esc_attr( $_POST['single-post-details-lheight'] ) ,	
	'single-post-details-color' 	=> esc_attr( $_POST['color_picker_color-single-post-details'] ) ,
	
	/* Comments Details */
	'comments-font' 				=> esc_attr( $_POST['comments-font'] ) , 
	'comments-weight' 				=> esc_attr( $_POST['comments-weight'] ) ,
	'comments-style' 				=> esc_attr( $_POST['comments-style'] ) ,
	'comments-size' 				=> $size = (esc_attr( $_POST['comments-size'] ) == "" ? '12' : esc_attr( $_POST['comments-size'] )) ,	
	'comments-lheight' 				=> esc_attr( $_POST['comments-lheight'] ) ,	
	'comments-color' 				=> esc_attr( $_POST['color_picker_color-comments'] ) ,
		
	/* Body of Contact Unit with Map Background */
	'contact-last-col-font' 		=> esc_attr( $_POST['contact-last-col-font'] ) , 
	'contact-last-col-weight' 		=> esc_attr( $_POST['contact-last-col-weight'] ) ,
	'contact-last-col-style' 		=> esc_attr( $_POST['contact-last-col-style'] ) ,
	'contact-last-col-size' 		=> $size = (esc_attr( $_POST['contact-last-col-size'] ) == "" ? '12' : esc_attr( $_POST['contact-last-col-size'] )) ,	
	'contact-last-col-lheight' 		=> esc_attr( $_POST['contact-last-col-lheight'] ) ,	
	'contact-last-col-color' 		=> esc_attr( $_POST['color_picker_color-contact-last-col'] ) ,
		
	/* Links of Contact Unit with Map Background */
	'links-last-col-font' 			=> esc_attr( $_POST['links-last-col-font'] ) , 
	'links-last-col-weight' 		=> esc_attr( $_POST['links-last-col-weight'] ) ,
	'links-last-col-style' 			=> esc_attr( $_POST['links-last-col-style'] ) ,
	'links-last-col-size' 			=> $size = (esc_attr( $_POST['links-last-col-size'] ) == "" ? '12' : esc_attr( $_POST['links-last-col-size'] )) ,	
	'links-last-col-lheight' 		=> esc_attr( $_POST['links-last-col-lheight'] ) ,	
	'links-last-col-color' 			=> esc_attr( $_POST['color_picker_color-links-last-col'] ) ,
	
	/* Links Hover of Contact Unit with Map Background */
	'links-hover-last-col-font' 	=> esc_attr( $_POST['links-hover-last-col-font'] ) , 
	'links-hover-last-col-weight' 	=> esc_attr( $_POST['links-hover-last-col-weight'] ) ,
	'links-hover-last-col-style' 	=> esc_attr( $_POST['links-hover-last-col-style'] ) ,
	'links-hover-last-col-size' 	=> $size = (esc_attr( $_POST['links-hover-last-col-size'] ) == "" ? '12' : esc_attr( $_POST['links-hover-last-col-size'] )) ,	
	'links-hover-last-col-lheight' 	=> esc_attr( $_POST['links-hover-last-col-lheight'] ) ,	
	'links-hover-last-col-color' 	=> esc_attr( $_POST['color_picker_color-links-hover-last-col'] ) ,
	
	/* Body of Contact Unit with Custom Background */
	'contact-custom-font' 			=> esc_attr( $_POST['contact-custom-font'] ) , 
	'contact-custom-weight' 		=> esc_attr( $_POST['contact-custom-weight'] ) ,
	'contact-custom-style' 			=> esc_attr( $_POST['contact-custom-style'] ) ,
	'contact-custom-size' 			=> $size = (esc_attr( $_POST['contact-custom-size'] ) == "" ? '12' : esc_attr( $_POST['contact-custom-size'] )) ,	
	'contact-custom-lheight' 		=> esc_attr( $_POST['contact-custom-lheight'] ) ,	
	'contact-custom-color' 			=> esc_attr( $_POST['color_picker_color-contact-custom'] ) ,
		
	/* Links of Contact Unit with Custom Background */
	'contact-links-custom-font' 	=> esc_attr( $_POST['contact-links-custom-font'] ) , 
	'contact-links-custom-weight' 	=> esc_attr( $_POST['contact-links-custom-weight'] ) ,
	'contact-links-custom-style' 	=> esc_attr( $_POST['contact-links-custom-style'] ) ,
	'contact-links-custom-size' 	=> $size = (esc_attr( $_POST['contact-links-custom-size'] ) == "" ? '12' : esc_attr( $_POST['contact-links-custom-size'] )) ,	
	'contact-links-custom-lheight' 	=> esc_attr( $_POST['contact-links-custom-lheight'] ) ,	
	'contact-links-custom-color' 	=> esc_attr( $_POST['color_picker_color-contact-links-custom'] ) ,		
	
	/* Links Hover of Contact Unit with Custom Background */
	'contact-cuctom-links-hover-font' 	=> esc_attr( $_POST['contact-cuctom-links-hover-font'] ) , 
	'contact-cuctom-links-hover-weight' => esc_attr( $_POST['contact-cuctom-links-hover-weight'] ) ,
	'contact-cuctom-links-hover-style' 	=> esc_attr( $_POST['contact-cuctom-links-hover-style'] ) ,
	'contact-cuctom-links-hover-size' 	=> $size = (esc_attr( $_POST['contact-cuctom-links-hover-size'] ) == "" ? '12' : esc_attr( $_POST['contact-cuctom-links-hover-size'] )) ,	
	'contact-cuctom-links-hover-lheight'=> esc_attr( $_POST['contact-cuctom-links-hover-lheight'] ) ,	
	'contact-cuctom-links-hover-color' 	=> esc_attr( $_POST['color_picker_color-contact-cuctom-links-hover'] ) ,
	
	);
	update_option( THEMEPREFIX . "_font_settings" , $cuckoo_font );
	?>
		<div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
	<?php
	}
	if(isset($_REQUEST['restore'])){
		/* Deleted old settings */
		delete_option( THEMEPREFIX . "_font_settings" );
		/* Updated new fonts */
		update_option( THEMEPREFIX . "_font_settings" , $theme_style['font_page'] );
		?>
			<div id="save_upadate" class="updated"><?php _e('New settings saved!', 'cuckoothemes'); ?></div>
		<?php
	}
	$cuckoo_font = get_option( THEMEPREFIX . "_font_settings" );
	?>
		<?php cuckoo_framework_head( __('Theme Fonts', 'cuckoothemes') ); ?>
		<form id="formId" method="POST" action="">
			<div id="general_settings">
				<div class="active_settings" style="display: block; border-top:0;">
					<div class="section_settings" style="color: #999999; border-bottom:4px solid #D6D6D6;">
						<?php echo THEMENAME; _e(' theme provides you with +500 custom fonts from Google.<br />
									You can also change a color for each font if needed.<br />
									Click Reset to Default Settings button to restore default font settings.', 'cuckoothemes'); ?>
					</div>
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Nivo Slider, FullScreen Slider, FullScreen Image', 'cuckoothemes'); ?></span>
					<input id="restore_font" class="active_input float_right" name='restore' style="border:1px solid #227399; color:white; " type="submit" value="<?php _e('Reset to Default Settings', 'cuckoothemes'); ?>" />
				</div>
				<div class="active_settings" style="display: block;">	
<!-- Slideshow Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Slideshow Title', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="slideshow-title-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['slideshow-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['slideshow-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="slideshow-title-weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['slideshow-title-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="slideshow-title-style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['slideshow-title-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="slideshow-title-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['slideshow-title-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="slideshow-title-lheight" value="<?php echo $cuckoo_font['slideshow-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-1" value="<?php echo $back = empty($cuckoo_font['slideshow-title-color']) ? '#' : $cuckoo_font['slideshow-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-1" style="background-color:<?php echo $cuckoo_font['slideshow-title-color']; ?>; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-1" />
								<div id="color_picker_color-1" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Slideshow Subtitle -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Slideshow Subtitle ', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="slideshow-subtitle-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['slideshow-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['slideshow-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="slideshow-subtitle-weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['slideshow-subtitle-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="slideshow-subtitle-style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['slideshow-subtitle-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="slideshow-subtitle-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['slideshow-subtitle-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="slideshow-subtitle-lheight" value="<?php echo $cuckoo_font['slideshow-subtitle-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-2" value="<?php echo $back = empty($cuckoo_font['slideshow-subtitle-color']) ? '#' : $cuckoo_font['slideshow-subtitle-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-2" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['slideshow-subtitle-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-2" />
								<div id="color_picker_color-2" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Homepage Units', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
<!-- Title of Homepage Builder Unit -->	
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Title of Homepage Builder Unit', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="page-unit-title-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['page-unit-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['page-unit-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="page-unit-title-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['page-unit-title-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="page-unit-title-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['page-unit-title-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="page-unit-title-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['page-unit-title-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="page-unit-title-lheight" value="<?php echo $cuckoo_font['page-unit-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-5" value="<?php echo $back = empty($cuckoo_font['page-unit-title-color']) ? '#' : $cuckoo_font['page-unit-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-5" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['page-unit-title-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-5" />
								<div id="color_picker_color-5" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Subtitle of Homepage Builder Unit -->	
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Subtitle of Homepage Builder Unit', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="page-unit-subtitle-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['page-unit-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['page-unit-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="page-unit-subtitle-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['page-unit-subtitle-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="page-unit-subtitle-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['page-unit-subtitle-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="page-unit-subtitle-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['page-unit-subtitle-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="page-unit-subtitle-lheight" value="<?php echo $cuckoo_font['page-unit-subtitle-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-38" value="<?php echo $back = empty($cuckoo_font['page-unit-subtitle-color']) ? '#' : $cuckoo_font['page-unit-subtitle-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-38" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['page-unit-subtitle-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-38" />
								<div id="color_picker_color-38" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Body Font of Testimonial Unit Option 1 -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Body Font of Testimonial Unit Option 1', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="text-box-testimonials1-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['text-box-testimonials1-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['text-box-testimonials1-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="text-box-testimonials1-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['text-box-testimonials1-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="text-box-testimonials1-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['text-box-testimonials1-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="text-box-testimonials1-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['text-box-testimonials1-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="text-box-testimonials1-lheight" value="<?php echo $cuckoo_font['text-box-testimonials1-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-testimonials1" value="<?php echo $back = empty($cuckoo_font['text-box-testimonials1-color']) ? '#' : $cuckoo_font['text-box-testimonials1-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-testimonials1" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['text-box-testimonials1-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-testimonials1" />
								<div id="color_picker_color-testimonials1" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Body Font of Testimonial Unit Option 2 -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Body Font of Testimonial Unit Option 2', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="testimonial-content-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-content-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-content-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="testimonial-content-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-content-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="testimonial-content-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-content-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="testimonial-content-size">
									<?php
										for($i=3; $i<=50; $i++) :
											if ($cuckoo_font['testimonial-content-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="testimonial-content-lheight" value="<?php echo $cuckoo_font['testimonial-content-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-content" value="<?php echo $back = empty($cuckoo_font['testimonial-content-color']) ? '#' : $cuckoo_font['testimonial-content-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-content" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['testimonial-content-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-content" />
								<div id="color_picker_color-content" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>			
<!-- Testimonial Unit Author  -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Testimonial Unit Author', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="testimonial-author-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-author-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-author-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="testimonial-author-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-author-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="testimonial-author-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-author-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="testimonial-author-size">
									<?php
										for($i=3; $i<=50; $i++) :
											if ($cuckoo_font['testimonial-author-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="testimonial-author-lheight" value="<?php echo $cuckoo_font['testimonial-author-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-7" value="<?php echo $back = empty($cuckoo_font['testimonial-author-color']) ? '#' : $cuckoo_font['testimonial-author-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-7" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['testimonial-author-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-7" />
								<div id="color_picker_color-7" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
<!-- Testimonial Unit Details -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Testimonial Unit Details', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="testimonial-details-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-details-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-details-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="testimonial-details-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-details-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="testimonial-details-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-details-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="testimonial-details-size">
									<?php
										for($i=3; $i<=50; $i++) :
											if ($cuckoo_font['testimonial-details-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="testimonial-details-lheight" value="<?php echo $cuckoo_font['testimonial-details-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-details" value="<?php echo $back = empty($cuckoo_font['testimonial-details-color']) ? '#' : $cuckoo_font['testimonial-details-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-details" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['testimonial-details-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-details" />
								<div id="color_picker_color-details" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Font of Text Box Unit -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Font of Text Box Unit', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="text-box-testimonials-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['text-box-testimonials-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['text-box-testimonials-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="text-box-testimonials-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['text-box-testimonials-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="text-box-testimonials-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['text-box-testimonials-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="text-box-testimonials-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['text-box-testimonials-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="text-box-testimonials-lheight" value="<?php echo $cuckoo_font['text-box-testimonials-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-6" value="<?php echo $back = empty($cuckoo_font['text-box-testimonials-color']) ? '#' : $cuckoo_font['text-box-testimonials-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-6" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['text-box-testimonials-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-6" />
								<div id="color_picker_color-6" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Blog Posts', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
<!-- Blog Post List Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Blog Post List Title', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="ptl-title-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['ptl-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['ptl-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="ptl-title-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['ptl-title-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="ptl-title-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['ptl-title-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="ptl-title-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['ptl-title-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="ptl-title-lheight" value="<?php echo $cuckoo_font['ptl-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-13" value="<?php echo $back = empty($cuckoo_font['ptl-title-color']) ? '#' : $cuckoo_font['ptl-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-13" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['ptl-title-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-13" />
								<div id="color_picker_color-13" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Blog Post Details Font -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Blog Post Details Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="details-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['details-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['details-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="details-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['details-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="details-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['details-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="details-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['details-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="details-lheight" value="<?php echo $cuckoo_font['details-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-11" value="<?php echo $back = empty($cuckoo_font['details-color']) ? '#' : $cuckoo_font['details-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-11" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['details-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-11" />
								<div id="color_picker_color-11" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Single post Page Details -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Single Post Page Details', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="single-post-details-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['single-post-details-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['single-post-details-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="single-post-details-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['single-post-details-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="single-post-details-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['single-post-details-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="single-post-details-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['single-post-details-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="single-post-details-lheight" value="<?php echo $cuckoo_font['single-post-details-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-single-post-details" value="<?php echo $back = empty($cuckoo_font['single-post-details-color']) ? '#' : $cuckoo_font['single-post-details-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-single-post-details" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['single-post-details-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-single-post-details" />
								<div id="color_picker_color-single-post-details" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Works', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
<!-- Work list Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Work Thumbnail Title', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="workl-title-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['workl-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['workl-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="workl-title-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['workl-title-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="workl-title-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['workl-title-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="workl-title-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['workl-title-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="workl-title-lheight" value="<?php echo $cuckoo_font['workl-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-17" value="<?php echo $back = empty($cuckoo_font['workl-title-color']) ? '#' : $cuckoo_font['workl-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-17" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['workl-title-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-17" />
								<div id="color_picker_color-17" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Work list Subtitle -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Work Thumbnail Subtitle (Work Type)', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="workl-subtitle-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['workl-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['workl-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="workl-subtitle-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['workl-subtitle-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="workl-subtitle-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['workl-subtitle-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="workl-subtitle-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['workl-subtitle-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="workl-subtitle-lheight" value="<?php echo $cuckoo_font['workl-subtitle-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-18" value="<?php echo $back = empty($cuckoo_font['workl-subtitle-color']) ? '#' : $cuckoo_font['workl-subtitle-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-18" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['workl-subtitle-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-18" />
								<div id="color_picker_color-18" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>	
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Landing Pages', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
<!-- Post & Work Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Post & Work Title', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="pwp-title-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['pwp-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['pwp-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="pwp-title-weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['pwp-title-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="pwp-title-style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['pwp-title-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="pwp-title-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['pwp-title-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="pwp-title-lheight" value="<?php echo $cuckoo_font['pwp-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-3" value="<?php echo $back = empty($cuckoo_font['pwp-title-color']) ? '#' : $cuckoo_font['pwp-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-3" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['pwp-title-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-3" />
								<div id="color_picker_color-3" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Page Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Page Title', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="page-title-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['page-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['page-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="page-title-weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['page-title-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="page-title-style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['page-title-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="page-title-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['page-title-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="page-title-lheight" value="<?php echo $cuckoo_font['page-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-page" value="<?php echo $back = empty($cuckoo_font['page-title-color']) ? '#' : $cuckoo_font['page-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-page" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['page-title-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-page" />
								<div id="color_picker_color-page" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>	
<!-- Work & Page Subtitle Line -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Work & Page Subtitle Line', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="pwp-subtitle-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['pwp-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['pwp-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="pwp-subtitle-weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['pwp-subtitle-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="pwp-subtitle-style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['pwp-subtitle-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="pwp-subtitle-size">
									<?php
										for($i=3; $i<=50; $i++) :
											if ($cuckoo_font['pwp-subtitle-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="pwp-subtitle-lheight" value="<?php echo $cuckoo_font['pwp-subtitle-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-4" value="<?php echo $back = empty($cuckoo_font['pwp-subtitle-color']) ? '#' : $cuckoo_font['pwp-subtitle-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-4" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['pwp-subtitle-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-4" />
								<div id="color_picker_color-4" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>		
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Team', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
<!-- Team List Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Team Member List Title', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="ptl-team-title-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['ptl-team-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['ptl-team-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="ptl-team-title-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['ptl-team-title-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="ptl-team-title-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['ptl-team-title-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="ptl-team-title-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['ptl-team-title-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="ptl-team-title-lheight" value="<?php echo $cuckoo_font['ptl-team-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-37" value="<?php echo $back = empty($cuckoo_font['ptl-team-title-color']) ? '#' : $cuckoo_font['ptl-team-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-37" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['ptl-team-title-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-37" />
								<div id="color_picker_color-37" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Team Members Occupation -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e("Team Member's Occupation Title", 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="occupation-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['occupation-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['occupation-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="occupation-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['occupation-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="occupation-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['occupation-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="occupation-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['occupation-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="occupation-lheight" value="<?php echo $cuckoo_font['occupation-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-14" value="<?php echo $back = empty($cuckoo_font['occupation-color']) ? '#' : $cuckoo_font['occupation-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-14" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['occupation-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-14" />
								<div id="color_picker_color-14" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Team & Testimonials Content Text -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Single Team Member Page Intro Text', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="tt-content-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['tt-content-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['tt-content-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="tt-content-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['tt-content-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="tt-content-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['tt-content-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="tt-content-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['tt-content-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="tt-content-lheight" value="<?php echo $cuckoo_font['tt-content-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-15" value="<?php echo $back = empty($cuckoo_font['tt-content-color']) ? '#' : $cuckoo_font['tt-content-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-15" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['tt-content-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-15" />
								<div id="color_picker_color-15" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>	
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Single Testimonial Page', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
<!-- Body Font of Testimonial Page Template -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Testimonial Body Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="testimonial-template-content-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-template-content-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-template-content-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="testimonial-template-content-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-template-content-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="testimonial-template-content-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-template-content-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="testimonial-template-content-size">
									<?php
										for($i=3; $i<=50; $i++) :
											if ($cuckoo_font['testimonial-template-content-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="testimonial-template-content-lheight" value="<?php echo $cuckoo_font['testimonial-template-content-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-template-content" value="<?php echo $back = empty($cuckoo_font['testimonial-template-content-color']) ? '#' : $cuckoo_font['testimonial-template-content-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-template-content" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['testimonial-template-content-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-template-content" />
								<div id="color_picker_color-template-content" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Testimonial Template Author -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Testimonial Author', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="testimonial-template-author-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-template-author-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-template-author-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="testimonial-template-author-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-template-author-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="testimonial-template-author-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-template-author-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="testimonial-template-author-size">
									<?php
										for($i=3; $i<=50; $i++) :
											if ($cuckoo_font['testimonial-template-author-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="testimonial-template-author-lheight" value="<?php echo $cuckoo_font['testimonial-template-author-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-template-author" value="<?php echo $back = empty($cuckoo_font['testimonial-template-author-color']) ? '#' : $cuckoo_font['testimonial-template-author-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-template-author" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['testimonial-template-author-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-template-author" />
								<div id="color_picker_color-template-author" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Testimonial Template details -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Testimonial Details', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="testimonial-template-details-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-template-details-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-template-details-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="testimonial-template-details-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-template-details-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="testimonial-template-details-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-template-details-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="testimonial-template-details-size">
									<?php
										for($i=3; $i<=50; $i++) :
											if ($cuckoo_font['testimonial-template-details-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="testimonial-template-details-lheight" value="<?php echo $cuckoo_font['testimonial-template-details-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-template-details" value="<?php echo $back = empty($cuckoo_font['testimonial-template-details-color']) ? '#' : $cuckoo_font['testimonial-template-details-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-template-details" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['testimonial-template-details-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-template-details" />
								<div id="color_picker_color-template-details" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>	
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Widgets', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
<!-- Widget Title Font -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Widget Title Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="widgest-title-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['widgest-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['widgest-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="widgest-title-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['widgest-title-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="widgest-title-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['widgest-title-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="widgest-title-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['widgest-title-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="widgest-title-lheight" value="<?php echo $cuckoo_font['widgest-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-widgest-title" value="<?php echo $back = empty($cuckoo_font['widgest-title-color']) ? '#' : $cuckoo_font['widgest-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-widgest-title" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['widgest-title-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-widgest-title" />
								<div id="color_picker_color-widgest-title" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Tag Font -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Tag Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="tag-widgets-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['tag-widgets-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['tag-widgets-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="tag-widgets-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['tag-widgets-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="tag-widgets-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['tag-widgets-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="tag-widgets-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['tag-widgets-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="tag-widgets-lheight" value="<?php echo $cuckoo_font['tag-widgets-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-tag-widgets" value="<?php echo $back = empty($cuckoo_font['tag-widgets-color']) ? '#' : $cuckoo_font['tag-widgets-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-tag-widgets" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['tag-widgets-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-tag-widgets" />
								<div id="color_picker_color-tag-widgets" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>				
				<div class="general_title_active">
					<span class="float_left"><?php _e('Related Content', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
<!-- Related posts title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Related Posts Title', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="related-posts-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['related-posts-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['related-posts-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="related-posts-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['related-posts-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="related-posts-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['related-posts-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="related-posts-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['related-posts-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="related-posts-lheight" value="<?php echo $cuckoo_font['related-posts-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-related-posts" value="<?php echo $back = empty($cuckoo_font['related-posts-color']) ? '#' : $cuckoo_font['related-posts-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-related-posts" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['related-posts-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-related-posts" />
								<div id="color_picker_color-related-posts" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Related Works Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Related Works Title', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="related-works-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['related-works-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['related-works-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="related-works-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['related-works-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="related-works-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['related-works-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="related-works-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['related-works-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="related-works-lheight" value="<?php echo $cuckoo_font['related-works-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-related-works" value="<?php echo $back = empty($cuckoo_font['related-works-color']) ? '#' : $cuckoo_font['related-works-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-related-works" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['related-works-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-related-works" />
								<div id="color_picker_color-related-works" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Related Team Members Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Related Team Members Title', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="related-team-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['related-team-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['related-team-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="related-team-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['related-team-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="related-team-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['related-team-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="related-team-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['related-team-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="related-team-lheight" value="<?php echo $cuckoo_font['related-team-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-related-team" value="<?php echo $back = empty($cuckoo_font['related-team-color']) ? '#' : $cuckoo_font['related-team-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-related-team" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['related-team-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-related-team" />
								<div id="color_picker_color-related-team" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Comments', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
<!-- Comments Unit Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Comments Unit Title', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="comment-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['comment-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['comment-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="comment-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['comment-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="comment-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['comment-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="comment-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['comment-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="comment-lheight" value="<?php echo $cuckoo_font['comment-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-19" value="<?php echo $back = empty($cuckoo_font['comment-color']) ? '#' : $cuckoo_font['comment-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-19" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['comment-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-19" />
								<div id="color_picker_color-19" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Comments Details -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Comments Details', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="comments-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['comments-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['comments-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="comments-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['comments-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="comments-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['comments-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="comments-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['comments-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="comments-lheight" value="<?php echo $cuckoo_font['comments-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-comments" value="<?php echo $back = empty($cuckoo_font['comments-color']) ? '#' : $cuckoo_font['comments-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-comments" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['comments-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-comments" />
								<div id="color_picker_color-comments" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>			
<!-- Leave a reply Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Reply Unit Title', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="reply-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['reply-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['reply-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="reply-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['reply-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="reply-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['reply-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="reply-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['reply-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="reply-lheight" value="<?php echo $cuckoo_font['reply-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-20" value="<?php echo $back = empty($cuckoo_font['reply-color']) ? '#' : $cuckoo_font['reply-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-20" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['reply-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-20" />
								<div id="color_picker_color-20" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Contacts', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
<!-- Body of Contact Unit with Map Background  -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Body of Contact Unit with Map Background', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="contact-last-col-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['contact-last-col-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['contact-last-col-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="contact-last-col-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['contact-last-col-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="contact-last-col-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['contact-last-col-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="contact-last-col-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['contact-last-col-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="contact-last-col-lheight" value="<?php echo $cuckoo_font['contact-last-col-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-contact-last-col" value="<?php echo $back = empty($cuckoo_font['contact-last-col-color']) ? '#' : $cuckoo_font['contact-last-col-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-contact-last-col" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['contact-last-col-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-contact-last-col" />
								<div id="color_picker_color-contact-last-col" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Links of Contact Unit with Map Background -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Links of Contact Unit with Map Background', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="links-last-col-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['links-last-col-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['links-last-col-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="links-last-col-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['links-last-col-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="links-last-col-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['links-last-col-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="links-last-col-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['links-last-col-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="links-last-col-lheight" value="<?php echo $cuckoo_font['links-last-col-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-links-last-col" value="<?php echo $back = empty($cuckoo_font['links-last-col-color']) ? '#' : $cuckoo_font['links-last-col-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-links-last-col" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['links-last-col-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-links-last-col" />
								<div id="color_picker_color-links-last-col" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Links Hover of Contact Unit with Map Background -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Links Hover of Contact Unit with Map Background', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="links-hover-last-col-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['links-hover-last-col-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['links-hover-last-col-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="links-hover-last-col-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['links-hover-last-col-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="links-hover-last-col-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['links-hover-last-col-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="links-hover-last-col-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['links-hover-last-col-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="links-hover-last-col-lheight" value="<?php echo $cuckoo_font['links-hover-last-col-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-links-hover-last-col" value="<?php echo $back = empty($cuckoo_font['links-hover-last-col-color']) ? '#' : $cuckoo_font['links-hover-last-col-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-links-hover-last-col" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['links-hover-last-col-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-links-hover-last-col" />
								<div id="color_picker_color-links-hover-last-col" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Body of Contact Unit with Custom Background -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Body of Contact Unit with Custom Background', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="contact-custom-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['contact-custom-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['contact-custom-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="contact-custom-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['contact-custom-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="contact-custom-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['contact-custom-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="contact-custom-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['contact-custom-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="contact-custom-lheight" value="<?php echo $cuckoo_font['contact-custom-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-contact-custom" value="<?php echo $back = empty($cuckoo_font['contact-custom-color']) ? '#' : $cuckoo_font['contact-custom-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-contact-custom" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['contact-custom-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-contact-custom" />
								<div id="color_picker_color-contact-custom" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Links of Contact Unit with Custom Background -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Links of Contact Unit with Custom Background', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="contact-links-custom-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['contact-links-custom-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['contact-links-custom-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="contact-links-custom-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['contact-links-custom-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="contact-links-custom-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['contact-links-custom-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="contact-links-custom-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['contact-links-custom-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="contact-links-custom-lheight" value="<?php echo $cuckoo_font['contact-links-custom-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-contact-links-custom" value="<?php echo $back = empty($cuckoo_font['contact-links-custom-color']) ? '#' : $cuckoo_font['contact-links-custom-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-contact-links-custom" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['contact-links-custom-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-contact-links-custom" />
								<div id="color_picker_color-contact-links-custom" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Links Hover of Contact Unit with Custom Background -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Links Hover of Contact Unit with Custom Background', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="contact-cuctom-links-hover-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['contact-cuctom-links-hover-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['contact-cuctom-links-hover-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="contact-cuctom-links-hover-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['contact-cuctom-links-hover-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="contact-cuctom-links-hover-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['contact-cuctom-links-hover-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="contact-cuctom-links-hover-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['contact-cuctom-links-hover-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="contact-cuctom-links-hover-lheight" value="<?php echo $cuckoo_font['contact-cuctom-links-hover-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-contact-cuctom-links-hover" value="<?php echo $back = empty($cuckoo_font['contact-cuctom-links-hover-color']) ? '#' : $cuckoo_font['contact-cuctom-links-hover-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-contact-cuctom-links-hover" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['contact-cuctom-links-hover-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-contact-cuctom-links-hover" />
								<div id="color_picker_color-contact-cuctom-links-hover" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Other Theme Elements', 'cuckoothemes'); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
<!-- Body -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Body Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="body-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['body-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['body-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="body-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['body-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="body-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['body-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="body-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['body-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="body-lheight" value="<?php echo $cuckoo_font['body-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-10" value="<?php echo $back = empty($cuckoo_font['body-color']) ? '#' : $cuckoo_font['body-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-10" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['body-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-10" />
								<div id="color_picker_color-10" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- Buttons Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Button Title Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="button-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['button-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['button-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="button-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['button-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="button-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['button-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="button-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['button-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="button-lheight" value="<?php echo $cuckoo_font['button-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-9" value="<?php echo $back = empty($cuckoo_font['button-color']) ? '#' : $cuckoo_font['button-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-9" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['button-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-9" />
								<div id="color_picker_color-9" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- LigthBox -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Lightbox Title Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="lightbox-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['lightbox-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['lightbox-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="lightbox-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['lightbox-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="lightbox-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['lightbox-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="lightbox-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['lightbox-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="lightbox-lheight" value="<?php echo $cuckoo_font['lightbox-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-26" value="<?php echo $back = empty($cuckoo_font['lightbox-color']) ? '#' : $cuckoo_font['lightbox-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-26" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['lightbox-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-26" />
								<div id="color_picker_color-26" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
<!-- h1 -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Header 1', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="h1-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['h1-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['h1-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="h1-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['h1-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="h1-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['h1-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="h1-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['h1-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="h1-lheight" value="<?php echo $cuckoo_font['h1-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-21" value="<?php echo $back = empty($cuckoo_font['h1-color']) ? '#' : $cuckoo_font['h1-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-21" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['h1-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-21" />
								<div id="color_picker_color-21" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>	
<!-- h2 -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Header 2', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="h2-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['h2-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['h2-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="h2-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['h2-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="h2-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['h2-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="h2-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['h2-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="h2-lheight" value="<?php echo $cuckoo_font['h2-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-22" value="<?php echo $back = empty($cuckoo_font['h2-color']) ? '#' : $cuckoo_font['h2-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-22" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['h2-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-22" />
								<div id="color_picker_color-22" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>	
<!-- h3 -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Header 3', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="h3-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['h3-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['h3-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="h3-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['h3-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="h3-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['h3-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="h3-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['h3-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="h3-lheight" value="<?php echo $cuckoo_font['h3-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-23" value="<?php echo $back = empty($cuckoo_font['h3-color']) ? '#' : $cuckoo_font['h3-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-23" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['h3-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-23" />
								<div id="color_picker_color-23" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>		
<!-- h4 -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Header 4', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="h4-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['h4-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['h4-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="h4-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['h4-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="h4-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['h4-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="h4-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['h4-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="h4-lheight" value="<?php echo $cuckoo_font['h4-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-24" value="<?php echo $back = empty($cuckoo_font['h4-color']) ? '#' : $cuckoo_font['h4-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-24" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['h4-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-24" />
								<div id="color_picker_color-24" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>		
<!-- h5 -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Header 5', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="h5-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['h5-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['h5-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="h5-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['h5-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="h5-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['h5-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="h5-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['h5-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="h5-lheight" value="<?php echo $cuckoo_font['h5-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-25" value="<?php echo $back = empty($cuckoo_font['h5-color']) ? '#' : $cuckoo_font['h5-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-25" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['h5-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-25" />
								<div id="color_picker_color-25" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
<!-- Alerts -->
					<div class="section_settings" style="border-bottom:0;">
						<div class="settings_left_title">
							<?php _e('Alerts Font', 'cuckoothemes'); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', 'cuckoothemes'); ?>
							</div>
							<select class="font_select" name="alerts-font">
								<?php
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['alerts-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['alerts-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select_first" name="alerts-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['alerts-weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', 'cuckoothemes'); ?>
								</div>
								<select class="mini_select" name="alerts-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['alerts-style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
								?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', 'cuckoothemes'); ?>
								</div>
								<select class="mini_last_select" name="alerts-size">
									<?php
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['alerts-size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', 'cuckoothemes'); ?>
								</div>
								<input class="mini_select-input" type="text" name="alerts-lheight" value="<?php echo $cuckoo_font['alerts-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', 'cuckoothemes'); ?>
								</div>				
								<input type="text" id="color-12" value="<?php echo $back = empty($cuckoo_font['alerts-color']) ? '#' : $cuckoo_font['alerts-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-12" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['alerts-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-12" />
								<div id="color_picker_color-12" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', 'cuckoothemes'); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<p style="display:inline;">
				<input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" />
			</p>
			<?php cuckoo_framework_footer(); ?>
		</form>
	</section>