<?php
/**
 * Layout/Design Option
 *
 */
$wp_customize->add_panel(
    'ample_construction_design_layout_options',
    array(
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__(' Layout/Design Option', 'ample-construction'),
    )
);

/*-------------------------------------------------------------------------------------------*/
/**
 * Sidebar Option
 *
 */
$wp_customize->add_section(
    'ample_construction_default_sidebar_layout_option',
    array(
        'title' => esc_html__('Default Sidebar Layout Option', 'ample-construction'),
        'panel' => 'ample_construction_design_layout_options',
        'priority' => 6,
    )
);

/**
 * Sidebar Option
 */
$wp_customize->add_setting(
    'ample_construction_sidebar_layout_option',
    array(
        'default' => $default['ample_construction_sidebar_layout_option'],
        'sanitize_callback' => 'ample_construction_sanitize_select',
    )
);


$layout = ample_construction_sidebar_layout();
$wp_customize->add_control('ample_construction_sidebar_layout_option',
    array(
        'label' => esc_html__('Default Sidebar Layout', 'ample-construction'),
        'description' => esc_html__('Home/front page does not have sidebar. Inner pages like blog, archive single page/post Sidebar Layout. However single page/post sidebar can be overridden.if you need on a page and post sidebar from here, you need to first set default sidebar on page and post', 'ample-construction'),
        'section' => 'ample_construction_default_sidebar_layout_option',
        'type' => 'select',
        'choices' => $layout,
        'priority' => 10
    )
);


/*-------------------------------------------------------------------------------------------*/

/**
 * Blog/Archive Layout Option
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'ample_construction_blog_archive_layout_option',
    array(
        'title' => esc_html__('Blog/Archive Layout Option', 'ample-construction'),
        'panel' => 'ample_construction_design_layout_options',
        'priority' => 7,
    )
);


/**
 * Blog Page Title
 */
$wp_customize->add_setting(
    'ample_construction_blog_title_option',
    array(
        'default' => $default['ample_construction_blog_title_option'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('ample_construction_blog_title_option',
    array(
        'label' => esc_html__('Blog Page Title', 'ample-construction'),
        'section' => 'ample_construction_blog_archive_layout_option',
        'type' => 'text',
        'priority' => 11
    )
);

/**
 * Blog/Archive excerpt option
 */
$wp_customize->add_setting(
    'ample_construction_blog_excerpt_option',
    array(
        'default' => $default['ample_construction_blog_excerpt_option'],
        'sanitize_callback' => 'ample_construction_sanitize_select',
    )
);
$blogexcerpt = ample_construction_blog_excerpt();
$wp_customize->add_control('ample_construction_blog_excerpt_option',
    array(
        'choices' => $blogexcerpt,
        'label' => esc_html__('Show Description From', 'ample-construction'),
        'section' => 'ample_construction_blog_archive_layout_option',
        'type' => 'select',
        'priority' => 8
    )
);

/**
 * Description Length In Words
 */
$wp_customize->add_setting(
    'ample_construction_description_length_option',
    array(
        'default' => $default['ample_construction_description_length_option'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control('ample_construction_description_length_option',
    array(
        'label' => esc_html__('Description Length In Words', 'ample-construction'),
        'section' => 'ample_construction_blog_archive_layout_option',
        'type' => 'number',
        'priority' => 12
    )
);
/*-------------------------------------------------------------------------------------------*/
/**
 * Feature Image Option
 *
 */
$wp_customize->add_section(
    'ample_construction_feature_image_info_option',
    array(
        'title' => esc_html__('Feature Image Option For Single post / Page', 'ample-construction'),
        'panel' => 'ample_construction_design_layout_options',
        'priority' => 6,
    )
);


/**
 * Feature Image Option Single page
 */
$wp_customize->add_setting(
    'ample_construction_show_feature_image_single_option',
    array(
        'default' => $default['ample_construction_show_feature_image_single_option'],
        'sanitize_callback' => 'ample_construction_sanitize_select',
    )
);

$hide_show_feature_image_option = ample_construction_show_feature_image_option();
$wp_customize->add_control(
    'ample_construction_show_feature_image_single_option',
    array(
        'type' => 'radio',
        'label' => esc_html__('Show/Hide Feature Image For Single Page/post', 'ample-construction'),
        'section' => 'ample_construction_feature_image_info_option',
        'choices' => $hide_show_feature_image_option,
        'priority' => 5
    )
);



  

	