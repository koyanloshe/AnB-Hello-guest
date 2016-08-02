<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $woocommerce_loop;
$g5plus_woocommerce_loop = &G5Plus_Global::get_woocommerce_loop();
$g5plus_options = &G5Plus_Global::get_options();

$layout_style = isset($_GET['layout']) ? $_GET['layout'] : '';
if (!in_array($layout_style, array('full','container','container-fluid'))) {
    $layout_style = $g5plus_options['archive_product_layout'];
}

$sidebar = isset($_GET['sidebar']) ? $_GET['sidebar'] : '';
if (!in_array($sidebar, array('none','left','right','both'))) {
    $sidebar = $g5plus_options['archive_product_sidebar'];
}

$sidebar_width = isset($_GET['sidebar_width']) ? $_GET['sidebar_width'] : '';
if (!in_array($sidebar_width, array('small','large'))) {
    $sidebar_width = $g5plus_options['archive_product_sidebar_width'];
}

$left_sidebar = $g5plus_options['archive_product_left_sidebar'];
$right_sidebar = $g5plus_options['archive_product_right_sidebar'];
$filter_sidebar = $g5plus_options['archive_product_filter_sidebar'];

$archive_display_columns = 3;
$archive_display_columns = isset($_GET['columns']) ? $_GET['columns'] : '';
if (!in_array($archive_display_columns, array('2','3','4'))) {
    $archive_display_columns = isset($g5plus_options['product_display_columns']) ? $g5plus_options['product_display_columns'] : '3' ;
}



$product_rating = isset($_GET['rating']) ? $_GET['rating'] : '';
if (!in_array($product_rating,array('0','1'))) {
	$product_rating = isset($g5plus_options['product_show_rating']) ? $g5plus_options['product_show_rating'] : 1;
}





$sidebar_col = 'col-md-3';
if ($sidebar_width == 'large') {
    $sidebar_col = 'col-md-4';
}

$content_col_number = 12;

if (is_active_sidebar( $left_sidebar ) && (($sidebar == 'both') || ($sidebar == 'left'))) {
    if ($sidebar_width == 'large') {
        $content_col_number -= 4;
    }
    else {
        $content_col_number -= 3;
    }
}
if (is_active_sidebar( $right_sidebar ) && (($sidebar == 'both') || ($sidebar == 'right'))) {
    if ($sidebar_width == 'large') {
        $content_col_number -= 4;
    }
    else {
        $content_col_number -= 3;
    }
}

$content_col = 'col-md-' . $content_col_number;
if (($content_col_number == 12) && ($layout_style == 'full')) {
    $content_col = '';
}

$archive_class = array('archive-product-wrap','clearfix');
$archive_class[] = 'layout-' . $layout_style;

$catalog_filter_class = array('catalog-filter clearfix p-font');

$product_show_result_count = isset($g5plus_options['product_show_result_count']) ? $g5plus_options['product_show_result_count'] : 1;
$product_show_catalog_ordering = isset($g5plus_options['product_show_catalog_ordering']) ? $g5plus_options['product_show_catalog_ordering'] : 1 ;

$product_show_filter = isset($_GET['filter']) ? $_GET['filter'] : '';
if (!in_array($product_show_filter, array('0','1'))) {
    $product_show_filter = isset($g5plus_options['product_show_filter']) ? $g5plus_options['product_show_filter'] : 1;
}

if (($product_show_result_count == 0) && ($product_show_catalog_ordering == 0) && (($product_show_filter == 0) || !is_active_sidebar( $filter_sidebar ) )) {
    $catalog_filter_class[] = 'catalog-filter-disable';
} else {
    if ($product_show_result_count == 0) {
        $catalog_filter_class[] = 'result-count-disable';
    }

    if ($product_show_catalog_ordering == 0) {
        $catalog_filter_class[] = 'catalog-ordering-disable';
    }

    if (($product_show_filter == 0) || (!is_active_sidebar( $filter_sidebar ))) {
        $catalog_filter_class[] = 'product-filter-disable';
    }
}

