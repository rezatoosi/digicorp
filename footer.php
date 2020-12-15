          <footer class="footer">
              <div class="container">
                  <div class="row">
                      <div class="footer-col col-md-3 col-sm-6 col-xs-12" data-mh="footer-col">
                        <?php
                          if ( is_active_sidebar('footer-widget-1') ) :
                            dynamic_sidebar('footer-widget-1');
                          endif;
                        ?>
                      </div>
                      <div class="footer-col col-md-3 col-sm-6 col-xs-12" data-mh="footer-col">
                        <?php
                          if ( is_active_sidebar('footer-widget-2') ) :
                            dynamic_sidebar('footer-widget-2');
                          endif;
                        ?>
                      </div>
                      <div class="footer-col col-md-3 col-sm-6 col-xs-12" data-mh="footer-col">
                        <?php
                          if ( is_active_sidebar('footer-widget-3') ) :
                            dynamic_sidebar('footer-widget-3');
                          endif;
                        ?>
                      </div>
                      <div class="footer-col col-md-3 col-sm-6 col-xs-12" data-mh="footer-col">
                        <?php
                          if ( is_active_sidebar('footer-widget-4') ) :
                            dynamic_sidebar('footer-widget-4');
                          endif;
                        ?>
                      </div>
                  </div>
              </div>
          </footer><!-- end footer -->

          <div class="copyrights">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-4">
                        <?php
                          if ( is_active_sidebar('footer-copyright') ) :
                            dynamic_sidebar('footer-copyright');
                          endif;
                        ?>
                      </div>
                      <div class="col-sm-8 text-right sm-text-center">
                        <?php
                            // wp_nav_menu(array(
                            //     'theme_location' => 'footerMenu',
                            //     'depth' => '1',
                            //     'items_wrap' => '<ul id="%1$s" class="list-inline %2$s">%3$s</ul>', /*<li class="lastlink"><a class="btn btn-success" href="seo-analysis.html"><i class="glyphicon glyphicon-search"></i> ' . __('free seo analysis', 'digicorpdomain') . '</a></li>*/
                            // ));
                        ?>
                        <?php digicorp_footer_social_ul(); ?>
                      </div>
                  </div>
              </div>
          </div>
      </div><!-- end wrapper -->

      <div class="back-to-top"><button id="btn-backtop" class="back-to-top-btn"><i class="fa fa-chevron-up"></i></button></div>
      <?php wp_footer(); ?>
      <!-- W3TC-include-css -->
      <!-- W3TC-include-js-head -->
  </body>
</html>
