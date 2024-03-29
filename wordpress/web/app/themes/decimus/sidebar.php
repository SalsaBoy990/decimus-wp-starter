<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Decimus
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php if ( is_single() ) { ?>
<div class="sidebar-area col-md-12 col-lg-3 col-xxl-3 mt-4 mt-md-0">
	<?php } else { ?>
    <div class="sidebar-area col-md-4 col-lg-3 col-xxl-3 mt-4 mt-md-0">
		<?php } ?>
        <aside id="secondary" class="widget-area">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
        </aside>
        <!-- #secondary -->
    </div>
