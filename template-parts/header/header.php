<?php
$object_id = get_queried_object_id();
$object_title = esc_html( get_the_title( $object_id ) );
$object_desc = esc_html( get_post_meta( $object_id, "post_desc", true) );
?>
<section id="page-header" class="visual">
    <div class="container">
        <div class="text-block">
            <div class="heading-holder">
                <h1><?php echo $object_title; ?></h1>
            </div>
            <?php if ( !empty( $object_desc ) ) { ?>
              <p class="tagline">
                <?php echo $object_desc; ?>
              </p>
            <?php } ?>
        </div>
    </div>
</section>
