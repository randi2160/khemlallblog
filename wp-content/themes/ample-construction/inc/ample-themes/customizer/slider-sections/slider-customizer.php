<?php
/**
 * HomePage Settings Panel on customizer
 */
$wp_customize->add_panel(
	'ample_construction_homepage_settings_panel',
	array(
		'priority' => 5,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__('HomePage Slider Settings', 'ample-construction'),
	)
);

/*-------------------------------------------------------------------------------------------------*/
/**
 * Slider Section
 *
 */
$wp_customize->add_section(
	'ample_construction_slider_section',
	array(
		'title' => esc_html__('Slider Section', 'ample-construction'),
		'panel' => 'ample_construction_homepage_settings_panel',
		'priority' => 6,
	)
);

/**
 * Show/Hide option for Homepage Slider Section
 *
 */

$wp_customize->add_setting(
	'ample_construction_homepage_slider_option',
	array(
		'default' => $default['ample_construction_homepage_slider_option'],
		'sanitize_callback' => 'ample_construction_sanitize_select',
	)
);
$hide_show_option = ample_construction_slider_option();
$wp_customize->add_control(
	'ample_construction_homepage_slider_option',
	array(
		'type' => 'radio',
		'label' => esc_html__('Slider Option', 'ample-construction'),
		'description' => esc_html__('Show/hide option for homepage Slider Section.', 'ample-construction'),
		'section' => 'ample_construction_slider_section',
		'choices' => $hide_show_option,
		'priority' => 7
	)
);

/**
 * Dropdown available category for homepage slider
 *
 */


$wp_customize->add_setting(
	'ample_construction_slider_cat_id',
	array(
		'default' => $default['ample_construction_slider_cat_id'],
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(new ample_construction_Customize_Category_Control(
		$wp_customize,
		'ample_construction_slider_cat_id',
		array(
			'label' => esc_html__('Slider Category', 'ample-construction'),
			'description' => esc_html__('Select Category for Homepage Slider Section', 'ample-construction'),
			'section' => 'ample_construction_slider_section',
			'priority' => 8,

		)
	)
);
/**
 * Field for no of posts to display..
 *
 */
$wp_customize->add_setting(
	'ample_construction_no_of_slider',
	array(
		'default' => $default['ample_construction_no_of_slider'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'ample_construction_no_of_slider',
	array(
		'type' => 'number',
		'label' => esc_html__('No of Slider', 'ample-construction'),
		'section' => 'ample_construction_slider_section',
		'priority' => 10
	)
);


/**
 * Field for Get Started button text
 *
 */
$wp_customize->add_setting(
	'ample_construction_slider_get_started_txt',
	array(
		'default' => $default['ample_construction_slider_get_started_txt'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'ample_construction_slider_get_started_txt',
	array(
		'type' => 'text',
		'label' => esc_html__('Get Started Button', 'ample-construction'),
		'section' => 'ample_construction_slider_section',
		'priority' => 11
	)
);

/**
 * Field for Get Started button Link
 *
 */
$wp_customize->add_setting(
	'ample_construction_slider_get_started_link',
	array(
		'default' => $default['ample_construction_slider_get_started_link'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'ample_construction_slider_get_started_link',
	array(
		'type' => 'url',
		'label' => esc_html__('Get Started Button Link', 'ample-construction'),
		'description' => esc_html__('Use full url link', 'ample-construction'),
		'section' => 'ample_construction_slider_section',
		'priority' => 20
	)
);

/*----------------------------------------------------------------------------------------------*/
	