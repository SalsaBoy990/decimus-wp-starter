<?php
/**
 * Category Template: Equal Height Sidebar Right
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Decimus
 */

get_header();
?>
    <div id="content" class="site-content container-fluid side-padding narrow-content py-5 mt-5">
        <div id="primary" class="content-area">

            <!-- Hook to add something nice -->
			<?php decimus_after_primary(); ?>

            <div class="row">
                <div class="col">

                    <main id="main" class="site-main">

                        <!-- Author & Bio -->
                        <header class="page-header mb-4">
                            <div class="d-flex flex-row align-items-center">
                                <div class="me-3">
				                    <?php echo get_avatar( get_the_author_meta( 'email' ),
					                    96,
					                    $default = '',
					                    $alt = '',
					                    array( 'class' => array( 'img-thumbnail rounded-circle' ) ) ); ?>
                                </div>
                                <h1 class="h2"><?php the_author(); ?></h1>
                            </div>

                            <div class="author-bio">
                                <div class="author-bio__description"><?php the_author_meta( 'description' ); ?></div>
                            </div>
                        </header>

                        <div class="row">
							<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : the_post(); ?>
                                    <div class="col-md-12 col-lg-6 col-xxl-4 mb-4">
                                        <div class="card h-100">

											<?php the_post_thumbnail( 'medium', array( 'class' => 'card-img-top' ) ); ?>

                                            <div class="card-body d-flex flex-column">

	                                            <?php if(has_post_thumbnail() === true) { ?>
                                                    <!-- Category badge -->
                                                    <div class="post-badge">
			                                            <?php decimus_category_badge(); ?>
                                                    </div>
	                                            <?php } ?>

                                                <h2 class="blog-post-title">
                                                    <a href="<?php the_permalink(); ?>">
														<?php the_title(); ?>
                                                    </a>
                                                </h2>

												<?php if ( 'post' === get_post_type() ) : ?>
                                                    <small class="text-muted d-block mb-3">
														<?php
														decimus_date();
														decimus_author();
														decimus_comments();
														decimus_edit();
														?>
                                                    </small>
												<?php endif; ?>

                                                <div class="card-text">
													<?php the_excerpt(); ?>
                                                </div>

                                                <div class="mt-auto">
                                                    <a class="read-more"
                                                       href="<?php the_permalink(); ?>"><?php _e( 'Read more »',
															'decimus' ); ?></a>
                                                </div>

                                                <hr>

												<?php decimus_tags(); ?>

                                            </div>
                                        </div><!-- card -->
                                    </div><!-- col -->
								<?php endwhile; ?>
							<?php endif; ?>
                        </div>

                        <!-- Pagination -->
                        <div>
							<?php decimus_pagination(); ?>
                        </div>

                    </main><!-- #main -->

                </div><!-- col -->
				<?php get_sidebar(); ?>
            </div><!-- row -->

        </div><!-- #primary -->
    </div><!-- #content -->
<?php
get_footer();
