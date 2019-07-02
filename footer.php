        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <?php
                        if ( is_active_sidebar('footer-widget-1') ) :
                          dynamic_sidebar('footer-widget-1');
                        endif;
                      ?>
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <?php
                        if ( is_active_sidebar('footer-widget-2') ) :
                          dynamic_sidebar('footer-widget-2');
                        endif;
                      ?>
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <?php
                        if ( is_active_sidebar('footer-widget-3') ) :
                          dynamic_sidebar('footer-widget-3');
                        endif;
                      ?>
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <?php
                        if ( is_active_sidebar('footer-widget-4') ) :
                          dynamic_sidebar('footer-widget-4');
                        endif;
                      ?>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="copyrights">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-left">
                      <?php
                        if ( is_active_sidebar('footer-copyright') ) :
                          dynamic_sidebar('footer-copyright');
                        endif;
                      ?>
                        <!-- <a class="footer-brand" href="index.html"><img src="images/flogo.png" alt=""></a> -->
                    </div>
                    <div class="col-md-8 text-right">
                      <?php
                          wp_nav_menu(array(
                              'theme_location' => 'footerMenu',
                              'depth' => '1',
                              'items_wrap' => '<ul id="%1$s" class="list-inline %2$s">%3$s</ul>', /*<li class="lastlink"><a class="btn btn-success" href="seo-analysis.html"><i class="glyphicon glyphicon-search"></i> ' . __('free seo analysis', 'digicorpdomain') . '</a></li>*/
                          ));
                      ?>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end copy -->
    </div><!-- end wrapper -->

    <?php
    /*
    <script src="<?php echo esc_url( get_template_directory_uri()); ?>/js/jquery.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri()); ?>/js/bootstrap.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri()); ?>/js/plugins.js"></script>
    */
    ?>
    <?php // TODO: enqueue these scripts ?>
    <?php wp_footer(); ?>
</body>
</html>
