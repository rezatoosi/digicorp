<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DIGICORP
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

    if ( isset( $_SERVER['SCRIPT_FILENAME'] ) && basename( $_SERVER['SCRIPT_FILENAME'] ) == 'comments.php' ){
      die('<h1>Error!</h1>');
    }

    if ( post_password_required() ) {
      return;
    }

    // including walker classes
    require get_template_directory() . '/inc/walker_comment.php';
?>

<?php
if ( have_comments() ) : ?>
  <div id="comments" class="comments-area blog-micro-wrapper padding-top-md">
      <div class="related-posts">
          <div class="section-title text-left">
              <h5>
                <?php
          			$comments_number = get_comments_number();
          			if ( '1' === $comments_number ) {
          				printf(
                    /* translators: %s: post title */
                    _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'digicorpdomain' ),
                      get_the_title()
                  );
          			} else {
          				printf(
          					/* translators: 1: number of comments, 2: post title */
          					_nx(
          						'%1$s Reply to &ldquo;%2$s&rdquo;',
          						'%1$s Replies to &ldquo;%2$s&rdquo;',
          						$comments_number,
          						'comments title',
          						'digicorpdomain'
          					),
          					number_format_i18n( $comments_number ),
          					get_the_title()
          				);
          			}
          			?>
              </h5>
              <hr>
          </div>


          <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-info">
                      <div class="panel-body comments">
                        <ul class="media-list">
                          <?php
                    				wp_list_comments( array(
                    					'avatar_size' => 100,
                    					'style'       => 'ul',
                    					'short_ping'  => true,
                    					'reply_text'  => __( 'Reply', 'digicorpdomain' ),
                              'walker'      => new AriDiAg_Walker_Comments()
                    				) );
                    			?>
                        </ul>

                        <?php the_comments_pagination( array(
                          'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'digicorpdomain' ) . '</span>',
                          'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'digicorpdomain' ) . '</span>',
                        ) ); ?>

                      </div>
                  </div>
              </div>
          </div>

      </div><!-- end postpager -->
  </div><!-- end content -->
<?php endif; ?>

<?php
// TODO: Add a link to login (with redirect to current location) in top of the form or a link to login popup modal

// TODO: Add "login using google" or "sign up using google" or "Login using Facebook"

// Add comment form
$fields   =  array(
  'author'  => '<div class="col-md-4 col-sm-12">' . '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'digicorpdomain' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
         '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245" class="form-control"' . $html_req . ' /></p></div>',
  'email'   => '<div class="col-md-4 col-sm-12">' . '<p class="comment-form-email"><label for="email">' . __( 'Email', 'digicorpdomain' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
         '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes" class="form-control"' . $html_req . ' /></p></div>',
  'url'     => '<div class="col-md-4 col-sm-12">' . '<p class="comment-form-url"><label for="url">' . __( 'Website', 'digicorpdomain' ) . '</label> ' .
         '<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" class="form-control" /></p></div>',
);
$defaults = array(
  'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
  'comment_field'        => '<div class="col-md-12 col-sm-12"><p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'digicorpdomain' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" class="form-control" required="required"></textarea></p></div>',
  /** This filter is documented in wp-includes/link-template.php */
  'must_log_in'          => '<div class="col-md-12 col-sm-12"><p class="must-log-in">' . sprintf(
                                /* translators: %s: login URL */
                                __( 'You must be <a href="%s">logged in</a> to post a comment.', 'digicorpdomain' ),
                                wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
                            ) . '</p></div>',
  /** This filter is documented in wp-includes/link-template.php */
  'logged_in_as'         => '<div class="col-md-12 col-sm-12"><p class="logged-in-as">' . sprintf(
                                /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
                                __( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>', 'digicorpdomain' ),
                                get_edit_user_link(),
                                /* translators: %s: user name */
                                esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.', 'digicorpdomain' ), $user_identity ) ),
                                $user_identity,
                                wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
                            ) . '</p></div>',
  'comment_notes_before' =>  '', //'<p class="comment-notes"><span id="email-notes">' . __( 'Your email address will not be published.', 'digicorpdomain' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>',
  // 'comment_notes_after'  => '',
  'action'               => site_url( '/wp-comments-post.php' ),
  'id_form'              => 'commentform',
  'id_submit'            => 'submit',
  'class_form'           => 'comment-form row',
  'class_submit'         => 'submit btn btn-primary',
  'name_submit'          => 'submit',
  'title_reply'          => __( 'Leave a Comment', 'digicorpdomain' ),
                          /* translators: %s: name of the user reply to */
  'title_reply_to'       => __( 'Leave a Comment to %s', 'digicorpdomain' ),
  'title_reply_before'   => '<div class="section-title text-left"><h5 id="reply-title" class="comment-reply-title">',
  'title_reply_after'    => '</h5><hr></div>',
  'cancel_reply_before'  => ' <small>',
  'cancel_reply_after'   => '</small>',
  'cancel_reply_link'    => __( 'Cancel reply', 'digicorpdomain' ),
  'label_submit'         => __( 'Post Comment', 'digicorpdomain' ),
  'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
  'submit_field'         => '<div class="col-md-12 col-sm-12"><p class="form-submit">%1$s %2$s</p></div>',
  'format'               => 'xhtml',
);
?>
<div class="blog-micro-wrapper">
    <div class="comment-wrap">
      <div class="contact_form">
        <?php
          if ( ! function_exists( 'digicorp_posted_on_move_comment_field_to_bottom' ) ):
            function digicorp_posted_on_move_comment_field_to_bottom( $fields ) {
              $comment_field = $fields['comment'];
              unset( $fields['comment'] );
              $fields['comment'] = $comment_field;
              return $fields;
            }
          endif;

          add_filter( 'comment_form_fields', 'digicorp_posted_on_move_comment_field_to_bottom' );

          comment_form( $defaults );
        ?>
      </div><!-- end commentform -->
    </div><!-- end postpager -->
</div><!-- end content -->
