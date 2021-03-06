<?php
get_header();

// digicorp_page_header_section( array(
//   'section_class' => 'visual bg-main2'
// ));
?>
<?php
if ( get_theme_mod( 'digicorp_typed_slider_enabled', 1 ) ):
?>
  <section class="visual visual-2" id="typed-slider">
      <div class="container">
          <div class="text-block">
              <div class="heading-holder">
                  <h1><?php echo get_theme_mod( 'digicorp_typed_slider_title' ); ?></h1>
              </div>
              <div id="typed-slider-typed-strings" hidden>
                <?php
                  $typed_elements = explode( "\n", get_theme_mod( 'digicorp_typed_slider_typed_elements' ) );
                  foreach ( $typed_elements as $typed_element ) {
                    echo "<p>$typed_element</p>\n";
                  }
                ?>
                <p>از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت</p>
              </div>
              <div class="tagline">&nbsp; <p id="typed-slider-typed-element"></p> &nbsp;</div>
              <div class="infos">
                <?php
                  $info_tags = explode( "\n", get_theme_mod( 'digicorp_typed_slider_info_tags' ) );
                  foreach ( $info_tags as $info_tag ) {
                    echo "<span class=\"info\"><i class=\"fa fa-star\"></i> $info_tag</span>\n";
                  }
                ?>
              </div>
          </div>
      </div>
      <?php
      if ( ! empty( get_theme_mod( 'digicorp_typed_slider_background' ) ) ) {
        printf(
          '<img src="%1$s" alt="%2$s" class="bg-stretch" id="typed-slider-bg">',
          get_theme_mod( 'digicorp_typed_slider_background' ),
          get_theme_mod( 'digicorp_typed_slider_title' )
        );
      }
      // else {
      //   printf(
      //     '<img src="%1$s" alt="%2$s" class="bg-stretch" id="typed-slider-bg">',
      //     get_template_directory_uri() . '/assets/dist/images/slider-bg.jpg',
      //     get_theme_mod( 'digicorp_typed_slider_title' )
      //   );
      // }
      ?>
  </section>

  <!-- call to action -->
  <?php if ( ! empty( get_theme_mod( 'digicorp_typed_slider_cta_text' ) ) ): ?>
  <section class="section nopad cta" id="slider-cta">
      <div class="container nopad">
          <div id="cta">
              <a href="<?php echo esc_url( get_page_link( get_theme_mod( 'digicorp_typed_slider_cta_link' ) ) ); ?>" class="btn btn-primary rounded"><?php echo get_theme_mod( 'digicorp_typed_slider_cta_text' ); ?></a>
          </div>
      </div>
  </section>
  <?php endif; ?>

<?php
endif;
?>



<section class="section pt-90" id="section-about-brands">
    <div class="container">
        <div class="section-title text-center">
            <h5>فناوری اطلاعات آریانا</h5>
            <h3>بیش از یک دهه کار، بیش از صد پروژه</h3>
        </div><!-- end title -->

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="font-header text-center padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
            </div>
        </div>
        <div class="row gutter-10">
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="bg-light-gray p-10 mb-10 text-center">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/brands/ara-carpet.png" title="شرکت فرش آرا مشهد" class="img-full img-responsive" />
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="bg-light-gray p-10 mb-10 text-center">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/brands/canco.png" title="نمایندگی کنکو" class="img-full img-responsive" />
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="bg-light-gray p-10 mb-10 text-center">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/brands/dessini.png" title="نمایندگی دسینی" class="img-full img-responsive" />
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="bg-light-gray p-10 mb-10 text-center">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/brands/bosch.png" title="گروه تجاری سنا پویان - نمایندگی بوش آلمان" class="img-full img-responsive" />
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="bg-light-gray p-10 mb-10 text-center">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/brands/beko.png" title="شرکت بازرگانی بهستان تجارت ارس - نمایندگی بکو" class="img-full img-responsive" />
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="bg-light-gray p-10 mb-10 text-center">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/brands/sony.png" title="ایران رهجو - نمایندگی سونی" class="img-full img-responsive" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-twice" id="section-about-history">
    <div class="section-head bg-light-gray">
        <div class="container">
            <div class="section-title text-center">
                <img src="http://localhost/wp1/wp-content/themes/digicorp/assets/dist/images/svg/diamond.svg" title="" class="img-responsive">
                <!-- <img src="http://localhost/wp1/wp-content/themes/digicorp/assets/dist/images/head-swirl-crown.png" title="" class="img-responsive medium-icon"> -->
                <h5>تاریخچه آریانا</h5>
                <h3>ما که هستیم؟</h3>
            </div><!-- end title -->

            <div class="row mh-20">
                <div class="col-md-8 col-md-offset-2">
                    <p class="font-header text-center padding-x-md">
                      از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                      برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="container equal-height">

            <div class="row service-list service-list-center noborder">
                <div class="col-md-3 col-sm-6">
                    <div class="serviceBox bg-white border-round-5 shadow-light-2 shadow-hover ph-50 pv-30 mb-30">
                        <div class="service-icon withborder color0 hovicon effect-1 sub-a">
                            <i class="fa fa fa-anchor"></i>
                        </div>
                        <div class="service-content">
                            <h3>Target Catch</h3>
                            <p>
                                Nunc sagittis ex malesuada magna imperdiet, ac pulvinar mi faucibus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="serviceBox bg-white border-round-5 shadow-light-2 shadow-hover ph-50 pv-30 mb-30">
                        <div class="service-icon withborder color0 hovicon effect-1 sub-a">
                            <i class="fa fa fa-anchor"></i>
                        </div>
                        <div class="service-content">
                            <h3>Target Catch</h3>
                            <p>
                                Nunc sagittis ex malesuada magna imperdiet, ac pulvinar mi faucibus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="serviceBox bg-white border-round-5 shadow-light-2 shadow-hover ph-50 pv-30 mb-30">
                        <div class="service-icon withborder color0 hovicon effect-1 sub-a">
                            <i class="fa fa fa-anchor"></i>
                        </div>
                        <div class="service-content">
                            <h3>Target Catch</h3>
                            <p>
                                Nunc sagittis ex malesuada magna imperdiet, ac pulvinar mi faucibus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="serviceBox bg-white border-round-5 shadow-light-2 shadow-hover ph-50 pv-30 mb-30">
                        <div class="service-icon withborder color0 hovicon effect-1 sub-a">
                            <i class="fa fa fa-anchor"></i>
                        </div>
                        <div class="service-content">
                            <h3>Target Catch</h3>
                            <p>
                                Nunc sagittis ex malesuada magna imperdiet, ac pulvinar mi faucibus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section bg-light-gray">
    <div class="container">
        <div class="section-title text-center">
            <h5>تاریخچه آریانا</h5>
            <h3>ما که هستیم؟</h3>
        </div><!-- end title -->

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="font-header text-center padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
            </div>
        </div>

    </div>
