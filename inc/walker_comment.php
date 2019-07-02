<?php

/*
 * wlaker class for comments
 */

class AriDiAg_Walker_Comments extends Walker_Comment {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1;

    $output .= '<ul class="media-list children">' . "\n";
	}

	public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;

    if ( '0' == $comment->comment_approved ) {
      return;
    }

    ob_start();
    $this->comment( $comment, $depth, $args );
    $output .= ob_get_clean();
	}

	public function end_el( &$output, $comment, $depth = 0, $args = array() ) {
    $output .= "</li><!-- #comment-## -->\n";
	}

	protected function comment( $comment, $depth, $args ) {
    ?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( array($this->has_children ? 'parent' : '', 'media') , $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
        <div class="comment">
          <a href="<?php echo esc_url( get_comment_author_link( $comment ) ); ?>" class="pull-left">
              <img src="<?php echo esc_url( get_avatar_url( $comment ) ); ?>" alt="" class="img-circle">
          </a>
          <div class="media-body">
              <strong class="text-success"><?php echo get_comment_author_link( $comment ); ?></strong>
              <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                <span class="text-muted">
                  <small class="text-muted">
                    <time datetime="<?php comment_time( 'c' ); ?>">
      								<?php
      									/* translators: 1: comment date, 2: comment time */
      									printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
      								?>
                      <?php // TODO: Implement Time format like '6 days ago' or '5 minutes ago' ?>
      							</time>
                  </small>
                </span>
              </a>
              <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link text-muted"><small class="text-muted">', '</small></span>' ); ?>

              <div class="comment-content">
      					<p><?php comment_text(); ?></p>
      				</div><!-- .comment-content -->

              <?php
      				$reply_link = get_comment_reply_link( array_merge( $args, array(
      					'add_below' => 'div-comment',
      					'depth'     => $depth,
      					'max_depth' => $args['max_depth'],
      					'before'    => '<div class="reply">',
      					'after'     => '</div>'
      				) ) );

              $reply_link = str_replace("class='comment-reply-link", "class='btn btn-primary btn-sm", $reply_link);
              echo $reply_link;
      				?>
          </div>
          <div class="clearfix"></div>
          <br>
        </div>
			</article><!-- .comment-body -->
<?php
	}
}
