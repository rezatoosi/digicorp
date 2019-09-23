<?php
$object_id = get_queried_object_id();
$object_title = esc_html( get_the_title( $object_id ) );
$object_desc = esc_html( get_post_meta( $object_id, "post_desc", true) );

$sections_class = 'visual';
$post_type = get_post_type( $object_id );
switch( $post_type )
{
    case 'ariana-services':
      $sections_class .= ' color13';
    break;

}
?>
<section id="page-header" class="<?php echo $sections_class; ?>">
    <div class="container">
        <div class="text-block">
            <div class="heading-holder">
                <h1><?php echo $object_title; ?></h1>
            </div>
            <?php if ( !empty( $object_desc ) ) { ?>
              <h3 class="tagline">
                <?php echo $object_desc; ?>
              </h3>
            <?php } ?>
        </div>
    </div>
</section>
