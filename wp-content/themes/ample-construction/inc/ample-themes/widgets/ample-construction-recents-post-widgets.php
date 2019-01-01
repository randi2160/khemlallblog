<?php
if (!class_exists('Ample_Construction_Recent_Post_Widget')) {
    class Ample_Construction_Recent_Post_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'cat_id' => 0,
                'title' => esc_html__('Latest Blogs', 'ample-construction'),

            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'ample-construction-recent-post-widget',
                esc_html__('AC: Latest Blog Widget', 'ample-construction'),
                array('description' => esc_html__('Construction Latest Blog Section', 'ample-construction'))
            );
        }

        public function form($instance)
        {
            $instance = wp_parse_args((array )$instance, $this->defaults());
            $catid = absint($instance['cat_id']);
            $title = esc_attr($instance['title']);


            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                    <?php esc_html_e('Title', 'ample-construction'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo $title; ?>">
            </p>


            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>">
                    <?php esc_html_e('Select Category', 'ample-construction'); ?>
                </label><br/>
                <?php
                $Construction_con_dropown_cat = array(
                    'show_option_none' => esc_html__('From Recent Posts', 'ample-construction'),
                    'orderby' => 'name',
                    'order' => 'asc',
                    'show_count' => 1,
                    'hide_empty' => 1,
                    'echo' => 1,
                    'selected' => $catid,
                    'hierarchical' => 1,
                    'name' => esc_attr($this->get_field_name('cat_id')),
                    'id' => esc_attr($this->get_field_name('cat_id')),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );
                wp_dropdown_categories($Construction_con_dropown_cat);
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
            echo $args['before_widget'];
            if (!empty($instance)) {
                $instance = wp_parse_args((array )$instance, $this->defaults());

         
                $catid = absint($instance['cat_id']);
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
             

                ?>
                <div class="blog-sec pt-50 pb-20 bg-color">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sec-title">
                                    <h2> <?php
	                                    if (!empty($title)) {
		                                    ?>
                                            <?php echo $title; ?>
		                                    <?php
	                                    }
	                                    ?></h2>

                                </div>
                            </div>
                        </div>
                        <div class="row">
	            <?php
	            $i = 0;
	            $sticky = get_option('sticky_posts');
	            if ($catid != -1) {
		            $home_recent_post_section = array(
			            'ignore_sticky_posts' => true,
			            'post__not_in' => $sticky,
			            'cat' => $catid,
			            'posts_per_page' => 3,
			            'order' => 'DESC'
		            );
	            } else {
		            $home_recent_post_section = array(
			            'ignore_sticky_posts' => true,
			            'post__not_in' => $sticky,
			            'post_type' => 'post',
			            'posts_per_page' => 3,
			            'order' => 'DESC'
		            );
	            }

	            $home_recent_post_section_query = new WP_Query($home_recent_post_section);

	            if ($home_recent_post_section_query->have_posts()) {
		            while ($home_recent_post_section_query->have_posts()) {
			            $home_recent_post_section_query->the_post();
			            ?>


                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                    <div class="single-post">
	                                    <?php
	                                    if (has_post_thumbnail()) {
		                                    $image_id = get_post_thumbnail_id();
		                                    $image_url = wp_get_attachment_image_src($image_id, 'medium', true);
		                                    ?>
                                            <img src="<?php echo esc_url($image_url[0]); ?>" alt="" class="image-responsive"/>

	                                    <?php }
	                                    ?>

                                        <div class="media-body">
                                            <div class="single-post-text">
                                                <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                                                <ul>
                                                    <li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?> "><i class="fa fa-user"></i><?php the_author(); ?></a></li>
                                                    <li><a href="<?php the_permalink();?>"><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></a></li>
                                                    <li><a href="<?php the_permalink();?>"><i class="fa fa-folder"></i><?php ample_construction_entry_footer(); ?></a></li>

                                                </ul>
                                                <p><?php echo esc_html(wp_trim_words(get_the_content(), 20)); ?> </p>
                                                <a href="<?php the_permalink();?>" class="btn price_btn"><?php esc_html_e( 'Read More', 'ample-construction' ); ?></a>
                                            </div>
                                        </div>
                                    </div>

                            </div>

			            <?php
			            $i++;
		            }
		            wp_reset_postdata();
	            } ?>

                        </div>
                    </div>
                </div>

                <?php
                echo $args['after_widget'];
            }
        }

    }
}
add_action('widgets_init', 'ample_construction_recent_post_widget');
function ample_construction_recent_post_widget()
{
    register_widget('Ample_Construction_Recent_Post_Widget');

}
