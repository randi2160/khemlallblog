<?php
/**
 * Ample ConstructionHeader Info Section
 *
 */
$wp_customize->add_section(
    'ample_construction_top_header_info_section',
    array(
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Top Header Info', 'ample-construction'),
    )
);

$wp_customize->add_setting(
    'ample_construction_top_header_section',
    array(
        'default' => $default['ample_construction_top_header_section'],
        'sanitize_callback' => 'ample_construction_sanitize_select',
    )
);

$hide_show_top_header_option = ample_construction_slider_option();
$wp_customize->add_control(
    'ample_construction_top_header_section',
    array(
        'type' => 'radio',
        'label' => esc_html__('Top Header Info Option', 'ample-construction'),
        'description' => esc_html__('Show/hide Option for Top Header Info Section.', 'ample-construction'),
        'section' => 'ample_construction_top_header_info_section',
        'choices' => $hide_show_top_header_option,
        'priority' => 5
    )
);

/**
 * Field for Font Awesome Icon
 *
 */
$wp_customize->add_setting(
    'ample_construction_top_header_section_phone_number_icon',
    array(
        'default' => $default['ample_construction_top_header_section_phone_number_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'ample_construction_top_header_section_phone_number_icon',
    array(
        'type' => 'text',
        'description' => esc_html__('Insert Font Awesome Class Name', 'ample-construction'),
        'section' => 'ample_construction_top_header_info_section',
        'priority' => 6
    )
);

/**
 * Field for Top Header Phone Number
 *
 */
$wp_customize->add_setting(
    'ample_construction_top_header_phone_no',
    array(
        'default' => $default['ample_construction_top_header_phone_no'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'ample_construction_top_header_phone_no',
    array(
        'type' => 'text',
        'label' => esc_html__('Phone Number', 'ample-construction'),
        'section' => 'ample_construction_top_header_info_section',
        'priority' => 8
    )
);

/**
 * Field for Fonsome Icon
 *
 */
$wp_customize->add_setting(
    'ample_construction_email_icon',
    array(
        'default' => $default['ample_construction_email_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'ample_construction_email_icon',
    array(
        'type' => 'text',
        'description' => esc_html__('Insert Font Awesome Class Name', 'ample-construction'),
        'section' => 'ample_construction_top_header_info_section',
        'priority' => 8
    )
);

/**
 * Field for Top Header Email Address
 *
 */
$wp_customize->add_setting(
    'ample_construction_top_header_email',
    array(
        'default' => $default['ample_construction_top_header_email'],
        'sanitize_callback' => 'sanitize_email',
    )
);
$wp_customize->add_control(
    'ample_construction_top_header_email',
    array(
        'type' => 'email',
        'label' => esc_html__('Email Address', 'ample-construction'),
        'section' => 'ample_construction_top_header_info_section',
        'priority' => 8
    )
);


/**
 *   Show/Hide Social Link
 */
$wp_customize->add_setting(
    'ample_construction_social_link_hide_option',
    array(
        'default' => $default['ample_construction_social_link_hide_option'],
        'sanitize_callback' => 'ample_construction_sanitize_checkbox',
    )
);
$wp_customize->add_control('ample_construction_social_link_hide_option',
    array(
        'label' => esc_html__('Hide/Show Social Menu', 'ample-construction'),
        'section' => 'ample_construction_top_header_info_section',
        'type' => 'checkbox',
        'priority' => 10,
    )
);



/**
 * Field for Fonsome Icon
 *
 */
$wp_customize->add_setting(
	'ample_construction_facebook',
	array(
		'default' => $default['ample_construction_email_icon'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ample_construction_email_icon',
	array(
		'type' => 'text',
		'description' => esc_html__('Insert Font Awesome Class Name', 'ample-construction'),
		'section' => 'ample_construction_top_header_info_section',
		'priority' => 8
	)
);


/**
 * Field for Get Started facebook Link
 *
 */
$wp_customize->add_setting(
	'ample_construction_facebook_url',
	array(
		'default' => $default['ample_construction_facebook_url'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'ample_construction_facebook_url',
	array(
		'type' => 'url',
		'label' => esc_html__('Facebook Url Link', 'ample-construction'),
		'description' => esc_html__('Use full url link', 'ample-construction'),
		'section' => 'ample_construction_top_header_info_section',
		'priority' => 9
	)
);

/**
 * Field for Get Started facebook Link
 *
 */
$wp_customize->add_setting(
	'ample_construction_facebook_url',
	array(
		'default' => $default['ample_construction_facebook_url'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'ample_construction_facebook_url',
	array(
		'type' => 'url',
		'label' => esc_html__('Facebook Url Link', 'ample-construction'),
		'description' => esc_html__('Use full url link', 'ample-construction'),
		'section' => 'ample_construction_top_header_info_section',
		'priority' => 11
	)
);

$wp_customize->add_setting(
	'ample_construction_youtube_url',
	array(
		'default' => $default['ample_construction_youtube_url'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'ample_construction_youtube_url',
	array(
		'type' => 'url',
		'label' => esc_html__('Youtube Url Link', 'ample-construction'),
		'description' => esc_html__('Use full url link', 'ample-construction'),
		'section' => 'ample_construction_top_header_info_section',
		'priority' => 12
	)
);


$wp_customize->add_setting(
	'ample_construction_linkedin_url',
	array(
		'default' => $default['ample_construction_linkedin_url'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'ample_construction_linkedin_url',
	array(
		'type' => 'url',
		'label' => esc_html__('linkedin Url Link', 'ample-construction'),
		'description' => esc_html__('Use full url link', 'ample-construction'),
		'section' => 'ample_construction_top_header_info_section',
		'priority' => 13
	)
);



$wp_customize->add_setting(
	'ample_construction_twitter_url',
	array(
		'default' => $default['ample_construction_twitter_url'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'ample_construction_twitter_url',
	array(
		'type' => 'url',
		'label' => esc_html__('twitter Url Link', 'ample-construction'),
		'description' => esc_html__('Use full url link', 'ample-construction'),
		'section' => 'ample_construction_top_header_info_section',
		'priority' => 14
	)
);