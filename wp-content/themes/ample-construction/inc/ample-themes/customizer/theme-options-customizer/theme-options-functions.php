<?php
/**
 * Breadcrumb  display option options
 * @param null
 * @return array $ample_construction_show_breadcrumb_option
 *
 */
if (!function_exists('ample_construction_show_breadcrumb_option')) :
    function ample_construction_show_breadcrumb_option()
    {
        $ample_construction_show_breadcrumb_option = array(
            'enable' => esc_html__('Enable', 'ample-construction'),
            'disable' => esc_html__('Disable', 'ample-construction')
        );
        return apply_filters('ample_construction_show_breadcrumb_option', $ample_construction_show_breadcrumb_option);
    }
endif;


/**
 * Reset Option
 *
 *
 * @param null
 * @return array $ample_construction_reset_option
 *
 */
if (!function_exists('ample_construction_reset_option')) :
    function ample_construction_reset_option()
    {
        $ample_construction_reset_option = array(
            'do-not-reset' => esc_html__('Do Not Reset', 'ample-construction'),
            'reset-all' => esc_html__('Reset All', 'ample-construction'),
        );
        return apply_filters('ample_construction_reset_option', $ample_construction_reset_option);
    }
endif;



/**
 * Sanitize Multiple Category
 * =====================================
 */

if ( !function_exists('ample_construction_sanitize_multiple_category') ) :

    function ample_construction_sanitize_multiple_category( $values )
    {

        $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

        return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
    }

endif;
