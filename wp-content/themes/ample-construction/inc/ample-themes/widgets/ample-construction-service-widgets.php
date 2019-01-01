<?php
if (!class_exists('Ample_Construction_Service_Widget')) {
    class Ample_Construction_Service_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'cat_id' => 0,
                'title' => esc_html__('Our Services', 'ample-construction'),


            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'ample-construction-service-widget',
                esc_html__('AC: Service Widget', 'ample-construction'),
                array('description' => esc_html__('construction Service Section', 'ample-construction'))
            );
        }
        public function form( $instance )
        {
            $instance = wp_parse_args( (array ) $instance, $this->defaults() );
            $catid = absint( $instance['cat_id'] );
            $title = esc_attr( $instance['title'] );

            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                    <?php esc_html_e('Title', 'ample-construction'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title') ); ?>" value="<?php echo $title; ?>">
            </p>


            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('cat_id') ); ?>">
                    <?php esc_html_e('Select Category', 'ample-construction'); ?>
                </label><br/>
                <?php
                $construction_con_dropown_cat = array(
                    'show_option_none' => esc_html__('Select Category ', 'ample-construction'),
                    'orderby' => 'name',
                    'order' => 'asc',
                    'show_count' => 1,
                    'hide_empty' => 1,
                    'echo' => 1,
                    'selected' => $catid,
                    'hierarchical' => 1,
                    'name' => esc_attr( $this->get_field_name('cat_id') ),
                    'id' => esc_attr( $this->get_field_name('cat_id') ),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );
                wp_dropdown_categories( $construction_con_dropown_cat );
                ?>
            </p>
            <hr>
            <?php
        }
        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['cat_id'] = (isset($new_instance['cat_id'])) ? absint($new_instance['cat_id']) : '';
            $instance['title'] = sanitize_text_field($new_instance['title']);

            return $instance;

        }
        public function widget($args, $instance)
        {

            if (!empty($instance)) {
                $instance = wp_parse_args((array )$instance, $this->defaults());
                $catid = absint($instance['cat_id']);
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);

                echo $args['before_widget'];
                ?>
                <div class="service pt-50 pb-20 ">
                    <div class="service-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sec-title">
                                    <h2><?php echo $title; ?></h2>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="service-item">
	            <?php
	            $idvalue = array();
	            if (!empty($catid)) {
		            $i = 0;
		            $sticky = get_option('sticky_posts');
		            $home_services_section = array(
			            'cat' => $catid,
			            'posts_per_page' => 6,
			            'ignore_sticky_posts' => true,
			            'post__not_in' => $sticky,
			            'order' => 'ASC'
		            );
		            $home_services_section_query = new WP_Query($home_services_section);
		            if ($home_services_section_query->have_posts()) {
			            while ($home_services_section_query->have_posts()) {
				            $home_services_section_query->the_post();
				            $icon = get_post_meta(get_the_ID(), 'ample_construction_icon', true);
				            $idvalue[] = get_the_ID();
				            if($i%3==0) {

                                ?>
                                <div class="clearfix"></div>
                                <?php
                            }
                                ?>


                                <div class="col-md-4 col-sm-6 inner">
                                    <div class="media">
                                        <?php if(!empty($icon)){?>
                                        <div class="service-icon">
                                            <i class="fa <?php echo esc_attr($icon); ?>"></i>
                                        </div>
                                <?php }?>
                                        <div class="media-body">
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                            <p><?php echo esc_html(wp_trim_words(get_the_content(), 20)); ?></p>
                                        </div>
                                    </div>
                                </div>
				            <?php
				            $i++;
			            }
			            wp_reset_postdata();
		            }
	            } ?>

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
add_action('widgets_init', 'ample_construction_service_widget');
function ample_construction_service_widget()
{
    register_widget('Ample_Construction_Service_Widget');

}