//if ($content_col_number == 12) {
    remove_action('woocommerce_after_shop_loop','woocommerce_pagination');
    add_action('g5plus_after_archive_product_listing','woocommerce_pagination',1);
//}


get_header( 'shop' ); ?>
<?php
/**
 * @hooked - g5plus_archive_product_heading - 5
 **/
do_action('g5plus_before_archive_product');
?>
<main  class="site-content-archive-product">
    <?php
    /**
     * @hooked - g5plus_shop_page_content - 5
     **/
    do_action('g5plus_before_archive_product_listing');
    ?>

    <?php if ($layout_style != 'full'): ?>
        <div class="<?php echo esc_attr($layout_style) ?> clearfix">
    <?php endif;?>

            <?php if (($content_col_number != 12) || ($layout_style != 'full')): ?>
                <div class="row clearfix">
            <?php endif;?>

                    <?php if (is_active_sidebar( $left_sidebar ) && (($sidebar == 'left') || ($sidebar == 'both'))): ?>
                        <div class="sidebar woocommerce-sidebar <?php echo esc_attr($sidebar_col) ?> hidden-sm hidden-xs sidebar-<?php echo esc_attr($sidebar_width); ?>">
                            <?php dynamic_sidebar( $left_sidebar );?>
                        </div>
                    <?php endif;?>

                    <div class="<?php echo esc_attr($content_col) ?>">
                        <div class="<?php echo join(' ',$archive_class); ?>">
                            <?php if ( have_posts() ) : ?>

                                <div class="<?php echo join(' ',$catalog_filter_class) ?>">
                                    <?php
                                        /**
                                         * woocommerce_before_shop_loop hook
                                         *
                                         * @hooked g5plus_woocommerce_filter_button - 10
                                         */
                                        do_action( 'g5plus_woocommerce_before_shop_loop' );
                                    ?>
                                    <div class="catalog-filter-inner clearfix">
                                        <?php
                                        /**
                                         * woocommerce_before_shop_loop hook
                                         *
                                         * @hooked woocommerce_result_count - 20
                                         * @hooked woocommerce_catalog_ordering - 30
                                         */
                                        do_action( 'woocommerce_before_shop_loop' );
                                        $g5plus_woocommerce_loop['columns'] = $archive_display_columns;
                                        $g5plus_woocommerce_loop['rating'] = $product_rating;
                                        ?>
                                    </div>
                                </div>

                                <?php woocommerce_product_loop_start(); ?>

                                <?php while ( have_posts() ) : the_post(); ?>

                                    <?php wc_get_template_part( 'content', 'product' ); ?>

                                <?php endwhile; // end of the loop. ?>

                                <?php woocommerce_product_loop_end(); ?>

                                <?php
                                /**
                                 * woocommerce_after_shop_loop hook
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop' );
                                ?>
                            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                                <?php wc_get_template( 'loop/no-products-found.php' ); ?>

                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if (is_active_sidebar( $right_sidebar ) && (($sidebar == 'right') || ($sidebar == 'both'))): ?>
                        <div class="sidebar woocommerce-sidebar <?php echo esc_attr($sidebar_col) ?> hidden-sm hidden-xs sidebar-<?php echo esc_attr($sidebar_width); ?>">
                            <?php dynamic_sidebar( $right_sidebar );?>
                        </div>
                    <?php endif;?>
            <?php if (($content_col_number != 12) || ($layout_style != 'full')): ?>
                </div>
            <?php endif;?>

    <?php if ($layout_style != 'full'): ?>
        </div>
    <?php endif;?>
    <?php
        /**
         * @hooked - g5plus_shop_page_content - 5
         **/
        do_action('g5plus_after_archive_product_listing');
    ?>
</main>

<?php
if (is_active_sidebar( $filter_sidebar ) && ($product_show_filter == 1)) {
    add_action('g5plus_after_page_wrapper','g5plus_woocommerce_filter_sidebar',10);
}
?>
<?php get_footer( 'shop' ); ?>