</section>

<section class="section">
    <div class="container">

        <div class="row service-list service-list-center noborder pull-up-180">
            <div class="col-md-3 col-sm-6">
                <div class="serviceBox bg-white border-round-5 shadow-light-2 shadow-hover ph-50 pv-30 mb-30">
                    <div class="service-icon withborder color0 hovicon effect-1 sub-a">
                        <i class="fa fa fa-anchor"></i>
                    </div>
                    <div class="service-content">
                        <h3>Target Catch</h3>
                        <p>
                            Nunc sagittis ex malesuada magna imperdiet, ac pulvinar mi faucibus.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="serviceBox bg-white border-round-5 shadow-light-2 shadow-hover ph-50 pv-30 mb-30">
                    <div class="service-icon withborder color0 hovicon effect-1 sub-a">
                        <i class="fa fa fa-anchor"></i>
                    </div>
                    <div class="service-content">
                        <h3>Target Catch</h3>
                        <p>
                            Nunc sagittis ex malesuada magna imperdiet, ac pulvinar mi faucibus.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="serviceBox bg-white border-round-5 shadow-light-2 shadow-hover ph-50 pv-30 mb-30">
                    <div class="service-icon withborder color0 hovicon effect-1 sub-a">
                        <i class="fa fa fa-anchor"></i>
                    </div>
                    <div class="service-content">
                        <h3>Target Catch</h3>
                        <p>
                            Nunc sagittis ex malesuada magna imperdiet, ac pulvinar mi faucibus.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="serviceBox bg-white border-round-5 shadow-light-2 shadow-hover ph-50 pv-30 mb-30">
                    <div class="service-icon withborder color0 hovicon effect-1 sub-a">
                        <i class="fa fa fa-anchor"></i>
                    </div>
                    <div class="service-content">
                        <h3>Target Catch</h3>
                        <p>
                            Nunc sagittis ex malesuada magna imperdiet, ac pulvinar mi faucibus.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="section bg-shape bg-shape-1">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">

              <div>

                  <div class="section-title text-left">
                      <h5>ما چگونه فکر می‌کنیم؟</h5>
                      <h3>فلسفه ما</h3>
                      <hr>
                  </div><!-- end title -->

                  <div class="mh-20">
                      <div>
                          <p class="font-header text-left padding-x-md">
                            از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                            برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                          </p>
                      </div>
                  </div>

              </div>

            </div>

            <div class="col-sm-6">
              <div class="text-center">
                  <img src="http://localhost/wp1/wp-content/themes/digicorp/assets/dist/images/info/inf-06.png" title="" class="img-full img-responsive">
              </div>
            </div>

        </div>

    </div>
</section>

<section class="section bg-shape bg-shape-2">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">

              <div>

                  <div class="section-title text-left">
                      <h5>ما چگونه فکر می‌کنیم؟</h5>
                      <h3>فلسفه ما</h3>
                      <hr>
                  </div><!-- end title -->

                  <div class="mh-20">
                      <div>
                          <p class="font-header text-left padding-x-md">
                            از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                            برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                          </p>
                      </div>
                  </div>

              </div>

            </div>

            <div class="col-sm-6">
              <div class="text-center">
                  <img src="http://localhost/wp1/wp-content/themes/digicorp/assets/dist/images/info/inf-06.png" title="" class="img-full img-responsive">
              </div>
            </div>

        </div>

    </div>
</section>

