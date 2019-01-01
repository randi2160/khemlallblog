<?php
//=============================================================
// Color reset
//=============================================================
if ( ! function_exists( 'ample_construction_reset_colors' ) ) :

    function ample_construction_reset_colors($data) {

        $default=ample_construction_get_default_theme_options();


        set_theme_mod('ample_construction_top_header_background_color',$default['ample_construction_top_header_background_color']);

        set_theme_mod('ample_construction_top_footer_background_color', $default['ample_construction_top_footer_background_color']);

        set_theme_mod('ample_construction_bottom_footer_background_color',$default['ample_construction_bottom_footer_background_color']);

        set_theme_mod('ample_construction_primary_color', $default['ample_construction_primary_color']);

        set_theme_mod('ample_construction_color_reset_option','do-not-reset');


    }

endif;
add_action( 'ample_construction_colors_reset','ample_construction_reset_colors', 10 );

