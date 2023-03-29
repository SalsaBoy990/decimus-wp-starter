<?php
/**
 * Archive Template: Sidebar Left
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
            <?php bs_after_primary(); ?>

            <div class="row">
                <?php get_sidebar(); ?>
                <div class="col-md-8 order-first order-md-last">

                    <main id="main" class="site-main">

                        <header class="page-header mb-4">
                            <h1><?php the_archive_title(); ?></h1>
                            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
                        </header>

                        <!-- .page-header -->
                        <!-- Grid Layout -->
                        <?php if ( have_posts() ) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="card horizontal mb-4">
                                    <div class="row">
                                        <!-- Featured Image-->
                                        <?php if ( has_post_thumbnail() )
                                            echo '<div class="card-img-left-md col-lg-5">' . get_the_post_thumbnail(null, 'medium') . '</div>';
                                        ?>
                                        <div class="col">
                                            <div class="card-body">

                                                <?php decimus_category_badge(); ?>

                                                <!-- Title -->
                                                <h2 class="blog-post-title">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h2>
                                                <!-- Meta -->
                                                <?php if ( 'post' === get_post_type() ) : ?>
                                                    <small class="text-muted mb-2">
                                                        <?php
                                                        decimus_date();
                                                        decimus_author();
                                                        decimus_comments();
                                                        decimus_edit();
                                                        ?>
                                                    </small>
                                                <?php endif; ?>
                                                <!-- Excerpt & Read more -->
                                                <div class="card-text mt-auto">
                                                    <?php the_excerpt(); ?> <a class="read-more"
                                                                               href="<?php the_permalink(); ?>"><?php _e('Read more »', 'decimus'); ?></a>
                                                </div>

                                                <hr>
                                                <!-- Tags -->
                                                <?php decimus_tags(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <!-- Pagination -->
                        <div>
                            <?php decimus_pagination(); ?>
                        </div>

                    </main><!-- #main -->

                </div><!-- col -->
            </div><!-- row -->

        </div><!-- #primary -->
    </div><!-- #content -->
<?php
get_footer();
