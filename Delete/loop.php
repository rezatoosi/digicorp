<?php
/*
	The include for displaying the loop in static pages.
*/

if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php if ( is_front_page() ) { ?>
					<?php } else { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } ?>

					<section class="entry-content">
						<?php the_content(); ?>
					</section><!-- .entry-content -->
				</article><!-- #post-## -->

	<?php do_action( 'compass_comments' ); /* action hook for comments - pluggable so you can override it if you don't want comments displayed */?>

<?php endwhile; ?>
