<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
**************
*
*
*
** Name: Password block
*/
/* Get elemet Class */
$class;
if( is_singular('works') ):
	$class = "work";
elseif( is_singular() ) :
	$class = "post";
endif;
?>
<section id="password-item" class="<?php echo $class; ?> screen-large">
	<div class="password-box">
		<div class="item-alert-box">
			<div class="item-alert-text">
				<div class="item-alert-image-password"></div>
				<div class="password-correct"><?php echo cuckoo_get_the_password_form(__("This POST is password protected.<br /> To view it please enter your password:", 'cuckoothemes') , __("Submit", 'cuckoothemes'), 'Password') ?></div>
			</div>
		</div>
	</div>
</section>