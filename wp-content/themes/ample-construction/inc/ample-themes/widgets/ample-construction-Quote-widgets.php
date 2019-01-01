<?php
if (!class_exists('Ample_Construction_Quote_Widget')) {
    class Ample_Construction_Quote_Widget extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'title' => 'Contact Us',
                'button-text1' => esc_html__('Contact Us', 'ample-construction'),
                'button-text-link1' => '#',
                'image'=>'',
                'sub-title' => esc_html__('Please Contact Us if you required any helps to build houses', 'ample-construction'),
            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'ample-construction-quote-widget',
                esc_html__('AC: Quotation Widget', 'ample-construction'),
                array('description' => esc_html__('Construction Contact Section', 'ample-construction'))
            );
        }
        public function form($instance)
        {
            $instance = wp_parse_args( (array ) $instance, $this->defaults() );
            $title = esc_attr( $instance['title']  );
            $button_text1 = esc_attr( $instance['button-text1'] );
            $button_text_link1 = esc_url( $instance['button-text-link1'] );
	        $subtitle =  esc_attr( $instance['sub-title'] );
            $image = esc_url($instance['image']);

            ?>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('title')); ?>">
                    <?php esc_html_e('Title', 'ample-construction'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" value="<?php echo $title?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('sub-title') ); ?>">
			        <?php esc_html_e( 'Sub Title', 'ample-construction'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('sub-title')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('sub-title')); ?>" value="<?php echo $subtitle; ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'button-text1' ) ); ?>"><?php esc_html_e('Button Text1', 'ample-construction'); ?></label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('button-text1')); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('button-text1')); ?>" value="<?php echo $button_text1; ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'button-text-link1' ) ); ?>">
                    <?php esc_html_e('Button Link1', 'ample-construction'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('button-text-link1')); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('button-text-link1')); ?>" value="<?php echo $button_text_link1; ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('image')); ?>">
                    <?php esc_html_e('Image Size[1300 X 630]', 'ample-construction'); ?>
                </label>
                <br/>
                <?php
                if (!empty($image)) :
                    echo '<img class="custom_media_image widefat" src="' . $image . '"/><br />';
                endif;
                ?>
                <input type="text" class="widefat custom_media_url"
                       name="<?php echo esc_attr($this->get_field_name('image')); ?>"
                       id="<?php echo esc_attr($this->get_field_id('image')); ?>" value="<?php echo $image; ?>">
                <input type="button" class="button button-primary custom_media_button" id="custom_media_button"
                       name="<?php echo esc_attr($this->get_field_name('image')); ?>"
                       value="<?php esc_attr_e('Upload Image', 'ample-construction') ?>"/>
            </p>
            <?php
        }
        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['button-text1'] = sanitize_text_field( $new_instance['button-text1']);
            $instance['button-text-link1'] = esc_url_raw( $new_instance['button-text-link1']);
	        $instance['sub-title'] = sanitize_text_field($new_instance['sub-title']);
            $instance['image'] = esc_url_raw($new_instance['image']);
            return $instance;
        }
        public function widget($args, $instance)
        {

            if (!empty($instance)) {
                $instance = wp_parse_args((array )$instance, $this->defaults());
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
                $button_text1 = esc_html($instance['button-text1']);
                $button_text_link1 = esc_url($instance['button-text-link1']);
	            $subtitle = esc_html($instance['sub-title']);
                $image = esc_url($instance['image']);
                echo $args['before_widget'];
                ?>
                <div class="call-to-action-sec"  style="background-image: url(<?php echo esc_url($image);?>);">
                    <div class="call-to-action-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-sm-9">
                                <div class="call-to-action-text">
                                    <h2><?php echo $title;?></h2>
                                    <p><?php echo esc_html($subtitle); ?> </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <div class="call-to-action-text">
                                    <a href="<?php echo esc_url($button_text_link1); ?> " class="btn"><?php echo esc_html($button_text1);?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                echo $args['after_widget'];
            }
        }
    }
}
add_action('widgets_init', 'ample_construction_quote_widget');
function ample_construction_quote_widget()
{
    register_widget('Ample_Construction_Quote_Widget');

}

