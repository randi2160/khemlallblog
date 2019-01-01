<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'ample-construction') ?></a>
    <header id="masthead" class="site-header" role="banner">
        <!-- Start Top header Section -->
        <?php
        /**
         * The template for displaying all pages.
         *
         * This is the template that displays all pages by default.
         * Please note that this is the WordPress construct of pages
         * and that other 'pages' on your WordPress site may use a
         * different template.
         *
         * @link https://codex.wordpress.org/Template_Hierarchy
         *
         * @subpackage Ample Construction
         */
        // retrieving Customizer Value
        $section_option = ample_construction_get_option('ample_construction_top_header_section');
        if ($section_option == 'show') {
            $mobile_icon = ample_construction_get_option('ample_construction_top_header_section_phone_number_icon');
            $mobile_value = ample_construction_get_option('ample_construction_top_header_phone_no');
            $email_icon = ample_construction_get_option('ample_construction_email_icon');
            $email_value = ample_construction_get_option('ample_construction_top_header_email');
            $social_menu = ample_construction_get_option('ample_construction_social_link_hide_option');
            $social_menu = ample_construction_get_option('ample_construction_social_link_hide_option');
            $social_fb = ample_construction_get_option('ample_construction_facebook_url');
            $social_youtube = ample_construction_get_option('ample_construction_youtube_url');
            $social_linkedin = ample_construction_get_option('ample_construction_linkedin_url');
            $social_twitter = ample_construction_get_option('ample_construction_twitter_url');
            $ac_top_header_option= ample_construction_get_option('ample_construction_curve_option');
            ?>
            <div class="top-header curve">
                <div class="container">
                    <div class="row">
                        <!-- Start top contact info Section -->
                        <div class="col-xs-12 col-sm-6">
                            <div class="top-header-contact-info">
                                <?php
                                // echo  $mobile_icon;
                                if (!empty($mobile_value)) {
                                    ?>
                                    <a class="top-phone" href="<?php echo esc_url('tel:' . $mobile_value) ?>"><i
                                            class="fa  <?php echo esc_attr($mobile_icon); ?>"></i><?php echo esc_html($mobile_value); ?>
                                    </a>

                                <?php }

                                if (!empty($email_value)) {
                                    ?>
                                    <a class="top-email" href="<?php echo esc_url('mailto:' . $email_value); ?>"><i
                                            class="fa <?php echo esc_attr($email_icon); ?>"></i> <?php echo esc_html($email_value); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- End top contact info Section -->
                        <!-- Start top social icon Section -->
                        <div class="col-xs-12 col-sm-6">
                            <?php
                            if ($social_menu == 1) {

                                ?>
                                <div class="top-header-socialicon">

                                    <ul class="menu-social-menu">
                                        <?php
                                        if(!empty($social_fb)){ ?>
                                            <li><a href="<?php echo esc_url($social_fb); ?>" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                                        <?php }
                                        if(!empty($social_youtube)){ ?>
                                            <li><a href="<?php echo esc_url($social_youtube); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                        <?php }
                                        if(!empty($social_linkedin)){ ?>
                                            <li><a href="<?php echo esc_url($social_linkedin); ?>"  target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                        <?php }
                                        if(!empty($social_twitter)){ ?>
                                            <li><a href="<?php echo esc_url($social_twitter); ?>"  target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- End top social icon Section -->
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- End Top header Section -->
        <!-- Start logo and menu Section -->
        <div class="main-header">
            <div class="container">
                <!-- Start Site title Section -->
                <div class="site-branding">
                    <h1 class="site-title">
                        <!-- <img src="images/logo.png" alt=""> -->
                        <?php
                        if (has_custom_logo()) { ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php the_custom_logo(); ?>
                            </a>
                        <?php } else {
                        if (is_front_page() && is_home()) : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>"
                                   rel="home"><?php bloginfo('name'); ?></a>
                            </h1>
                        <?php else : ?>
                            <p class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>"
                                   rel="home"><?php bloginfo('name'); ?></a>
                            </p>
                            <?php
                        endif;
                        ?>
                    </h1>
                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                        <?php
                    endif;
                    } ?>
                </div>
                <!-- End Site title Section -->
                <!-- Start Menu Section -->
                <div class="menu">
                    <!--<nav id="site-navigation" class="main-navigation" role="navigation"> -->
                    <div class="nav-wrapper">
                        <!-- for toogle menu -->
                        <div class="visible-xs visible-sm  clearfix"><span id="showbutton" class="clearfix"><img
                                    class="img-responsive grow"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/button.png" alt=""/></span>
                        </div>
                        <div class=""></div>

                        <nav class="column-12 im-hiding">
                            <div class="clearfix">
                                <?php
                                if (has_nav_menu('primary')) {
                                    wp_nav_menu(array(
                                            'theme_location' => 'primary',
                                            'menu_class' => 'main-nav',
                                            'depth' => 4,

                                        )
                                    );
                                }
                                ?>
                        </nav>
                        <!-- / main nav -->
                    </div>
                    <!-- </nav> -->
                </div>
                <!-- End Menu Section -->
            </div>
        </div>
        <!-- End logo and menu Section -->
    </header>