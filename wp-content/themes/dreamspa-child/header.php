<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="de-DE"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
        <title><?php wp_title('|', true, 'right'); ?></title>

        <?php
        if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Page Speed') === false):
            ?>
    <?php //Google analytics tracking  ?>
            <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-106188116-1', 'auto');
                ga('send', 'pageview');

            </script>
        <?php endif; ?>

        <?php /*
          <!-- Google Tag Manager -->
          <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
          })(window,document,'script','dataLayer','GTM-MRD853V');</script>
          <!-- End Google Tag Manager -->
         */ ?>
              
<?php wp_head();?>
    </head>
    <?php
    //echo($post->ID); 
    $section_id = empty($post->ancestors) ? $post->ID : end($post->ancestors);
//echo($section_id);



    /* für retreats müsste ich im wp_postmeta die ID abfragen, die die 819 als meta value hat, davon das menu_item_menu_item_parent
     * 735 oder so
     */
    $body_class = "";
    if ($section_id == 739 or $section_id == 994 or $section_id == 996)
        $body_class = "blue";

    elseif ($section_id == 756 or $section_id == 998 or $section_id == 1000)
        $body_class = "green";
    else {
        if ($post->post_type == "course") {
            $custom_fields = get_post_custom($post->ID);
            if ($custom_fields['type'][0] == "retreat")
                $body_class = "green";
        }
    }
    ?>
    <body class="boxed <?php echo($body_class); ?>">

        <!-- **Wrapper** -->
        <div class="wrapper">
            <div class="inner-wrapper">

                <!-- **Header Wrapper** -->
                <div id="header-wrapper"><!-- **Header** -->
                    <header id="header" class="header1">
                        <div class="container">
                            <div id="logo">				
                                <a href="<?php echo home_url(); ?>" title="Yogavihar">			
                                    <img class="normal_logo" src="<?php echo CHILD_THEME_BASE_URL; ?>images/logo.png" alt="yogaviha" title="yogavihar" />
                                    <img class="retina_logo" src="<?php echo CHILD_THEME_BASE_URL; ?>images/logo@2x.png" alt="yogavihar" title="yogavihar" style="width:70px; height:70px;"/>
                                </a>
                            </div>
                            <ul id="language-switcher">
                                <?php
                                $args = array(
                                    'show_names' => 0,
                                    'show_flags' => 1,
                                    'hide_current' => 1
                                );
                                pll_the_languages($args);
                                ?>
                            </ul>
                        </div>

                        <div class="main-menu-wrapper">
                            <!-- **Navigation** -->
                            <nav id="main-menu">
                                <div class="container">
                                    <div class="dt-menu-toggle" id="dt-menu-toggle">
                                        <?php _e('Menu', 'dt_themes'); ?>
                                        <span class="dt-menu-toggle-icon"></span>
                                    </div><?php
                                        $primaryMenu = NULL;
                                        if (function_exists('wp_nav_menu')) :
                                            $primaryMenu = wp_nav_menu(array('theme_location' => 'header_menu', 'menu_id' => '', 'menu_class' => 'menu', 'fallback_cb' => 'dttheme_default_navigation'
                                                , 'echo' => false, 'container' => '', 'walker' => new DTFrontEndMenuWalker()));
                                        endif;

                                        if (!empty($primaryMenu)):
                                            echo $primaryMenu;
                                        endif;
                                        ?>
                                </div>
                            </nav><!-- **Navigation - End** -->  
                        </div>
                    </header><!-- **Header - End** -->
                </div><!-- **Header Wrapper - End** -->

                <!-- **Main** -->
                <div id="main">
                    <?php
#Header Image Section
                    //Vorgefertigte Headerbilder für die Startseite laden
                    
                    $header_image = get_field('header_image');
                    $slider_image_class = '';
                    if (get_field('top_image') == '1') {
                        $slider_image_class = ' height300';
                    } elseif (get_field('top_image') == '2') {
                        $slider_image_class = ' height200';
                    }
//$size = 'full'; // (thumbnail, medium, large, full or custom size)

                    if ($header_image) :
                        ?>
                        <!-- **Header Image Section** -->
                        <div id="slider">
                            <div id="slider-container">
                                <div class='slider-image-only<?php echo $slider_image_class != '' ? $slider_image_class : ''; ?>'>
                                    <?php
                                    // echo wp_get_attachment_image( $header_image, $size );
                                    echo '<img src="' . wp_get_attachment_url($header_image) . '" alt="" />';
                                    ?>
                                </div>
                                <?php
                                if (get_field('with_quote')):
                                    echo "<div class='header-image-claim " . get_field('quote_style') . "'>&#8222;" . stripslashes(get_field('quote')) . "&#8220;";
                                    echo "<p class='author " . get_field('quote_style') . "'>" . stripslashes(get_field('author_quote')) . "</p></div>";
                                endif;
                                ?>
                            </div>
                        </div><!-- **Header Image Section - End** -->
                        <?php endif; ?>
                        <?php if (!is_page_template('tpl-fullwidth.php')): ?>
                        <!-- ** Container ** -->
                        <div class="container">
                            <?php endif;?>			