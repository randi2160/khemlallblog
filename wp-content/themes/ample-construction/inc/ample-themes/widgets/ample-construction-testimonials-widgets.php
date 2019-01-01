<?php
if ( ! class_exists( 'Ample_Construction_Testimonials_Widget' ) ) {
	class Ample_Construction_Testimonials_Widget extends WP_Widget {

		private function defaults() {

			$defaults = array(
				'cat_id'    => 0,
				'title'     => esc_html__( 'WHAT OUR CLIENT SAYS', 'ample-construction' ),
				'image'     => '',
				'sub-title' => '',

			);

			return $defaults;
		}

		public function __construct() {
			parent::__construct(
				'Construction-testimonials-widget',
				esc_html__( 'AC: Testimonials Widget', 'ample-construction' ),
				array( 'description' => esc_html__( 'Construction Testimonials Section', 'ample-construction' ) )
			);
		}

		public function form( $instance ) {
			$instance = wp_parse_args( (array ) $instance, $this->defaults() );
			$catid    = absint( $instance['cat_id'] );
			$title    = esc_attr( $instance['title'] );
			$image    = esc_url( $instance['image'] );
			$subtitle = esc_html( $instance['sub-title'] );

			?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
					<?php esc_html_e( 'Title', 'ample-construction' ); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" value="<?php echo $title; ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'sub-title' ) ); ?>">
					<?php esc_html_e( 'Sub Title', 'ample-construction' ); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'sub-title' ) ); ?>"
                       class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sub-title' ) ); ?>"
                       value="<?php echo $subtitle; ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'cat_id' ) ); ?>">
					<?php esc_html_e( 'Select Category', 'ample-construction' ); ?>
                </label><br/>
				<?php
				$better_con_dropown_cat = array(
					'show_option_none' => esc_html__( 'Select Categories ', 'ample-construction' ),
					'orderby'          => 'name',
					'order'            => 'asc',
					'show_count'       => 1,
					'hide_empty'       => 1,
					'echo'             => 1,
					'selected'         => $catid,
					'hierarchical'     => 1,
					'name'             => esc_attr( $this->get_field_name( 'cat_id' ) ),
					'id'               => esc_attr( $this->get_field_name( 'cat_id' ) ),
					'class'            => 'widefat',
					'taxonomy'         => 'category',
					'hide_if_empty'    => false,
				);
				wp_dropdown_categories( $better_con_dropown_cat );
				?>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>">
					<?php esc_html_e( 'Image Size[1300 X 650]', 'ample-construction' ); ?>
                </label>
                <br/>
				<?php
				if ( ! empty( $image ) ) :
					echo '<img class="custom_media_image widefat" src="' . $image . '"/><br />';
				endif;
				?>
                <input type="text" class="widefat custom_media_url"
                       name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>"
                       id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" value="<?php echo $image; ?>">
                <input type="button" class="button button-primary custom_media_button" id="custom_media_button"
                       name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>"
                       value="<?php esc_attr_e( 'Upload Image', 'ample-construction' ) ?>"/>
            </p>

			<?php


		}

		public function update( $new_instance, $old_instance ) {
			$instance              = $old_instance;
			$instance['cat_id']    = ( isset( $new_instance['cat_id'] ) ) ? absint( $new_instance['cat_id'] ) : '';
			$instance['title']     = sanitize_text_field( $new_instance['title'] );
			$instance['sub-title'] = sanitize_text_field( $new_instance['sub-title'] );
			$instance['image']     = esc_url_raw( $new_instance['image'] );


			return $instance;

		}

		public function widget( $args, $instance ) {

			if ( ! empty( $instance ) ) {
				$instance = wp_parse_args( (array ) $instance, $this->defaults() );
				echo $args['before_widget'];
				$catid                     = absint( $instance['cat_id'] );
				$title                     = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '', $instance, $this->id_base );
				$image                     = esc_url( $instance['image'] );
				$subtitle                  = esc_html( $instance['sub-title'] );
				$sticky                    = get_option( 'sticky_posts' );
				$home_testimonials_section = array(
					'ignore_sticky_posts' => true,
					'post__not_in'        => $sticky,
					'cat'                 => $catid,
					'posts_per_page'      => - 1,
					'order'               => 'DESC'
				);
				echo $args['before_widget'];
				?>
                <div class="testimonial-sec pt-50 pb-50" style="background-image: url(<?php echo $image;?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sec-title">
                                    <h2><?php echo esc_html($title); ?></h2>
                                    <p><?php echo esc_html($subtitle); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="all-testimonial owl-item owl-carousel">
									<?php
									$i = 0;
									if ( ! empty( $catid ) ) {
										$i                         = 0;
										$sticky                    = get_option( 'sticky_posts' );
										$home_testimonials_section = array(
											'cat'                 => $catid,
											'posts_per_page'      => 6,
											'ignore_sticky_posts' => true,
											'post__not_in'        => $sticky,
											'order'               => 'ASC'
										);
									}

									$home_testimonials_section_query = new WP_Query( $home_testimonials_section );

									if ( $home_testimonials_section_query->have_posts() ) {
										while ( $home_testimonials_section_query->have_posts() ) {
											$home_testimonials_section_query->the_post();
											?>


                                            <div class="single-testimonial">
                                                <div class="client-comment">
													<?php
													if ( has_post_thumbnail() ) {
														$image_id  = get_post_thumbnail_id();
														$image_url = wp_get_attachment_image_src( $image_id, 'medium', true );
														?>

                                                        <img src="<?php echo esc_url( $image_url[0] ); ?>" class="img-circle" alt="" width="304" height="236">

													<?php } ?>

                                                    <p><?php echo esc_html( wp_trim_words( get_the_content(), 25 ) ); ?></p>
                                                    <h2><?php the_title(); ?></h2>
                                                </div>
                                            </div>
											<?php
											$i ++;
										}
										wp_reset_postdata();
									}

									?>

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
add_action( 'widgets_init', 'ample_construction_testimonials_widget' );
function ample_construction_testimonials_widget() {
	register_widget( 'Ample_Construction_Testimonials_Widget' );

}