<section class="section bg-shape bg-shape-3">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">

              <div>

                  <div class="section-title text-left">
                      <h5>ما چگونه فکر می‌کنیم؟</h5>
                      <h3>فلسفه ما</h3>
                      <hr>
                  </div><!-- end title -->

                  <div class="mh-20">
                      <div>
                          <p class="font-header text-left padding-x-md">
                            از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                            برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                          </p>
                      </div>
                  </div>

              </div>

            </div>

            <div class="col-sm-6">
              <div class="text-center">
                  <img src="http://localhost/wp1/wp-content/themes/digicorp/assets/dist/images/info/inf-06.png" title="" class="img-full img-responsive">
              </div>
            </div>

        </div>

    </div>
</section>

<section class="section bg-shape bg-shape-4">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">

              <div>

                  <div class="section-title text-left">
                      <h5>ما چگونه فکر می‌کنیم؟</h5>
                      <h3>فلسفه ما</h3>
                      <hr>
                  </div><!-- end title -->

                  <div class="mh-20">
                      <div>
                          <p class="font-header text-left padding-x-md">
                            از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                            برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                          </p>
                      </div>
                  </div>

              </div>

            </div>

            <div class="col-sm-6">
              <div class="text-center">
                  <img src="http://localhost/wp1/wp-content/themes/digicorp/assets/dist/images/info/inf-06.png" title="" class="img-full img-responsive">
              </div>
            </div>

        </div>

    </div>
</section>

<section class="section bg-light-gray">
    <div class="container">
        <div class="section-title text-center">
            <h5>ما چگونه فکر می‌کنیم؟</h5>
            <h3>فلسفه ما</h3>
        </div><!-- end title -->

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="font-header text-center padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
            </div>
        </div>

    </div>
</section>


<section class="section bg-light-gray bg-highlight bg-img bg-fixed bg-img-02 text-light">
    <div class="container">
        <div class="section-title text-center">
            <h5>ما چگونه فکر می‌کنیم؟</h5>
            <h3>فلسفه ما</h3>
        </div><!-- end title -->

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="font-header text-center padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
            </div>
        </div>

    </div>
</section>

<br/>
<br/>

<section class="section bg-light-gray bg-highlight bg-img bg-fixed bg-img-01">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-sm-8">

              <div class="p-40 bg-white shadow-dark-2">

                  <div class="section-title text-center">
                      <h5>ما چگونه فکر می‌کنیم؟</h5>
                      <h3>فلسفه ما</h3>
                      <hr>
                  </div><!-- end title -->

                  <div class="mh-20">
                      <div>
                          <p class="font-header text-center padding-x-md">
                            از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                            برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                          </p>
                      </div>
                  </div>

              </div>

            </div>
        </div>

    </div>
</section>
<br/><br/>

<section class="section bg-light-gray bg-img bg-fixed bg-img-03 bg-highlight">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-sm-8">

              <div class="p-40 bg-white-transparent shadow-dark-2">

                  <div class="section-title text-center">
                      <h5>ما چگونه فکر می‌کنیم؟</h5>
                      <h3>فلسفه ما</h3>
                      <hr>
                  </div><!-- end title -->

                  <div class="mh-20">
                      <div>
                          <p class="font-header text-center padding-x-md">
                            از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                            برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                          </p>
                      </div>
                  </div>

              </div>

            </div>
        </div>

    </div>
</section>

<br/>
<br/>

<section class="section bg-light-gray">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">

              <div>

                  <div class="section-title text-left">
                      <h5>ما چگونه فکر می‌کنیم؟</h5>
                      <h3>فلسفه ما</h3>
                      <hr>
                  </div><!-- end title -->

                  <div class="mh-20">
                      <div>
                          <p class="font-header text-left padding-x-md">
                            از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                            برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                          </p>
                      </div>
                  </div>

              </div>

            </div>

            <div class="col-sm-6">
              <div class="text-center">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/info/inf-06.png" title="" class="img-full img-responsive" />
              </div>
            </div>
        </div>

    </div>
</section>

<br/>
<br/>

