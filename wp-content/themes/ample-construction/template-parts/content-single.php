<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ample Construction
 */
$hide_show_feature_image=ample_construction_get_option( 'ample_construction_show_feature_image_single_option');

?>

<article id="post-<?php the_ID(); ?>" class="post type-post status-publish has-post-thumbnail hentry" <?php post_class(); ?>>




    <div class="single-post">
		<?php
		if(has_post_thumbnail() && $hide_show_feature_image=="show")
		{
			the_post_thumbnail('full', array('class' => 'img-fluid'));

		}
		?>
            <div class="single-post-text">
                <h2><?php the_title(); ?></h2>
                <div class="meta-entry">

	            <?php ample_construction_posted_on();


	            ample_construction_entry_footer();?>

                </div>

				<?php
				the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:','ample-construction' ),
					'after'  => '</div>',
				) );
				?>

            </div>
        </div>



</article><!-- #post-<?php the_ID(); ?> -->


