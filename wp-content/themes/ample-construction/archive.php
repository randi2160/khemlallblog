<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ample Construction
 */
global $ample_construction_header_image, $ample_construction_header_style;
$ample_construction_header_image = get_header_image();

if ( $ample_construction_header_image ) {
	$ample_construction_header_style = $ample_construction_header_image;

} else {

	$ample_construction_header_style = '';
}

$ample_construction_breadcrump_option      = ample_construction_get_option( 'ample_construction_breadcrumb_setting_option' );
$ample_construction_hide_breadcrump_option = ample_construction_get_option( 'ample_construction_hide_breadcrumb_front_page_option' );
$ample_construction_designlayout           = get_post_meta( get_the_ID(), 'ample_construction_sidebar_layout', true );


if ( ( $ample_construction_hide_breadcrump_option == 1 && is_front_page() ) || ! is_front_page() ) {

	get_header(); ?>
    <!-- Page Heading Section Start -->
    <div class="pagehding-sec "style="background-image: url(<?php echo esc_url($ample_construction_header_style); ?>);>
            <div class="images-overlay">

    <div class="col-md-6 col-sm-7">
        <div class="page-heading">
            <h1><?php the_archive_title(); ?></h1>
        </div>
    </div>
	<?php
	if ( $ample_construction_breadcrump_option == "enable" ) {
		?>
        <div class="col-md-6 col-sm-5">
            <div class="page-heading">
                <ol class="breadcrumb trail-items">
					<?php breadcrumb_trail(); ?>
                </ol>
            </div>
        </div>

	<?php } ?>
    </div>
<?php } ?>

    </div>
    <!-- Page Heading Section End -->
    <div class="blog-sec pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 blog-post">


	                <?php
	                if (have_posts()) :
		                /* Start the Loop */
		                while (have_posts()) : the_post();

			                /*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
			                get_template_part('template-parts/content', get_post_format());

		                endwhile;

		                the_posts_navigation();

	                else :

		                get_template_part('template-parts/content', 'none');

	                endif; ?>





                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebar">

					<?php get_sidebar(); ?>

                </div>

            </div>
        </div>
    </div>
<?php

get_footer();
