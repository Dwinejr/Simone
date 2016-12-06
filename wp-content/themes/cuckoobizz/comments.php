<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
**************
*
** Comments 
*/


// Do not delete these lines
        if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	                die ('Please do not load this page directly. Thanks!');
	
	        if ( post_password_required() ) { ?>
	                <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'cuckoothemes'); ?></p>
        <?php
	                return;
	        }
	?>
	
	<!-- You can start editing here. -->
<?php if ( have_comments() or  comments_open() ) : ?>
	<section id="comments">
		<header id="comments-title" title="<?php  if ( have_comments() ) : _e('Hide Comments', 'cuckoothemes'); else: _e('Show Comments', 'cuckoothemes'); endif; ?>">
			<div class="comments-title-area screen-large">
				<h2>
					<?php printf( _n( __('Comments', 'cuckoothemes'), __('Comments', 'cuckoothemes'), get_comments_number(), 'cuckoothemes' ), number_format_i18n( get_comments_number() ), '' . get_the_title() . '' ); ?>
				</h2>
				<div class="comment-toggle-element">
					<div class="comment-arrow <?php  if ( have_comments() ) : ?>open-comment<?php else: ?>comment-toggle<?php endif; ?>"></div>
				</div>
			</div>
		</header>
		<div id="comments-main" <?php  if ( have_comments() ) : ?> style="display:block;"<?php endif; ?>>
			<?php if ( have_comments() ) : ?>
				<?php
				previous_comments_link();
				$loginUsert = "";
					if ( is_user_logged_in() ) {
						$loginUsert = "loginuser";
					}
				?>
				<ol class="comment-elements <?php echo $loginUsert; ?>">
					<?php wp_list_comments( array( 'callback' => 'cuckoo_comment' ) ); ?>
				</ol>	
				<?php next_comments_link(); ?>
			<?php endif; ?>
			
			<?php if ( comments_open() ) : ?>
					
				<?php			
				$regifend =  $req != null ? "aria-required='true'" : "";
				$regif = $req != null ? ' <span class="required-span">*</span>' : "";
				$regifemail = $req != null ? ' <span class="required-span">*</span>' : "";
				$regifendemail = $req != null ? "aria-required='true'" : "";
				
				$args = array(
					'id_form' => 'commentform',
					'id_submit' => 'submit',
					'title_reply' => __( 'Leave a Reply' , 'cuckoothemes'),
					'title_reply_to' => __( 'Leave a Reply to %s', 'cuckoothemes' ),
					'cancel_reply_link' => __( 'Cancel Reply', 'cuckoothemes' ),
					'label_submit' => __( 'Post Comment', 'cuckoothemes' ),
					'comment_field' => '<div class="respond-column-2"><div class="comment-form-texteare"><label class="form_label_textarea" for="comment">' . __( 'Enter Your Comment Here...', 'cuckoothemes' ) . '</label><textarea class="overlayField_textarea" id="comment" name="comment" aria-required="true"></textarea></div></div>',
					'must_log_in' => '<div class="respond-column-1"><p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'cuckoothemes' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p></div>',
					'logged_in_as' => '<div class="respond-column-1"><p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' , 'cuckoothemes' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p></div>',
					'comment_notes_before' => '',
					'comment_notes_after' => '',
					'fields' => apply_filters( 'comment_form_default_fields', array(
						'author' => '<div class="about_required">'.__( 'Required Fields <span class="required-span">*</span><br />Your email will not be published.', 'cuckoothemes' ).'</div><div class="not-login-form"><p class="comment-form-author"><label class="form_label_logs_name" for="author">'. __( 'Name ', 'cuckoothemes' ) . ' ' . $regif  .'</label><input id="author" class="overlayField_name" name="author" type="text" value="'. esc_attr($comment_author) .'" size="30" '. $regifend .' /></p>',
						'email' => '<p class="comment-form-email"><label class="form_label_logs_email" for="email">'. __( 'Email ', 'cuckoothemes' ) .' '. $regifemail . '</label><input id="email" class="overlayField_email" name="email" type="email" value="'. esc_attr($comment_author_email) .'" size="30" '. $regifendemail  .' /></p></div>'
						) )
				);

				?>
					
					<?php comment_form($args);  ?>
			
			<?php endif; // if you delete this the sky will fall on your head ?>
		</div>
	</section>
<?php endif; ?>