<section class="section bg-light-gray">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">

              <div>

                  <div class="section-title text-left">
                      <h5>ما چگونه فکر می‌کنیم؟</h5>
                      <h3>فلسفه ما</h3>
                      <hr>
                  </div><!-- end title -->

                  <div class="mh-20">
                      <div>
                          <p class="font-header text-left padding-x-md">
                            از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                            برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                          </p>

                          <a href="#" title="" class="btn btn-primary btn-lg">بیشتر</a>
                          <a href="#" title="" class="btn btn-primary">بیشتر</a>
                          <a href="#" title="" class="btn btn-primary btn-sm">بیشتر</a>
                          <a href="#" title="" class="btn btn-primary btn-xs">بیشتر</a>
                          <br/>
                          <br/>
                          <br/>
                          <a href="#" title="" class="btn btn-default">بیشتر</a>
                          <a href="#" title="" class="btn btn-success">بیشتر</a>
                          <a href="#" title="" class="btn btn-info">بیشتر</a>
                          <a href="#" title="" class="btn btn-warning">بیشتر</a>
                          <a href="#" title="" class="btn btn-danger">بیشتر</a>
                          <a href="#" title="" class="btn btn-link">بیشتر</a>
                          <br/>
                          <br/>
                          <br/>
                          <div class="btn-group">
                            <a href="#" title="" class="btn btn-primary">بیشتر</a>
                            <a href="#" title="" class="btn btn-primary">بیشتر</a>
                            <a href="#" title="" class="btn btn-primary">بیشتر</a>
                          </div>
                          <br/>
                          <br/>
                          <br/>
                          <a href="#" title="" class="btn btn-primary">بیشتر</a>
                          <a href="#" title="" class="btn btn-border">بیشتر</a>
                          <br/>
                          <br/>
                          <br/>
                          <a href="#" title="" class="btn btn-flat btn-primary">بیشتر</a>
                          <a href="#" title="" class="btn btn-flat btn-border">بیشتر</a>
                          <br/>
                          <br/>
                          <br/>
                          <a href="#" title="" class="btn btn-primary btn-icon-left"><i class="fa fa-arrow-left"></i> بیشتر</a>
                          <a href="#" title="" class="btn btn-primary btn-icon-left"><i class="fa fa-chevron-left"></i> بیشتر</a>
                          <a href="#" title="" class="btn btn-primary btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                          <a href="#" title="" class="btn btn-border btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                          <br/>
                          <br/>
                          <br/>
                          <a href="#" title="" class="btn btn-lg btn-primary btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                          <a href="#" title="" class="btn btn-lg btn-border btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                          <br/>
                          <br/>
                          <br/>
                          <a href="#" title="" class="btn btn-sm btn-primary btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                          <a href="#" title="" class="btn btn-sm btn-border btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                          <a href="#" title="" class="btn btn-xs btn-primary btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                          <a href="#" title="" class="btn btn-xs btn-border btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                          <a href="#" title="" class="btn btn-xs thin btn-primary btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                          <a href="#" title="" class="btn btn-xs thin btn-border btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                          <a href="#" title="" class="btn btn-xs thin btn-border btn-flat btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                          <br/>
                          <br/>
                          <br/>
                          <a href="#" title="" class="btn btn-sm btn-primary btn-icon-left"><i class="fa fa-chevron-left"></i> بیشتر</a>
                          <a href="#" title="" class="btn btn-sm btn-border btn-icon-left"><i class="fa fa-chevron-left"></i> بیشتر</a>
                          <a href="#" title="" class="btn btn-xs btn-primary btn-icon-left"><i class="fa fa-chevron-left"></i> بیشتر</a>
                          <a href="#" title="" class="btn btn-xs btn-border btn-icon-left"><i class="fa fa-chevron-left"></i> بیشتر</a>
                          <a href="#" title="" class="btn btn-xs thin btn-primary btn-icon-left"><i class="fa fa-chevron-left"></i> بیشتر</a>
                          <a href="#" title="" class="btn btn-xs thin btn-border btn-icon-left"><i class="fa fa-chevron-left"></i> بیشتر</a>
                          <a href="#" title="" class="btn btn-xs thin btn-border btn-flat btn-icon-left"><i class="fa fa-chevron-left"></i> بیشتر</a>
                          <br/>
                          <br/>
                          <br/>
                          <a href="#" title="" class="btn btn-primary btn-icon-right">بیشتر <span class="glyphicon glyphicon-chevron-left"></span></a>
                          <a href="#" title="" class="btn btn-primary btn-icon-right">بیشتر <span class="glyphicon glyphicon-send"></span></a>
                          <a href="#" title="" class="btn btn-primary btn-icon-right">بیشتر <span class="glyphicon glyphicon-menu-hamburger"></span></a>
                          <a href="#" title="" class="btn btn-primary btn-icon-right">بیشتر <span class="glyphicon glyphicon-menu-left"></span></a>
                          <a href="#" title="" class="btn btn-primary btn-icon-right">بیشتر <i class="glyphicon glyphicon-search"></i></a>
                          <br/>
                          <br/>
                          <br/>
                          <a href="#" title="" class="btn btn-border btn-icon-right">بیشتر <span class="glyphicon glyphicon-chevron-left"></span></a>
                          <a href="#" title="" class="btn btn-border btn-icon-right">بیشتر <span class="glyphicon glyphicon-send"></span></a>
                          <a href="#" title="" class="btn btn-border btn-icon-right">بیشتر <span class="glyphicon glyphicon-menu-hamburger"></span></a>
                          <a href="#" title="" class="btn btn-border btn-icon-right">بیشتر <span class="glyphicon glyphicon-menu-left"></span></a>
                          <a href="#" title="" class="btn btn-border btn-icon-right">بیشتر <i class="glyphicon glyphicon-search"></i></a>
                          <br/>
                          <br/>
                          <br/>
                          <a href="#" title="" class="btn btn-border btn-icon-left"><span class="glyphicon glyphicon-plus"></span> بیشتر</a>
                          <a href="#" title="" class="btn btn-border btn-icon-left"><span class="glyphicon glyphicon-cloud"></span> بیشتر</a>
                          <a href="#" title="" class="btn btn-border btn-icon-left"><span class="glyphicon glyphicon-star-empty"></span> بیشتر</a>
                          <a href="#" title="" class="btn btn-border btn-icon-left"><span class="glyphicon glyphicon-th-list"></span> بیشتر</a>
                          <a href="#" title="" class="btn btn-border btn-icon-left"><span class="glyphicon glyphicon-ok"></span> بیشتر</a>
                          <a href="#" title="" class="btn btn-border btn-icon-left"><span class="glyphicon glyphicon-bookmark"></span> بیشتر</a>
                          <br/>
                          <br/>
                          <br/>
                          <a href="#" title="" class="btn btn-primary btn-round">بیشتر</a>
                          <a href="#" title="" class="btn btn-border btn-round">بیشتر</a>
                          <br/>
                          <br/>
                          <br/>
                          <a href="#" title="" class="btn btn-primary btn-round btn-icon-left"><span class="glyphicon glyphicon-bookmark"></span> بیشتر</a>
                          <a href="#" title="" class="btn btn-border btn-round btn-icon-left"><span class="glyphicon glyphicon-bookmark"></span> بیشتر</a>

                      </div>
                  </div>

              </div>

            </div>
            <div class="col-sm-6">
                <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/info/inf-01.png" title="" class="img-full img-responsive" />
            </div>
        </div>

    </div>
