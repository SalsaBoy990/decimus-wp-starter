<?php
/**
 * Template Name: Left Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package decimus
 */

get_header();
?>

    <div id="content" class="site-content container-fluid side-padding narrow-content py-5 mt-4">
        <div id="primary" class="content-area">

            <!-- Hook to add something nice -->
			<?php decimus_after_primary(); ?>

            <div class="row">
                <!-- sidebar -->
				<?php get_sidebar(); ?>
                <div class="col-md-8 col-xxl-9 order-first order-md-last">

                    <main id="main" class="site-main">

                        <header class="entry-header">
							<?php the_post(); ?>
							<?php the_category( ', ' ) ?><?php the_terms( $post->ID,
								'isopost_categories',
								' ',
								' / ' ); ?>
							<?php the_title( '<h1>', '</h1>' ); ?>
							<?php decimus_post_thumbnail(); ?>
                        </header>

                        <div class="entry-content">
                            <!-- Content -->
							<?php the_content(); ?>
                            <!-- .entry-content -->
							<?php wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'decimus' ),
								'after'  => '</div>',
							) );
							?>
                        </div>

                        <footer class="entry-footer">

                        </footer>

						<?php comments_template(); ?>

                    </main><!-- #main -->

                </div><!-- col -->
            </div><!-- row -->

        </div><!-- #primary -->
    </div><!-- #contenty -->
<?php
get_footer();
