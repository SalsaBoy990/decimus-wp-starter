<?php

/**
 * The template for displaying all WooCommerce pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Decimus
 */

get_header();
?>

    <div id="content" class="site-content container-fluid side-padding py-5 mt-1">
        <div id="primary" class="content-area">

            <!-- Hook to add something nice -->
            <?php bs_after_primary(); ?>

            <main id="main" class="site-main narrow-content pt-3 mt-2">
                <!-- Breadcrumb -->
                <?php woocommerce_breadcrumb(); ?>
                <div class="row">
                    <div class="col">
                        <?php decimus_woocommerce_content(); ?>
                    </div>
                    <!-- sidebar -->
                    <?php //get_sidebar();
                    ?>
                    <!-- row -->
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->
<?php
get_footer();