</section>

<br/>
<br/>
<br/>
<br/>

<section class="section">
    <div class="container">
        <div class="section-title text-center">
            <h5>تاریخچه آریانا</h5>
            <h3>ما که هستیم؟</h3>
        </div><!-- end title -->

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="font-header text-center padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
            </div>
        </div>

    </div>
    <div class="container equal-height">

      <div class="row">
        <div class="col-md-6">
          <div class="bg-img bg-img-05 pv-60 ph-80">
            <div>

                  <div class="section-title text-left">
                      <h5>ما چگونه فکر می‌کنیم؟</h5>
                      <h3>فلسفه ما</h3>
                      <hr>
                  </div><!-- end title -->

                  <div class="mh-20">
                      <div>
                          <p class="font-header font-large text-left padding-x-md">
                            از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                            برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                          </p>
                          <a href="#" title="" class="btn btn-lg btn-border btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                      </div>
                  </div>

              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="bg-img bg-img-06 bg-highlight text-light pv-60 ph-80">
              <div class="section-title text-left">
                  <h5>ما چگونه فکر می‌کنیم؟</h5>
                  <h3>فلسفه ما</h3>
                  <hr class="hr-gray">
              </div><!-- end title -->

              <div>

                <p class="font-header font-large text-left padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
                <a href="#" title="" class="btn btn-lg btn-border border-light btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>

              </div>

          </div>
        </div>
      </div>

    </div>
</section>

<section class="section">
    <div class="container equal-height">

      <div class="row no-gutters">
        <div class="col-md-6">
          <div class="bg-img bg-img-05 pv-60 ph-80">
            <div>

                  <div class="section-title text-left">
                      <h5>ما چگونه فکر می‌کنیم؟</h5>
                      <h3>فلسفه ما</h3>
                      <hr>
                  </div><!-- end title -->

                  <div class="mh-20">
                      <div>
                          <p class="font-header font-large text-left padding-x-md">
                            از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                            برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                          </p>
                          <a href="#" title="" class="btn btn-lg btn-border btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                      </div>
                  </div>

              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="bg-img bg-img-06 bg-highlight text-light pv-60 ph-80">
              <div class="section-title text-left">
                  <h5>ما چگونه فکر می‌کنیم؟</h5>
                  <h3>فلسفه ما</h3>
                  <hr class="hr-gray">
              </div><!-- end title -->

              <div>

                <p class="font-header font-large text-left padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
                <a href="#" title="" class="btn btn-lg btn-border border-light btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>

              </div>

          </div>
        </div>
      </div>

    </div>
</section>

<section class="section">
    <div class="container-fluid equal-height">

      <div class="row no-gutters">
        <div class="col-md-6">
          <div class="bg-img bg-img-05 pv-60 ph-80">
            <div>

                  <div class="section-title text-left">
                      <h5>ما چگونه فکر می‌کنیم؟</h5>
                      <h3>فلسفه ما</h3>
                      <hr>
                  </div><!-- end title -->

                  <div class="mh-20">
                      <div>
                          <p class="font-header font-large text-left padding-x-md">
                            از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                            برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                          </p>
                          <a href="#" title="" class="btn btn-lg btn-border btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>
                      </div>
                  </div>

              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="bg-img bg-img-06 bg-highlight text-light pv-60 ph-80">
              <div class="section-title text-left">
                  <h5>ما چگونه فکر می‌کنیم؟</h5>
                  <h3>فلسفه ما</h3>
                  <hr class="hr-gray">
              </div><!-- end title -->

              <div>

                <p class="font-header font-large text-left padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
                <a href="#" title="" class="btn btn-lg btn-border border-light btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>

              </div>

          </div>
        </div>
      </div>

    </div>
</section>

<br/>
<br/>

<section class="section">
    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="bg-img bg-img-07 bg-highlight text-light pv-60 ph-80">
              <div class="section-title text-left">
                  <h5>ما چگونه فکر می‌کنیم؟</h5>
                  <h3>فلسفه ما</h3>
                  <hr class="hr-gray">
              </div><!-- end title -->

              <div>

                <p class="font-header font-large text-left padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
                <a href="#" title="" class="btn btn-lg btn-border border-light btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>

              </div>

          </div>
        </div>
      </div>

    </div>
</section>

<br/>
<br/>

