<?php

/**
 * Slider  options
 * @param null
 * @return array $ample_construction_slider_option
 *
 */
if (!function_exists('ample_construction_slider_option')) :
    function ample_construction_slider_option()
    {
        $ample_construction_slider_option = array(
            'show' => esc_html__('Show', 'ample-construction'),
            'hide' => esc_html__('Hide', 'ample-construction')
        );
        return apply_filters('ample_construction_slider_option', $ample_construction_slider_option);
    }
endif;