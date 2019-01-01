<?php
get_header();
$ample_construction_hide_front_page_content = ample_construction_get_option('ample_construction_front_page_hide_option');
if(!is_home()) {
    $ample_construction_slider_section_option = ample_construction_get_option('ample_construction_homepage_slider_option');
    if ($ample_construction_slider_section_option != 'hide') {

        $ample_construction_slider_section_cat_id = ample_construction_get_option('ample_construction_slider_cat_id');

        $ample_construction_get_started_text = ample_construction_get_option('ample_construction_slider_get_started_txt');

        $ample_construction_get_started_text_link = ample_construction_get_option('ample_construction_slider_get_started_link');

        $ample_construction_slider_category = get_category($ample_construction_slider_section_cat_id);

        if (!empty($ample_construction_slider_section_cat_id)) {
            $count = $ample_construction_slider_category->category_count;
            $no_of_slider = ample_construction_get_option('ample_construction_no_of_slider');

            if ($count > 0 && $no_of_slider > 0) {
                ?>
                <!-- Start Featured Slider -->

                <div class="slider ">
                    <div class="all-slide owl-item  owl-carousel">

                        <?php
                        $i = 0;
                        if (!empty($ample_construction_slider_section_cat_id)) {
                            $ample_construction_home_slider_section = array('cat' => $ample_construction_slider_section_cat_id, 'posts_per_page' => $no_of_slider);
                            $ample_construction_home_slider_section_query = new WP_Query($ample_construction_home_slider_section);
                            if ($ample_construction_home_slider_section_query->have_posts()) {
	                            while ( $ample_construction_home_slider_section_query->have_posts() ) {
		                            $ample_construction_home_slider_section_query->the_post();
		                            ?>

                                    <div class="single-slide">
			                            <?php if ( has_post_thumbnail() ) {
				                            $image_id  = get_post_thumbnail_id();
				                            $image_url = wp_get_attachment_image_src( $image_id, 'full', true ); ?>
                                            <img src="<?php echo esc_url( $image_url[0] ); ?>" class="img-responsive"
                                                 alt="<?php the_title_attribute(); ?>">
			                            <?php } ?>
                                       <div class="slider-overlay"></div>
                                        <div class="slider-text">
                                            <h1><?php the_title() ?></h1>
                                            <p> <?php
					                            if ( has_excerpt() ) {
						                            the_excerpt();
					                            }
					                            else{
					                            ?>
                                            <p> <?php echo esc_html( wp_trim_words( get_the_content(), 15 ) ); ?></p>
				                            <?php
				                            } ?> </p>
                                            <ul>
                                                <li>
                                                    <a href="<?php the_permalink() ?>"><?php esc_html_e( 'Know More', 'ample-construction' ); ?></a>
                                                </li>

                                                <li>
                                                    <a href="<?php echo esc_url( $ample_construction_get_started_text_link ); ?>"><?php echo esc_html( $ample_construction_get_started_text ) ?>
                                                        </a></li>
                                            </ul>
                                        </div>
                                    </div>


		                            <?php
		                            $i ++;
	                            }


                            }
                            wp_reset_postdata();
                        }
                        ?>


                    </div>
                </div>
                <?php
            }
        }
    }


    ?>
    <!-- End Featured Slider -->

    <!-- Start Home Page widget Area -->
    <div id="home-page-widget-area" class="widget">

        <?php dynamic_sidebar('homepage_widgets'); ?>

    </div>
    <!-- End Home Page widget Area -->


    <?php
   }

    if ('posts' == get_option('show_on_front')) {

      include(get_home_template());
   } else {
     if (1 != $ample_construction_hide_front_page_content) {
        include(get_page_template());


    }
    }
get_footer();
?>

