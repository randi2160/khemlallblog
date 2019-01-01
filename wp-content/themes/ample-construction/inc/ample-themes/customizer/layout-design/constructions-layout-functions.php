<?php
if (!function_exists('ample_construction_sidebar_layout')) :
    function ample_construction_sidebar_layout()
    {
        $ample_construction_sidebar_layout = array(
            'right-sidebar' => esc_html__('Right Sidebar', 'ample-construction'),
            'left-sidebar' => esc_html__('Left Sidebar', 'ample-construction'),
            'no-sidebar' => esc_html__('No Sidebar', 'ample-construction'),
        );
        return apply_filters('ample_construction_sidebar_layout', $ample_construction_sidebar_layout);
    }
endif;

/**
 * Blog/Archive Description Option
 *
 * @since Ample Construction 1.0.0
 *
 *
 * 
 * @param null
 * @return array $ample_construction_blog_excerpt
 *
 */
if (!function_exists('ample_construction_blog_excerpt')) :
    function ample_construction_blog_excerpt()
    {
        $ample_construction_blog_excerpt = array(
            'excerpt' => esc_html__('Excerpt', 'ample-construction'),
            'content' => esc_html__('Content', 'ample-construction'),

        );
        return apply_filters('ample_construction_blog_excerpt', $ample_construction_blog_excerpt);
    }
endif;

/**
 * Show/Hide Feature Image  options
 *
 * @since Ample Construction 1.0.0
 *
 * @param null
 * @return array $ample_construction_show_feature_image_option
 *
 */
if (!function_exists('ample_construction_show_feature_image_option')) :
    function ample_construction_show_feature_image_option()
    {
        $ample_construction_show_feature_image_option = array(
            'show' => esc_html__('Show', 'ample-construction'),
            'hide' => esc_html__('Hide', 'ample-construction')
        );
        return apply_filters('ample_construction_show_feature_image_option', $ample_construction_show_feature_image_option);
    }
endif;