<section class="section pt-0">
    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="bg-img bg-img-04 bg-highlight text-light pv-60 ph-80">

            <div class="section-title text-center">
                <h4>تغییر شرط بقاست، برای تغییر برنامه داشته باشید</h4>
            </div><!-- end title -->
            <div class="text-center">
              <p class="font-header font-medium padding-x-md">
                از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
              </p>
              <a href="#" title="" class="btn btn-lg btn-border border-light btn-icon-right mt-20">از اینجا شروع کنید <i class="fa fa-chevron-left"></i></a>

            </div>

          </div>
        </div>
      </div>

    </div>
</section>

<br/>
<br/>

<section class="section ph-0">
    <div class="container-fluid">

      <div class="row">
        <div class="col-xs-12">
          <div class="bg-img bg-img-07 bg-highlight text-light pv-60 ph-80">
              <div class="section-title text-left">
                  <h5>ما چگونه فکر می‌کنیم؟</h5>
                  <h3>فلسفه ما</h3>
                  <hr class="hr-gray">
              </div><!-- end title -->

              <div>

                <p class="font-header font-large text-left padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
                <a href="#" title="" class="btn btn-lg btn-border border-light btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>

              </div>

          </div>
        </div>
      </div>

    </div>
</section>

<br/>
<br/>

<section class="section bg-img bg-img-07 bg-highlight text-light">
    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="">
              <div class="section-title text-left">
                  <h5>ما چگونه فکر می‌کنیم؟</h5>
                  <h3>فلسفه ما</h3>
                  <hr class="hr-gray">
              </div><!-- end title -->

              <div>

                <p class="font-header font-large text-left padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
                <a href="#" title="" class="btn btn-lg btn-border border-light btn-icon-right">بیشتر <i class="fa fa-chevron-left"></i></a>

              </div>

          </div>
        </div>
      </div>

    </div>
</section>

<section class="section bg-floral-1 bg-light-blue">
    <div class="container">
        <div class="section-title text-center">
            <h5>ما چگونه فکر می‌کنیم؟</h5>
            <h3>فلسفه ما</h3>
        </div><!-- end title -->

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="font-header text-center padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
            </div>
        </div>

    </div>
</section>

<section class="section bg-img bg-img-15">
    <div class="container">
        <div class="section-title text-center">
            <h5>ما چگونه فکر می‌کنیم؟</h5>
            <h3>فلسفه ما</h3>
        </div><!-- end title -->

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="font-header text-center padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
            </div>
        </div>

    </div>
</section>

<section class="section bg-floral-2 bg-light-gray">
    <div class="container">
        <div class="section-title text-center">
            <h5>ما چگونه فکر می‌کنیم؟</h5>
            <h3>فلسفه ما</h3>
        </div><!-- end title -->

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="font-header text-center padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
            </div>
        </div>

    </div>
</section>

<section class="section bg-img bg-img-13">
    <div class="container">
        <div class="section-title text-center">
            <h5>ما چگونه فکر می‌کنیم؟</h5>
            <h3>فلسفه ما</h3>
        </div><!-- end title -->

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="font-header text-center padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
            </div>
        </div>

    </div>
</section>

