<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
      // <!-- SITE META -->
      /* description meta tag will generate by yoast plugin */
      // $page_desc = get_post_meta(get_queried_object_id(), "post_desc", true);
      // if (!is_front_page() && !('' == $page_desc)){
      //   echo "<meta name=\"description\" content=\"$page_desc\">\n";
      // }
      // else{
      //   echo "<meta name=\"description\" content=\"" . get_bloginfo('description') . "\">\n";
      // }
      // echo '<title>' . bloginfo('name') . wp_title('|') . '</title>';
    ?>

    <!-- WP Head -->
    <?php wp_head(); ?>
    <!-- end WP Head -->

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php // TODO: enqueue this script by conditions ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157705875-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-157705875-1');
    </script>

</head>
<body <?php body_class(); ?>>
    <div id="wrapper">
        <header class="header">
            <div class="container">
                <nav class="navbar navbar-default navbar-static-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">
                                  <?php
                                    // translators: screen reader text for nav icon in small screens
                                    _e( 'Toggle navigation', 'digicorpdomain' );
                                  ?>
                                </span>
                                <?php
                                // remove bootstrap default
                                // <span class="icon-bar"></span>
                                // <span class="icon-bar"></span>
                                // <span class="icon-bar"></span>

                                // <span class="open">
                                //   <svg height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                //     <path d="m0 2h32v4h-32zm0 12h32v4h-32zm0 12h32v4h-32z"></path>
                                //   </svg>
                                // </span>
                                // <span class="close">
                                //   <svg height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                //     <path d="m13.1715729 16-9.89949496-9.89949494 2.82842712-2.82842712 9.89949494 9.89949496 9.8994949-9.89949496 2.8284272 2.82842712-9.899495 9.89949494 9.899495 9.8994949-2.8284272 2.8284272-9.8994949-9.899495-9.89949494 9.899495-2.82842712-2.8284272z"></path>
                                //   </svg>
                                // </span>
                                ?>
                                <i class="fa fa-bars open"></i>
                                <i class="fa fa-close close"></i>
                            </button>
                            <button class="mobile-search-toggle">
                              <i class="fa fa-search"></i>
                              <span class="sr-only"><?php _e( "Search", "digicorpdomain" ) ?></span>
                            </button>
                            <?php the_custom_logo(); ?>

                        </div>

                        <div id="navbar" class="navbar-collapse collapse">
                            <?php
                                // $menu_search = "<li class=\"menu-item menu-search\">" .
                                //                 "<button class=\"search-toggle\">" .
                                //                 "<svg height=\"32\" viewBox=\"0 0 32 32\" width=\"32\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">" .
                                //                 "<path d=\"m32 29.7243549-2.2756451 2.2756451-8.4782882-8.4782882c-2.2957835 1.7923222-5.1151668 2.7791063-8.0956576 2.7791063-3.50409066 0-6.80679677-1.3694147-9.3039648-3.8464443-2.47702957-2.4770296-3.8464443-5.7797357-3.8464443-9.3039647 0-3.52422911 1.36941473-6.82693522 3.8464443-9.3039648 2.49716803-2.47702957 5.79987414-3.8464443 9.3039648-3.8464443 3.524229 0 6.8269351 1.36941473 9.3039647 3.8464443 2.4971681 2.47702958 3.8665828 " . "5.77973569 3.8665828 9.3039648 0 2.9804908-1.0069226 5.7998741-2.7992448 8.0956576zm-25.89804909-9.5456261c1.89301448 1.8930144 4.39018249 2.9200755 7.04845819 2.9200755 2.6582756 0 5.1554436-1.0270611 7.0484581-2.9200755 1.872876-1.8728761 2.8999371-4.3700441 2.8999371-7.0283197 0-2.6582757-1.0270611-5.15544371-2.8999371-7.04845819-1.8930145-1.87287602-4.3901825-2.89993706-7.0484581-2.89993706-2.6582757 0-5.15544371 1.02706104-7.02831974 " . "2.89993706-1.89301447 1.89301448-2.92007551 4.39018249-2.92007551 7.04845819 0 2.6582756 1.02706104 5.1554436 2.89993706 7.0283197z\">" .
                                //                 "</path></svg>" .
                                //                 "<span class=\"sr-only\">" . __( "Search", "digicorpdomain" ) . "</span></button>" .
                                //                 "</li>";
                                $menu_search = "<li class=\"menu-item menu-search\">" .
                                                "<button class=\"search-toggle\">" .
                                                "<i class=\"fa fa-search\"></i>" .
                                                "<span class=\"sr-only\">" . __( "Search", "digicorpdomain" ) . "</span></button>" .
                                                "</li>";
                                wp_nav_menu(array(
                                    'theme_location' => 'headerMenu',
                                    'container' => '',//'<div id="%1$s" class="%2$s">%3$s</div>',
                                    'menu_class' => 'nav navbar-nav navbar-right',
                                    'depth' => '2',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $menu_search . '</ul>', /*<li class="lastlink"><a class="btn btn-success" href="seo-analysis.html"><i class="glyphicon glyphicon-search"></i> ' . __('free seo analysis', 'digicorpdomain') . '</a></li>*/
                                    'walker' => new walker_nav_menu_header()
                                ));
                            ?>
                        </div>
                        <div class="header-search">
                            <div class="wrap">
                              <?php  get_template_part( 'template-parts/header/search' ); ?>
                            </div>
                        </div>
                    </div><!-- end container-fluid -->
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header><!-- end header -->
