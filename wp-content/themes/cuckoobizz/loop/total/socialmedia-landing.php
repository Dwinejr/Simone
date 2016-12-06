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
** Name : Social media & search block
*/
$cuckoo_social = get_option( THEMEPREFIX . "_social_settings" );

$backgroundColor 		= ( !empty($cuckoo_social['settings']['background']['background-setting-social-color']) ? $cuckoo_social['settings']['background']['background-setting-social-color'] != '#' ? 'background-color:'.$cuckoo_social['settings']['background']['background-setting-social-color'].';' : '' : '' );
$backgroundImage 		= ( !empty($cuckoo_social['settings']['background']['background-social-image']) ? "background-image:url('".$cuckoo_social['settings']['background']['background-social-image']."');" : '' );
$backgroundPosition 	= ( !empty($cuckoo_social['settings']['background']['background-position-social']) ? 'background-position:'.$cuckoo_social['settings']['background']['background-position-social'].';' : '' );
$backgroundAttachment 	= ( !empty($cuckoo_social['settings']['background']['background-setting-attach-social']) ? 'background-attachment:'.$cuckoo_social['settings']['background']['background-setting-attach-social'].';' : '' );
$backgroundRepeat	 	= ( !empty($cuckoo_social['settings']['background']['background-setting-reapet-social']) ? 'background-repeat:'.$cuckoo_social['settings']['background']['background-setting-reapet-social'].';': '' );
$parallaxSpeed			= ( !empty($cuckoo_social['settings']['background']['parallax-speed-social']) ? $cuckoo_social['settings']['background']['parallax-speed-social'] : 10 );
$paralax 				= $cuckoo_social['settings']['background']['parallax-social'];
if( $backgroundColor && !$backgroundImage ) :
	$backgroundImage = 'background-image:none;';
endif;
if(!$backgroundImage or $backgroundImage == 'background-image:none;' ) :
	$backgroundPosition = ''; $backgroundAttachment = ''; $backgroundRepeat = '';
endif;
if($paralax == 1) :
	$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundRepeat . ' background-attachment:fixed" data-type="background" data-speed="'.$parallaxSpeed.'"';
else :
	$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundPosition . $backgroundAttachment . $backgroundRepeat . '"';
endif;
?>
<?php if($cuckoo_social['settings']['another']['display_media_search'] == 1) : ?>
	<section id="social-media-landing-page" class="social-media-wrap clearfix parallax-background" <?php echo $style; ?>>
		<article class="social-media-content screen-large">
			<div class="social-media-box">
				<div class="social-media">
					<?php if( $cuckoo_social['elements'] != null ){
						foreach($cuckoo_social['elements'] as $k=>$v){
							foreach($v as $key=>$value){ 
								if($value['values'] != null){ ?>
									<a class="<?php echo $value['class'] ?>-large" title="<?php echo $value['name']; ?>" <?php if($value['name'] != 'Email') { ?> target="_blank" <?php } ?> href="<?php echo $value['link'].$value['values']; ?>"></a>
								<?php }
							}
						}
					}?>
				</div>
			</div>
		</article>
	</section>
<?php endif; ?>