<section class="section-twice" id="section-general-services">
    <div class="section-head">
        <div class="container">
            <div class="section-title text-center">
                <img src="http://localhost/wp1/wp-content/themes/digicorp/assets/dist/images/svg/diamond.svg" title="" class="img-responsive">
                <!-- <img src="http://localhost/wp1/wp-content/themes/digicorp/assets/dist/images/head-swirl-crown.png" title="" class="img-responsive medium-icon"> -->
                <h5>ما چگونه فکر می‌کنیم؟</h5>
                <h3>فلسفه ما</h3>
            </div><!-- end title -->

            <div class="row mh-20">
                <div class="col-md-8 col-md-offset-2">
                    <p class="font-header text-center padding-x-md">
                      از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                      برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="container equal-height">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <div class="srv-box-home">
                        <div class="box-icon">
                            <img src="http://localhost/wp1/wp-content/themes/digicorp/assets/dist/images/svg/design-tool.svg" title="" class="img-responsive">
                        </div>
                        <div class="box-content">
                            <h3>طراحی سایت</h3>
                            <p>
                                متن توضیحات در رابطه با این بخش در این قسمت درج می‌شود و به صورت تمام خط و 3 الی 6 خط توضیحات خواهد بود.متن توضیحات در رابطه با این بخش در این قسمت درج می‌شود و به صورت تمام خط و 3 الی 6 خط توضیحات خواهد بود.متن توضیحات در رابطه با این بخش در این قسمت درج می‌شود و به صورت تمام خط و 3 الی 6 خط توضیحات خواهد بود.
                            </p>
                            <a href="#" title="" class="btn btn-border btn-icon-right">طراحی سایت <i class="fa fa-chevron-left"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="srv-box-home">
                        <div class="box-icon">
                            <img src="http://localhost/wp1/wp-content/themes/digicorp/assets/dist/images/svg/bar-chart.svg" title="" class="img-responsive">
                        </div>
                        <div class="box-content">
                            <h3>دیجیتال مارکتینگ</h3>
                            <p>
                                متن توضیحات در رابطه با این بخش در این قسمت درج می‌شود و به صورت تمام خط و 3 الی 6 خط توضیحات خواهد بود.متن توضیحات در رابطه با این بخش در این قسمت درج می‌شود و به صورت تمام خط و 3 الی 6 خط توضیحات خواهد بود.متن توضیحات در رابطه با این بخش در این قسمت درج می‌شود و به صورت تمام خط و 3 الی 6 خط توضیحات خواهد بود.
                            </p>
                            <a href="#" title="" class="btn btn-border btn-icon-right">بازاریابی دیجیتال <i class="fa fa-chevron-left"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="section" id="section-contact-address">
    <div class="container">
        <div class="section-title text-center">
            <h5>ما چگونه فکر می‌کنیم؟</h5>
            <h3>فلسفه ما</h3>
        </div><!-- end title -->

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="font-header text-center padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
            </div>
        </div>

        <div class="row pt-30">
          <div class="col-sm-6">
            <img class="img-full img-responsive" title="" src="http://localhost/wp1/wp-content/themes/digicorp/assets/dist/images/contact/mashad.png" alt="مشهد" />
            <ul class="contact-list">
              <li>
                <h3>مشهد</h3>
                <p>
                  خیابان سلمان فارسی، <br/>
                  تقاطع بخارایی
                </p>
                <a class="btn btn-link text-left pl-0 btn-icon-right" title="" href="https://goo.gl/maps/ckmuZoDSeKgKWZNi8" target="_blank" rel="noopener">نمایش آدرس روی نقشه <i class="fa fa-arrow-left"></i></a>
                <br/>
                <a class="btn btn-link text-left pl-0 btn-icon-right" title="" href="https://goo.gl/maps/ckmuZoDSeKgKWZNi8" target="_blank" rel="noopener">نمایش بهترین مسیر روی نقشه <i class="fa fa-arrow-left"></i></a>
              </li>
            </ul>
          </div>
          <div class="col-sm-6">
            <img class="img-full img-responsive" title="" src="http://localhost/wp1/wp-content/themes/digicorp/assets/dist/images/contact/tehran2.png" alt="تهران" />
            <ul class="contact-list">
             	<li>
            <h3>تهران</h3>
            <p>
              خیابان ولیعصر،
              <br/>
              انتهای بن‌بست سروش
            </p>
            <a class="btn btn-link text-left pl-0 btn-icon-right" title="" href="https://goo.gl/maps/ckmuZoDSeKgKWZNi8" target="_blank" rel="noopener">نمایش آدرس روی نقشه <i class="fa fa-arrow-left"></i></a>
            <br/>
            <a class="btn btn-link text-left pl-0 btn-icon-right" title="" href="https://goo.gl/maps/ckmuZoDSeKgKWZNi8" target="_blank" rel="noopener">نمایش بهترین مسیر روی نقشه <i class="fa fa-arrow-left"></i></a>
            </li>
            </ul>
          </div>
        </div>

    </div>
</section>


<br/>
<br/>


<section class="section lb">
    <div class="container">
      <div class="row">
        <div class="section-title text-center">
            <h5>ما چگونه فکر می‌کنیم؟</h5>
            <h3>فلسفه ما</h3>
        </div><!-- end title -->

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="font-header text-center padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-xs-12">
          <div class="section-title text-center">
              <h3>پشتیبانی</h3>
              <p>
                  <a href="tel:+985138465388" title="برای تماس کلیک کنید" class="ltr btn btn-link text-left pt-30 btn-lg" target="_blank">
                    +98 51 3846 53 88 - 89
                  </a>
              </p>
          </div><!-- end title -->
        </div>
        <div class="col-sm-4 col-xs-12">
          <div class="section-title text-center">
              <h3>فروش</h3>
              <p>
                  <a href="tel:+985138468533" title="برای تماس کلیک کنید" class="ltr btn btn-link text-left pt-30 btn-lg" target="_blank">
                    +98 51 3846 85 32 - 33
                  </a>
              </p>
          </div><!-- end title -->
        </div>
        <div class="col-sm-4 col-xs-12">
          <div class="section-title text-center">
              <h3>تماس ضروری</h3>
              <p>
                  <a href="tel:+989354109161" title="برای تماس کلیک کنید" class="ltr btn btn-link text-left pt-30 btn-lg" target="_blank">
                    +98 935 410 9161
                  </a>
              </p>
          </div><!-- end title -->
        </div>
      </div>

    </div>
</section>


<section class="section p-0 bg-light-gray" id="section-contact-shortcuts">
    <div class="container-fluid equal-height">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="p-40 pt-70">
                    <div class="row">
                      <div class="section-title text-center">
                          <h5>ما چگونه فکر می‌کنیم؟</h5>
                          <h3>فلسفه ما</h3>
                      </div><!-- end title -->

                      <div class="row mh-20">
                          <div class="col-md-10 col-md-offset-1">
                              <p class="font-header text-center padding-x-md">
                                از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                                برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                              </p>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <a href="https://wa.me/989354109161" title="" class="btn-contact btn-whatsapp" target="_blank">
                                <i class="fa fa-whatsapp"></i>
                                WHATSAPP
                                <span>
                                    ارسال پیام در واتزاپ
                                </span>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <a href="mailto:reza.toosi@gmail.com" title="" class="btn-contact btn-whatsapp" target="_blank">
                                <i class="fa fa-envelope-o"></i>
                                email
                                <span>
                                    ارسال ایمیل
                                </span>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <a href="https://goo.gl/maps/ckmuZoDSeKgKWZNi8" title="" class="btn-contact btn-whatsapp" target="_blank">
                                <i class="fa fa-map-o"></i>
                                Google Map
                                <span>
                                    نمایش مسیر روی نقشه
                                </span>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <a href="https://www.instagram.com/ariana.digital/" title="" class="btn-contact btn-whatsapp" target="_blank">
                                <i class="fa fa-instagram"></i>
                                instagram
                                <span>
                                    بازدید از اینستاگرام
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1607.6809140883197!2d59.57125053808668!3d36.30353161216052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f6c919e211a5fdd%3A0x24dd9c153b84a663!2z2YHZhtin2YjYsduMINin2LfZhNin2LnYp9iqINii2LHbjNin2YbYpw!5e0!3m2!1sen!2s!4v1577196611142!5m2!1sen!2s" width="100%" frameborder="0"  allowfullscreen="true"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<br/>


