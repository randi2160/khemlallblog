<?php
/**
 * Define some custom classes for ample_construction
 *
 * https://codex.WordPress.org/Class_Reference/WP_Customize_Control
 * @subpackage ample construction
 * @since 1.0.0
 */

if ( class_exists( 'WP_Customize_Control' ) ) {

    /**
     * A class to create a dropdown for all categories in your WordPress site
     *
     
     * @ample construction public
     */
    class ample_construction_Customize_Category_Control extends WP_Customize_Control {

        /**
         * Render the control's content.
         *
         * @return void
         * @since 1.0.0
         */
        public function render_content() {
            $ample_construction_dropdown = wp_dropdown_categories(
                array(
                    'name'              => 'customize-dropdown-categories' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => esc_html__( '&mdash; Select Category &mdash;','ample-construction'),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );

            // Hackily add in the data link parameter.
            $ample_construction_dropdown = str_replace( '<select', '<select ' . $this->get_link(), $ample_construction_dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
                $this->label,
                $this->description,
                $ample_construction_dropdown
            );
        }
    }


}