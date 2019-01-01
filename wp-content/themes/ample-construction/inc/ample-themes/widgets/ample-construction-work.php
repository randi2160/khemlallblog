<?php
if (!class_exists('Ample_Construction_Work_Widget')) {
	class Ample_Construction_Work_Widget extends WP_Widget
	{

		private function defaults()
		{

			$defaults = array(
				'cat_id' => 0,
				'title' => esc_html__('Our Work', 'ample-construction'),


			);
			return $defaults;
		}

		public function __construct()
		{
			parent::__construct(
				'ample-construction-work-widget',
				esc_html__('AC: Our Work Widget', 'ample-construction'),
				array('description' => esc_html__('Construction Recent Post Section', 'ample-construction'))
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




				<div class="project-sec pt-50 pb-20">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="sec-title">
									<h2><?php
										if (!empty($title)) {
											?>
											<?php echo $title; ?>
											<?php
										}
										?>
									</h2>

								</div>
							</div>
						</div>
						<div class="row">

				<?php
				$i = 0;
				$sticky = get_option('sticky_posts');
				if ($catid != -1) {
					$home_work_section = array(
						'ignore_sticky_posts' => true,
						'post__not_in' => $sticky,
						'cat' => $catid,
						'posts_per_page' => 12,
						'order' => 'DESC'
					);
				} else {
					$home_work_section = array(
						'ignore_sticky_posts' => true,
						'post__not_in' => $sticky,
						'post_type' => 'post',
						'posts_per_page' => 12,
						'order' => 'DESC'
					);
				}

				$home_work_section_query = new WP_Query($home_work_section);

				if ($home_work_section_query->have_posts()) {
					while ($home_work_section_query->have_posts()) {
						$home_work_section_query->the_post();
						?>



						<div class="col-md-3 col-sm-6  inner">
								<div class="item">
									<div class="prject-thumb">
										<?php
										if (has_post_thumbnail()) {
											$image_id = get_post_thumbnail_id();
											$image_url = wp_get_attachment_image_src($image_id, 'Full', true);
											?>
											<img src="<?php echo esc_url($image_url[0]); ?>" alt="" />




										<a href="<?php echo esc_url($image_url[0]); ?>" class="gallery-photo"><i class="fa fa-plus"></i></a>

										<?php }
										?>
									</div>

									<div class="project-hoverlay">
										<div class="project-text">
											<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
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
add_action('widgets_init', 'ample_construction_work_widget');
function  ample_construction_work_widget()
{
	register_widget('Ample_Construction_Work_Widget');

}
