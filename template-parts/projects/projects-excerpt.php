<?php
if ( has_post_thumbnail() ) {
  $img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'small' )[0];
} else {
  $img_url = digicorp_get_projects_default_image_uri();
}
$img_markup = sprintf(
  '<img src="%s" alt="%s">',
  $img_url,
  $post->post_title
);

$portfo = '';
if ( has_term( '', 'ariana-portfolio' ) ) {
  $portfo = get_the_terms( $post->ID, 'ariana-portfolio' );
  if ( $portfo && ! is_wp_error( $portfo ) ) {
    $portfo =  $portfo[0]->name;
  }
} elseif ( has_term( '', 'ariana-type-tags' ) ) {
  $portfo = get_the_terms( $post->ID, 'ariana-type-tags' );
  if ( $portfo && ! is_wp_error( $portfo ) ) {
    $portfo =  $portfo[0]->name;
  }
} else {
  $portfo = __( 'Web Services', 'digicorpdomain' );
}

?>
<article class="project-box item">
  <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
    <figure>
      <?php echo $img_markup ?>
      <figcaption class="project-box__content">
        <h3 class="project-box__title">
          <span class="project-box__subtitle"><?php echo $portfo ?></span>
          <?php the_title() ?>
        </h3>
      </figcaption>
    </figure>
  </a>
</article>
