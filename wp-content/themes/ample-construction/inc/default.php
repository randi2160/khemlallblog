<?php
/**
 * Ample Construction default theme options.
 *
 * 
 * @subpackage Ample Construction
 */

if ( !function_exists('ample_construction_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function ample_construction_get_default_theme_options()
    {

        $default = array();

        // Homepage Slider Section
        $default['ample_construction_homepage_slider_option'] = 'hide';
        $default['ample_construction_slider_cat_id'] = 0;
        $default['ample_construction_no_of_slider'] = 3;
        $default['ample_construction_slider_get_started_txt'] = esc_html__('Get Started!', 'ample-construction');
        $default['ample_construction_slider_get_started_link'] = '#';

        // footer copyright.
        $default['ample_construction_copyright'] = esc_html__('Copyright All Rights Reserved', 'ample-construction');

        // Home Page Top header Info.
        $default['ample_construction_top_header_section'] = 'hide';
        $default['ample_construction_top_header_section_phone_number_icon'] = 'fa-phone';
        $default['ample_construction_top_header_phone_no'] = '';
        $default['ample_construction_email_icon'] = 'fa-envelope-o';
        $default['ample_construction_top_header_email'] = '';
        $default['ample_construction_social_link_hide_option'] = 1;
	    $default['ample_construction_facebook_url']='';
	    $default['ample_construction_youtube_url']='';
	    $default['ample_construction_linkedin_url']='';
	    $default['ample_construction_twitter_url']='';

        // Blog.
        $default['ample_construction_sidebar_layout_option'] = 'right-sidebar';
        $default['ample_construction_blog_title_option'] = esc_html__('Latest Blog', 'ample-construction');
        $default['ample_construction_blog_excerpt_option'] = 'excerpt';
        $default['ample_construction_description_length_option'] = 40;
        $default['ample_construction_exclude_cat_blog_archive_option'] = '';
        

        // Details page.
        $default['ample_construction_show_feature_image_single_option'] = 'show';

        // Color Option.
        $default['ample_construction_primary_color'] = '#fab702';
        $default['ample_construction_top_header_background_color'] = '#fab702';
        $default['ample_construction_top_footer_background_color'] = '#444444';
        $default['ample_construction_bottom_footer_background_color'] = '#fab702';
        $default['ample_construction_front_page_hide_option'] = 0;
        $default['ample_construction_breadcrumb_setting_option'] = 'enable';
        $default['ample_construction_post_search_placeholder_option'] = esc_html__('Search', 'ample-construction');
        $default['ample_construction_hide_breadcrumb_front_page_option'] = 1;
        $default['ample_construction_color_reset_option'] = 'do-not-reset';

        // Pass through filter.
        $default = apply_filters( 'ample_construction_get_default_theme_options', $default );
        return $default;
    }
endif;
