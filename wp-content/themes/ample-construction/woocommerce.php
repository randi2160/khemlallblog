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


if ( ( $ample_construction_hide_breadcrump_option == 1 && is_front_page() ) || ! is_front_page() ) {

	get_header(); ?>




    <!-- Page Heading Section Start -->
    <div class="pagehding-sec "style="background-image: url(<?php echo esc_url($ample_construction_header_style); ?>);>
            <div class="images-overlay">

    <div class="col-md-6 col-sm-7">
        <div class="page-heading">
            <h1><?php   the_archive_title(); ?></h1>
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



	                <?php if ( have_posts() ) :
		                woocommerce_content();
	                endif;
	                ?>



                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebar">

					<?php get_sidebar(); ?>

                </div>

            </div>
        </div>
    </div>
<?php

get_footer();

