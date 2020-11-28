<?php get_header(); ?>

<section class="page-heading color13" data-bg-img="">
    <div class="container">
        <div class="page-heading__row">
            <div class="page-heading__content">
                <h4 class="page-heading__content-subtitle">بازاریابی دیجیتالی</h4>
                <h1 class="page-heading__content-title">خدمات طراحی وب سایت و توسعه سایت های سفارشی</h1>
                <p class="page-heading__content-desc">طراحی وب سایت تلفیقی از تکنولوژی، هنر و خلاقیت است. یک سایت چشم نواز، با زیبایی بصری و رابط کاربری قوی می‌تواند مخاطب را جذب و به کاربر دائمی شما تبدیل نماید. با پیشرفت تکنولوژی و حضور روزافزون کاربران اینترنت، طراحی وب سایت</p>
                <div class="page-heading__buttons">
                  <a class="btn btn-border border-white btn-lg btn-svg-icon btn-svg-icon-small" href="#"><?php echo digicorp_svg( 'svg-icon-arrow-left-4', 'rtl-rotate', '0 0 24 24' ); ?>بازگشت</a>
                  <a class="btn btn-border border-white btn-lg" href="#">دریافت پروپزال رایگان</a>
                </div>
            </div>
            <div class="page-heading__image">
                <img class="img-responsive" alt="" src="<?php echo get_template_directory_uri() ?>/assets/dist/images/info/inf-11.png" />
            </div>
        </div>
    </div>
</section>



<?php
digicorp_page_header_section( array(
  // 'page_title'      =>  post_type_archive_title( '', false ),
  'page_title'      =>  __( 'OUR SERVICES', 'digicorpdomain' ),
  'section_class'   =>  'visual color13'
));
if ( have_posts() ) {
?>
<section class="section services-list">
    <div class="container">
        <div class="row">
            <?php
              while( have_posts() ) {
                the_post();
                get_template_part('template-parts/services/services','excerpt');
              }
            ?>
        </div><!-- end row -->
    </div>
</section>
<?php } ?>
<?php get_footer(); ?>
