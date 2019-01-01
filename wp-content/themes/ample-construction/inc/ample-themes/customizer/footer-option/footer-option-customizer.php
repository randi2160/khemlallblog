<?php
/**
 * Copyright Info Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'ample_construction_copyright_info_section',
    array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Footer Option', 'ample-construction'),
    )
);

/**
 * Field for Copyright
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'ample_construction_copyright',
    array(
        'default' => $default['ample_construction_copyright'],
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'ample_construction_copyright',
    array(
        'type' => 'text',
        'label' => esc_html__('Copyright', 'ample-construction'),
        'section' => 'ample_construction_copyright_info_section',
        'priority' => 8
    )
);