<section class="section">
    <div class="container">
      <div class="row">
        <div class="section-title text-center">
            <h5>سوالات متداول</h5>
            <h3>آیا ما انتخاب مناسبی برای شما هستیم؟</h3>
        </div><!-- end title -->

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="font-header text-center padding-x-md">
                  از سال 1386، به عنوان یک آژانس طراحی و توسعه وب سایت، این افتخار را داشته ایم که به ده‌ها شرکت، سازمان و کسب‌و‌کار در اندازه‌های مختلف خدمت‌رسانی کنیم.
                  برخی از برندهای شناخته شده که از آریانا خدمات گرفته‌اند:
                </p>
            </div>
        </div>

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">


              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Collapsible Group Item #1
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Collapsible Group Item #2
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
              </div>


            </div>
        </div>


        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">


              <div id="accordion1" class="panel-group accordion">
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion11" class="collapsed" aria-expanded="false"> <span class="open-sub"></span> Q. What do you mean by item and end product?</a> </div>
                  <div id="accordion11" class="panel-collapse collapse" role="tablist" aria-expanded="false" style="height: 0px;">
                    <div class="panel-content">
                      <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a class="collapsed" data-parent="#accordion1" data-toggle="collapse" href="#accordion12" aria-expanded="false"> <span class="open-sub"></span> Q. What are some examples of permitted end products?</a> </div>
                  <div id="accordion12" class="panel-collapse collapse" role="tablist" aria-expanded="false" style="height: 0px;">
                    <div class="panel-content">
                      <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion13" class="collapsed" aria-expanded="false"> <span class="open-sub"></span> Q. Am I allowed to modify the item that I purchased?</a> </div>
                  <div id="accordion13" class="panel-collapse collapse" role="tablist" aria-expanded="false" style="height: 0px;">
                    <div class="panel-content">
                      <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion14" class="collapsed" aria-expanded="false"> <span class="open-sub"></span> Q. What does non-exclusive mean?</a> </div>
                  <div id="accordion14" class="panel-collapse collapse" role="tablist" aria-expanded="false">
                    <div class="panel-content">
                      <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion15" class="collapsed" aria-expanded="false"> <span class="open-sub"></span> Q. What is a single application?</a> </div>
                  <div id="accordion15" class="panel-collapse collapse" role="tablist" aria-expanded="false">
                    <div class="panel-content">
                      <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                    </div>
                  </div>
                </div>
              </div>


            </div>
        </div>

        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">


              <div class="panel-group toggle">
                <div class="panel">
                  <div class="panel-heading">
                    <div class="panel-title">
                      <a data-toggle="collapse" href="#toggle11" class="">
                        <span class="open-sub"></span>
                        چطور می‌توانم به مجموعه شما اعتماد کنم؟
                      </a>
                    </div>
                  </div>
                  <div id="toggle11" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>
                          ما بیش از 10 سال سابقه کار داریم، نمونه کارها و مجموعه مشتریان ما نشان دهنده کیفیت و روال کار ماست. ما رضایت شما از خروجی کارمان را تضمین می‌کنیم.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-heading">
                    <div class="panel-title"> <a data-toggle="collapse" href="#toggle12"><span class="open-sub"></span>Why I need that element </a> </div>
                  </div>
                  <div id="toggle12" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, quae, fuga!</p>
                    </div>
                  </div>
                </div>
              </div>



            </div>
        </div>


      </div>
    </div>
</section>


<section class="section p-0" style="margin-top: 30px; margin-bottom: 30px">
  <div class="container">
    <div class="bg-light-gray border-round-5  ph-80 pv-60">
      <div class="row">
        <div class="col-md-7">
          <div class="section-title text-left">
            <h5>مشاوره و پروپزال</h5>
            <h2 class="h3">دریافت مشاوره رایگان</h2>
            <hr>
          </div>
          <div class="section-content">متن</div>
        </div>
        <div class="col-md-5">
          <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/info/inf-22.png" class="img-responsive img-full">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section bg-light-gray" style="margin-top: 100px; margin-bottom: 30px">
  <div class="container">
    <div class="bg-white border-round-5 ph-80 pv-60 shadow-light-1">
      <div class="row">
        <div class="col-md-7">
          <div class="section-title text-left">
            <h5>مشاوره و پروپزال</h5>
            <h2 class="h3">دریافت مشاوره رایگان</h2>
            <hr>
          </div>
          <div class="section-content">متن</div>
        </div>
        <div class="col-md-5">
          <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/info/inf-22.png" class="img-responsive img-full">
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
